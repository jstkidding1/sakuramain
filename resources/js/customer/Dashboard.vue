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
                <div
                    class="sm:grid grid-cols-4 gap-2 sm:mb-4 md:grid grid-cols-4 gap-2 md:mb-4 lg:flex flex-col lg:w-72"
                >
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('main')"
                    >
                        Dashboard
                    </button>
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('appointments')"
                    >
                        Appointments
                    </button>
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('inquiries')"
                    >
                        Inquiries
                    </button>
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('orders')"
                    >
                        Orders
                    </button>
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('quotations')"
                    >
                        Quotations
                    </button>
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('requests')"
                    >
                        Request
                    </button>
                    <button
                        class="text-lg font-bold text-gray-600 hover:text-yellow-600 transition duration-300"
                        @click="setComponent('reservations')"
                    >
                        Reservations
                    </button>
                </div>
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
            activeComponent: null
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
