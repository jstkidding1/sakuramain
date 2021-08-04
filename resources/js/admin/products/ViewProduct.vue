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
                        <router-link to="/product"
                            >Product Management</router-link
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
                        <router-link
                            :to="{
                                name: 'view-product',
                                params: { id: products.id }
                            }"
                            aria-current="page"
                            >View Product</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white w-full py-4 px-10 shadow-md rounded">
                <div class="flex mb-10">
                    <h5 class="font-sans font-bold text-lg text-gray-800">
                        View Product
                    </h5>
                </div>
                <div class="flex justify-center">
                    <div class="flex w-full mr-10">
                        <img
                            :src="products.image"
                            :alt="products.product_name"
                            class="h-72 w-72 object-cover mr-2"
                        />
                    </div>
                    <div class="flex flex-col">
                        <div class="">
                            <h1
                                class="font-sans text-2xl text-gray-800 font-bold"
                            >
                                {{ products.product_name }}
                            </h1>
                        </div>
                        <div class="">
                            <h1
                                class="font-sans text-lg text-gray-800 font-bold"
                            >
                                {{ products.product_brand }}
                            </h1>
                        </div>
                        <div class="">
                            <h1
                                class="font-sans text-md text-gray-800 font-bold"
                            >
                                {{ products.product_model }}
                            </h1>
                        </div>
                        <div class="mt-4">
                            <h1
                                class="font-sans text-md text-gray-800 font-bold"
                            >
                                Units: {{ products.units }}
                            </h1>
                        </div>
                        <div class="mt-4">
                            <h1
                                class="font-sans text-3xl text-indigo-800 font-bold"
                            >
                                ₱ {{ products.price.toLocaleString() }}
                            </h1>
                        </div>
                        <div class="w-full mt-4 text-justify">
                            <h1 class="font-sans text-md text-gray-800">
                                {{ products.description }}
                            </h1>
                        </div>
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
            products: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getProduct();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getProduct() {
            axios
                .get(`/api/products/${this.$route.params.id}`)
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
