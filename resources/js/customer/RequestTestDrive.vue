<template>
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
                                        class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
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
                                class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
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
                                to="/cars"
                                >All Cars</router-link
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
                                    name: 'get-car',
                                    params: {
                                        id: vehicle.id
                                    }
                                }"
                                class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                                style="text-decoration:none"
                                aria-current="page"
                            >
                                {{ vehicle.year_model }}
                                {{ vehicle.brand_name }}
                                {{ vehicle.model_type }}</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <hr class="sm:w-full lg:w-3/4" />
            </div>
        </div>
        <div v-if="isLogged" class="flex justify-center mt-6">
            <div
                class="md:flex no-wrap md:-mx-2 lg:space-x-10 lg:flex justify-center"
            >
                <div class="sm:w-full lg:w-2/5 bg-white rounded shadow-md">
                    <div class="flex px-3 py-3 mt-4">
                        <h1 class="text-xl text-gray-800 font-bold">
                            Request A Test Drive
                        </h1>
                    </div>
                    <div
                        class="flex items-center py-2 pl-3 pr-2 border-l-2 border-green-500 mt-4"
                    >
                        <p class="text-xs text-gray-600">
                            Want to test drive your dream car? We got you
                            covered, here in Sakura we strive to provide our
                            customers the best service possible. If you need to
                            get the feel of being in your dream car, we can
                            provide that. We know how can buying a car can
                            easily get confusing so we want to help by
                            eliminating some of the questions in your mind by
                            letting you feel the car for the first time.
                        </p>
                    </div>
                    <div class="flex py-4 px-3">
                        <h5 class="text-xl text-gray-900 font-bold">
                            Vehicle Information
                        </h5>
                    </div>
                    <div class="flex items-center justify-start px-3">
                        <img
                            :src="`/images/${vehicle.category.image}`"
                            class="h-14 w-14 mr-2"
                            alt=""
                        />
                        <router-link
                            :to="{
                                name: 'get-car',
                                params: {
                                    id: vehicle.id
                                }
                            }"
                            style="text-decoration:none"
                        >
                            <h5 class="text-gray-900 font-bold text-lg">
                                {{ vehicle.brand_name }}
                                {{ vehicle.model_type }}
                                {{ vehicle.body_type }}
                            </h5>
                        </router-link>
                    </div>
                    <div class="flex w-full px-3 mt-2">
                        <router-link
                            :to="{
                                name: 'get-car',
                                params: {
                                    id: vehicle.id
                                }
                            }"
                            style="text-decoration:none"
                            class="h-96 w-full overflow-hidden"
                        >
                            <img
                                :src="`/images/${vehicle.thumbnail}`"
                                :alt="vehicle.brand_name"
                                class="h-full w-full object-cover"
                            />
                        </router-link>
                    </div>
                    <div class="flex px-3 mt-4">
                        <h5 class="text-lg text-gray-900 font-bold">
                            {{ vehicle.brand_name }}
                            {{ vehicle.model_type }}
                            {{ vehicle.body_type }} Specifications
                        </h5>
                    </div>
                    <div class="flex justify-center">
                        <div class="grid grid-cols-4 gap-4 px-3 mt-4">
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/material-outlined/24/000000/calendar.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm"
                                    >{{ vehicle.year_model }} year model</span
                                >
                            </div>
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/material-outlined/24/000000/road.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm"
                                    >{{ vehicle.mileage }} mileage</span
                                >
                            </div>
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/external-those-icons-lineal-those-icons/24/000000/external-fuel-cars-components-those-icons-lineal-those-icons.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm">{{
                                    vehicle.fuel_type
                                }}</span>
                            </div>
                            <div class="flex inline-block">
                                <div class="h-7 w-7 mr-2">
                                    <img
                                        src="https://img.icons8.com/ios/50/000000/gear-stick.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm"
                                    >{{ vehicle.drive_type }}
                                </span>
                            </div>
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/material-outlined/24/000000/paint.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm">{{
                                    vehicle.color
                                }}</span>
                            </div>
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/external-those-icons-lineal-those-icons/24/000000/external-car-painting-cars-components-those-icons-lineal-those-icons.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm">{{
                                    vehicle.interior_color
                                }}</span>
                            </div>
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/material-outlined/24/000000/engine.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm">{{
                                    vehicle.engine
                                }}</span>
                            </div>
                            <div class="flex inline-block">
                                <div class="h-8 w-8 mr-2">
                                    <img
                                        src="https://img.icons8.com/material-outlined/24/000000/car.png"
                                    />
                                </div>
                                <span class="text-gray-700 text-sm">{{
                                    vehicle.body_type
                                }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex px-3 mt-4">
                        <span
                            class="w-full px-3 py-3 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                            v-if="errors.vehicle_id"
                            >{{ errors.vehicle_id[0] }}</span
                        >
                    </div>
                    <div class="px-3">
                        <hr />
                    </div>
                    <div class="flex pt-2 px-3 mt-2 space-x-2">
                        <label class="w-full font-bold text-md"
                            >Preferred Date
                            <span style="color:#ff0000">*</span></label
                        >
                        <label class="w-full">
                            <span class="font-bold text-md"
                                >Preferred Time</span
                            >
                            <span style="color:#ff0000">*</span>
                            <span
                                class="text-xs text-red-500"
                                v-if="errors.time"
                                >{{ errors.time[0] }}</span
                            >
                        </label>
                    </div>
                    <div class="flex px-3 space-x-2">
                        <input
                            type="date"
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.date"
                        />
                        <!-- <vc-date-picker
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
                                    class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    :value="inputValue"
                                    v-on="inputEvents"
                                />
                            </template>
                        </vc-date-picker> -->
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.time"
                        >
                            <option>Morning (Opening-12NN)</option>
                            <option>Afternoon (1PM-Closing)</option>
                        </select>
                    </div>
                    <div>
                        <div class="flex items-center pt-2 px-3 mt-2">
                            <label class="font-bold text-md mr-2"
                                >Add a comment
                            </label>
                            <label class="text-xs text-gray-500"
                                >(optional)</label
                            >
                        </div>
                        <div class="flex px-3 w-full py-2">
                            <textarea
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150 mb-10"
                                cols="30"
                                rows="11"
                                placeholder="Type comments here"
                                v-model="form.message"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <div class="sm:w-full lg:w-96">
                    <div class="bg-white shadow-md rounded py-4">
                        <div class="space-y-2">
                            <div class="flex justify-center px-3">
                                <h5 class="text-lg text-gray-900 font-bold">
                                    Personal Information
                                </h5>
                            </div>
                            <div class="flex justify-center mt-4">
                                <div class="h-32 w-32 rounded-full">
                                    <img
                                        :src="
                                            user.image
                                                ? `/images/${user.image}`
                                                : `/images/Avatar.png`
                                        "
                                        alt=""
                                        class="h-full w-full rounded-full"
                                    />
                                </div>
                            </div>
                            <div class="px-3 space-y-4 mt-4">
                                <div class="flex items-center px-3">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-blue-500 mr-3"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <p class="w-full text-sm text-gray-700">
                                        {{ user.fname }} {{ user.mname }}
                                        {{ user.lname }}
                                    </p>
                                </div>
                                <div class="flex items-center px-3">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-blue-500 mr-3"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                        />
                                        <path
                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                        />
                                    </svg>
                                    <p class="w-full text-sm text-gray-700">
                                        {{ user.email }}
                                    </p>
                                </div>
                                <div class="flex items-center px-3">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-blue-500 mr-3"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                                        />
                                    </svg>
                                    <p class="w-full text-sm text-gray-700">
                                        +63{{ user.contact_num }}
                                    </p>
                                </div>
                                <div class="flex items-center px-3">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-blue-500 mr-3"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                                        />
                                    </svg>
                                    <p class="w-full text-sm text-gray-700">
                                        {{ user.address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-md rounded my-2 p-2">
                        <div class="flex justify-center mt-2">
                            <p class="text-xs text-gray-500">
                                By clicking Submit you agree to our
                                <button
                                    @click="toggleModal = !toggleModal"
                                    class="text-blue-600 hover:text-blue-800 transition duration-300"
                                >
                                    terms
                                </button>
                                and
                                <button
                                    @click="toggleModal = !toggleModal"
                                    class="text-blue-600 hover:text-blue-800 transition duration-300"
                                >
                                    conditions.
                                </button>
                            </p>
                        </div>
                        <div class="flex justify-center px-3 py-2 mt-2">
                            <div class="flex justify-center">
                                <button
                                    @click="submitRequest"
                                    :disabled="loading"
                                    class="flex items-center bg-blue-700 px-20 py-3 text-lg text-white rounded font-bold text-md hover:bg-blue-600 transition duration-300"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loading">Please wait..</span>
                                    <span v-else>Request now</span>
                                </button>
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
    props: ['viq'],
    data() {
        return {
            user: null,
            vehicle: [],
            isLogged: null,
            loading: false,
            toggleModal: false,
            form: {
                date: '',
                time: '',
                message: ''
            },
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        axios
            .get(`/api/vehicle/${this.viq}`)
            .then(response => {
                this.vehicle = response.data;
                console.log(response.data);
            })
            .catch(error => {
                console.error(error);
            });
        if (localStorage.getItem('jwt') != null) {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Accept'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        }
    },
    methods: {
        // getUser() {
        //     if (localStorage.getItem('jwt') != null) {
        //         this.user = JSON.parse(localStorage.getItem('user'));
        //         this.fname = this.user.fname;
        //         this.mname = this.user.mname;
        //         this.lname = this.user.lname;
        //         this.email = this.user.email;
        //         axios.defaults.headers.common['Content-Type'] =
        //             'application/json';
        //         axios.defaults.headers.common['Authorization'] =
        //             'Bearer ' + localStorage.getItem('jwt');
        //     }
        // },
        // async getVehicle() {
        //     await axios
        //         .get(`/api/vehicle/${this.rid}`)
        //         .then(response => {
        //             this.vehicle = response.data;
        //             console.log(response.data);
        //         })
        //         .catch(error => {
        //             console.error(error);
        //         });
        // },
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
        submitRequest(e) {
            this.loading = true;

            axios
                .post('/api/tests', {
                    date: this.form.date,
                    time: this.form.time,
                    message: this.form.message,
                    vehicle_id: this.vehicle.id
                })
                // .then(response => {
                //     console.log(response.data.data);
                // })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Request Sent Successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                        this.$router.push({
                            name: 'request-confirmation'
                        });
                        console.log(response.data);
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            e.preventDefault();
        }
    }
};
</script>

<style></style>
