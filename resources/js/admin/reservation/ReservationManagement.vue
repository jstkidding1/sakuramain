<template>
    <div class="flex flex-col h-screen">
        <div class="container">
            <div class="flex flex-wrap items-center justify-center mt-10">
                <div class="bg-white px-10 pb-10 rounded shadow-md w-full">
                    <div class="flex py-3">
                        <div class="w-full flex justify-between">
                            <div class="flex inline-block">
                                <button
                                    @click="$router.go(-1)"
                                    class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                                >
                                    Return to Previous Page
                                </button>
                            </div>
                            <div class="flex items-center">
                                <router-link
                                    style="text-decoration:none"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    to="/admin/dashboard"
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
                                    to="/reservations"
                                    >Reservation Management</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 font-semibold"
                    >
                        Reservation Management
                    </div>
                    <div class="relative flex justify-end mt-10">
                        <input
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            v-model.trim="search"
                            placeholder="Search..."
                            @keyup="searchReservation"
                        />
                        <svg
                            v-if="searchLoading"
                            class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <!-- <input
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            v-model.trim="search"
                            placeholder="Search..."
                            @keyup="getReservation"
                        />
                        <svg
                            v-if="searchLoading"
                            class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg> -->
                    </div>
                    <table class="w-full mt-4 table-hover">
                        <thead class="bg-white">
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                            >
                                <!-- <th class="px-4 py-3">#</th> -->
                                <th class="px-4 py-3">Customer name</th>
                                <th class="px-4 py-3">Vehicle</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Address</th>
                                <th class="px-4 py-3">Contact #</th>
                                <!-- <th class="px-4 py-3">Role</th> -->
                                <th class="px-4 py-3">Status</th>
                                <!-- <th class="px-4 py-3">Approve</th> -->
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody
                            v-if="reservations && reservations.data.length > 0"
                            class="bg-white"
                        >
                            <tr
                                v-for="(reservation,
                                index) in reservations.data"
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
                                    <div
                                        class="flex items-center text-sm font-semibold"
                                    >
                                        <p>
                                            {{ reservation.user.fname }}
                                            {{ reservation.user.mname }}
                                            {{ reservation.user.lname }}
                                        </p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        Submitted:
                                        {{ reservation.date_reserve | date }}
                                    </p>
                                </td>
                                <td
                                    class="px-4 py-3 text-ms font-semibold border"
                                >
                                    {{ reservation.vehicle.brand_name }}
                                    {{ reservation.vehicle.year_model }}
                                    {{ reservation.vehicle.model_type }}
                                </td>
                                <td
                                    class="px-4 py-3 text-ms font-semibold border"
                                >
                                    ₱
                                    {{ reservation.vehicle.price }}
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
                                <!-- <td
                                    class="px-4 py-3 text-xs border"
                                    v-if="reservation.is_approved == 1"
                                >
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                    >
                                        Approved
                                    </span>
                                </td>
                                <td
                                    class="px-4 py-3 text-xs border"
                                    v-if="reservation.is_approved == 0"
                                >
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                                    >
                                        Pending
                                    </span>
                                </td>
                                <td
                                    class="px-4 py-3 text-ms font-semibold border"
                                    v-if="reservation.is_approved == 0"
                                >
                                    <button
                                        class="bg-indigo-600 hover:bg-indigo-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-white transition duration-300"
                                        @click="approve(index)"
                                    >
                                        Approve
                                    </button>
                                </td>
                                <td
                                    class="px-4 py-3 text-ms font-semibold border"
                                    v-if="reservation.is_approved"
                                >
                                    <button
                                        class="bg-indigo-600 p-2 rounded-lg text-gray-50 font-semibold opacity-50"
                                        @click="approve(index)"
                                        disabled
                                    >
                                        Approved
                                    </button>
                                </td> -->

                                <td class="text-center px-2 py-3 border">
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'view-reservation',
                                                params: { id: reservation.id }
                                            }"
                                            class="w-4 mr-4 transform hover:text-yellow-600 hover:scale-110 transition duration-300"
                                            v-tooltip="'View Reservation'"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                />
                                            </svg>
                                        </router-link>
                                        <!-- <router-link
                                            :to="{
                                                name: 'edit-order',
                                                params: { id: order.id }
                                            }"
                                            class="w-4 mr-4 transform hover:text-purple-500 hover:scale-110"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8"
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
                                        </router-link> -->
                                        <button
                                            @click="
                                                deleteReservation(
                                                    reservation.id
                                                )
                                            "
                                            class="w-4 mr-4 transform hover:text-yellow-600 hover:scale-110 transition duration-300"
                                            v-tooltip="'Delete Reservation'"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else class="bg-white">
                            <tr>
                                <td
                                    colspan="8"
                                    align="center"
                                    class="text-gray-800 font-bold text-2xl mt-2 "
                                >
                                    No Reservations Found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination
                        class="mt-4 center"
                        :data="reservations"
                        @pagination-change-page="getResults"
                    ></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
import _ from 'lodash';
export default {
    data() {
        return {
            user: null,
            search: '',
            searchLoading: false,
            reservations: {
                data: []
            }
        };
    },
    beforeMount() {
        this.getUser();
        this.getReservation();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getReservation() {
            axios
                .get('api/reservations')
                .then(response => {
                    this.reservations = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getResults(page = 1) {
            axios.get('/api/reservations?page=' + page).then(response => {
                this.reservations = response.data;
                console.log(response.data);
            });
        },
        searchReservation: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get('/api/reservations?search=' + this.search)
                .then(response => {
                    this.reservations = response.data;
                    console.log(response.data);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 2000),
        approve(index) {
            let reservation = this.reservations[index];
            axios
                .patch(`/api/reservations/${reservation.id}/approved`)
                .then(response => {
                    this.reservations[index].is_approved = 1;
                    this.$forceUpdate();
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Approved Successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        },
        deleteReservation(id) {
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/reservations/${id}`).then(response => {
                        this.getReservation();
                    });
                    this.$swal(
                        'Deleted!',
                        'Reservation has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
