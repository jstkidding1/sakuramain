<template>
    <div class="">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 h-full rounded shadow-md mt-10">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <button
                                @click="$router.go(-1)"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </button>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                to="/dashboard/main"
                                >Home</router-link
                            >
                            <svg
                                class="fill-current text-xs w-3 h-3 mx-3"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512"
                            >
                                <path
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                />
                            </svg>
                            <router-link
                                :to="{
                                    name: 'customer-view-order',
                                    params: { id: order.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >View Order</router-link
                            >
                        </div>
                    </div>
                </div>
                <div v-if="order.remarks != null" class="flex px-3 py-4">
                    <div class="bg-gray-50 w-full rounded px-4 py-2">
                        <div class="flex items-center px-3 space-x-2 mt-4">
                            <h1 class="text-green-500 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </h1>
                            <h1 class="text-gray-500 text-md font-bold">
                                Remarks
                            </h1>
                        </div>
                        <div class="flex px-3 my-4">
                            <div v-html="order.remarks"></div>
                            <!-- <h1 class="text-gray-500 text-md font-semibold">
                                {{ reservation.remarks }}
                            </h1> -->
                        </div>
                    </div>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Personal Information
                    </h1>
                </div>
                <div class="flex py-2 px-3 mt-2 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Name:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.user.fname }}
                        {{ order.user.mname }}
                        {{ order.user.lname }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Email:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.user.email }}
                    </p>
                </div>
                <div class="flex py-2 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Address:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ user.address }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Contact Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        +63{{ user.contact_num }}
                    </p>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Order Information
                    </h1>
                </div>
                <div class="flex py-1 px-3 mt-2 space-x-2">
                    <div class="flex inline-block w-full">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Delivery Address
                        </p>
                    </div>
                    <div class="w-full" v-if="order.delivery_option == false">
                        <span class="text-md text-gray-700"
                            >Pick up to store</span
                        >
                    </div>
                    <div
                        v-if="order.delivery_option == true"
                        class="flex flex-col w-full"
                    >
                        <p class="text-md text-gray-700">
                            {{ order.street_name }}
                        </p>
                        <p class="text-md text-gray-700">
                            {{ order.building }} {{ order.house_num }}
                        </p>
                        <p class="text-md text-gray-700">
                            {{ order.region }} {{ order.province }}
                            {{ order.city }} {{ order.barangay }}
                        </p>
                        <p class="text-md text-gray-700">
                            {{ order.postal_code }}
                        </p>
                    </div>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Contact Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        +63{{ order.contact_num }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Order at:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.created_at | date }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Total Price:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        ₱ {{ order.quantity * order.product.price }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Quantity:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.quantity }}
                    </p>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2 mb-20">
                    <p class="w-1/2 text-md text-gray-700 font-bold">
                        Status:
                    </p>
                    <div class="flex justify-start">
                        <p
                            v-if="order.status == 'Delivered'"
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Delivered
                        </p>
                        <p
                            v-if="order.status == 'Pending'"
                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                        >
                            Pending
                        </p>
                        <p
                            v-if="order.status == 'Preparing'"
                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                        >
                            Preparing
                        </p>
                        <p
                            v-if="order.status == 'To be delivered'"
                            class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-sm"
                        >
                            To be delivered
                        </p>
                        <p
                            v-if="order.status == 'Cancelled'"
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                        >
                            Cancelled
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-96 mt-10 ml-4">
                <div class="bg-white rounded shadow-md">
                    <div class="flex py-4 px-3">
                        <h1 class="text-gray-700 font-bold text-lg">
                            Product Details
                        </h1>
                    </div>
                    <div class="flex py-2">
                        <div class="h-72 w-full overflow-hidden">
                            <img
                                :src="`/images/${order.product.image}`"
                                alt=""
                                class="h-full w-full"
                            />
                        </div>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold">
                            {{ order.product.product_name }}
                        </h1>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Description:
                            </p>
                        </div>
                        <div class="flex items-center px-3 pb-10">
                            <div v-html="order.product.description"></div>
                            <!-- <p
                                class="w-full text-sm text-gray-700 text-justify tracking-tight"
                            >
                                {{ order.product.description }}
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
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
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
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
                .get(`/api/user/${this.$route.params.id}/order`)
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
