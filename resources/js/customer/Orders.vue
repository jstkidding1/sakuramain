<template>
    <div class="container">
        <h5 class="text-lg text-gray-800 font-bold">My Orders</h5>
        <table class="w-full mt-4 table-hover">
            <thead class="bg-white">
                <tr
                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                >
                    <!-- <th class="px-4 py-3">#</th> -->
                    <th class="px-4 py-3">Brand</th>
                    <th class="px-4 py-3">Total Price</th>
                    <th class="px-4 py-3">Delivery Address</th>
                    <th class="px-4 py-3">Contact</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody v-if="orders && orders.length > 0" class="bg-white">
                <tr
                    v-for="(order, index) in orders"
                    :key="index"
                    class="text-gray-700"
                >
                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                    <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                            <div
                                class="relative w-8 h-8 mr-3 rounded-full md:block"
                            >
                                <img
                                    class="object-cover w-full h-full rounded-full"
                                    :src="`/images/${order.product.image}`"
                                    loading="lazy"
                                />
                                <div
                                    class="absolute inset-0 rounded-full shadow-inner"
                                    aria-hidden="true"
                                ></div>
                            </div>
                            <div>
                                <p class="font-semibold text-black">
                                    {{ order.product.product_name }}
                                </p>
                                <p class="text-xs text-gray-600">
                                    {{ order.product.product_brand }}
                                    {{ order.product.product_model }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        ₱
                        {{ order.quantity * order.product.price }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ order.address }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ order.contact_num }}
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="order.status == 'Pending'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                        >
                            Pending
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="order.status == 'Preparing'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                        >
                            Preparing
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="order.status == 'To be delivered'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-sm"
                        >
                            To be delivered
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="order.status == 'Delivered'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Delivered
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="order.status == 'Cancelled'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                        >
                            Cancelled
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-ms font-semibold border"
                        v-if="order.status == 'Pending'"
                    >
                        <div class="flex justify-center">
                            <button
                                class="hover:text-red-700"
                                @click="cancelOrder(order.id)"
                            >
                                Cancel
                            </button>
                        </div>
                    </td>
                    <td
                        class="px-4 py-3 text-ms font-semibold border"
                        v-if="
                            (order.status == 'To be delivered') |
                                (order.status == 'Cancelled') |
                                (order.status == 'Preparing') |
                                (order.status == 'Delivered')
                        "
                    ></td>
                </tr>
            </tbody>
            <tbody v-else class="bg-white">
                <tr>
                    <td
                        colspan="6"
                        align="center"
                        class="text-gray-800 font-bold text-2xl mt-2"
                    >
                        No Orders Found.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            avatar: '/images/Avatar.png',
            shoppingCart: '/images/ShoppingCartIcon.png',
            carIcon: '/images/CarIcon.png',
            scheduleIcon: '/images/Schedule.png',
            orders: []
        };
    },
    beforeMount() {
        this.fetchUser();
        this.fetchOrders();
    },
    methods: {
        fetchUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            this.fname = this.user.fname;
            this.mname = this.user.mname;
            this.lname = this.user.lname;
            this.email = this.user.email;
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        fetchOrders() {
            axios
                .get(`/api/users/${this.user.id}/orders`)
                .then(response => {
                    this.orders = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        cancelOrder(id) {
            this.$swal({
                title: 'Are you sure you want to cancel your order?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`/api/orders/${id}`).then(response => {
                        this.fetchOrders();
                    });
                    this.$swal(
                        'Cancelled!',
                        'Order has been cancelled.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
