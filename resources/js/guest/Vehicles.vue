<template>
    <div class="">
        <div class="container-fluid px-10">
            <div class="w-full">
                <div class="flex py-4">
                    <div class="w-full flex justify-start">
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
                                class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                to="/cars"
                                >Vehicles</router-link
                            >
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="flex mt-10">
                <div class="flex w-full">
                    <div>
                        <div class="flex w-full">
                            <h1 class="text-3xl text-gray-800 font-bold">
                                Search Vehicles available in Sakura.
                            </h1>
                        </div>
                        <div class="flex w-full mt-2">
                            <p class="text-lg text-gray-600">
                                Let Sakura help you by searching car brand or
                                the body type you’re interested in.
                            </p>
                        </div>
                    </div>
                    <div class="sm:flex w-full lg:flex justify-end">
                        <div class="relative sm:w-full lg:w-1/2">
                            <span
                                class="absolute my-2 left-0 flex items-center pl-2"
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
                                placeholder="Search for brand or model"
                                @keyup="searchVehicle"
                            />
                            <svg
                                v-if="searchLoading"
                                class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                                style="border-right-color: white; border-top-color: white;"
                                viewBox="0 0 24 24"
                            ></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-6 py-6">
                <div class="flex justify-center">
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="w-10 h-10 mx-auto bg-blue-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Search
                        </div>
                        <div
                            class="text-xs text-gray-500 text-center md:text-base mt-2"
                        >
                            Find a car
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-gray-200 py-1 rounded"
                                        style="width: 100%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-blue-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span
                                    class="flex justify-center text-white w-full"
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
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            View
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            View car
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-green-300 py-1 rounded"
                                        style="width: 0%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-blue-600 border-2 border-gray-200 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Select
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Select a variety of vehicles to choose from
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="loadingData" class="flex justify-center py-96">
                <svg
                    v-if="loadingData"
                    class="text-center animate-spin h-24 w-24 rounded-full bg-transparent border-4 border-gray-800 border-opacity-50 mr-3"
                    style="border-right-color: white; border-top-color: white;"
                    viewBox="0 0 24 24"
                ></svg>
            </div>
            <div v-if="vehicles.data.length > 0">
                <div
                    class="sm:flex justify-center lg:flex justify-center px-3 py-8 mt-4"
                >
                    <div
                        class="sm:flex flex-col sm:w-full lg:grid grid-cols-2 gap-10"
                    >
                        <div v-for="vehicle in vehicles.data" :key="vehicle.id">
                            <div
                                class="bg-white shadow-md rounded h-auto w-full"
                            >
                                <div class="flex">
                                    <div class="w-full">
                                        <router-link
                                            :to="{
                                                name: 'get-car',
                                                params: { id: vehicle.id }
                                            }"
                                        >
                                            <div
                                                class="relative overflow-hidden"
                                            >
                                                <div
                                                    class="sm:h-72 lg:h-64 w-full"
                                                >
                                                    <img
                                                        :src="
                                                            `/images/${vehicle.thumbnail}`
                                                        "
                                                        alt=""
                                                        class="h-full w-full"
                                                    />
                                                </div>
                                            </div>
                                        </router-link>
                                    </div>
                                    <div class="w-full py-2">
                                        <div
                                            class="flex items-center justify-start px-3"
                                        >
                                            <img
                                                :src="
                                                    `/images/${vehicle.category.image}`
                                                "
                                                class="h-10 w-10 mr-2"
                                                alt=""
                                            />
                                            <router-link
                                                :to="{
                                                    name: 'get-car',
                                                    params: {
                                                        id: vehicle.id
                                                    }
                                                }"
                                                style="text-decoration:none"
                                                class="text-lg font-bold text-gray-900 hover:text-blue-600 transition duration-300"
                                            >
                                                {{ vehicle.brand_name }}
                                                {{ vehicle.model_type }}
                                            </router-link>
                                        </div>
                                        <div class="flex pl-3">
                                            <label
                                                class="text-md text-gray-500"
                                                >{{ vehicle.engine }}</label
                                            >
                                        </div>
                                        <div class="grid grid-cols-2 pl-3 py-2">
                                            <label class="text-gray-500 text-lg"
                                                >Price</label
                                            >
                                            <label class="font-bold text-lg">
                                                ₱
                                                {{
                                                    vehicle.price.toLocaleString()
                                                }}</label
                                            >
                                        </div>
                                        <div class="grid grid-cols-2 pl-3 pr-1">
                                            <label class="text-gray-500 text-xs"
                                                >Fuel Type</label
                                            >
                                            <label class="font-bold text-xs">
                                                {{ vehicle.fuel_type }}</label
                                            >
                                        </div>
                                        <div class="grid grid-cols-2 pl-3 pr-1">
                                            <label class="text-gray-500 text-xs"
                                                >Transmission</label
                                            >
                                            <label class="font-bold text-xs">
                                                {{
                                                    vehicle.transmission
                                                }}</label
                                            >
                                        </div>
                                        <div class="grid grid-cols-2 pl-3 pr-1">
                                            <label class="text-gray-500 text-xs"
                                                >Color</label
                                            >
                                            <label class="font-bold text-xs">
                                                {{ vehicle.color }}</label
                                            >
                                        </div>
                                        <div class="grid grid-cols-2 pl-3 pr-1">
                                            <label class="text-gray-500 text-xs"
                                                >Drive Type</label
                                            >
                                            <label class="font-bold text-xs">
                                                {{ vehicle.drive_type }}</label
                                            >
                                        </div>
                                        <div class="flex mt-2 px-3">
                                            <p class="text-xs text-gray-400">
                                                Posted:
                                                {{ vehicle.created_at | date }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div v-if="vehicle.status == 'Available'">
                                    <router-link
                                        :to="{
                                            name: 'get-car',
                                            params: { id: vehicle.id }
                                        }"
                                    >
                                        <div class="relative overflow-hidden">
                                            <div class="sm:h-72 lg:h-64 w-full">
                                                <img
                                                    :src="
                                                        `/images/${vehicle.thumbnail}`
                                                    "
                                                    alt=""
                                                    class="h-full w-full"
                                                />
                                            </div>
                                        </div>
                                    </router-link>
                                    <div class="space-y-2 mt-2">
                                        <div
                                            class="flex items-center justify-start px-3"
                                        >
                                            <img
                                                :src="
                                                    `/images/${vehicle.category.image}`
                                                "
                                                class="h-10 w-10 mr-2"
                                                alt=""
                                            />
                                            <router-link
                                                :to="{
                                                    name: 'get-car',
                                                    params: {
                                                        id: vehicle.id
                                                    }
                                                }"
                                                style="text-decoration:none"
                                                class="text-lg font-bold text-gray-900 hover:text-blue-600 transition duration-300"
                                            >
                                                {{ vehicle.brand_name }}
                                                {{ vehicle.model_type }}
                                            </router-link>
                                        </div>
                                        <div class="flex px-3">
                                            <p class="text-lg text-gray-900">
                                                ₱
                                                {{
                                                    vehicle.price.toLocaleString()
                                                }}
                                            </p>
                                        </div>
                                        <div class="flex px-3">
                                            <router-link
                                                :to="{
                                                    name: 'get-car',
                                                    params: {
                                                        id: vehicle.id
                                                    }
                                                }"
                                                style="text-decoration:none"
                                                class="text-xs text-gray-500 hover:text-blue-600 transition duration-300"
                                                >View for more information
                                            </router-link>
                                        </div>
                                        <div class="flex p-3">
                                            <p class="text-xs text-gray-500">
                                                Posted:
                                                {{ vehicle.created_at | date }}
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="flex justify-center">
                    <div
                        v-if="!loadingData"
                        class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                    >
                        No Vehicles Found.
                    </div>
                </div>
            </div>
            <div class="flex mx-10 py-2">
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
import { slider, slideritem } from 'vue-concise-slider';
import moment from 'moment';
import _ from 'lodash';
export default {
    components: {
        slider,
        slideritem
    },
    data() {
        return {
            vehicles: {
                data: []
            },
            options: {
                currentPage: 0,
                tracking: false,
                thresholdDistance: 100,
                thresholdTime: 300,
                infinite: 4,
                slidesToScroll: 4,
                loop: true
            },
            reserved: '/images/Reserved1.png',
            sold: '/images/Sold1.png',
            engine: '/images/Engine.png',
            gas: '/images/Gas.png',
            road: '/images/Road.png',
            loadingData: false,
            search: '',
            searchLoading: false
        };
    },
    mounted() {
        this.getVehicle();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getVehicle() {
            this.loadingData = true;

            // setTimeout(() => {
            //     this.loadingData = false;
            axios
                .get('/api/vehicle/available')
                .then(response => {
                    this.vehicles = response.data.vehicles;
                    console.log(response.data.vehicles);
                })
                .finally(() => {
                    this.loadingData = false;
                });
            // }, 2000);
        },
        searchVehicle: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get('/api/vehicle/available?search=' + this.search)
                .then(response => {
                    this.vehicles = response.data.vehicles;
                    console.log(response.data.vehicles);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 1000),
        getResults(page = 1) {
            axios.get('/api/vehicle/available?page=' + page).then(response => {
                this.vehicles = response.data.vehicles;
            });
        }
    }
};
</script>

<style></style>
