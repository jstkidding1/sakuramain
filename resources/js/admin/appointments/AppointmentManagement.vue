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
                                    to="/appointments"
                                    >Appointment Management</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 font-semibold"
                    >
                        Appointment Management
                    </div>
                    <div class="flex justify-end mt-10">
                        <input
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            placeholder="Search product..."
                        />
                    </div>
                    <table class="w-full mt-4 table-hover">
                        <thead class="bg-white">
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                            >
                                <th class="px-4 py-3">Customer name</th>
                                <th class="px-4 py-3">Service</th>
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
                                <td
                                    class="px-4 py-3 text-ms font-semibold border"
                                >
                                    {{ appointment.user.fname }}
                                    {{ appointment.user.mname }}
                                    {{ appointment.user.lname }}
                                </td>
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
                                <td class="text-center px-2 py-3 border">
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'view-appointment',
                                                params: { id: appointment.id }
                                            }"
                                            class="w-4 mr-4 transform hover:text-yellow-600 hover:scale-110 transition duration-300"
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
                                            @click="
                                                deleteAppointment(
                                                    appointment.id
                                                )
                                            "
                                            class="w-4 mr-4 transform hover:text-yellow-600 hover:scale-110 transition duration-300"
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
                                    colspan="9"
                                    align="center"
                                    class="text-gray-800 font-bold text-2xl mt-2 "
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
</template>

<script>
import moment from 'moment';

export default {
    data() {
        return {
            user: null,
            appointments: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getAppointments();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getAppointments() {
            axios
                .get('api/appointments')
                .then(response => {
                    this.appointments = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        approve(index) {
            let appointment = this.appointments[index];
            axios
                .patch(`/api/appointments/${appointment.id}/approved`)
                .then(response => {
                    this.appointments[index].is_approved = 1;
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
        deleteAppointment(id) {
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
                    axios.delete(`api/appointments/${id}`).then(response => {
                        this.getAppointments();
                    });
                    this.$swal(
                        'Deleted!',
                        'Appointment has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
