<template>
    <div>
        <div class="container">
            <div class="flex justify-center mt-10">
                <div class="bg-white w-2/3 rounded shadow-md">
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
                                <svg
                                    class="fill-current text-xs w-3 h-3 mx-3"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512"
                                >
                                    <path
                                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                    />
                                </svg>
                                <button
                                    class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                                >
                                    {{ product.product_name }}
                                    {{ product.product_model }}
                                    {{ product.product_brand }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex px-3 py-2">
                        <div class="h-72 w-72 overflow-hidden">
                            <img
                                :src="`/images/${product.image}`"
                                alt=""
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div class="flex flex-col ml-4 mt-4">
                            <div class="space-y-4">
                                <div class="flex inline-block">
                                    <p
                                        class="text-gray-800 text-lg font-bold mr-2"
                                    >
                                        Product
                                    </p>
                                    <div class="flex flex-col">
                                        <p class="text-gray-700 text-lg">
                                            {{ product.product_name }}
                                        </p>
                                        <p class="text-gray-500 text-sm">
                                            {{ product.product_model }}
                                        </p>
                                        <p class="text-gray-500 text-sm">
                                            {{ product.product_brand }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <p
                                        class="text-gray-800 text-lg font-bold mr-2"
                                    >
                                        Availalbe Units
                                    </p>
                                    <p class="text-gray-700 text-lg">
                                        {{ product.units }}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <p
                                        class="text-gray-800 text-lg font-bold mr-2"
                                    >
                                        Price
                                    </p>
                                    <p class="text-gray-700 text-lg">
                                        ₱ {{ product.price.toLocaleString() }}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <p
                                        class="text-gray-800 text-lg font-bold mr-2"
                                    >
                                        Description
                                    </p>
                                    <p
                                        class="text-gray-700 text-lg text-justify"
                                    >
                                        {{ product.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-12 p-3">
                        <router-link
                            style="text-decoration:none"
                            :to="{
                                path: '/checkout?pid=' + product.id
                            }"
                            class="bg-yellow-700 px-4 py-2 hover:bg-yellow-800 text-white transition duration-300 rounded"
                            >Proceed to checkout</router-link
                        >
                    </div>
                </div>
            </div>
            <!-- <div class="flex justify-center mt-4">
                <div class="bg-white w-2/5 p-4 shadow-md">
                    <div class="flex justify-between">
                        <div class="w-1/3 mr-4">
                            <img
                                :src="`/images/${product.image}`"
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
            </div> -->
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
