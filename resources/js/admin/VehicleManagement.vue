<template>
    <div>
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
                    <router-link to="/vehicles">Vehicle Management</router-link>
                </li>
            </ol>
        </nav>
        <div class="flex flex-wrap items-center justify-center">
            <div class="bg-white p-10 rounded-2xl shadow-lg w-full mb-10">
                <div
                    class="font-sans text-2xl font-bold mb-2 text-gray-700 font-semibold"
                >
                    Vehicle Management
                </div>
                <p class="font-sans text-xs text-gray-700 mb-10">
                    Vehicle's are all displayed below.
                </p>

                <div class="flex justify-between">
                    <router-link
                        style="text-decoration:none"
                        to="/vehicles/create"
                        class="bg-indigo-900 hover:bg-indigo-600 p-2 rounded-lg text-gray-50 font-semibold hover:text-gray-50 transition duration-300"
                    >
                        <i class="fas fa-car mr-2"></i> Create new vehicle
                    </router-link>
                    <input
                        @keyup="searchVehicle"
                        class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                        type="text"
                        v-model="search"
                        placeholder="Search..."
                    />
                </div>
                <div v-if="vehicles && vehicles.data.length > 0">
                    <div class="grid grid-cols-3 p-8 gap-8">
                        <div v-for="vehicle in vehicles.data" :key="vehicle.id">
                            <div
                                class="bg-white rounded-2xl shadow-2xl transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    :src="vehicle.image"
                                    alt="Image"
                                    class="rounded-t-xl lg:h-56 md:h-48 w-full object-cover shadow-sm"
                                />
                                <div class="p-4">
                                    <div
                                        class="font-sans text-xl font-bold mb-2 text-gray-700"
                                    >
                                        {{ vehicle.year_model }}
                                        {{ vehicle.brand_name }}
                                        {{ vehicle.model_type }}
                                    </div>
                                    <p class="font-sans">
                                        {{ vehicle.engine }}
                                    </p>
                                    <p
                                        class="font-sans font-bold text-xl text-gray-700 mt-2"
                                    >
                                        ₱ {{ vehicle.price.toLocaleString() }}
                                    </p>
                                </div>
                                <div class="flex justify-end p-3">
                                    <router-link
                                        :to="{
                                            name: '/',
                                            params: { id: vehicle.id }
                                        }"
                                        class="relative rounded-full hover:bg-indigo-700 hover:text-white shadow-lg h-12 w-12 p-2"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class=""
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                            />
                                        </svg>
                                    </router-link>
                                    <button
                                        @click="deleteVehicle(vehicle.id)"
                                        class="rounded-full hover:bg-indigo-700 hover:text-white shadow-lg h-12 w-12 p-2"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class=""
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
                                <div class="flex justify-between">
                                    <div
                                        class="border-t-2 border-gray-300 border-opacity-75 p-2 w-1/3 text-center hover:bg-indigo-600 rounded-l-lg hover:text-white"
                                    >
                                        <i class="fas fa-road"></i>
                                        <br />
                                        <p class="font-sans font-semibold">
                                            {{
                                                vehicle.mileage.toLocaleString()
                                            }}
                                        </p>
                                    </div>
                                    <div
                                        class="border-t-2 border-l-2 border-gray-300 border-opacity-75 p-2 w-1/3 text-center hover:bg-indigo-600 rounded hover:text-white"
                                    >
                                        <i class="fas fa-gas-pump"></i> <br />
                                        <p class="font-sans font-semibold">
                                            {{ vehicle.fuel_type }}
                                        </p>
                                    </div>
                                    <div
                                        class="border-t-2 border-l-2 border-gray-300 border-opacity-75 p-2 w-1/3 text-center hover:bg-indigo-600 rounded-r-lg hover:text-white"
                                    >
                                        <i class="fas fa-cog"></i> <br />
                                        <p class="font-sans font-semibold">
                                            {{ vehicle.transmission }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                    >
                        No Vehicles Found.
                    </div>
                </div>
                <pagination
                    class="center"
                    :data="vehicles"
                    @pagination-change-page="getResults"
                ></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            vehicles: {},
            search: ''
        };
    },
    beforeMount() {
        this.getVehicles();
        this.getUser();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        getVehicles() {
            axios
                .get('api/vehicle')
                .then(response => {
                    this.vehicles = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchVehicle() {
            axios.get('/api/vehicle?search=' + this.search).then(response => {
                this.vehicles = response.data;
                console.log(response.data);
            });
        },
        getResults(page = 1) {
            axios.get('/api/vehicle?page=' + page).then(response => {
                this.vehicles = response.data;
            });
        },
        deleteVehicle(id) {
            axios.delete(`api/vehicle/${id}`).then(response => {
                this.getVehicles();
            });
        }
    }
};
</script>

<style></style>
