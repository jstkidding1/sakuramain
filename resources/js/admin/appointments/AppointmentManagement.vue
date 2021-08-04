<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <router-link to="/admin/dashboard" class="ml-2"
                            >Dashboard</router-link
                        >
                        <!-- <a class="cursor-default" @click="$router.go(-1)"
                            >Dashboard</a
                        > -->
                        <svg
                            class="fill-current w-3 h-3 mx-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                        >
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                            />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <router-link to="/orders"
                            >Appointment Management</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="flex flex-wrap items-center justify-center">
                <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
                    <div
                        class="font-sans text-2xl font-bold mb-6 text-gray-800 font-semibold"
                    >
                        Appointment Management
                    </div>
                    <div class="flex justify-end pt-16">
                        <input
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            placeholder="Search product..."
                        />
                    </div>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Contact #</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody v-if="appointments && appointments.length > 0">
                            <tr
                                v-for="(appointment, index) in appointments"
                                :key="index"
                            >
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ appointment.user.fname }}
                                    {{ appointment.user.mname }}
                                    {{ appointment.user.lname }}
                                </td>
                                <td>{{ appointment.service.service_name }}</td>
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
                                <td
                                    class="text-center"
                                    v-if="appointment.is_approved == 0"
                                >
                                    <button
                                        class="bg-indigo-600 hover:bg-indigo-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-white transition duration-300"
                                        @click="approve(index)"
                                    >
                                        Approve
                                    </button>
                                </td>
                                <td
                                    class="text-center"
                                    v-if="appointment.is_approved"
                                >
                                    <button
                                        class="bg-indigo-600 p-2 rounded-lg text-gray-50 font-semibold opacity-50"
                                        @click="approve(index)"
                                        disabled
                                    >
                                        Approved
                                    </button>
                                </td>
                                <td class="flex justify-center">
                                    <router-link
                                        :to="{
                                            name: 'view-appointment',
                                            params: { id: appointment.id }
                                        }"
                                        style="text-decoration:none;"
                                        class="font-semibold bg-green-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                        ><i class="fas fa-eye mr-2"></i
                                        >View</router-link
                                    >
                                    <button
                                        @click="
                                            deleteAppointment(appointment.id)
                                        "
                                        class="font-semibold bg-red-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out"
                                    >
                                        <i class="far fa-trash-alt mr-2"></i
                                        >Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td
                                    colspan="9"
                                    align="center"
                                    class="font-sans text-2xl font-bold text-gray-800 text-center"
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
export default {
    data() {
        return {
            user: null,
            appointments: []
            // users: []
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
