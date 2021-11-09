<template>
    <div>
        <div class="container">
            <div class="flex justify-center py-4">
                <div class="sm:w-full lg:w-4/5 flex justify-between">
                    <div class="flex inline-block">
                        <router-link
                            to="/auto-parts"
                            style="text-decoration:none;"
                            class="text-gray-600 text-xs hover:text-gray-700 transition duration-300"
                        >
                            Return to Previous Page
                        </router-link>
                    </div>
                    <div class="flex items-center">
                        <router-link
                            style="text-decoration:none"
                            class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                            to="/"
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
                            style="text-decoration:none"
                            class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                            to="/auto-parts"
                            >Auto Parts</router-link
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
                                name: 'single-product',
                                params: {
                                    id: product.id
                                }
                            }"
                            class="text-xs text-gray-700 hover:text-gray-700 transition duration-300 capitalize"
                            style="text-decoration:none"
                            aria-current="page"
                        >
                            {{ product.product_name }}
                            {{ product.product_model }}
                            {{ product.product_brand }}</router-link
                        >
                    </div>
                </div>
                <hr />
            </div>
            <!-- <div class="flex justify-center">
                <div class="w-4/5">
                    <div class="flex py-4">
                        <div class="w-full flex justify-start">
                            <div class="flex items-center">
                                <router-link
                                    style="text-decoration:none"
                                    class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                                    to="/"
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
                                    style="text-decoration:none"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    to="/auto-parts"
                                    >Auto Parts</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="flex justify-center">
                <div class="bg-white sm:w-full lg:w-4/5 rounded shadow-md">
                    <div class="flex px-3 py-3">
                        <div
                            class="md:flex no-wrap md:-mx-2 lg:space-x-10 lg:w-full sm:w-full lg:flex justify-center"
                        >
                            <div class="sm:w-full lg:w-2/5">
                                <button @click="toggleModal = true">
                                    <div
                                        class="relative h-96 w-96 overflow-hidden"
                                    >
                                        <img
                                            :src="`/images/${product.image}`"
                                            alt=""
                                            class="absolute h-full w-full"
                                        />
                                    </div>
                                </button>
                            </div>
                            <div class="lg:w-full">
                                <div class="flex flex-col ml-4">
                                    <div class="space-y-4">
                                        <div class="flex inline-block">
                                            <p
                                                class="text-gray-800 text-xl capitalize mr-2"
                                            >
                                                {{ product.product_name }}
                                                {{ product.product_model }}
                                                {{ product.product_brand }}
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <div
                                                class="bg-gray-50 w-full px-3 py-4"
                                            >
                                                <h1
                                                    class="text-blue-700 text-2xl font-bold"
                                                >
                                                    ₱
                                                    {{
                                                        product.price.toLocaleString()
                                                    }}
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="grid grid-cols-2 gap-4">
                                                <h5
                                                    class="text-md text-gray-500 tracking-wide capitalize"
                                                >
                                                    Available Units
                                                </h5>
                                                <h5
                                                    class="text-md text-gray-700 tracking-wide ml-4"
                                                >
                                                    {{ product.units }} piece
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="grid grid-cols-2 gap-4">
                                                <h5
                                                    class="text-md text-gray-500 tracking-wide capitalize"
                                                >
                                                    Status
                                                </h5>
                                                <h5
                                                    v-if="
                                                        product.status ==
                                                            'Available'
                                                    "
                                                >
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm ml-3"
                                                    >
                                                        Available
                                                    </span>
                                                </h5>
                                                <h5
                                                    v-if="
                                                        product.status ==
                                                            'Out of Stock'
                                                    "
                                                >
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm ml-3"
                                                    >
                                                        Out of Stock
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="flex pt-4">
                                            <h5
                                                class="text-md text-gray-500 tracking-wide capitalize"
                                            >
                                                Description
                                            </h5>
                                        </div>
                                        <div class="flex mb-5 pt-2">
                                            <div
                                                v-html="product.description"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end p-8">
                        <router-link
                            style="text-decoration:none"
                            :to="{
                                path: '/checkout?pid=' + product.id
                            }"
                            class="bg-blue-700 px-10 py-3 hover:bg-blue-800 text-white transition duration-300"
                            >Proceed to checkout</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
        <div
            class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50"
            v-if="toggleModal"
        >
            <div class="relative mx-auto w-auto max-w-2xl">
                <div class="w-full h-full flex flex-col">
                    <div class="flex justify-end p-2 overflow-hidden">
                        <button @click="toggleModal = false">
                            <svg
                                class="fill-current h-10 w-10 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 18 18"
                            >
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                    <div class="h-full w-full overflow-hidden">
                        <img
                            :src="`/images/${product.image}`"
                            class="w-full h-full object-cover"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div
            v-if="toggleModal"
            class="absolute z-40 inset-0 opacity-75 bg-black"
        ></div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data() {
        return {
            toggleModal: false,
            product: []
        };
    },
    beforeMount() {
        this.getProduct();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getProduct() {
            axios
                .get(`/api/products/${this.$route.params.id}`)
                .then(response => {
                    this.product = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
