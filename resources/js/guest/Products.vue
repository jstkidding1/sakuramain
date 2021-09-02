<template>
    <div>
        <div class="mt-10 w-full">
            <div
                class="bg-gradient-to-r from-indigo-800 h-60 via-purple-600 to-red-400 px-72 py-10"
            >
                <div class="flex">
                    <h1 class="text-4xl font-bold text-white">
                        We offer you the best of our products
                    </h1>
                </div>
                <div class="flex mt-4">
                    <p class="text-md font-bold text-white text-justify">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and
                        more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="flex items-center justify-between mt-10 mx-12">
                <div class="relative w-full">
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
                </div>
                <input
                    @keyup="searchProduct"
                    class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                    type="text"
                    v-model="search"
                    placeholder="Search..."
                />
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
                                                        class="bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                                                    >
                                                        <div
                                                            class="block h-56 w-full overflow-hidden"
                                                        >
                                                            <img
                                                                class="h-full w-full object-cover p-2"
                                                                :src="
                                                                    product.image
                                                                "
                                                                :alt="
                                                                    product.product_name
                                                                "
                                                            />
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
export default {
    data() {
        return {
            search: '',
            products: {
                data: []
            },
            showFilter: false
            // products: []
        };
    },
    mounted() {
        this.getProducts();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value))
                    .startOf('hour')
                    .fromNow();
            }
        }
    },
    methods: {
        getProducts() {
            axios
                .get('api/products')
                .then(response => {
                    this.products = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchProduct() {
            axios.get('/api/products?search=' + this.search).then(response => {
                this.products = response.data;
                console.log(response.data);
            });
        },
        getResults(page = 1) {
            axios.get('/api/products?page=' + page).then(response => {
                this.products = response.data;
                console.log(response.data);
            });
        }
    }
};
</script>

<style></style>
