<template>
    <div class="container mb-10">
        <div class="flex justify-center">
            <div
                class="bg-white px-10 pb-10 rounded shadow-md w-2/3 mt-10 h-full"
            >
                <div class="flex py-3 mb-10">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/manager/productList"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/manager/productList"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Product List
                            </router-link>
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
                                    name: 'manager-edit-product',
                                    params: { id: product.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                aria-current="page"
                                >{{ product.product_name }}
                                {{ product.product_brand }}
                                {{ product.product_model }}</router-link
                            >
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="text-xl text-gray-700">Edit product</h1>
                    <p class="text-gray-600">
                        Form will be save once you submit
                    </p>
                </div>
                <div class="flex justify-center mt-4">
                    <div v-if="preview" class="relative overflow-hidden">
                        <div class="h-96 w-full">
                            <img
                                :src="preview"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                    <div v-else class="relative overflow-hidden">
                        <div class="h-96 w-full">
                            <img
                                :src="`/images/${product.image}`"
                                v-show="`/images/${product.image}` != null"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center my-4">
                    <input type="file" @change="onChange" />
                    <span
                        class="text-red-500 text-xs mt-14"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div>
                <div class="flex">
                    <div class="grid grid-cols-3 gap-2 ml-4 mt-4">
                        <div class="w-full">
                            <label>Product Name</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.product_name"
                                >{{ errors.product_name[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                v-model="product.product_name"
                            />
                        </div>
                        <div class="w-full">
                            <label>Product Brand</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.product_brand"
                                >{{ errors.product_brand[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                v-model="product.product_brand"
                            />
                        </div>
                        <div class="w-full">
                            <label>Product Model</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.product_model"
                                >{{ errors.product_model[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                v-model="product.product_model"
                            />
                        </div>
                        <div class="w-full">
                            <label>Units</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.units"
                                >{{ errors.units[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="number"
                                v-model="product.units"
                            />
                        </div>
                        <div class="w-full">
                            <label>Price</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.price"
                                >{{ errors.price[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="number"
                                v-model="product.price"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex px-4 mt-2">
                    <div class="w-full">
                        <label>Description</label>
                        <span
                            class="w-full ml-2 text-red-500 text-xs"
                            v-if="errors.description"
                            >{{ errors.description[0] }}</span
                        >
                        <vue-editor v-model="product.description"></vue-editor>
                    </div>
                </div>
                <div class="flex space-x-4 justify-end mt-2">
                    <button
                        @click="updateProduct"
                        :disabled="loading"
                        class="flex items-center bg-gray-900 px-3 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Please wait..</span>
                        <span v-else>Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueEditor } from 'vue2-editor';
export default {
    components: {
        VueEditor
    },
    data() {
        return {
            image: '',
            user: null,
            preview: false,
            loading: false,
            loadingUpload: false,
            product: {},
            errors: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getProduct();
    },
    methods: {
        getProduct() {
            axios
                .get(`/api/products/${this.$route.params.id}`)
                .then(response => {
                    this.product = response.data;
                });
        },
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        updateProduct() {
            this.loading = true;

            // setTimeout(() => {
            //     this.loading = !true;
            axios
                .put(`/api/products/${this.$route.params.id}`, this.product)
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Product has successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'manager-product-list' });
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };

            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            var formData = new FormData();
            formData.append('image', this.image);
            axios
                .post('/api/products/upload/image', formData, config)
                .then(response => {
                    this.product.image = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        }
    }
};
</script>

<style></style>
