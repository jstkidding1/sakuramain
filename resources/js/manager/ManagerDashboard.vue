<template>
    <div class="mt-10">
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Manager Dashboard
            </h1>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Products, Vehicle & Servicing Management
            </h1>
            <div class="flex mt-4">
                <div
                    class="sm:flex flex-col gap-y-4 w-full lg:grid grid-cols-5 gap-4"
                >
                    <router-link
                        to="/manager/vehicleList"
                        style="text-decoration:none;"
                    >
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-gray-500 text-center text-purple-500"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                                />
                                                <path
                                                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                                />
                                            </svg>
                                        </div>
                                        <router-link
                                            to="/manager/vehicleList"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Vehicle Management
                                            </p>
                                        </router-link>
                                    </div>
                                    <h3
                                        class="text-white text-xl mt-2 font-bold"
                                    >
                                        {{ countVehicles }} Vehicles
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </router-link>
                    <router-link
                        to="/manager/productList"
                        style="text-decoration:none;"
                    >
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-indigo-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                                />
                                            </svg>
                                        </div>
                                        <router-link
                                            to="/manager/productList"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Product Management
                                            </p>
                                        </router-link>
                                    </div>
                                    <h3
                                        class="text-white text-xl mt-2 font-bold"
                                    >
                                        {{ countProducts }} Products
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </router-link>
                    <router-link
                        to="/manager/gallery/list"
                        style="text-decoration:none"
                    >
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-blue-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                />
                                            </svg>
                                        </div>
                                        <router-link
                                            to="/manager/gallery/list"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Gallery Management
                                            </p>
                                        </router-link>
                                    </div>
                                    <h3
                                        class="text-white text-xl mt-2 font-bold"
                                    >
                                        {{ countGalleries }} Galleries
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </router-link>
                    <router-link
                        to="/manager/services"
                        style="text-decoration:none;"
                    >
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-green-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                                                />
                                            </svg>
                                        </div>
                                        <router-link
                                            to="/manager/services"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Service Management
                                            </p>
                                        </router-link>
                                    </div>
                                    <h3
                                        class="text-white text-xl mt-2 font-bold"
                                    >
                                        {{ countServices }} Services
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Reports
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto mb-20">
                <div class="sm:flex flex-col w-full lg:grid grid-cols-5 gap-4">
                    <router-link to="/charts" style="text-decoration:none;">
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-green-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                                                />
                                            </svg>
                                        </div>
                                        <router-link
                                            to="/charts"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Chart Management
                                            </p>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </router-link>
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
            quote: '/images/Quote.png',
            countUsers: '',
            countVehicles: '',
            countProducts: '',
            countGalleries: '',
            countServices: '',
            countOrders: '',
            countReservations: '',
            countAppointments: '',
            countInquiry: '',
            countRequests: '',
            countQuotations: ''
        };
    },
    beforeMount() {
        this.getAuthenticate();
        // this.countAllUser();
        this.countAllVehicles();
        this.countAllProducts();
        this.countAllGalleries();
        this.countAllServices();
        // this.countAllOrders();
        // this.countAllReservations();
        // this.countAllAppointments();
        // this.countAllInquiries();
        // this.countAllRequests();
        // this.countAllQuotations();
    },
    methods: {
        getAuthenticate() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        // countAllUser() {
        //     axios.get('/api/users').then(response => {
        //         this.countUsers = response.data.user_count;
        //     });
        // },
        countAllVehicles() {
            axios.get('/api/vehicle').then(response => {
                this.countVehicles = response.data.vehicle_count;
            });
        },
        countAllProducts() {
            axios.get('/api/products').then(response => {
                this.countProducts = response.data.products_count;
            });
        },
        countAllGalleries() {
            axios.get('/api/galleries').then(response => {
                this.countGalleries = response.data.gallery_count;
            });
        },
        countAllServices() {
            axios.get('/api/services').then(response => {
                this.countServices = response.data.service_count;
            });
        }
        // countAllOrders() {
        //     axios.get('/api/orders').then(response => {
        //         this.countOrders = response.data.order_count;
        //     });
        // },
        // countAllReservations() {
        //     axios.get('/api/reservations').then(response => {
        //         this.countReservations = response.data.reservation_count;
        //     });
        // },
        // countAllAppointments() {
        //     axios.get('/api/appointments').then(response => {
        //         this.countAppointments = response.data.appointment_count;
        //     });
        // },
        // countAllInquiries() {
        //     axios.get('/api/inquiries').then(response => {
        //         this.countInquiry = response.data.inquiries_count;
        //     });
        // },
        // countAllRequests() {
        //     axios.get('/api/tests').then(response => {
        //         this.countRequests = response.data.testdrive_count;
        //     });
        // },
        // countAllQuotations() {
        //     axios.get('/api/quotes').then(response => {
        //         this.countQuotations = response.data.quotations_count;
        //     });
        // }
    }
};
</script>

<style></style>
