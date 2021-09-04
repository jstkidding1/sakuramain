<template>
    <div class="container">
        <div class="flex">
            <p class="text-xl text-gray-800 font-bold">
                Welcome {{ user.fname }} {{ user.mname }} {{ user.lname }} !
            </p>
        </div>
        <div class="flex mt-4">
            <p class="text-sm text-gray-800">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro,
                sunt dolorum ducimus neque vitae numquam nostrum iure
                dignissimos, deserunt quidem cupiditate dolorem soluta error
                perferendis pariatur officia! Harum, cumque quo.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            appointments: [],
            inquiries: [],
            orders: [],
            quotations: [],
            requests: [],
            reservations: []
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    mounted() {
        this.getAppointments();
        this.getInquiries();
        this.getOrders();
        this.getQuotations();
        this.getRequests();
        this.getReservations();
    },
    methods: {
        getAppointments() {
            axios.get('api/appointments').then(response => {
                this.appointments = response.data;
            });
        },
        getInquiries() {
            axios.get('api/inquiries').then(response => {
                this.inquiries = response.data;
            });
        },
        getOrders() {
            axios.get('api/orders').then(response => {
                this.orders = response.data;
            });
        },
        getQuotations() {
            axios.get('api/quotes').then(response => {
                this.quotations = response.data;
            });
        },
        getRequests() {
            axios.get('api/tests').then(response => {
                this.requests = response.data;
            });
        },
        getReservations() {
            axios.get('api/reservations').then(response => {
                this.reservations = response.data;
            });
        }
    }
};
</script>

<style></style>
