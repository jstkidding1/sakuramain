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
                        <router-link to="/appointments"
                            >Appointment Management</router-link
                        >
                        <svg
                            class="fill-current w-3 h-3 mx-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                        >
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                            />
                        </svg>
                        <router-link
                            :to="{
                                name: 'view-appointment',
                                params: { id: appointment.id }
                            }"
                            aria-current="page"
                            >View Appointment</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white w-full rounded shadow-md p-4 mt-10">
                <div class="flex mt-4">
                    <div class="flex mr-4">
                        <div class="w-full">
                            <img
                                :src="appointment.service.image"
                                class="w-72 h-72 object-cover"
                            />
                        </div>
                    </div>
                    <div class="flex w-1/2">
                        <div class="p-4">
                            <div class="flex">
                                <h5
                                    class="font-sans font-bold text-lg text-gray-800 mr-2"
                                >
                                    Service Information
                                </h5>
                            </div>
                            <div class="flex mt-4">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Service Name:
                                </h5>
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ appointment.service.service_name }}
                                </h5>
                            </div>
                            <div class="flex mt-2">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Description:
                                </h5>
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ appointment.service.description }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 shadow-md mt-4">
                <div class="flex mb-4">
                    <h5 class="font-sans font-bold text-lg text-gray-800 mr-2">
                        User Information
                    </h5>
                </div>
                <div class="flex">
                    <h5 class="font-sans text-md text-gray-800 mr-2">
                        Name:
                    </h5>
                    <h5 class="font-sans font-bold text-md text-gray-800">
                        {{ appointment.user.fname }}
                        {{ appointment.user.mname }}
                        {{ appointment.user.lname }}
                    </h5>
                </div>
                <div class="flex mt-2">
                    <h5 class="font-sans text-md text-gray-800 mr-2">
                        Email:
                    </h5>
                    <h5 class="font-sans font-bold text-md text-gray-800">
                        {{ appointment.user.email }}
                    </h5>
                </div>
            </div>
            <div class="bg-white p-4 shadow-md mt-4">
                <div class="flex mb-4">
                    <h5 class="font-sans font-bold text-lg text-gray-800 mr-2">
                        Appointment Information
                    </h5>
                </div>
                <div class="space-y-2">
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Address:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ appointment.address }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Contact Number:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ appointment.contact_num }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Date:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ appointment.date }}
                        </h5>
                    </div>
                    <div class="flex">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Time:
                        </h5>
                        <h5 class="font-sans font-bold text-md text-gray-800">
                            {{ appointment.time }}
                        </h5>
                    </div>
                    <div class="flex items-center">
                        <h5 class="font-sans text-md text-gray-800 mr-2">
                            Status:
                        </h5>
                        <div class="w-1/4">
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="appointment.status"
                            >
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Checked">Checked</option>
                                <option value="Declined">Declined</option>
                                <option value="In Progress">In Progress</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex mt-4 justify-end">
                        <button
                            @click.prevent="updateStatus"
                            class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600"
                        >
                            <svg
                                v-if="loading"
                                class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                style="border-right-color: white; border-top-color: white;"
                                viewBox="0 0 24 24"
                            ></svg>
                            <span v-if="loading">Update</span>
                            <span v-else>Update</span>
                        </button>
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
            loading: false,
            appointment: {}
        };
    },
    beforeMount() {
        this.getUser();
        this.getAppointment();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getAppointment() {
            axios
                .get(`/api/appointments/${this.$route.params.id}`)
                .then(response => {
                    this.appointment = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        updateStatus() {
            this.loading = !false;

            setTimeout(() => {
                axios
                    .put(
                        `/api/appointments/${this.$route.params.id}`,
                        this.appointment
                    )
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Status has successfully updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({
                                name: 'appointment-management'
                            });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        }
    }
};
</script>

<style></style>
