<template>
    <div class="flex flex-col h-screen">
        <div class="container">
            <div class="w-full">
                <div class="flex py-4">
                    <div class="w-full flex justify-between">
                        <div class="flex items-center">
                            <router-link
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
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
                                class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                                to="/vehicles"
                                >Vehicle List</router-link
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
                                class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                to="/vehicle/category/list"
                                >Categories</router-link
                            >
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="flex justify-between py-4">
                <router-link
                    style="text-decoration:none"
                    to="/vehicle/category/create"
                    class="flex items-center bg-green-500 hover:bg-green-600 p-2 rounded-lg text-gray-50 hover:text-white transition duration-300"
                    v-tooltip="'Create new category'"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 font-bold"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                    </svg>
                </router-link>
                <div class="relative w-2/6 flex justify-end">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </span>
                    <input
                        class="w-full bg-white focus:bg-white border-2 border-gray-400 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        v-model.trim="search"
                        placeholder="Search..."
                        @keyup="searchCategory"
                    />
                    <svg
                        v-if="searchLoading"
                        class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                        style="border-right-color: white; border-top-color: white;"
                        viewBox="0 0 24 24"
                    ></svg>
                </div>
            </div>
            <div class="flex my-4">
                <h1 class="text-lg text-gray-700 font-bold">Category List</h1>
            </div>
            <div v-if="categories && categories.data.length > 0">
                <div class="grid grid-cols-4 gap-4 mt-10">
                    <div
                        v-for="(category, index) in categories.data"
                        :key="index"
                    >
                        <div class="bg-white rounded-md shadow-md">
                            <!-- <div class="h-52 w-52 overflow-hidden"> -->
                            <div class="flex justify-center">
                                <img
                                    :src="
                                        `/storage/images/${category.image}`
                                            ? `/storage/images/${category.image}`
                                            : null
                                    "
                                    class="h-52 w-52"
                                    alt=""
                                />
                            </div>
                            <!-- </div> -->
                            <div class="flex justify-center">
                                <h1
                                    class="text-lg text-gray-700 font-bold px-3 py-2"
                                >
                                    {{ category.name }}
                                </h1>
                            </div>
                            <div class="flex justify-end px-3 py-2">
                                <router-link
                                    :to="{
                                        name: 'category-show',
                                        params: { id: category.id }
                                    }"
                                    class="w-4 mr-4 transform hover:text-blue-600 hover:scale-110 transition duration-300"
                                    v-tooltip="'View Category'"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />
                                    </svg>
                                </router-link>
                                <router-link
                                    :to="{
                                        name: 'category-edit',
                                        params: { id: category.id }
                                    }"
                                    class="w-4 mr-4 transform hover:text-blue-600 hover:scale-110 transition duration-300"
                                    v-tooltip="'Edit Category'"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                        />
                                    </svg>
                                </router-link>
                                <button
                                    @click="archiveCategory(category.id)"
                                    class="w-4 mr-4 transform hover:text-blue-600 hover:scale-110 transition duration-300"
                                    v-tooltip="'Delete Category'"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="flex justify-center">
                    <h1 class="text-gray-800 font-bold text-2xl py-52">
                        No Categories Found
                    </h1>
                </div>
            </div>
            <pagination
                class="mt-4 center"
                :data="categories"
                @pagination-change-page="getResults"
            ></pagination>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
export default {
    data() {
        return {
            search: '',
            searchLoading: false,
            categories: {
                data: []
            }
        };
    },
    beforeMount() {
        this.getCategories();
        this.getUser();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getCategories() {
            axios
                .get('/api/category')
                .then(response => {
                    this.categories = response.data.category;
                    console.log(response.data.category);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchCategory: _.debounce(function() {
            this.searchLoading = !false;

            axios
                .get('/api/category?search=' + this.search)
                .then(response => {
                    this.categories = response.data.category;
                    console.log(response.data.category);
                })
                .then(() => {
                    this.searchLoading = !true;
                });
        }, 2000),
        getResults(page = 1) {
            axios.get('/api/category?page=' + page).then(response => {
                this.categories = response.data.category;
                console.log(response.data.category);
            });
        },
        archiveCategory(id) {
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
                    axios
                        .patch(`/api/category/${id}/archive`)
                        .then(response => {
                            this.getCategories();
                        });
                    this.$swal(
                        'Deleted!',
                        'Category has been deleted.',
                        'success'
                    );
                }
            });
        },
        deleteCategory(id) {
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
                    axios.delete(`/api/category/${id}`).then(response => {
                        this.getCategories();
                    });
                    this.$swal(
                        'Deleted!',
                        'Category has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
