<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <router-link class="ml-2" to="/auto-parts"
                            >All Products</router-link
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
                                name: 'single-product',
                                params: { id: product.id }
                            }"
                            aria-current="page"
                            >View Product</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="flex justify-center mt-4">
                <div class="bg-white w-2/3 p-4 shadow-md">
                    <div class="flex justify-between">
                        <div class="w-1/3 mr-4">
                            <img
                                :src="product.image"
                                :alt="product.product_name"
                                class="h-72 w-72 object-cover mr-2"
                            />
                        </div>
                        <div class="w-2/3">
                            <div class="space-y-2">
                                <div>
                                    <h1
                                        class="font-sans text-lg text-gray-800 font-bold"
                                    >
                                        {{ product.product_name }}
                                    </h1>
                                </div>
                                <div>
                                    <h1
                                        class="font-sans text-lg text-indigo-600 font-bold"
                                    >
                                        ₱ {{ product.price.toLocaleString() }}
                                    </h1>
                                </div>
                                <div>
                                    <h1 class="font-sans text-md text-gray-800">
                                        {{ product.product_name }}
                                    </h1>
                                </div>
                                <div>
                                    <h1 class="font-sans text-md text-gray-800">
                                        {{ product.product_model }}
                                    </h1>
                                </div>
                                <div>
                                    <h1
                                        class="hover:cursor-pointer py-3 text-gray-600 leading-6 mt-4"
                                    >
                                        {{ product.description }}
                                    </h1>
                                </div>
                                <div>
                                    <h1
                                        class="hover:cursor-pointer py-3 text-gray-600 leading-6 mt-4"
                                    >
                                        Quantity: {{ product.units }}
                                    </h1>
                                </div>
                            </div>
                            <div class="flex justify-end mt-12">
                                <router-link
                                    style="text-decoration:none"
                                    :to="{
                                        path: '/checkout?pid=' + product.id
                                    }"
                                    class="bg-indigo-600 px-4 py-2 hover:bg-indigo-800 text-white"
                                    >Proceed to checkout</router-link
                                >
                            </div>
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
            product: []
        };
    },
    beforeMount() {
        this.getProduct();
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
