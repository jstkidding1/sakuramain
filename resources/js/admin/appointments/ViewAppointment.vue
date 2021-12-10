<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 h-full rounded shadow-md mt-10">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/appointments"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/appointments"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Appointment List
                            </router-link>
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
                                :to="{
                                    name: 'view-appointment',
                                    params: { id: appointment.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >View Appointment</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Personal Information
                    </h1>
                </div>
                <div class="flex py-2 px-3 mt-2 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Name:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.user.fname }}
                        {{ appointment.user.mname }}
                        {{ appointment.user.lname }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Email:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.user.email }}
                    </p>
                </div>
                <div class="flex py-2 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Address:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.user.address }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Contact Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.user.contact_num }}
                    </p>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Car Information
                    </h1>
                </div>
                <div class="flex py-1 px-3 mt-2 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Car Model:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.car_model }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Plate Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.plate_number }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Engine Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.engine_number }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Chassis Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.chassis_number }}
                    </p>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Appointment Information
                    </h1>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Date:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.date }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Time:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.time }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Submitted:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ appointment.created_at | date }}
                    </p>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Status:
                    </p>
                    <select
                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        v-model="appointment.status"
                    >
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Checked">Checked</option>
                        <option value="Declined">Declined</option>
                        <option value="In Progress">In Progress</option>
                    </select>
                </div>

                <div class="flex px-3 py-2 mt-6">
                    <button
                        @click="toggleDate = !toggleDate"
                        class="px-10 py-2 bg-green-500 rounded-lg font-bold text-gray-800"
                    >
                        Add Date
                    </button>
                </div>
                <div v-if="toggleDate">
                    <div class="flex px-3 mt-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Start Time:
                        </p>
                        <!-- <input
                            type="time"
                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="appointment.start_time"
                        /> -->
                        <select
                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="appointment.start_time"
                        >
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                        </select>
                    </div>
                    <div class="flex px-3 mt-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Approximate End Time:
                        </p>
                        <!-- <input
                            type="time"
                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="appointment.end_time"
                        /> -->
                        <select
                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="appointment.end_time"
                        >
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                        </select>
                    </div>
                </div>
                <div class="flex px-3 py-2 mt-10 mb-20">
                    <div class="flex justify-start">
                        <button
                            @click="updateStatus"
                            :disabled="loading"
                            class="flex items-center bg-blue-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-blue-600 transition duration-300"
                        >
                            <svg
                                v-if="loading"
                                class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                style="border-right-color: white; border-top-color: white;"
                                viewBox="0 0 24 24"
                            ></svg>
                            <span v-if="loading">Please wait..</span>
                            <span v-else>Update</span>
                        </button>
                        <button
                            @click="$router.go(-1)"
                            class="flex items-center border-2 border-gray-500 px-3 py-2 text-lg text-gray-500 rounded font-bold text-md hover:bg-gray-600 hover:text-gray-50 ml-2 transition duration-300"
                        >
                            <span>Cancel</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-96 mt-10 ml-4">
                <div class="bg-white rounded shadow-md">
                    <div class="flex py-4 px-3">
                        <h1 class="text-gray-700 font-bold text-lg">
                            Service Details
                        </h1>
                    </div>
                    <div class="flex py-2">
                        <div class="relative h-72 w-full overflow-hidden">
                            <img
                                :src="`/images/${appointment.service.image}`"
                                alt=""
                                class="absolute h-full w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold">
                            {{ appointment.service.service_name }}
                        </h1>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Description:
                            </p>
                        </div>
                        <div class="flex items-center px-3 pb-10">
                            <div v-html="appointment.service.description"></div>
                            <!-- <p
                                class="w-full text-sm text-gray-700 text-justify tracking-tight"
                            >
                                {{ appointment.service.description }}
                            </p> -->
                        </div>
                    </div>
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
            loading: false,
            toggleDate: false,
            appointment: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getAppointment();
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
            this.loading = true;

            // setTimeout(() => {
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
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        }
    }
};
</script>

<style></style>
