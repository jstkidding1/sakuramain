<template>
    <div class="">
        <div class="container mx-auto h-full">
            <div class="flex mt-10">
                <h1
                    class="sm:text-2xl sm:ml-6 lg:text-2xl md:text-2xl text-gray-700 font-semibold"
                >
                    Customer Dashboard
                </h1>
            </div>
            <hr class="my-4" />
            <div class="lg:flex no-wrap lg:-mx-2">
                <ul class="flex flex-col py-4 mr-10">
                    <li>
                        <button
                            @click="setComponent('main')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
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
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium">Dashboard</span>
                        </button>
                    </li>
                    <li>
                        <button
                            @click="setComponent('appointments')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
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
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium"
                                >Appointments</span
                            >
                        </button>
                    </li>
                    <li>
                        <button
                            @click="setComponent('inquiries')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
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
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium">Inquiries</span>
                        </button>
                    </li>
                    <li>
                        <button
                            @click="setComponent('orders')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
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
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium">Orders</span>
                        </button>
                    </li>
                    <!-- <li>
                        <button
                            @click="setComponent('quotations')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
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
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium">Quotations</span>
                        </button>
                    </li> -->
                    <li>
                        <button
                            @click="setComponent('requests')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
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
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium">Requests</span>
                        </button>
                    </li>
                    <li>
                        <button
                            @click="setComponent('reservations')"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                        >
                            <span
                                class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                                    /></svg
                            ></span>
                            <span class="text-sm font-medium"
                                >Reservations</span
                            >
                        </button>
                    </li>
                </ul>
                <div class="bg-white w-full p-4 shadow-md rounded mb-24">
                    <component :is="activeComponent"></component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Appointments from '../customer/Appointments';
import Inquiry from '../customer/Inquiry';
import Orders from '../customer/Orders';
import Quotation from '../customer/Quotation';
import Request from '../customer/Request';
import Reservations from '../customer/Reservations';
import Main from '../customer/Main';

export default {
    data() {
        return {
            user: null,
            activeComponent: null,
            open: false
        };
    },
    components: {
        Appointments,
        Inquiry,
        Orders,
        Quotation,
        Request,
        Reservations,
        Main
    },
    beforeMount() {
        this.setComponent(this.$route.params.page);
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    methods: {
        setComponent(value) {
            switch (value) {
                case 'appointments':
                    this.activeComponent = Appointments;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'appointments' }
                    });
                    break;
                case 'inquiries':
                    this.activeComponent = Inquiry;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'inquiries' }
                    });
                    break;
                case 'orders':
                    this.activeComponent = Orders;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'orders' }
                    });
                    break;
                case 'quotations':
                    this.activeComponent = Quotation;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'quotations' }
                    });
                    break;
                case 'requests':
                    this.activeComponent = Request;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'requests' }
                    });
                    break;
                case 'reservations':
                    this.activeComponent = Reservations;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'reservations' }
                    });
                    break;
                default:
                    this.activeComponent = Main;
                    this.$router.push({
                        name: 'customer-pages',
                        params: { page: 'main' }
                    });
                    break;
            }
        }
    }
};
</script>

<style></style>
