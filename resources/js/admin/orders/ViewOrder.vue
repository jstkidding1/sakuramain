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
                        <router-link to="/orders">Order Management</router-link>
                        <svg
                            class="fill-current w-3 h-3 mx-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                        >
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                            />
                        </svg>
                        <router-link
                            :to="{
                                name: 'view-order',
                                params: { id: order.id }
                            }"
                            aria-current="page"
                            >View Order</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white w-full rounded shadow-md p-4 mt-10">
                <div class="flex mt-4">
                    <div class="flex mr-4">
                        <div class="w-full">
                            <img
                                :src="order.product.image"
                                class="w-72 h-72 object-cover"
                            />
                        </div>
                    </div>
                    <div class="flex w-1/2">
                        <div class="p-4">
                            <div class="flex">
                                <h5
                                    class="font-sans font-bold text-lg text-gray-800 mr-2"
                                >
                                    Product Information
                                </h5>
                            </div>
                            <div class="flex mt-4">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Product Name:
                                </h5>
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ order.product.product_name }}
                                    {{ order.product.product_brand }}
                                    {{ order.product.product_model }}
                                </h5>
                            </div>
                            <div class="flex mt-2">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Price:
                                </h5>
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    ₱ {{ order.product.price.toLocaleString() }}
                                </h5>
                            </div>
                            <div class="flex mt-2">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Units:
                                </h5>
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ order.product.units }}
                                </h5>
                            </div>
                            <div class="flex mt-2">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Description:
                                </h5>
                            </div>
                            <div class="flex mt-2">
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ order.product.description }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 shadow-md mt-4">
                <div class="flex mb-4">
                    <h5 class="font-sans font-bold text-lg text-gray-800 mr-2">
                        User Information
                    </h5>
                </div>
                <div class="flex">
                    <h5 class="font-sans text-md text-gray-800 mr-2">
                        Ordered By:
                    </h5>
                    <h5 class="font-sans font-bold text-md text-gray-800">
                        {{ order.user.fname }}
                        {{ order.user.mname }}
                        {{ order.user.lname }}
                    </h5>
                </div>
                <div class="flex mt-2">
                    <h5 class="font-sans text-md text-gray-800 mr-2">
                        Email:
                    </h5>
                    <h5 class="font-sans font-bold text-md text-gray-800">
                        {{ order.user.email }}
                    </h5>
                </div>
            </div>
            <div class="bg-white p-4 shadow-md mt-4">
                <div class="flex mb-4">
                    <h5 class="font-sans font-bold text-lg text-gray-800 mr-2">
                        Delivery Information
                    </h5>
                </div>
                <div class="space-y-2">
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Delivery Address:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ order.address }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Contact Number:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ order.contact_num }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Status:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{
                                order.is_delivered == 1
                                    ? 'Delivered'
                                    : 'Pending'
                            }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Order at:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ order.created_at }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Total Price:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            ₱ {{ order.quantity * order.product.price }}
                        </h5>
                    </div>
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
            order: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getOrder();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getOrder() {
            axios
                .get(`/api/orders/${this.$route.params.id}`)
                .then(response => {
                    this.order = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
