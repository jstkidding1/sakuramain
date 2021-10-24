<template>
    <div>
        <div class="container">
            <div v-if="!isLogged">
                <div class="flex flex-col h-screen">
                    <div class="flex items-center justify-center mt-52">
                        <div class="w-1/2 bg-white rounded shadow-md">
                            <div class="flex py-3 px-3">
                                <div class="w-full flex justify-start">
                                    <div class="flex inline-block">
                                        <button
                                            @click="$router.go(-1)"
                                            class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                                        >
                                            Return to Previous Page
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center px-3 py-4">
                                <h1 class="text-lg text-gray-700 font-bold">
                                    Login Required
                                </h1>
                            </div>
                            <div class="flex justify-center px-3 py-4">
                                <div class="flex justify-between space-x-4">
                                    <button
                                        @click="login"
                                        type="submit"
                                        class="flex items-center bg-gray-900 px-4 py-2 text-white rounded font-bold text-lg hover:bg-gray-500 transition duration-300"
                                    >
                                        <span>Login</span>
                                    </button>
                                    <button
                                        @click="register"
                                        type="submit"
                                        class="flex items-center bg-gray-900 px-4 py-2 text-white rounded font-bold text-lg hover:bg-gray-500 transition duration-300"
                                    >
                                        <span>Register</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isLogged">
                <div class="flex justify-center py-4">
                    <div class="sm:w-full lg:w-3/4 flex justify-between">
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
                                    class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                                    to="/"
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
                                    class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                                    to="/all/services"
                                    >Services</router-link
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
                                    :to="{
                                        name: 'make-appointment',
                                        params: {
                                            id: service.id
                                        }
                                    }"
                                    class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                                    style="text-decoration:none"
                                    aria-current="page"
                                >
                                    {{ service.service_name }}
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mb-10">
                    <hr class="sm:w-full lg:w-3/4" />
                </div>
            </div>
            <div v-if="isLogged">
                <div class="flex justify-center">
                    <div
                        class="md:flex no-wrap md:-mx-2 lg:space-x-10 lg:flex justify-center"
                    >
                        <div class="sm:w-full lg:w-2/5">
                            <div class="bg-white shadow-md w-full">
                                <div class="flex px-3 py-3 mt-4">
                                    <h1 class="text-xl text-gray-800 font-bold">
                                        Make Appointment
                                    </h1>
                                </div>
                                <div
                                    class="flex items-center py-2 px-3 border-l-2 border-green-500 mt-4"
                                >
                                    <p class="text-xs text-gray-600">
                                        Please enter your details and preferred
                                        date of appointment and we'll coordinate
                                        with the staff on your behalf. The staff
                                        will contact you in of your appointment.
                                    </p>
                                </div>
                                <div class="flex px-3 mt-4">
                                    <h1 class="text-xl text-gray-800 font-bold">
                                        Car Details
                                    </h1>
                                </div>
                                <div class="flex pt-2 px-3 mt-2 space-x-2">
                                    <label class="w-full font-bold text-md"
                                        >Car Model
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                    <label class="w-full font-bold text-md"
                                        >Plate Number
                                        <span style="color:#ff0000"
                                            >*
                                        </span></label
                                    >
                                </div>
                                <div class="flex px-3 space-x-2">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        placeholder="Car Model"
                                        v-model="form.car_model"
                                    />
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        placeholder="Plate Number"
                                        v-model="form.plate_number"
                                    />
                                </div>
                                <div class="flex w-full px-3">
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.car_model"
                                            >{{ errors.car_model[0] }}</span
                                        >
                                    </div>
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.plate_number"
                                            >{{ errors.plate_number[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="flex pt-2 px-3 mt-2 space-x-2">
                                    <label class="w-full font-bold text-md"
                                        >Engine Number
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                    <label class="w-full font-bold text-md"
                                        >Chassis Number
                                        <span style="color:#ff0000"
                                            >*
                                        </span></label
                                    >
                                </div>
                                <div class="flex px-3 space-x-2">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        placeholder="Engine Number"
                                        v-model="form.engine_number"
                                    />
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        placeholder="Chassis Number"
                                        v-model="form.chassis_number"
                                    />
                                </div>
                                <div class="flex w-full px-3">
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.engine_number"
                                            >{{ errors.engine_number[0] }}</span
                                        >
                                    </div>
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.chassis_number"
                                            >{{
                                                errors.chassis_number[0]
                                            }}</span
                                        >
                                    </div>
                                </div>
                                <div class="flex px-3 mt-14">
                                    <h1 class="text-xl text-gray-800 font-bold">
                                        Personal Details
                                    </h1>
                                </div>
                                <div class="flex py-2 px-3 mt-2">
                                    <div class="grid grid-cols-3 gap-x-4">
                                        <label class="font-bold text-md"
                                            >First Name
                                        </label>
                                        <label class="font-bold text-md"
                                            >Middle Name
                                        </label>
                                        <label class="font-bold text-md"
                                            >Last Name
                                        </label>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="fname"
                                            disabled
                                        />
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="mname"
                                            disabled
                                        />
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="lname"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="flex pt-2 px-3 mt-2">
                                    <label class="w-full font-bold text-md"
                                        >Email Address
                                    </label>
                                </div>
                                <div class="flex pb-2 px-3">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="user.email"
                                        disabled
                                    />
                                </div>
                                <div class="flex pt-2 px-3 mt-2 space-x-2">
                                    <label class="w-full font-bold text-md"
                                        >Phone Number
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                    <label class="w-full font-bold text-md"
                                        >Your location in Cebu
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                </div>
                                <div class="flex px-3 space-x-2">
                                    <div class="relative w-full">
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center pl-2"
                                        >
                                            <p
                                                class="text-gray-500 text-md font-bold"
                                            >
                                                +63
                                            </p>
                                        </span>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            placeholder="Phone Number"
                                            v-model="form.contact_num"
                                        />
                                    </div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        placeholder="Location"
                                        v-model="form.address"
                                    />
                                </div>
                                <div class="flex w-full px-3">
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.contact_num"
                                            >{{ errors.contact_num[0] }}</span
                                        >
                                    </div>
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.address"
                                            >{{ errors.address[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="flex pt-2 px-3 mt-2 space-x-2">
                                    <label class="w-full font-bold text-md"
                                        >Preferred Date
                                        <span style="color:#ff0000"
                                            >*</span
                                        ></label
                                    >
                                    <label class="w-full font-bold text-md"
                                        >Preferred Time
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                </div>
                                <div class="flex px-3 space-x-2">
                                    <vc-date-picker
                                        class="w-full"
                                        :min-date="new Date()"
                                        v-model="form.date"
                                    >
                                        <template
                                            v-slot="{
                                                inputValue,
                                                inputEvents
                                            }"
                                        >
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                :value="inputValue"
                                                v-on="inputEvents"
                                            />
                                        </template>
                                    </vc-date-picker>
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        v-model="form.time"
                                    >
                                        <option>Morning (Opening-12NN)</option>
                                        <option>Afternoon (1PM-Closing)</option>
                                    </select>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.date"
                                            >{{ errors.date[0] }}</span
                                        >
                                    </div>
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.time"
                                            >{{ errors.time[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="flex pt-2 px-3 mt-2">
                                    <label class="font-bold text-md"
                                        >Message
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                </div>
                                <div class="flex px-3 w-full">
                                    <textarea
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        cols="30"
                                        rows="5"
                                        placeholder="Type comments here"
                                        v-model="form.message"
                                    ></textarea>
                                </div>
                                <div class="flex w-full px-3">
                                    <div class="w-1/2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.message"
                                            >{{ errors.message[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="flex px-3 py-2 mt-8">
                                    <p class="text-xs text-gray-500">
                                        By clicking “Submit”, I agree that
                                        Sakura may communicate with me via text,
                                        or phone call. For more information on
                                        how we handle personal information,
                                        please read our
                                        <button
                                            @click="toggleModal = !toggleModal"
                                            class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                                        >
                                            terms
                                        </button>
                                        and
                                        <button
                                            @click="toggleModal = !toggleModal"
                                            class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                                        >
                                            conditions.
                                        </button>
                                    </p>
                                </div>
                                <div class="flex px-3 py-2 mt-2">
                                    <div class="flex justify-start mb-20">
                                        <button
                                            @click="submitAppointment"
                                            :disabled="loading"
                                            class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                                        >
                                            <svg
                                                v-if="loading"
                                                class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                                style="border-right-color: white; border-top-color: white;"
                                                viewBox="0 0 24 24"
                                            ></svg>
                                            <span v-if="loading"
                                                >Please wait..</span
                                            >
                                            <span v-else>Submit</span>
                                        </button>
                                        <router-link
                                            to="/all/services"
                                            style="text-decoration:none"
                                            class="flex items-center border-2 border-gray-500 px-3 py-2 text-lg text-gray-500 rounded font-bold text-md hover:bg-gray-600 hover:text-gray-50 ml-2 transition duration-300"
                                        >
                                            <span>Cancel</span>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-full lg:w-96 mt-10 lg:ml-4">
                            <div class="bg-white rounded shadow-md pb-4">
                                <div class="flex w-full">
                                    <router-link to="/all/services">
                                        <div
                                            class="relative overflow-hidden rounded-t-lg"
                                        >
                                            <div class="h-72 w-full">
                                                <img
                                                    :src="
                                                        `/images/${service.image}`
                                                    "
                                                    alt=""
                                                    class="h-full w-full"
                                                />
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="h-auto">
                                    <div class="p-4">
                                        <div class="space-y-2">
                                            <div class="w-full">
                                                <h1
                                                    class="text-gray-800 font-bold leading-6"
                                                >
                                                    {{ service.service_name }}
                                                </h1>
                                            </div>
                                            <div class="w-full">
                                                <div
                                                    v-html="service.description"
                                                ></div>
                                                <!-- <h1
                                                    class="text-gray-800 text-justify leading-6"
                                                >
                                                    {{ service.description }}
                                                </h1> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50"
            v-if="toggleModal"
        >
            <div class="relative mx-auto w-auto max-w-2xl">
                <div class="w-full h-full flex flex-col">
                    <div class="flex justify-end p-2 overflow-hidden">
                        <button @click="toggleModal = false">
                            <svg
                                class="fill-current h-10 w-10 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 18 18"
                            >
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex">
                        <div class="bg-white px-3 py-2">
                            <div class="flex mt-4">
                                <h2
                                    class="text-gray-800 text-lg font-bold tracking-widest"
                                >
                                    SAKURA AUTOPARTS TRADING CORPORATION
                                </h2>
                            </div>
                            <div class="flex mt-2">
                                <p class="text-gray-600 text-xs">
                                    Notice of Data Privacy Compliance with Data
                                    Privacy Act of 2012 and Its Implementing
                                    Rules and Regulations
                                </p>
                            </div>
                            <div class="flex mt-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    Sakura AutoParts Trading Corporation is
                                    committed to ensuring the confidentiality of
                                    your information under Republic Act No.
                                    10173 or the “Data Privacy Act of 2012” and
                                    will exert reasonable efforts to protect
                                    against its unauthorized use or disclosure.
                                </p>
                            </div>
                            <div class="flex mt-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    In compliance with the requirements of the
                                    Data Privacy Act and its implementing rules
                                    and regulations, we would like to inform you
                                    how we handle and protect the data you
                                    provide in the course of your transaction/s
                                    with Sakura AutoParts Trading Corporations
                                    and its dealers.
                                </p>
                            </div>
                            <div class="flex mt-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    These data, which include your personal or
                                    sensitive personal information, may be
                                    collected, processed, stored, updated, or
                                    disclosed by Sakura AutoPart Trading
                                    Corporation and its dealers (i) for
                                    legitimate purposes, (ii) to implement
                                    transactions which you request, allow, or
                                    authorize, (iii) to comply with Sakura
                                    AutoParts Trading Corporation and its
                                    dealers’ internal policies and its reporting
                                    obligations to governmental authorities
                                    under applicable laws.
                                </p>
                            </div>
                            <div class="flex mt-10 mb-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    By patronizing Sakura AutoParts Trading
                                    Corporation products and services, you
                                    hereby grant your express and continuing
                                    consent to allow us to process your personal
                                    information and use it as may deem
                                    necessary.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            v-if="toggleModal"
            class="absolute z-40 inset-0 opacity-75 bg-black"
        ></div>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    props: ['aid'],
    data() {
        return {
            user: null,
            form: {
                car_model: '',
                plate_number: '',
                engine_number: '',
                chassis_number: '',
                contact_num: '',
                address: '',
                date: new Date(),
                time: '',
                message: ''
            },
            isLogged: null,
            toggleModal: false,
            service: [],
            errors: [],
            loading: false
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        axios
            .get(`/api/services/${this.aid}`)
            .then(response => {
                this.service = response.data;
            })
            .catch(error => {
                console.error(error);
            });
        if (localStorage.getItem('jwt') != null) {
            this.user = JSON.parse(localStorage.getItem('user'));
            this.fname = this.user.fname;
            this.mname = this.user.mname;
            this.lname = this.user.lname;
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        }
    },
    computed: {
        termsError() {
            return this.validated && !this.termsState;
        }
    },
    methods: {
        customDate(date) {
            this.form.date = moment(date).format('YYYY-MM-DD');
        },
        login() {
            this.$router.push({
                name: 'login',
                params: { nextUrl: this.$route.fullPath }
            });
        },
        register() {
            this.$router.push({
                name: 'register',
                params: { nextUrl: this.$route.fullPath }
            });
        },
        submitAppointment(e) {
            e.preventDefault();
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .post('/api/appointments/', {
                        date: (this.form.date = moment(
                            this.form.start_date
                        ).format('YYYY-MM-DD')),
                        time: this.form.time,
                        contact_num: this.form.contact_num,
                        address: this.form.address,
                        car_model: this.form.car_model,
                        plate_number: this.form.plate_number,
                        engine_number: this.form.engine_number,
                        chassis_number: this.form.chassis_number,
                        message: this.form.message,
                        service: this.service.id
                    })
                    .then(response => {
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Appointment Sent Successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(response => {
                            this.$router.push({
                                name: 'appointment-confirmation'
                            });
                            console.log(response.data);
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
