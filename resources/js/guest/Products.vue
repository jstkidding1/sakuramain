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
            <div class="flex mt-10">
                <div class="w-2/12 mr-2">
                    <div class="bg-white rounded w-full shadow-md p-4">
                        <h3 class="text-center py-2 text-lg">Categories</h3>
                        <div class="flex mt-4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            >
                                <option>Body Components</option>
                                <option>Doors</option>
                                <option>Windows</option>
                                <option>Audio/Video Devices</option>
                                <option>Cameras</option>
                                <option>Ignition System</option>
                                <option>Sensors</option>
                                <option>Electrical Systems</option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            >
                                <option>Body Components</option>
                                <option>Doors</option>
                                <option>Windows</option>
                                <option>Audio/Video Devices</option>
                                <option>Cameras</option>
                                <option>Ignition System</option>
                                <option>Sensors</option>
                                <option>Electrical Systems</option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            >
                                <option>Body Components</option>
                                <option>Doors</option>
                                <option>Windows</option>
                                <option>Audio/Video Devices</option>
                                <option>Cameras</option>
                                <option>Ignition System</option>
                                <option>Sensors</option>
                                <option>Electrical Systems</option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            >
                                <option>Body Components</option>
                                <option>Doors</option>
                                <option>Windows</option>
                                <option>Audio/Video Devices</option>
                                <option>Cameras</option>
                                <option>Ignition System</option>
                                <option>Sensors</option>
                                <option>Electrical Systems</option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            >
                                <option>Body Components</option>
                                <option>Doors</option>
                                <option>Windows</option>
                                <option>Audio/Video Devices</option>
                                <option>Cameras</option>
                                <option>Ignition System</option>
                                <option>Sensors</option>
                                <option>Electrical Systems</option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            >
                                <option>Body Components</option>
                                <option>Doors</option>
                                <option>Windows</option>
                                <option>Audio/Video Devices</option>
                                <option>Cameras</option>
                                <option>Ignition System</option>
                                <option>Sensors</option>
                                <option>Electrical Systems</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-10/12">
                    <div class="flex justify-end">
                        <input
                            @keyup="searchProduct"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="search"
                            placeholder="Search..."
                        />
                    </div>
                    <div class="w-full p-4">
                        <div v-if="products && products.data.length > 0">
                            <div class="grid grid-cols-4 gap-8">
                                <div
                                    v-for="(product, index) in products.data"
                                    :key="index"
                                >
                                    <div
                                        class="bg-white shadow-md transform transition h-auto duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                                    >
                                        <img
                                            :src="product.image"
                                            :alt="product.product_name"
                                            class="h-72 w-72 object-cover"
                                        />
                                        <div class="p-4">
                                            <div class="flex">
                                                <div
                                                    class="text-gray-800 text-lg tracking-normal leading-tight"
                                                >
                                                    {{ product.product_name }}
                                                    {{ product.product_brand }}
                                                    {{ product.product_model }}
                                                </div>
                                            </div>
                                            <div class="flex mt-10 mb-2">
                                                <div
                                                    class="text-gray-500 text-xs font-light"
                                                >
                                                    Posted:
                                                    {{
                                                        product.created_at
                                                            | date
                                                    }}
                                                </div>
                                            </div>
                                            <hr />
                                            <div
                                                class="flex items-center justify-between mt-2"
                                            >
                                                <div
                                                    class="text-xl text-indigo-600"
                                                >
                                                    ₱
                                                    {{
                                                        product.price.toLocaleString()
                                                    }}
                                                </div>
                                                <router-link
                                                    style="text-decoration:none;"
                                                    :to="{
                                                        path:
                                                            '/auto-parts/' +
                                                            product.id
                                                    }"
                                                    class="bg-indigo-600 px-4 py-2 hover:bg-indigo-800 text-white"
                                                >
                                                    Buy now
                                                </router-link>
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
            }
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
