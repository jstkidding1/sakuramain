<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <router-link class="ml-2" to="/vehicles"
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
                                            v-model="contact_num"
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
                                            v-model="address"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-1/2">
                                        <div class="flex">
                                            <label
                                                class="font-bold text-gray-700"
                                                >Date</label
                                            >
                                            <span
                                                class="ml-2 text-red-500"
                                                v-if="errors.date"
                                                >{{ errors.date[0] }}</span
                                            >
                                        </div>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            type="date"
                                            v-model="date"
                                        />
                                    </div>
                                </div>
                                <!-- <div class="flex">
                                    <div class="w-full">
                                        <div class="flex">
                                            <label
                                                class="font-bold text-gray-700"
                                                >Any thoughts?</label
                                            >
                                            <span
                                                class="ml-2 text-red-500"
                                                v-if="errors.comments"
                                                >{{ errors.comments[0] }}</span
                                            >
                                        </div>
                                        <textarea
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                            cols="30"
                                            rows="10"
                                            v-model="comments"
                                        ></textarea>
                                    </div>
                                </div> -->
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
                                <!-- <VueLoadingButton
                                    aria-label="Submit Reservation"
                                    class="bg-indigo-500 p-2 text-white font-sans font-bold text-md hover:bg-indigo-600"
                                    @click.native="submitReservation"
                                    :loading="isLoading"
                                    :styled="style"
                                    >Submit Reservation</VueLoadingButton
                                > -->
                                <div class="flex justify-end">
                                    <button
                                        v-if="isLogged"
                                        @click="submitAppointment"
                                        class="bg-indigo-500 p-2 text-white font-sans font-bold text-md hover:bg-indigo-600"
                                    >
                                        Submit now
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
export default {
    props: ['aid'],
    data() {
        return {
            user: null,
            date: '',
            contact_num: '',
            address: '',
            isLogged: null,
            service: [],
            termsState: false,
            validated: false,
            errors: []
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
            this.validated = true;

            axios
                .post('/api/appointments/', {
                    date: this.date,
                    contact_num: this.contact_num,
                    address: this.address,
                    service: this.service.id
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Appointment Sent Successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                        this.$router.push({ name: 'appointment-confirmation' });
                        console.log(response.data);
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
