<template>
    <div class="mt-10">
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Admin Dashboard
            </h1>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Products & Servicing Management
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/users">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="logo"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/users"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        User Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/users"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/vehicles">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="car"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/vehicles"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Vehicle Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/vehicles"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/product">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="autoparts"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>
                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/product"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Product Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/product"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>

                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/gallery/management">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="gallery"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/gallery/management"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Gallery Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/gallery/management"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/services">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="service"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/services"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Service Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/services"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Customer Management
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/orders">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="shop"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/orders"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Order Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/orders"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/reservations">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="reserve"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/reservations"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Reservation Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/reservations"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <div
                                class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <router-link to="/appointments">
                                    <div
                                        class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                    >
                                        <div
                                            class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                        >
                                            <img
                                                :src="appointment"
                                                alt="image"
                                                class="h-full w-full object-cover"
                                            />
                                        </div>
                                    </div>
                                </router-link>
                            </div>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/appointments"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Appointment Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/appointments"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/inquiries">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="inquiry"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/inquiries"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Inquiry Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/inquiries"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/requests">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="testdrive"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/requests"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Request Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/requests"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/quotations">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="quote"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/quotations"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Quotation Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/quotations"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Sales Report
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/salesreport">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="report"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>
                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/salesreport"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Sales Report Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/salesreport"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
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
            autoparts: '/images/Product.png',
            car: '/images/Vehicles.png',
            shop: '/images/Order.png',
            logo: '/images/Users.png',
            reserve: '/images/Reserve.png',
            appointment: '/images/Appointment.png',
            report: '/images/Sales.png',
            gallery: '/images/Gallery.png',
            service: '/images/Service.png',
            testdrive: '/images/Testdrive.png',
            inquiry: '/images/Inquiry.png',
            quote: '/images/Quote.png'
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer' + localStorage.getItem('jwt');
    },
    methods: {}
};
</script>

<style></style>
