<template>
    <div class="container">
        <div class="relative flex items-center justify-between">
            <h5 class="text-lg text-gray-800 font-bold">My Appointments</h5>
            <!-- <div class="relative w-2/6">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
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
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </span>
                <input
                    class="w-full bg-white focus:bg-white border-2 border-gray-400 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                    type="text"
                    v-model.trim="search"
                    placeholder="Search..."
                    @keyup="searchAppointment"
                />
                <svg
                    v-if="searchLoading"
                    class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                    style="border-right-color: white; border-top-color: white;"
                    viewBox="0 0 24 24"
                ></svg>
            </div> -->
        </div>
        <table class="w-full mt-4 table-hover">
            <thead class="bg-white">
                <tr
                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                >
                    <!-- <th class="px-4 py-3">#</th> -->
                    <th class="px-4 py-3">Services</th>
                    <th class="px-4 py-3">Preferred Date</th>
                    <th class="px-4 py-3">Preferred Time</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Contact #</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody
                v-if="appointments && appointments.data.length > 0"
                class="bg-white"
            >
                <tr
                    v-for="(appointment, index) in appointments.data"
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
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ appointment.service.service_name }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ appointment.date }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ appointment.time }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ appointment.address }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        +63{{ appointment.contact_num }}
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
                        v-if="appointment.status == 'In Progress'"
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
                    <td class="px-4 py-3 border">
                        <div class="flex justify-center space-x-4">
                            <router-link
                                :to="{
                                    name: 'customer-view-appointment',
                                    params: { id: appointment.id }
                                }"
                                class="w-4 mr-4 transform hover:text-yellow-600 hover:scale-110 transition duration-300"
                                v-tooltip="'View Appointment'"
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
                            <button
                                @click="cancelAppointment(appointment.id)"
                                v-if="appointment.status == 'Pending'"
                                class="w-4 mr-4 transform hover:text-yellow-600 hover:scale-110 transition duration-300"
                                v-tooltip="'Cancel Appointment'"
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
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
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
                        colspan="7"
                        align="center"
                        class="text-gray-800 font-bold text-2xl py-52"
                    >
                        No Appointments Found.
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination
            class="mt-4 center"
            :data="appointments"
            @pagination-change-page="getResults"
        ></pagination>
    </div>
</template>

<script>
export default {
    data() {
        return {
            avatar: '/images/Avatar.png',
            shoppingCart: '/images/ShoppingCartIcon.png',
            carIcon: '/images/CarIcon.png',
            scheduleIcon: '/images/Schedule.png',
            appointments: {
                data: []
            },
            viewAppointment: false,
            search: '',
            searchLoading: ''
        };
    },
    beforeMount() {
        this.fetchUser();
        this.fetchAppointments();
    },
    methods: {
        fetchUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        fetchAppointments() {
            axios
                .get(`/api/users/${this.user.id}/appointments`)
                .then(response => {
                    this.appointments = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getResults(page = 1) {
            axios
                .get(`/api/users/${this.user.id}/appointments?page=` + page)
                .then(response => {
                    this.appointments = response.data;
                    console.log(response.data);
                });
        },
        searchAppointment: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get(
                    `/api/users/${this.user.id}/appointments?search=` +
                        this.search
                )
                .then(response => {
                    this.appointments = response.data;
                    console.log(response.data);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 2000),
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
                    axios.delete(`/api/appointments/${id}`).then(response => {
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
        }
    }
};
</script>

<style></style>
