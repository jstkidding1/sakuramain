<template>
    <div>
        <div class="container">
            <div class="flex mt-20">
                <div class="bg-white shadow-md py-4 px-2 w-1/4 h-96">
                    <div class="flex items-center justify-end">
                        <!-- <button
                            @click="myProfile = !myProfile"
                            class="w-6 mr-6 transform hover:text-purple-500 hover:scale-110"
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
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                />
                            </svg>
                        </button> -->
                        <router-link
                            style="text-decoration:none;"
                            :to="{
                                name: 'customer-profile',
                                params: { id: user.id }
                            }"
                        >
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
                        </router-link>
                    </div>
                    <div class="flex items-center justify-center">
                        <div v-if="user.image == null">
                            <img
                                :src="avatar"
                                alt=""
                                class="rounded-full h-32 w-32"
                            />
                        </div>
                        <div v-else>
                            <img
                                :src="user.image"
                                class="rounded-full h-32 w-32"
                            />
                        </div>
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
                    <div
                        class="flex items-center justify-center mt-4 px-4"
                        v-if="myProfile"
                    >
                        <span
                            class="fixed w-full text-red-500 text-xs mt-14"
                            v-if="errors.image"
                            >{{ errors.image[0] }}</span
                        >
                        <div class="flex items-center justify-between">
                            <input
                                type="file"
                                @change="onChange"
                                class="w-full mt-4"
                            />
                            <button
                                @click.prevent="uploadImage"
                                class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600 mt-2"
                            >
                                <svg
                                    v-if="loading"
                                    class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                                <span v-if="loading">Submit</span>
                                <span v-else>Submit</span>
                            </button>
                        </div>
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
                            <div class="flex items-center">
                                <p class="flex items-center text-md font-bold">
                                    <img
                                        :src="shoppingCart"
                                        class="w-8 h-8 object-cover mr-2"
                                    />
                                    My Orders
                                </p>

                                <router-link
                                    style="text-decoration:none;"
                                    to="/auto-parts"
                                    class="text-md text-gray-600 hover:text-indigo-600 px-2 ml-8"
                                    >Buy Product</router-link
                                >
                            </div>
                            <input
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Search..."
                            />
                        </div>
                        <hr class="mt-2" />
                        <table class="w-full mt-4 table-hover">
                            <thead class="bg-white">
                                <tr
                                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                                >
                                    <!-- <th class="px-4 py-3">#</th> -->
                                    <th class="px-4 py-3">Brand</th>
                                    <th class="px-4 py-3">Total Price</th>
                                    <th class="px-4 py-3">Delivery Address</th>
                                    <th class="px-4 py-3">Contact</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="orders && orders.length > 0"
                                class="bg-white"
                            >
                                <tr
                                    v-for="(order, index) in orders"
                                    :key="index"
                                    class="text-gray-700"
                                >
                                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div
                                                class="relative w-8 h-8 mr-3 rounded-full md:block"
                                            >
                                                <img
                                                    class="object-cover w-full h-full rounded-full"
                                                    :src="order.product.image"
                                                    alt=""
                                                    loading="lazy"
                                                />
                                                <div
                                                    class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"
                                                ></div>
                                            </div>
                                            <div>
                                                <p
                                                    class="font-semibold text-black"
                                                >
                                                    {{
                                                        order.product
                                                            .product_name
                                                    }}
                                                </p>
                                                <p
                                                    class="text-xs text-gray-600"
                                                >
                                                    {{
                                                        order.product
                                                            .product_brand
                                                    }}
                                                    {{
                                                        order.product
                                                            .product_model
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        ₱
                                        {{
                                            order.quantity * order.product.price
                                        }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ order.address }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ order.contact_num }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="order.status == 'Pending'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                                        >
                                            Pending
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="order.status == 'Preparing'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                                        >
                                            Preparing
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="order.status == 'To be delivered'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-sm"
                                        >
                                            To be delivered
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="order.status == 'Delivered'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                        >
                                            Delivered
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="order.status == 'Cancelled'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                                        >
                                            Cancelled
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                        v-if="order.status == 'Pending'"
                                    >
                                        <div class="flex justify-center">
                                            <button
                                                class="hover:text-red-700"
                                                @click="cancelOrder(order.id)"
                                            >
                                                Cancel
                                            </button>
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                        v-if="
                                            (order.status ==
                                                'To be delivered') |
                                                (order.status == 'Cancelled') |
                                                (order.status == 'Preparing') |
                                                (order.status == 'Delivered')
                                        "
                                    ></td>
                                </tr>
                            </tbody>
                            <tbody v-else class="bg-white">
                                <tr>
                                    <td
                                        colspan="6"
                                        align="center"
                                        class="text-gray-800 font-bold text-2xl mt-2"
                                    >
                                        No Orders Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-white shadow-md p-4 ml-2 h-auto w-full mt-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <p class="flex items-center text-md font-bold">
                                    <img
                                        :src="carIcon"
                                        class="w-8 h-8 object-cover mr-2"
                                    />
                                    My Reservations
                                </p>

                                <router-link
                                    style="text-decoration:none;"
                                    to="/cars"
                                    class="text-md text-gray-600 hover:text-indigo-600 px-2 ml-8"
                                    >Make Reservation</router-link
                                >
                            </div>
                            <input
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Search..."
                            />
                            <!-- <input
                                @keyup="searchReservation"
                                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="search"
                                placeholder="Search..."
                            /> -->
                        </div>
                        <hr class="mt-2" />
                        <table class="w-full mt-4 table-hover">
                            <thead class="bg-white">
                                <tr
                                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                                >
                                    <!-- <th class="px-4 py-3">#</th> -->
                                    <th class="px-4 py-3">Vehicles</th>
                                    <th class="px-4 py-3">Price</th>
                                    <th class="px-4 py-3">Address</th>
                                    <th class="px-4 py-3">Contact #</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="reservations && reservations.length > 0"
                                class="bg-white"
                            >
                                <tr
                                    v-for="(reservation, index) in reservations"
                                    :key="index"
                                    class="text-gray-700"
                                >
                                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div
                                                class="relative w-8 h-8 mr-3 rounded-full md:block"
                                            >
                                                <img
                                                    class="object-cover w-full h-full rounded-full"
                                                    :src="
                                                        reservation.vehicle
                                                            .image
                                                    "
                                                    alt=""
                                                    loading="lazy"
                                                />
                                                <div
                                                    class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"
                                                ></div>
                                            </div>
                                            <div>
                                                <p
                                                    class="font-semibold text-black"
                                                >
                                                    {{
                                                        reservation.vehicle
                                                            .brand_name
                                                    }}
                                                </p>
                                                <p
                                                    class="text-xs text-gray-600"
                                                >
                                                    {{
                                                        reservation.vehicle
                                                            .year_model
                                                    }}
                                                    {{
                                                        reservation.vehicle
                                                            .model_type
                                                    }}
                                                    {{
                                                        reservation.vehicle
                                                            .body_type
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ reservation.vehicle.year_model }}
                                        {{ reservation.vehicle.brand_name }}
                                        {{ reservation.vehicle.engine }}
                                        {{ reservation.vehicle.transmission }}
                                    </td> -->
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        ₱
                                        {{
                                            reservation.vehicle.price.toLocaleString()
                                        }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ reservation.address }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ reservation.contact_num }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="reservation.status == 'Declined'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                                        >
                                            Declined
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="reservation.status == 'Pending'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                                        >
                                            Pending
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="reservation.status == 'Sold'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-sm"
                                        >
                                            Sold
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="reservation.status == 'Reserved'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                                        >
                                            Reserved
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                        v-if="reservation.status == 'Pending'"
                                    >
                                        <div class="flex justify-center">
                                            <button
                                                class="hover:text-red-700"
                                                @click="
                                                    cancelReservation(
                                                        reservation.id
                                                    )
                                                "
                                            >
                                                Cancel
                                            </button>
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                        v-if="
                                            (reservation.status == 'Sold') |
                                                (reservation.status ==
                                                    'Declined') |
                                                (reservation.status ==
                                                    'Reserved')
                                        "
                                    ></td>
                                </tr>
                            </tbody>
                            <tbody v-else class="bg-white">
                                <tr>
                                    <td
                                        colspan="6"
                                        align="center"
                                        class="text-gray-800 font-bold text-2xl mt-2"
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
                            <div class="flex items-center">
                                <p class="flex items-center text-md font-bold">
                                    <img
                                        :src="scheduleIcon"
                                        class="w-8 h-8 object-cover mr-2"
                                    />
                                    My Appointments
                                </p>

                                <router-link
                                    style="text-decoration:none;"
                                    to="/all/services"
                                    class="text-md text-gray-600 hover:text-indigo-600 px-2"
                                    >Make Appointment</router-link
                                >
                            </div>
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
                        <table class="w-full mt-4 table-hover">
                            <thead class="bg-white">
                                <tr
                                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                                >
                                    <!-- <th class="px-4 py-3">#</th> -->
                                    <th class="px-4 py-3">Services</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3">Time</th>
                                    <th class="px-4 py-3">Address</th>
                                    <th class="px-4 py-3">Contact #</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="appointments && appointments.length > 0"
                                class="bg-white"
                            >
                                <tr
                                    v-for="(appointment, index) in appointments"
                                    :key="index"
                                    class="text-gray-700"
                                >
                                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ appointment.service.service_name }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ appointment.date }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ appointment.time }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ appointment.address }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ appointment.contact_num }}
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="appointment.status == 'Pending'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                                        >
                                            Pending
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="appointment.status == 'Approved'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                        >
                                            Approved
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="
                                            appointment.status == 'In Progress'
                                        "
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                                        >
                                            In Progress
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="appointment.status == 'Declined'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                                        >
                                            Declined
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-xs border"
                                        v-if="appointment.status == 'Checked'"
                                    >
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                        >
                                            Checked
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                        v-if="appointment.status == 'Pending'"
                                    >
                                        <div class="flex justify-center">
                                            <button
                                                class="hover:text-red-700"
                                                @click="
                                                    cancelAppointment(
                                                        appointment.id
                                                    )
                                                "
                                            >
                                                Cancel
                                            </button>
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                        v-if="
                                            (appointment.status == 'Approved') |
                                                (appointment.status ==
                                                    'In Progress') |
                                                (appointment.status ==
                                                    'Declined') |
                                                (appointment.status ==
                                                    'Checked')
                                        "
                                    ></td>
                                </tr>
                            </tbody>
                            <tbody v-else class="bg-white">
                                <tr>
                                    <td
                                        colspan="7"
                                        align="center"
                                        class="text-gray-800 font-bold text-2xl mt-2"
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
            myProfile: false,
            loading: false,
            preview: false,
            image: '',
            search: '',
            avatar: '/images/Avatar.png',
            shoppingCart: '/images/ShoppingCartIcon.png',
            carIcon: '/images/CarIcon.png',
            scheduleIcon: '/images/Schedule.png',
            reservations: [],
            orders: [],
            vehicle: [],
            appointments: [],
            errors: []
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
            var date = new Date();
            axios
                .get(`api/users/${this.user.id}/appointments`)
                .then(response => {
                    this.appointments = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        cancelOrder(id) {
            this.$swal({
                title: 'Are you sure you want to cancel your order?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/orders/${id}`).then(response => {
                        this.fetchOrders();
                    });
                    this.$swal(
                        'Cancelled!',
                        'Order has been cancelled.',
                        'success'
                    );
                }
            });
        },
        cancelReservation(id) {
            this.$swal({
                title: 'Are you sure you want to cancel your reservation?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/reservations/${id}`).then(response => {
                        this.fetchReservations();
                        console.log('Deleted');
                    });
                    this.$swal(
                        'Cancelled!',
                        'Reservation has been cancelled.',
                        'success'
                    );
                }
            });
        },
        cancelAppointment(id) {
            this.$swal({
                title: 'Are you sure you want to cancel your appointment?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/appointments/${id}`).then(response => {
                        this.fetchAppointments();
                        console.log('Deleted');
                    });
                    this.$swal(
                        'Cancelled!',
                        'Appointment has been cancelled.',
                        'success'
                    );
                }
            });
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        uploadImage() {
            this.loading = !false;
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('image', this.image);
            setTimeout(() => {
                this.loading = !true;
                axios
                    .post('/api/users/upload/image', formData, config)
                    .then(response => {
                        this.user.image = response.data;
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Image successfully added.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        }
        // searchReservation() {
        //     axios
        //         .get(`api/users/${this.user.id}/reservations` + this.search)
        //         .then(response => {
        //             this.reservations = response.data;
        //             console.log(response.data);
        //         });
        // },
        // getReservations(page = 1) {
        //     axios
        //         .get(`api/users/${this.user.id}/reservations` + page)
        //         .then(response => {
        //             this.reservations = response.data;
        //             console.log(response.data);
        //         });
        // }
    }
};
</script>

<style scoped></style>
