<template>
    <div class="">
        <div class="container">
            <div class="flex flex-wrap items-center justify-center mt-10 mb-96">
                <div class="bg-white px-10 pb-10 rounded shadow-md w-full">
                    <div class="flex py-3">
                        <div class="w-full flex justify-between">
                            <div class="flex inline-block">
                                <router-link
                                    to="/manager/dashboard"
                                    style="text-decoration:none;"
                                    class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                                >
                                    Return to Previous Page
                                </router-link>
                            </div>
                            <div class="flex items-center">
                                <router-link
                                    style="text-decoration:none"
                                    class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                    to="/manager/dashboard"
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
                                    class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                    to="/manager/services"
                                    >Service Management</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 font-semibold"
                    >
                        Service Management
                    </div>
                    <div class="pt-16">
                        <div class="flex justify-between">
                            <router-link
                                style="text-decoration:none;"
                                to="/manager/create/service"
                                class="flex items-center bg-green-500 hover:bg-green-600 p-2 rounded-lg text-gray-50 hover:text-white transition duration-300"
                                v-tooltip="'Create new service'"
                                ><svg
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
                                    @keyup="searchService"
                                />
                                <svg
                                    v-if="searchLoading"
                                    class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                            </div>
                        </div>

                        <table class="w-full mt-4 table-hover">
                            <thead class="bg-white">
                                <tr
                                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                                >
                                    <!-- <th class="px-4 py-3">#</th> -->
                                    <th class="px-4 py-3">Service</th>
                                    <th class="px-4 py-3">Image</th>
                                    <th class="px-4 py-3">Updated at</th>
                                    <!-- <th class="px-4 py-3">Description</th> -->
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="services && services.data.length > 0"
                                class="bg-white"
                            >
                                <tr
                                    v-for="(service, index) in services.data"
                                    :key="index"
                                    class="text-gray-700"
                                >
                                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ service.service_name }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        <div class="flex justify-center">
                                            <img
                                                :src="
                                                    `/images/${service.image}`
                                                "
                                                alt=""
                                                class="h-12 w-12 object-cover rounded-full"
                                            />
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ service.updated_at | date }}
                                    </td>
                                    <td
                                        v-if="service.status == 'Available'"
                                        class="px-4 py-3 text-xs border"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                        >
                                            Available
                                        </span>
                                    </td>
                                    <td
                                        v-if="
                                            service.status == 'Out of Service'
                                        "
                                        class="px-4 py-3 text-xs border"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                                        >
                                            Out of Service
                                        </span>
                                    </td>
                                    <td class="text-center px-2 py-3 border">
                                        <div
                                            class="flex items-center justify-center"
                                        >
                                            <router-link
                                                :to="{
                                                    name:
                                                        'manager-view-service',
                                                    params: { id: service.id }
                                                }"
                                                class="w-4 mr-4 transform hover:text-blue-600 hover:scale-110 transition duration-300"
                                                v-tooltip="'View Service'"
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
                                                    name:
                                                        'manager-edit-service',
                                                    params: { id: service.id }
                                                }"
                                                class="w-4 mr-4 transform hover:text-blue-600 hover:scale-110 transition duration-300"
                                                v-tooltip="'Edit Service'"
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
                                                @click="
                                                    deleteService(service.id)
                                                "
                                                class="w-4 mr-4 transform hover:text-blue-600 hover:scale-110 transition duration-300"
                                                v-tooltip="'Delete Service'"
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
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else class="bg-white">
                                <tr>
                                    <td
                                        colspan="5"
                                        align="center"
                                        class="text-gray-800 font-bold text-2xl py-52"
                                    >
                                        No Services Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination
                            class="mt-4 center"
                            :data="services"
                            @pagination-change-page="getResults"
                        ></pagination>
                    </div>
                </div>
                <div class="mt-20">
                    <div class="flex justify-center mx-4 my-2">
                        <div class="flex space-x-4">
                            <div
                                class="bg-red-900 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    A
                                </div>
                            </div>
                            <div
                                class="bg-red-800 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Quick
                                </div>
                            </div>
                            <div
                                class="bg-red-700 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Brown
                                </div>
                            </div>
                            <div
                                class="bg-red-600 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Fox
                                </div>
                            </div>
                            <div
                                class="bg-red-500 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Jump
                                </div>
                            </div>
                            <div
                                class="bg-red-400 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Over
                                </div>
                            </div>
                            <div
                                class="bg-red-300 rounded-sm shadow-sm text-white font-semibold"
                            >
                                <div class="px-3 py-2">
                                    The
                                </div>
                            </div>
                            <div
                                class="bg-red-200 rounded-sm shadow-sm text-gray-500 font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Lazy
                                </div>
                            </div>
                            <div
                                class="bg-red-100 rounded-sm shadow-sm text-gray-500 font-semibold"
                            >
                                <div class="px-3 py-2">
                                    Dog
                                </div>
                            </div>
                        </div>
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
            user: null,
            services: {
                data: []
            },
            errors: [],
            search: '',
            searchLoading: false
        };
    },
    beforeMount() {
        this.getUser();
        this.getServices();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getServices() {
            axios
                .get('/api/services/')
                .then(response => {
                    this.services = response.data.services;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchService: _.debounce(function() {
            this.searchLoading = !false;

            axios
                .get('/api/services?search=' + this.search)
                .then(response => {
                    this.services = response.data.services;
                    console.log(response.data.services);
                })
                .then(() => {
                    this.searchLoading = !true;
                });
        }, 1000),
        getResults(page = 1) {
            axios.get('/api/services?page=' + page).then(response => {
                this.services = response.data.services;
                console.log(response.data.services);
            });
        },
        deleteService(id) {
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
                    axios.delete(`/api/services/${id}`).then(response => {
                        this.getServices();
                    });
                    this.$swal(
                        'Deleted!',
                        'Service has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
