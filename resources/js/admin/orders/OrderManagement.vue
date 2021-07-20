<template>
    <div>
        <!-- <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <td></td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Cost</td>
                    <td>Delivery Address</td>
                    <td>Contact num</td>
                    <td>is Delivered?</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(order, index) in orders" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td v-html="order.product.product_name"></td>
                    <td>{{ order.quantity }}</td>
                    <td>{{ order.quantity * order.product.price }}</td>
                    <td>{{ order.address }}</td>
                    <td>{{ order.contact_num }}</td>
                    <td>{{ order.is_delivered == 1 ? 'Yes' : 'No' }}</td>
                    <td v-if="order.is_delivered == 0">
                        <button class="btn btn-success" @click="deliver(index)">
                            Deliver
                        </button>
                    </td>
                </tr>
            </tbody>
        </table> -->
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
                    <router-link to="/orders">Orders Management</router-link>
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
                <div class="pt-16">
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Delivery Address</th>
                                <th>Contact #</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr
                                v-for="(order, index) in orders"
                                :key="index"
                                @dblclick="editingItem = order"
                            >
                                <td style="width:50px;">{{ index + 1 }}</td>
                                <td style="width:300px;">
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
                                <td>
                                    {{
                                        order.is_delivered == 1
                                            ? 'Delivered'
                                            : 'Pending'
                                    }}
                                </td>
                                <td v-if="order.is_delivered == 0">
                                    <button
                                        class="btn btn-success"
                                        @click="deliver(index)"
                                    >
                                        Deliver
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            users: []
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
        deliver(index) {
            let order = this.orders[index];
            axios
                .patch(`/api/orders/${order.id}/deliver`)
                .then(response => {
                    this.orders[index].is_delivered = 1;
                    this.$forceUpdate();
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
