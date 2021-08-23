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
                        <router-link to="/create/product" aria-current="page"
                            >Create Product</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-10 rounded shadow-lg w-full">
                <div>
                    <h1 class="text-4xl font-bold">Create product</h1>
                    <p class="text-gray-600">
                        Form will be save once you submit
                    </p>
                </div>
                <div class="flex">
                    <div class="flex-initial w-2/5">
                        <div v-if="preview === false">
                            <div
                                class="border-dashed border-4 border-indigo-400 w-full h-64 text-center p-20 shadow-lg mt-4"
                            >
                                <i class="far fa-image"></i>
                                <p
                                    class="font-sans font-semibold text-xl text-gray-700"
                                >
                                    Image not found
                                </p>
                                <br />
                                <p class="font-sans text-gray-700 text-xs">
                                    PNG, JPG, JPEG up to 20mb
                                </p>
                            </div>
                        </div>
                        <div v-else>
                            <img
                                :src="preview"
                                class="border-solid border-4 border-gray-400 w-full h-64 object-cover shadow-lg mt-4"
                            />
                        </div>
                        <div class="flex">
                            <input
                                type="file"
                                @change="onChange"
                                class="w-full mt-4"
                            />
                            <span
                                class="fixed w-full text-red-500 text-xs mt-14"
                                v-if="errors.image"
                                >{{ errors.image[0] }}</span
                            >
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 ml-4 mt-4">
                        <div class="w-full">
                            <label>Product name</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.product_name"
                                >{{ errors.product_name[0] }}</span
                            >
                            <input
                                type="text"
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="form.product_name"
                            />
                        </div>
                        <div class="w-full">
                            <label>Product brand</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.product_brand"
                                >{{ errors.product_brand[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="form.product_brand"
                            />
                        </div>
                        <div class="w-full">
                            <label>Product model</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.product_model"
                                >{{ errors.product_model[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="form.product_model"
                            />
                        </div>
                        <div class="w-full">
                            <label>Units</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.units"
                                >{{ errors.units[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="number"
                                v-model="form.units"
                            />
                        </div>
                        <div class="w-full">
                            <label>Price</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.price"
                                >{{ errors.price[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="number"
                                v-model="form.price"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="w-full">
                        <label>Description</label>
                        <span
                            class="fixed w-full ml-2 text-red-500 text-xs"
                            v-if="errors.description"
                            >{{ errors.description[0] }}</span
                        >
                        <textarea
                            class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            cols="30"
                            rows="10"
                            v-model="form.description"
                        >
                        </textarea>
                    </div>
                </div>

                <div class="flex space-x-4 justify-end">
                    <button
                        @click.prevent="createProduct"
                        class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600 mt-2"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Create</span>
                        <span v-else>Create</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
export default {
    data() {
        return {
            user: null,
            form: {
                product_name: '',
                product_brand: '',
                product_model: '',
                description: '',
                units: 1,
                price: 1,
                image: ''
            },
            errors: [],
            preview: false,
            loading: false
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    methods: {
        onChange(e) {
            this.form.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.form.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        createProduct() {
            this.loading = !false;
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('product_name', this.form.product_name);
            formData.append('product_brand', this.form.product_brand);
            formData.append('product_model', this.form.product_model);
            formData.append('description', this.form.description);
            formData.append('units', this.form.units);
            formData.append('price', this.form.price);
            formData.append('image', this.form.image);
            setTimeout(() => {
                axios
                    .post('/api/products', formData, config)
                    .then(response => {
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Product has successfully created.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'product-management' });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        }
    }
};
</script>

<style></style>
