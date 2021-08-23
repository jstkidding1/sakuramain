<template>
    <div>
        <div class="container">
            <div v-if="isLogged">
                <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <img
                                src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                            />
                            <router-link class="ml-2" to="/all/services"
                                >All Services</router-link
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
                                    path: '/make/appointment/?aid=' + service.id
                                }"
                                aria-current="page"
                                >Make Appointment</router-link
                            >
                        </li>
                    </ol>
                </nav>
            </div>
            <div v-if="!isLogged">
                <div class="flex items-center justify-center">
                    <div class="p-16 mt-20 w-2/3 text-center">
                        <div
                            class="font-sans text-3xl font-bold mb-6 text-gray-800 font-semibold"
                        >
                            You need to login before making an appointment!
                        </div>
                        <div class="flex justify-between">
                            <button
                                class="w-1/2 bg-indigo-600 hover:bg-indigo-300 p-3 rounded text-gray-50 hover:text-gray-700 transition duration-300 mr-4"
                                @click="login"
                            >
                                Login
                            </button>
                            <button
                                class="w-1/2 bg-indigo-600 hover:bg-indigo-300 p-3 rounded text-gray-50 hover:text-gray-700 transition duration-300"
                                @click="register"
                            >
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isLogged">
                <div class="flex">
                    <div class="w-2/5">
                        <div
                            class="bg-white mx-auto shadow-md rounded-lg max-w-sm"
                        >
                            <div class="flex">
                                <img
                                    :src="service.image"
                                    :alt="service.service_name"
                                    class="h-72 w-full object-cover"
                                />
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
                                            <h1
                                                class="text-gray-800 text-justify leading-6"
                                            >
                                                {{ service.description }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-4/6">
                        <div class="bg-white shadow-md p-10 w-full">
                            <h4
                                class="font-sans text-md font-bold text-gray-600 mb-4"
                            >
                                You need to fill up the form
                            </h4>
                            <div class="flex">
                                <h5
                                    class="text-gray-800 font-bold tracking-tight italic"
                                >
                                    HEALTH AND SAFETY PROTOCOLS:
                                </h5>
                            </div>
                            <div class="flex mt-2 mb-4">
                                <p class="text-gray-800 text-md italic">
                                    To all our dear customers please be advised
                                    that we will implement a maximum customer
                                    capacity each day in response to the health
                                    protocols. Since we cannot serve you all at
                                    once we will have an online scheduling of
                                    appointments. There you can choose the type
                                    of service you want to avail and also the
                                    date and time, after that our staff will
                                    evaluate if there is an available time slot
                                    for you to be entertained immediately. And
                                    if there is an available time slot we will
                                    approve your request.
                                </p>
                            </div>
                            <div class="flex mb-2">
                                <p
                                    class="text-red-700 font-semibold text-md italic"
                                >
                                    NOTE:
                                </p>
                            </div>
                            <div class="flex mb-4">
                                <p
                                    class="text-red-700 font-semibold text-md italic"
                                >
                                    IF YOUR REQUEST IS NOT YET APPROVED. WE WILL
                                    NOT ATTEND TO YOUR PROBLEM. WE ARE VERY
                                    SORRY FOR THE INCONVENIENCE.
                                </p>
                            </div>
                            <div class="space-y-4">
                                <div class="flex space-x-2">
                                    <div class="w-2/6">
                                        <label
                                            class="block font-bold text-gray-700"
                                            >First name</label
                                        >
                                        <input
                                            class="w-full bg-gray-50 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="text"
                                            v-model="fname"
                                            disabled
                                        />
                                    </div>
                                    <div class="w-2/6">
                                        <label
                                            class="block font-bold text-gray-700"
                                            >Middle name</label
                                        >
                                        <input
                                            class="w-full bg-gray-50 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="text"
                                            v-model="mname"
                                            disabled
                                        />
                                    </div>
                                    <div class="w-2/6">
                                        <label
                                            class="block font-bold text-gray-700"
                                            >Last name</label
                                        >
                                        <input
                                            class="w-full bg-gray-50 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="text"
                                            v-model="lname"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-full">
                                        <label
                                            class="block font-bold text-gray-700"
                                            >Email</label
                                        >
                                        <input
                                            class="w-full bg-gray-50 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="email"
                                            v-model="user.email"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-1/2 mr-3">
                                        <div class="flex">
                                            <label
                                                class="font-bold text-gray-700"
                                                >Phone number
                                            </label>
                                            <span
                                                class="ml-2 text-red-500"
                                                v-if="errors.contact_num"
                                                >{{
                                                    errors.contact_num[0]
                                                }}</span
                                            >
                                        </div>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="text"
                                            v-model="form.contact_num"
                                        />
                                    </div>
                                    <div class="w-1/2">
                                        <div class="flex">
                                            <label
                                                class="font-bold text-gray-700"
                                                >Address</label
                                            >
                                            <span
                                                class="ml-2 text-red-500"
                                                v-if="errors.address"
                                                >{{ errors.address[0] }}</span
                                            >
                                        </div>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="text"
                                            v-model="form.address"
                                        />
                                    </div>
                                </div>
                                <div class="flex mt-4">
                                    <div class="w-1/2">
                                        <div class="flex">
                                            <label
                                                class="font-bold text-gray-700"
                                                >Date of visit</label
                                            >
                                            <!-- <span
                                                class="ml-2 text-red-500"
                                                v-if="errors.date"
                                                >{{ errors.date[0] }}</span
                                            > -->
                                        </div>
                                        <div class="flex">
                                            <!-- <vc-calendar
                                                :value="null"
                                                color="indigo"
                                                is-dark
                                                title-position="left"
                                                v-model="form.date"
                                                :min-date="new Date()"
                                            /> -->
                                            <datepicker
                                                :format="customDate"
                                                :inline="true"
                                                v-model="form.date"
                                                :disabledDates="disabledDates"
                                            ></datepicker>
                                        </div>
                                        <div class="flex mt-4">
                                            {{ form.date }}
                                        </div>
                                    </div>
                                    <div class="w-1/2">
                                        <div class="space-y-2">
                                            <div class="flex">
                                                <label
                                                    class="font-bold text-gray-700"
                                                    >Select Time</label
                                                >
                                            </div>

                                            <div class="flex">
                                                <select
                                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                                    v-model="form.time"
                                                >
                                                    <option
                                                        >07:00 - 08:00
                                                        AM</option
                                                    >
                                                    <option
                                                        >08:00 - 09:00
                                                        AM</option
                                                    >
                                                    <option
                                                        >09:00 - 10:00
                                                        AM</option
                                                    >
                                                    <option
                                                        >10:00 - 11:00
                                                        AM</option
                                                    >
                                                    <option
                                                        >11:00 - 12:00
                                                        PM</option
                                                    >
                                                    <option
                                                        >12:00 - 01:00
                                                        PM</option
                                                    >
                                                    <option
                                                        >01:00 - 02:00
                                                        PM</option
                                                    >
                                                    <option
                                                        >02:00 - 03:00
                                                        PM</option
                                                    >
                                                    <option
                                                        >03:00 - 04:00
                                                        PM</option
                                                    >
                                                    <option
                                                        >04:00 - 05:00
                                                        PM</option
                                                    >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center">
                                        <label
                                            for="terms"
                                            class="font-sans font-bold ml-2 block text-sm text-gray-900"
                                        >
                                            <input
                                                id="terms"
                                                name="terms"
                                                type="checkbox"
                                                class="mb-1.5"
                                                v-model="termsState"
                                                @change="handleTermState"
                                            />
                                            I agree to the
                                            <router-link
                                                to="#"
                                                class="font-sans text-indigo-600 hover:text-indigo-500 mr-1"
                                                >Terms</router-link
                                            >and
                                            <router-link
                                                to="#"
                                                class="font-sans text-indigo-600 hover:text-indigo-500"
                                                >Privacy Policy</router-link
                                            ></label
                                        >
                                        <span
                                            class="ml-2 mb-2 text-red-500"
                                            v-if="termsError"
                                            >You have to agree the terms and
                                            privacy policy.</span
                                        >
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button
                                        v-if="isLogged"
                                        @click="submitAppointment"
                                        class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import datepicker from 'vuejs-datepicker';
import moment from 'moment';

export default {
    props: ['aid'],
    components: { datepicker },
    data() {
        return {
            user: null,
            form: {
                contact_num: '',
                address: '',
                date: new Date(),
                time: ''
            },
            isLogged: null,
            service: [],
            termsState: false,
            validated: false,
            errors: [],
            disabledDates: {
                to: new Date(Date.now() - 8640000)
            },
            highlighted: {
                to: new Date(Date.now())
            },
            loading: false
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        this.getUser();
        this.getService();
    },
    computed: {
        termsError() {
            return this.validated && !this.termsState;
        }
    },
    methods: {
        customDate(date) {
            this.form.time = moment(date).format('YYYY-MM-DD');
        },
        getUser() {
            if (localStorage.getItem('jwt') != null) {
                this.user = JSON.parse(localStorage.getItem('user'));
                this.fname = this.user.fname;
                this.mname = this.user.mname;
                this.lname = this.user.lname;
                axios.defaults.headers.common['Content-Type'] =
                    'application/json';
                axios.defaults.headers.common['Authorization'] =
                    'Bearer ' + localStorage.getItem('jwt');
            }
        },
        getService() {
            axios
                .get(`/api/services/${this.aid}`)
                .then(response => {
                    this.service = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        login() {
            this.$router.push({
                name: 'login',
                params: { nextUrl: this.$router.fullPath }
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
