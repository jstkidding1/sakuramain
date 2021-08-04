<template>
    <div class="mt-10">
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Secretary Dashboard
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                :src="shop"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Order Management
                                </h2>
                                <router-link
                                    to="/orders"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                :src="reserve"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Reservation Management
                                </h2>
                                <router-link
                                    to="/reservations"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                :src="service"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Appointment Management
                                </h2>
                                <router-link
                                    to="/appointments"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                :src="gallery"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Gallery Management
                                </h2>
                                <router-link
                                    to="/galleries"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                :src="report"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Sales Report Management
                                </h2>
                                <router-link
                                    to="/salesreport"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</template>

<script>
export default {
    data() {
        return {
            shop: '/images/Shopping.jpg',
            reserve: '/images/Reserve.jpg',
            service: '/images/Tools.jpg',
            report: '/images/SalesReport.png',
            gallery: '/images/Gallery.jpg'
        };
    }
};
</script>

<style></style>
