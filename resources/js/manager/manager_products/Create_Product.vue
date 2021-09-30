<template>
    <div class="container">
        <div class="flex justify-center mt-10">
            <div class="bg-white rounded w-1/2 shadow-md px-5">
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
                                to="/manager/createProduct"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                aria-current="page"
                                >Create Product</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <p class="text-md text-gray-600 mb-4">
                            Form will be save once you submitted.
                        </p>
                    </div>
                </div>
                <div
                    v-if="preview == false"
                    class="flex items-center justify-center w-full"
                >
                    <label
                        class="flex flex-col rounded-lg border-4 border-dashed w-1/2 h-72 p-10 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center flex-auto max-h-72 w-2/5 mx-auto -mt-10"
                            >
                                <img
                                    class="has-mask h-36 object-center"
                                    src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                    alt="freepik image"
                                />
                            </div>
                            <p class="pointer-none text-gray-500 ">
                                <span class="text-sm">Drag and drop</span>
                                files here <br />
                                or
                                <a id="" class="text-blue-600 hover:underline"
                                    >select a file</a
                                >
                                from your computer
                            </p>
                        </div>
                        <input @change="onChange" type="file" class="hidden" />
                    </label>
                </div>
                <div v-else class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col rounded-lg border-4 w-1/2 h-72 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center flex-auto h-72 w-full mx-auto overflow-hidden border-2"
                            >
                                <img
                                    class="h-full w-full object-center"
                                    :src="preview"
                                />
                            </div>
                        </div>
                        <input @change="onChange" type="file" class="hidden" />
                    </label>
                </div>
                <div class="flex">
                    <span
                        class="ml-2 text-red-500 text-xs"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div>
                <hr class="my-4" />
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Product Name
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.product_name"
                            >{{ errors.product_name[0] }}</span
                        >
                    </div>

                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Product Brand
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.product_brand"
                            >{{ errors.product_brand[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Product Name"
                            v-model="form.product_name"
                        />
                    </div>

                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Product Brand"
                            v-model="form.product_brand"
                        />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mt-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Product Model
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.product_model"
                            >{{ errors.product_model[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Product Model"
                            v-model="form.product_model"
                        />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Units <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.units"
                            >{{ errors.units[0] }}</span
                        >
                    </div>

                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Price <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.price"
                            >{{ errors.price[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="number"
                            v-model="form.units"
                        />
                    </div>

                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="number"
                            v-model="form.price"
                        />
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="w-full">
                        <label>Description</label>
                        <span
                            class="w-full ml-2 text-red-500 text-xs"
                            v-if="errors.description"
                            >{{ errors.description[0] }}</span
                        >
                        <textarea
                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            placeholder="Type a description here"
                            cols="30"
                            rows="10"
                            v-model="form.description"
                        >
                        </textarea>
                    </div>
                </div>

                <div class="flex space-x-4 justify-end mb-10">
                    <button
                        @click.prevent="createProduct"
                        :disabled="loading"
                        class="flex items-center bg-gray-900 px-3 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300 mt-2"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Please wait..</span>
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

            var formData = new FormData();
            formData.append('product_name', this.form.product_name);
            formData.append('product_brand', this.form.product_brand);
            formData.append('product_model', this.form.product_model);
            formData.append('description', this.form.description);
            formData.append('units', this.form.units);
            formData.append('price', this.form.price);
            formData.append('image', this.form.image);
            setTimeout(() => {
                this.loading = !true;
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
                            this.$router.push({ name: 'manager-product-list' });
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
