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
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                to="/cars"
                                >Vehicles</router-link
                            >
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="flex w-full mt-10">
                <h1 class="text-3xl text-gray-800 font-bold">
                    SUVs, Pick-up Trucks, Vans, etc.
                </h1>
            </div>
            <div class="flex w-full mt-2">
                <p class="text-lg text-gray-600">
                    Not too sure what car to buy? Let Sakura help you by
                    searching car brand or the body type you’re interested in.
                </p>
            </div>
            <div class="flex justify-between">
                <div>
                    <div class="flex justify-start pt-2 mt-10">
                        <h1 class="text-lg text-gray-700 font-bold">
                            Car Models
                        </h1>
                    </div>
                    <div class="flex justify-start py-2">
                        <p class="text-xs text-gray-500">
                            Find all car models available in Sakura and view
                            detailed specifications, prices, images, reviews and
                            much more. Connect with our staff and request a
                            quote.
                        </p>
                    </div>
                </div>
            </div>
            <div class="sm:flex w-full lg:flex justify-end">
                <div class="relative sm:w-full lg:w-1/5">
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
                        class="sm:flex flex-col sm:w-full lg:grid grid-cols-6 gap-10"
                    >
                        <div v-for="vehicle in vehicles.data" :key="vehicle.id">
                            <div class="rounded h-auto w-full">
                                <div v-if="vehicle.status == 'Available'">
                                    <router-link
                                        :to="{
                                            name: 'get-car',
                                            params: { id: vehicle.id }
                                        }"
                                    >
                                        <div class="relative overflow-hidden">
                                            <div class="sm:h-72 lg:h-52 w-full">
                                                <!-- <div
                                                v-if="vehicle.status == 'Sold'"
                                                class="mb-12 absolute w-full py-2.5 bottom-0 inset-x-0 flex justify-end leading-4 px-4"
                                            >
                                                <img
                                                    :src="sold"
                                                    alt=""
                                                    class="object-cover h-32 w-32"
                                                />
                                            </div>
                                            <div
                                                v-if="
                                                    vehicle.status == 'Reserved'
                                                "
                                                class="absolute w-full py-2.5 bottom-0 inset-x-0 flex justify-center leading-4 px-4"
                                            >
                                                <img
                                                    :src="reserved"
                                                    alt=""
                                                    class="object-cover h-52 w-52"
                                                />
                                            </div> -->
                                                <img
                                                    :src="
                                                        `/images/${vehicle.thumbnail}`
                                                    "
                                                    alt=""
                                                    class="h-full w-full object-cover"
                                                />
                                            </div>
                                        </div>
                                    </router-link>
                                    <div class="space-y-2 mt-2">
                                        <div
                                            class="flex items-center justify-start"
                                        >
                                            <router-link
                                                :to="{
                                                    name: 'get-car',
                                                    params: {
                                                        id: vehicle.id
                                                    }
                                                }"
                                                style="text-decoration:none"
                                                class="text-lg font-bold text-gray-900 hover:text-yellow-600 transition duration-300"
                                            >
                                                {{ vehicle.brand_name }}
                                                {{ vehicle.model_type }}
                                            </router-link>
                                            <!-- <p
                                                v-if="
                                                    vehicle.status ==
                                                        'Available'
                                                "
                                            >
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                                >
                                                    Available
                                                </span>
                                            </p>
                                            <p
                                                v-if="
                                                    vehicle.status == 'Reserved'
                                                "
                                            >
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                                                >
                                                    Reserved
                                                </span>
                                            </p>
                                            <p v-if="vehicle.status == 'Sold'">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                                                >
                                                    Sold
                                                </span>
                                            </p> -->
                                        </div>
                                        <!-- <div class="flex">
                                            <router-link
                                                :to="{
                                                    name: 'get-car',
                                                    params: { id: vehicle.id }
                                                }"
                                                style="text-decoration:none"
                                                class="text-lg font-bold text-gray-900 hover:text-yellow-600 transition duration-300"
                                            >
                                                {{ vehicle.brand_name }}
                                                {{ vehicle.model_type }}
                                            </router-link>
                                        </div> -->
                                        <div
                                            class="flex items-center justify-between"
                                        >
                                            <p class="text-lg text-gray-900">
                                                ₱
                                                {{
                                                    vehicle.price.toLocaleString()
                                                }}
                                            </p>
                                            <img
                                                :src="
                                                    `/images/${vehicle.category.image}`
                                                "
                                                class="h-6 w-6"
                                                alt=""
                                            />
                                        </div>
                                        <div class="flex">
                                            <router-link
                                                :to="{
                                                    name: 'get-car',
                                                    params: {
                                                        id: vehicle.id
                                                    }
                                                }"
                                                style="text-decoration:none"
                                                class="text-xs text-gray-500 hover:text-yellow-600 transition duration-300"
                                                >View for more information
                                            </router-link>
                                        </div>
                                        <div class="flex">
                                            <p class="text-xs text-gray-500">
                                                Posted:
                                                {{ vehicle.created_at | date }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
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

            setTimeout(() => {
                this.loadingData = false;
                axios.get('/api/vehicle/available').then(response => {
                    this.vehicles = response.data.vehicles;
                    console.log(response.data.vehicles);
                });
            }, 2000);
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
        }, 2000),
        getResults(page = 1) {
            axios.get('/api/vehicle/available?page=' + page).then(response => {
                this.vehicles = response.data.vehicles;
            });
        }
    }
};
</script>

<style></style>
