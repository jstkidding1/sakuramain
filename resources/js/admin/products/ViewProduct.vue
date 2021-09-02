<template>
    <div class="container">
        <div class="flex justify-center mt-10">
            <div class="bg-white px-10 pb-10 rounded shadow-md w-2/5 h-full">
                <div class="flex py-3 mb-10">
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
                                to="/admin/dashboard"
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
                                to="/product"
                                >Product Management</router-link
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
                                    name: 'view-product',
                                    params: { id: product.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                aria-current="page"
                                >View product</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <div class="relative overflow-hidden">
                        <div class="h-72 w-full">
                            <img
                                :src="product.image"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
                <div class="divide-y divide-gray-200">
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Product Name
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.product_name }}
                        </div>
                    </div>
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Product Brand
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.product_brand }}
                        </div>
                    </div>
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Product Model
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.product_model }}
                        </div>
                    </div>
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Units
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.units }}
                        </div>
                    </div>
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Price
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.price.toLocaleString() }}
                        </div>
                    </div>
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Status
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.status }}
                        </div>
                    </div>
                    <div class="flex justify-start py-4 space-x-10">
                        <div class="w-full font-bold text-gray-700 text-md">
                            Description
                        </div>
                        <div class="w-full text-gray-700 text-md">
                            {{ product.description }}
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
            product: []
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
