<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <router-link to="/admin/dashboard" class="ml-2"
                            >Dashboard</router-link
                        >
                        <svg
                            class="fill-current w-3 h-3 mx-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                        >
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                            />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <router-link to="/orders"
                            >Orders Management</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="flex flex-wrap items-center justify-center">
                <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
                    <div
                        class="font-sans text-2xl font-bold mb-6 text-gray-800 font-semibold"
                    >
                        Orders Management
                    </div>
                    <div class="flex justify-end pt-16">
                        <input
                            @keyup="searchOrder"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="search"
                            placeholder="Search..."
                        />
                    </div>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Delivery Address</th>
                                <th>Contact #</th>
                                <!-- <th>Date</th> -->
                                <th>Status</th>
                                <th>Deliver</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody v-if="orders && orders.data.length > 0">
                            <tr
                                v-for="(order, index) in orders.data"
                                :key="index"
                                @dblclick="editingItem = order"
                            >
                                <td style="width:50px;">{{ index + 1 }}</td>
                                <td>
                                    {{ order.user.fname }}
                                    {{ order.user.mname }}
                                    {{ order.user.lname }}
                                </td>
                                <td style="width:200px;">
                                    {{ order.product.product_name }}
                                    {{ order.product.product_brand }}
                                    {{ order.product.product_model }}
                                </td>
                                <td>{{ order.quantity }}</td>
                                <td>
                                    ₱
                                    {{ order.quantity * order.product.price }}
                                </td>
                                <td>{{ order.address }}</td>
                                <td>{{ order.contact_num }}</td>
                                <!-- <td>{{ order.created_at }}</td> -->
                                <td>
                                    {{
                                        order.is_delivered == 1
                                            ? 'Delivered'
                                            : 'Pending'
                                    }}
                                </td>
                                <td
                                    class="text-center"
                                    v-if="order.is_delivered == 0"
                                >
                                    <button
                                        class="bg-indigo-600 hover:bg-indigo-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-white transition duration-300"
                                        @click="deliver(index)"
                                    >
                                        Deliver
                                    </button>
                                </td>
                                <td
                                    class="text-center"
                                    v-if="order.is_delivered"
                                >
                                    <button
                                        class="bg-indigo-600 p-2 rounded-lg text-gray-50 font-semibold opacity-50"
                                        @click="deliver(index)"
                                        disabled
                                    >
                                        Delivered
                                    </button>
                                </td>
                                <td class="flex justify-center">
                                    <router-link
                                        :to="{
                                            name: 'view-order',
                                            params: { id: order.id }
                                        }"
                                        style="text-decoration:none;"
                                        class="font-semibold bg-green-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                        ><i class="fas fa-eye mr-2"></i
                                        >View</router-link
                                    >
                                    <button
                                        @click="deleteOrder(order.id)"
                                        class="font-semibold bg-red-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out"
                                    >
                                        <i class="far fa-trash-alt mr-2"></i
                                        >Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td
                                    colspan="10"
                                    align="center"
                                    class="font-sans text-2xl font-bold text-gray-800 text-center"
                                >
                                    No Orders Found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination
                        class="mt-4 center"
                        :data="orders"
                        @pagination-change-page="getResults"
                    ></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            orders: [],
            search: ''
        };
    },
    beforeMount() {
        this.getUser();
        this.getCustomer();
        this.getOrders();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getCustomer() {
            axios.get('api/users').then(response => {
                this.users = response.data;
            });
        },
        getOrders() {
            axios
                .get('api/orders')
                .then(response => {
                    this.orders = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchOrder() {
            axios.get('/api/orders?search=' + this.search).then(response => {
                this.orders = response.data;
                console.log(response.data);
            });
        },
        getResults(page = 1) {
            axios.get('/api/orders?page=' + page).then(response => {
                this.orders = response.data;
                console.log(response.data);
            });
        },
        deliver(index) {
            let order = this.orders[index];
            axios
                .patch(`/api/orders/${order.id}/deliver`)
                .then(response => {
                    this.orders[index].is_delivered = 1;
                    this.$forceUpdate();
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Delivered Successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        },
        deleteOrder(id) {
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/orders/${id}`).then(response => {
                        this.getOrders();
                    });
                    this.$swal(
                        'Deleted!',
                        'Order has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
