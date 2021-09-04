<template>
    <div>
        <div class="container">
            <div v-if="!isLogged">
                <div class="flex items-center justify-center">
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
            <div v-if="isLogged">
                <div class="flex justify-center">
                    <div class="w-2/5 mt-10">
                        <div class="bg-white shadow-md w-full">
                            <div class="flex py-3 px-3">
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
                                            class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                            to="/all/services"
                                            >All Services</router-link
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
                                        <button
                                            class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                                        >
                                            Make Appointment
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex px-3 mt-4">
                                <h1 class="text-xl text-gray-800 font-bold">
                                    Make Appointment
                                </h1>
                            </div>
                            <div
                                class="flex items-center py-2 px-3 border-l-2 border-green-500 mt-4"
                            >
                                <p class="text-xs text-gray-600">
                                    Please enter your details and preferred date
                                    of appointment and we'll coordinate with the
                                    staff on your behalf. The staff will contact
                                    you in of your appointment.
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
                                    <span style="color:#ff0000">* </span></label
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
                                    >Your location in Philippines
                                    <span style="color:#ff0000">*</span>
                                </label>
                            </div>
                            <div class="flex px-3 space-x-2">
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    placeholder="Phone Number"
                                    v-model="form.contact_num"
                                />
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
                                    <span style="color:#ff0000">*</span></label
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
                                    By clicking “Submit”, I agree that Sakura
                                    may communicate with me via text, or phone
                                    call. For more information on how we handle
                                    personal information, please read our
                                    <a
                                        href="/terms"
                                        style="text-decoration:none;"
                                        class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                                    >
                                        privacy policy.
                                    </a>
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
                                    <button
                                        @click="$router.go(-1)"
                                        class="flex items-center border-2 border-gray-500 px-3 py-2 text-lg text-gray-500 rounded font-bold text-md hover:bg-gray-600 hover:text-gray-50 ml-2 transition duration-300"
                                    >
                                        <span>Cancel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-96 mt-10 ml-4">
                        <div class="bg-white rounded shadow-md pb-4">
                            <div class="flex">
                                <router-link to="/all/services">
                                    <div
                                        class="relative overflow-hidden rounded-t-lg"
                                    >
                                        <div class="h-52 w-full">
                                            <img
                                                :src="
                                                    `/images/${service.image}`
                                                "
                                                alt=""
                                                class="h-full w-full object-cover transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
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
                </div>
            </div>
        </div>
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
                contact_num: '',
                address: '',
                date: new Date(),
                time: '',
                message: ''
            },
            isLogged: null,
            service: [],
            errors: [],
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
            this.form.date = moment(date).format('YYYY-MM-DD');
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
                        car_model: this.form.car_model,
                        plate_number: this.form.plate_number,
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
        },
        onfocusin() {
            setTimeout(ev => {
                this.$refs.dp1.isOpen || this.$refs.dp1.showCalendar(ev);
            }, 50);
        }
    }
};
</script>

<style></style>
