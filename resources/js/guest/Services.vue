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
                                to="/all/services"
                                >Services</router-link
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
                                Search Car Service
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-lg text-gray-600">
                                Let Sakura help you by searching Car Services
                                you’re interested in.
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
                                placeholder="Search for services"
                                @keyup="searchServices"
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
            <!-- <div class="flex w-full mt-10">
                <h1 class="text-3xl text-gray-800 font-bold">
                    Car Service
                </h1>
            </div>
            <div class="flex w-full mt-2">
                <p class="text-lg text-gray-600">
                    Find car service available in Sakura, including general
                    service, oil change, tire replacement and more. Book an
                    appointment through Sakura.
                </p>
            </div>
            <div class="flex w-full mt-2">
                <p class="text-lg text-gray-600">
                    For appointment guide
                    <a
                        href="/appointment/guide"
                        style="text-decoration:none;"
                        class="text-blue-600 hover:text-blue-800 transition duration-300"
                    >
                        click here.
                    </a>
                </p>
            </div> -->
            <!-- <div class="sm:flex w-full lg:flex justify-end">
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
                        placeholder="Search..."
                        @keyup="searchServices"
                    />
                    <svg
                        v-if="searchLoading"
                        class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                        style="border-right-color: white; border-top-color: white;"
                        viewBox="0 0 24 24"
                    ></svg>
                </div>
            </div> -->
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
                            Find a service for your car
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
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Book Appointment
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Book your date and time
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
                            Final Booking Confirmation
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Receive confirmed booking from dealer
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
            <div v-if="services.data.length > 0">
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-6"
                >
                    <div v-for="(service, index) in services.data" :key="index">
                        <div
                            class="mb-10 m-2 shadow-md hover:shadow-lg border-gray-800 bg-gray-100 relative transition duration-300"
                        >
                            <router-link
                                :to="{
                                    path: '/make/appointment/?aid=' + service.id
                                }"
                            >
                                <img
                                    class="w-full h-72"
                                    :src="`/images/${service.image}`"
                                    alt=""
                                />
                            </router-link>
                            <!-- <div
                                v-if="service.status == 'Available'"
                                class="absolute top-0 right-0 bg-green-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded"
                            >
                                Available
                            </div>
                            <div
                                v-if="service.status == 'Not Available'"
                                class="absolute top-0 right-0 bg-red-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded"
                            >
                                Not Available
                            </div> -->
                            <div class="desc p-4 text-gray-800">
                                <router-link
                                    :to="{
                                        path:
                                            '/make/appointment/?aid=' +
                                            service.id
                                    }"
                                    class="font-bold block cursor-pointer"
                                    >{{ service.service_name }}</router-link
                                >
                                <!-- <span
                                    class="text-sm block py-2 border-gray-400 mb-2"
                                    >{{ service.description }}</span
                                > -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div
                    v-if="!loadingData"
                    class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                >
                    No Services Found.
                </div>
            </div>
            <pagination
                class="mt-4 justify-start"
                :data="services"
                @pagination-change-page="getResults"
            ></pagination>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data() {
        return {
            search: '',
            searchLoading: false,
            loadingData: false,
            services: {
                data: []
            }
        };
    },
    mounted() {
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
        getServices() {
            this.loadingData = true;

            // setTimeout(() => {
            //     this.loadingData = false;
            axios
                .get('/api/services')
                .then(response => {
                    this.services = response.data.services;
                    console.log(response.data.services);
                })
                .finally(() => {
                    this.loadingData = false;
                });
            // }, 2000);
        },
        searchServices: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get('/api/services?search=' + this.search)
                .then(response => {
                    this.services = response.data.services;
                    console.log(response.data.services);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 1000),
        getResults(page = 1) {
            axios.get('/api/services?page=' + page).then(response => {
                this.services = response.data.services;
                console.log(response.data.services);
            });
        }
    }
};
</script>

<style></style>
