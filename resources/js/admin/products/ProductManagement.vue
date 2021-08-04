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
                    </li>
                </ol>
            </nav>
            <div class="flex flex-wrap items-center justify-center">
                <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
                    <div
                        class="font-sans text-2xl font-bold mb-6 text-gray-800 font-semibold"
                    >
                        Product Management
                    </div>
                    <div class="pt-16">
                        <div class="flex justify-between">
                            <router-link
                                style="text-decoration:none;"
                                to="/product/create"
                                class="bg-indigo-600 hover:bg-indigo-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-white transition duration-300"
                                >Add new product</router-link
                            >
                            <input
                                @keyup="searchProduct"
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="search"
                                placeholder="Search..."
                            />
                        </div>

                        <table class="table table-bordered table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product name</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Units</th>
                                    <th style="width:300px;">Action</th>
                                </tr>
                            </thead>

                            <tbody v-if="products && products.data.length > 0">
                                <tr
                                    v-for="(product, index) in products.data"
                                    :key="index"
                                >
                                    <td style="width:50px;">{{ index + 1 }}</td>
                                    <td style="width:250px;">
                                        {{ product.product_name }}
                                    </td>
                                    <td>{{ product.product_brand }}</td>
                                    <td>{{ product.product_model }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.units }}</td>
                                    <td class="flex justify-center">
                                        <router-link
                                            :to="{
                                                name: 'view-product',
                                                params: { id: product.id }
                                            }"
                                            style="text-decoration:none;"
                                            class="font-semibold bg-green-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                            ><i class="fas fa-eye mr-2"></i
                                            >View</router-link
                                        >
                                        <router-link
                                            :to="{
                                                name: 'edit-product',
                                                params: { id: product.id }
                                            }"
                                            style="text-decoration:none;"
                                            class="font-semibold bg-blue-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                            ><i class="far fa-edit mr-2"></i
                                            >Edit</router-link
                                        >
                                        <button
                                            @click="deleteProduct(product.id)"
                                            class="font-semibold bg-red-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out"
                                        >
                                            <i class="far fa-trash-alt mr-2"></i
                                            >Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td
                                        colspan="7"
                                        align="center"
                                        class="font-sans text-2xl font-bold text-gray-800 text-center"
                                    >
                                        No Products Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination
                            class="mt-4 center"
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
export default {
    data() {
        return {
            user: null,
            products: {},
            search: ''
        };
    },
    beforeMount() {
        this.getAdmin();
        this.getProducts();
    },
    methods: {
        getAdmin() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getProducts() {
            axios
                .get('/api/products/')
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
        },
        deleteProduct(id) {
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/products/${id}`).then(response => {
                        this.getProducts();
                    });
                    this.$swal(
                        'Deleted!',
                        'Product has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
