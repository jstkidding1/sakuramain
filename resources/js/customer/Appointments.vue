<template>
    <div class="container">
        <div class="relative flex items-center justify-between">
            <h5 class="text-lg text-gray-800 font-bold">My Appointments</h5>
            <input
                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
        </div>
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
                                style="text-decoration:none;"
                                class="text-ms font-semibold text-gray-500 hover:text-yellow-600 transition duration-300"
                            >
                                View
                            </router-link>
                            <button
                                v-if="appointment.status == 'Pending'"
                                class="text-ms font-semibold text-gray-500 hover:text-red-600 transition duration-300"
                                @click="cancelAppointment(appointment.id)"
                            >
                                Cancel
                            </button>
                        </div>
                    </td>
                    <!-- <td
                        class="px-4 py-3 text-ms font-semibold border"
                        v-if="appointment.status == 'Pending'"
                    >
                        <div class="flex justify-center">
                            <button
                                class="hover:text-red-700"
                                @click="cancelAppointment(appointment.id)"
                            >
                                Cancel
                            </button>
                        </div>
                    </td> -->
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
