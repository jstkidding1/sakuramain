<template>
    <div>
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
                                to="/all/services"
                                >Services</router-link
                            >
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="flex w-full mt-10">
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
                        class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                    >
                        click here.
                    </a>
                </p>
            </div>
            <!-- <div class="flex w-full justify-center mt-6"> -->
            <div class="w-full mt-6 py-6">
                <div class="flex justify-center">
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
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
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
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
                                            d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"
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
                                class="w-10 h-10 mx-auto bg-yellow-600 border-2 border-gray-200 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
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
            <!-- </div> -->
            <div class="flex justify-center mt-10 mb-20">
                <div v-if="services.data.length > 0">
                    <div class="grid grid-cols-3 gap-10">
                        <div
                            v-for="(service, index) in services.data"
                            :key="index"
                        >
                            <div
                                class="bg-white mx-auto shadow-md rounded-lg max-w-sm hover:shadow-xl transition duration-300"
                            >
                                <router-link
                                    :to="{
                                        path:
                                            '/make/appointment/?aid=' +
                                            service.id
                                    }"
                                >
                                    <div
                                        class="relative overflow-hidden rounded-t-lg"
                                    >
                                        <div class="h-52 w-full">
                                            <img
                                                :src="
                                                    `/images/${service.image}`
                                                "
                                                alt=""
                                                class="h-full w-full object-cover transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                            />
                                        </div>
                                    </div>
                                </router-link>
                                <div class="flex justify-start py-4 px-3">
                                    <h1
                                        class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight"
                                    >
                                        {{ service.service_name }}
                                    </h1>
                                </div>
                                <div class="flex p-3">
                                    <div
                                        class="text-gray-500 text-xs font-light mt-4"
                                    >
                                        Posted:
                                        {{ service.created_at | date }}
                                    </div>
                                </div>
                                <hr />
                                <div class="flex justify-end p-3">
                                    <router-link
                                        style="text-decoration:none;"
                                        :to="{
                                            path:
                                                '/make/appointment/?aid=' +
                                                service.id
                                        }"
                                        class="flex items-center bg-gray-900 p-2 text-white rounded text-md hover:bg-gray-500 transition duration-300"
                                        >Make an appointment</router-link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                    >
                        No Services Found.
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
            services: {
                data: []
            }
            // services: []
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
            axios.get('/api/services').then(response => {
                this.services = response.data;
                console.log(response.data);
            });
        }
    }
};
</script>

<style></style>
