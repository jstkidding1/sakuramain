<template>
    <div class="container">
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
                            >All Cars</router-link
                        >
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="flex w-full mt-10">
            <h1 class="text-3xl text-gray-800 font-bold">
                Search New Cars available in Sakura
            </h1>
        </div>
        <div class="flex w-full mt-2">
            <p class="text-lg text-gray-600">
                Not too sure what car to buy? Let Sakura help you by searching
                car brand or the body type you’re interested in.
            </p>
        </div>
        <div class="bg-white rounded shadow-md mt-4">
            <div class="flex justify-end px-4 py-3">
                <input
                    @keyup="searchVehicle"
                    class="w-2/6 focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                    type="text"
                    v-model="search"
                    placeholder="Search..."
                />
            </div>
            <div class="flex justify-start px-4 pt-2">
                <h1 class="text-lg text-gray-700 font-bold">
                    Car Models
                </h1>
            </div>
            <div class="flex justify-start px-4 py-2">
                <p class="text-xs text-gray-500">
                    Find all car models available in Sakura and view detailed
                    specifications, prices, images, reviews and much more.
                    Connect with our staff and request a quote.
                </p>
            </div>
            <div class="flex justify-center px-10 py-8 mt-4">
                <div v-if="vehicles.data.length > 0">
                    <div class="grid grid-cols-4 gap-10">
                        <div v-for="vehicle in vehicles.data" :key="vehicle.id">
                            <div class="rounded h-auto w-full">
                                <router-link
                                    :to="{
                                        name: 'get-car',
                                        params: { id: vehicle.id }
                                    }"
                                >
                                    <div class="relative overflow-hidden">
                                        <div class="h-52 w-full">
                                            <div
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
                                            </div>
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
                                        class="flex items-center justify-between"
                                    >
                                        <p v-if="vehicle.status == 'Active'">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                            >
                                                Active
                                            </span>
                                        </p>
                                        <p v-if="vehicle.status == 'Reserved'">
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
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Posted:
                                            {{ vehicle.created_at | date }}
                                        </p>
                                    </div>
                                    <div class="flex">
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
                                    </div>
                                    <div class="flex">
                                        <p class="text-lg text-gray-900">
                                            ₱
                                            {{ vehicle.price.toLocaleString() }}
                                        </p>
                                    </div>
                                    <div class="flex">
                                        <router-link
                                            :to="{
                                                name: 'get-car',
                                                params: { id: vehicle.id }
                                            }"
                                            style="text-decoration:none"
                                            class="text-xs text-gray-500 hover:text-yellow-600 transition duration-300"
                                            >View for more information
                                        </router-link>
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
export default {
    components: {
        slider,
        slideritem
    },
    data() {
        return {
            // vehicles: [],
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
            search: ''
        };
    },
    mounted() {
        this.getVehicle();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value))
                    .startOf('hour')
                    .fromNow();
            }
        }
    },
    methods: {
        getVehicle() {
            axios.get('api/vehicle').then(response => {
                this.vehicles = response.data;
                console.log(response.data);
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
        }
    }
};
</script>

<style></style>
