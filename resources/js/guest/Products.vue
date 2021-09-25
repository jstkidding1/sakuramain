<template>
    <div>
        <div class="container">
            <div class="w-full">
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
                <hr />
            </div>
            <div class="flex w-full mt-10">
                <h1 class="text-3xl text-gray-800 font-bold">
                    Search Auto Parts available in Sakura
                </h1>
            </div>
            <div class="flex w-full mt-2">
                <p class="text-lg text-gray-600">
                    Explore new parts listed below.
                </p>
            </div>
            <div class="flex items-center justify-end mt-10 mx-12">
                <!-- <div class="relative w-full">
                    <button
                        @click="showFilter = !showFilter"
                        class="block bg-indigo-600 p-2 text-white rounded hover:bg-indigo-800"
                    >
                        Filter <i class="fas fa-filter"></i>
                    </button>
                    <div
                        v-show="showFilter"
                        @click="showFilter = false"
                        class="fixed inset-0 h-full w-full"
                    ></div>
                    <div
                        v-show="showFilter"
                        class="absolute right-0 w-full text-gray-700 flex flex-wrap justify-center bg-white rounded-xl py-2 shadow-lg z-50 mt-2"
                    >
                        <div class="w-48">
                            <div>Name</div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                        </div>
                        <div class="w-48">
                            <div>Brand</div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                        </div>
                        <div class="w-48">
                            <div>Price</div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                            <div class="my-3 block">
                                <input type="checkbox" />
                                <label for="">Battery</label>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="relative w-2/6">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </span>
                    <input
                        class="w-full bg-white focus:bg-white border-2 border-gray-400 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        v-model.trim="search"
                        placeholder="Search..."
                        @keyup="searchProduct"
                    />
                    <svg
                        v-if="searchLoading"
                        class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                        style="border-right-color: white; border-top-color: white;"
                        viewBox="0 0 24 24"
                    ></svg>
                </div>
            </div>
            <div v-if="loadingData" class="flex justify-center pt-56">
                <svg
                    v-if="loadingData"
                    class="text-center animate-spin h-24 w-24 rounded-full bg-transparent border-4 border-gray-800 border-opacity-50 mr-3"
                    style="border-right-color: white; border-top-color: white;"
                    viewBox="0 0 24 24"
                ></svg>
            </div>
            <div class="flex">
                <div class="w-full">
                    <div class="w-full p-4">
                        <div v-if="products && products.data.length > 0">
                            <div class="grid grid-cols-4 gap-4">
                                <div
                                    v-for="(product, index) in products.data"
                                    :key="index"
                                >
                                    <div class="antialiased font-sans">
                                        <div class="max-w-6xl mx-auto">
                                            <div
                                                class="flex items-center justify-center"
                                            >
                                                <div
                                                    class="max-w-sm w-full sm:w-full lg:w-full py-6 px-3"
                                                >
                                                    <div
                                                        class="bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden transition duration-300"
                                                    >
                                                        <div
                                                            class="relative h-96 w-full overflow-hidden"
                                                        >
                                                            <router-link
                                                                :to="{
                                                                    path:
                                                                        '/auto-parts/' +
                                                                        product.id
                                                                }"
                                                            >
                                                                <img
                                                                    class="absolute h-full w-full object-cover"
                                                                    :src="
                                                                        `/images/${product.image}`
                                                                    "
                                                                    :alt="
                                                                        product.product_name
                                                                    "
                                                                />
                                                            </router-link>
                                                        </div>
                                                        <div class="p-4">
                                                            <p
                                                                class="uppercase tracking-wide text-sm font-bold text-gray-700"
                                                            >
                                                                {{
                                                                    product.product_name
                                                                }}
                                                                {{
                                                                    product.product_model
                                                                }}
                                                            </p>
                                                            <p
                                                                class="text-gray-700"
                                                            >
                                                                {{
                                                                    product.product_brand
                                                                }}
                                                            </p>
                                                            <p
                                                                class="text-3xl text-gray-900"
                                                            >
                                                                ₱
                                                                {{
                                                                    product.price.toLocaleString()
                                                                }}
                                                            </p>
                                                        </div>
                                                        <div class="px-4 mb-2">
                                                            <p
                                                                class="text-gray-700 text-xs"
                                                            >
                                                                Posted:
                                                                {{
                                                                    product.created_at
                                                                        | date
                                                                }}
                                                            </p>
                                                        </div>
                                                        <div
                                                            class="flex p-4 border-t border-gray-300 text-gray-700"
                                                        >
                                                            <div
                                                                class="flex-1 inline-flex items-center"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 mr-2"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke="currentColor"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                                                    />
                                                                </svg>
                                                                <p>
                                                                    <span
                                                                        class="text-gray-900 font-bold"
                                                                        >{{
                                                                            product.units
                                                                        }}</span
                                                                    >
                                                                    Available
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="flex"
                                                            ></div>
                                                            <div
                                                                class="flex-1 inline-flex items-center"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 mr-2"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke="currentColor"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"
                                                                    />
                                                                </svg>
                                                                <p
                                                                    v-if="
                                                                        product.status ==
                                                                            'Available'
                                                                    "
                                                                >
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                                                    >
                                                                        Available
                                                                    </span>
                                                                </p>
                                                                <p
                                                                    v-if="
                                                                        product.status ==
                                                                            'Out of Stock'
                                                                    "
                                                                >
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                                                                    >
                                                                        Out of
                                                                        Stock
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="px-4 pt-3 pb-4 border-t border-gray-300 bg-white"
                                                        >
                                                            <div
                                                                class="flex justify-end items-center pt-2"
                                                            >
                                                                <!-- <router-link
                                                                    :to="{
                                                                        path:
                                                                            '/cart/' +
                                                                            product.id
                                                                    }"
                                                                    class="flex items-center bg-gray-900 px-4 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                                                                    style="text-decoration:none;"
                                                                >
                                                                    Add to cart
                                                                </router-link> -->
                                                                <router-link
                                                                    style="text-decoration:none;"
                                                                    :to="{
                                                                        path:
                                                                            '/auto-parts/' +
                                                                            product.id
                                                                    }"
                                                                    class="flex items-center bg-gray-900 px-4 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                                                                >
                                                                    Buy now
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div
                                v-if="!loadingData"
                                class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                            >
                                No Products Found.
                            </div>
                        </div>
                        <pagination
                            class="mt-4 justify-start"
                            :data="products"
                            @pagination-change-page="getResults"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
import _ from 'lodash';
export default {
    data() {
        return {
            search: '',
            searchLoading: false,
            products: {
                data: []
            },
            showFilter: false,
            loadingData: false
            // products: []
        };
    },
    mounted() {
        this.getProducts();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getProducts() {
            this.loadingData = true;

            setTimeout(() => {
                this.loadingData = false;
                axios
                    .get('api/products/available')
                    .then(response => {
                        this.products = response.data.products;
                        console.log(response.data.products);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }, 2000);
        },
        searchProduct: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get('/api/products/available?search=' + this.search)
                .then(response => {
                    this.products = response.data.products;
                    console.log(response.data.products);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 2000),
        getResults(page = 1) {
            axios.get('/api/products/available?page=' + page).then(response => {
                this.products = response.data.products;
                console.log(response.data.products);
            });
        }
    }
};
</script>

<style></style>
