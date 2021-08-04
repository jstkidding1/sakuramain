<template>
    <div>
        <div class="container">
            <div class="flex mt-20">
                <div class="bg-white shadow-md p-4 w-1/4 h-96">
                    <div class="flex items-center justify-end">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-indigo-600 bg-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                            />
                        </svg>
                    </div>
                    <div class="flex items-center justify-center">
                        <img
                            :src="avatar"
                            alt=""
                            class="rounded-full h-32 w-32"
                        />
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <p class="text-md text-gray-800 font-sans">
                            {{ fname }} {{ mname }} {{ lname }}
                        </p>
                    </div>
                    <div class="flex items-center justify-center mt-2">
                        <p class="text-md text-gray-800 font-sans">
                            {{ email }}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <div class="bg-white shadow-md p-4 ml-2 h-20 w-full">
                        <p class="flex items-center text-lg font-bold">
                            My Dashboard
                        </p>
                    </div>
                    <div class="bg-white shadow-md p-4 ml-2 h-auto w-full mt-4">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-bold">
                                My Orders
                            </p>
                            <input
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Search..."
                            />
                            <!-- <input
                            @keyup="searchOrder"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="searchO"
                            placeholder="Search..."
                        /> -->
                        </div>
                        <hr class="mt-2" />
                        <table class="table table-bordered table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>
                                        Address
                                    </th>
                                    <th>Contact #</th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="orders && orders.length > 0">
                                <tr
                                    v-for="(order, index) in orders"
                                    :key="index"
                                >
                                    <td>{{ order.product.product_name }}</td>
                                    <td>{{ order.quantity }}</td>
                                    <td>
                                        ₱
                                        {{
                                            order.quantity * order.product.price
                                        }}
                                    </td>
                                    <td>
                                        {{ order.address }}
                                    </td>
                                    <td>{{ order.contact_num }}</td>
                                    <td>
                                        {{
                                            order.is_delivered == 1
                                                ? 'Delivered'
                                                : 'Pending'
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td
                                        colspan="6"
                                        align="center"
                                        class="font-sans text-lg font-bold text-gray-800 text-center p-4"
                                    >
                                        No Orders Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <pagination
                        class="center"
                        :data="orders"
                        @pagination-change-page="getOrders"
                    ></pagination> -->
                    </div>
                    <div class="bg-white shadow-md p-4 ml-2 h-auto w-full mt-4">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-bold">
                                My Reservations
                            </p>
                            <input
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Search..."
                            />
                            <!-- <input
                            @keyup="searchOrder"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="searchO"
                            placeholder="Search..."
                        /> -->
                        </div>
                        <hr class="mt-2" />
                        <table class="table table-bordered table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>Vehicle</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th>Contact #</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="reservations && reservations.length > 0"
                            >
                                <tr
                                    v-for="(reservation, index) in reservations"
                                    :key="index"
                                >
                                    <td>
                                        {{ reservation.vehicle.year_model }}
                                        {{ reservation.vehicle.brand_name }}
                                        {{ reservation.vehicle.engine }}
                                        {{ reservation.vehicle.transmission }}
                                    </td>
                                    <td>
                                        ₱
                                        {{
                                            reservation.vehicle.price.toLocaleString()
                                        }}
                                    </td>
                                    <td>{{ reservation.vehicle.status }}</td>
                                    <td>{{ reservation.address }}</td>
                                    <td>{{ reservation.contact_num }}</td>
                                    <td>
                                        {{
                                            reservation.is_approved == 1
                                                ? 'Approved'
                                                : 'Pending'
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td
                                        colspan="6"
                                        align="center"
                                        class="font-sans text-lg font-bold text-gray-800 text-center p-4"
                                    >
                                        No Reservations Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="bg-white shadow-md p-4 ml-2 h-auto w-full mt-4 mb-20"
                    >
                        <div class="flex justify-between items-center">
                            <p class="text-md font-bold">
                                My Appointments
                            </p>
                            <input
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Search..."
                            />
                            <!-- <input
                            @keyup="searchOrder"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="searchO"
                            placeholder="Search..."
                        /> -->
                        </div>
                        <hr class="mt-2" />
                        <table class="table table-bordered table-hover mt-3">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Appointment</th>
                                    <th>Date</th>
                                    <th>Address</th>
                                    <th>Contact #</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="appointments && appointments.length > 0"
                            >
                                <tr
                                    v-for="(appointment, index) in appointments"
                                    :key="index"
                                >
                                    <!-- <td>{{ index + 1 }}</td> -->
                                    <td>
                                        {{ appointment.service.service_name }}
                                    </td>
                                    <td>{{ appointment.date }}</td>
                                    <td>{{ appointment.address }}</td>
                                    <td>{{ appointment.contact_num }}</td>
                                    <td>
                                        {{
                                            appointment.is_approved == 1
                                                ? 'Approved'
                                                : 'Pending'
                                        }}
                                    </td>
                                </tr>
                            </tbody>

                            <tbody v-else>
                                <tr>
                                    <td
                                        colspan="6"
                                        align="center"
                                        class="font-sans text-lg font-bold text-gray-800 text-center p-4"
                                    >
                                        No Appointments Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            isLogged: null,
            // searchO: '',
            avatar: '/images/Avatar.png',
            reservations: [],
            orders: [],
            vehicle: [],
            appointments: []
        };
    },
    beforeMount() {
        this.fetchUser();
        this.fetchReservations();
        this.fetchOrders();
        this.fetchAppointments();
    },
    methods: {
        fetchUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            this.fname = this.user.fname;
            this.mname = this.user.mname;
            this.lname = this.user.lname;
            this.email = this.user.email;
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        fetchReservations() {
            axios
                .get(`api/users/${this.user.id}/reservations`)
                .then(response => {
                    this.reservations = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        fetchOrders() {
            axios
                .get(`api/users/${this.user.id}/orders`)
                .then(response => {
                    this.orders = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        fetchAppointments() {
            axios
                .get(`api/users/${this.user.id}/appointments`)
                .then(response => {
                    this.appointments = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
        // searchOrder() {
        //     axios.get('/api/users?search=' + this.searchO).then(response => {
        //         this.orders = response.data;
        //         console.log(response.data);
        //     });
        // },
        // getResults(page = 1) {
        //     axios.get('/api/users?page=' + page).then(response => {
        //         this.orders = response.data;
        //     });
        // }
    }
};
</script>

<style></style>
