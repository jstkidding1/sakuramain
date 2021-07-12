<template>
    <div>
        <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <img
                        src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                    />
                    <router-link class="ml-2" to="/vehicles"
                        >All Vehicles</router-link
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
                    <router-link :to="{ name: 'view-cars' }" aria-current="page"
                        >View Car</router-link
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
                    <router-link to="/reservation" aria-current="page"
                        >Make Reservation</router-link
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
                        You need to login before making a reservation!
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
                <div class="w-4/6 mr-2">
                    <div class="bg-white border-2 shadow-md p-4 w-full">
                        <h4
                            class="font-sans text-lg font-bold text-gray-800 mb-4"
                        >
                            You need to fill the form
                        </h4>
                        <div class="space-y-4">
                            <div class="flex space-x-2">
                                <div class="w-2/6">
                                    <label class="block font-bold text-gray-700"
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
                                    <label class="block font-bold text-gray-700"
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
                                    <label class="block font-bold text-gray-700"
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
                                    <label class="block font-bold text-gray-700"
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
                                    <label class="block font-bold text-gray-700"
                                        >Phone number (optional)
                                    </label>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                        type="text"
                                        v-model="contact_num"
                                    />
                                </div>
                                <div class="w-1/2">
                                    <label class="block font-bold text-gray-700"
                                        >Address (optional)</label
                                    >
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                        type="text"
                                        v-model="address"
                                    />
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-full">
                                    <div class="flex">
                                        <label
                                            class="block font-bold text-gray-700"
                                            >Comments</label
                                        >
                                    </div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                        type="text"
                                        v-model="comments"
                                    />
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex items-center">
                                    <input
                                        id="terms"
                                        name="terms"
                                        type="checkbox"
                                        class="mb-1.5"
                                        v-model="toggle"
                                    />
                                    <label
                                        for="terms"
                                        class="font-sans font-bold ml-2 block text-sm text-gray-900"
                                        >I agree to the
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
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button
                                    v-if="isLogged"
                                    @click="submitReservation"
                                    class="bg-indigo-500 p-2 text-white font-sans font-bold text-md hover:bg-indigo-600 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                                >
                                    Reserve now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-2/5">
                    <div class="bg-white border-2 shadow-md p-10 w-full">
                        <div class="flex">
                            <div class="w-1/2">
                                <img
                                    :src="vehicle.image"
                                    class="w-52 h-52 object-cover"
                                />
                                <p
                                    class="text-lg font-sans font-bold mt-2 text-gray-700"
                                >
                                    ₱ {{ vehicle.price }}
                                </p>
                            </div>
                            <div class="w-1/2 ml-4">
                                <div class="flex">
                                    <div
                                        class="grid grid-flow-row auto-rows-max gap-1 mr-1"
                                    >
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Body type:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Mileage:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Fuel type:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Year:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Transmission:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Drive type:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Color:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Int. Color:
                                        </div>
                                        <div
                                            class="bg-gray-100 p-1 font-sans text-xs text-gray-700"
                                        >
                                            Engine:
                                        </div>
                                    </div>
                                    <div
                                        class="grid grid-flow-row auto-rows-max gap-1"
                                    >
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.body_type }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.mileage }} miles
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.fuel_type }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.year_model }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.transmission }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.drive_type }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.color }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.interior_color }}
                                        </div>
                                        <div
                                            class="bg-gray-50 p-1 font-sans text-xs font-bold"
                                        >
                                            {{ vehicle.engine }}
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
export default {
    props: ['vid'],
    data() {
        return {
            vehicle: [],
            user: null,
            isLogged: null,
            toggle: false,
            address: '',
            contact_num: '',
            comments: ''
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        axios
            .get(`api/vehicle/${this.vid}`)
            .then(response => {
                this.vehicle = response.data;
                console.log(response.data);
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
    methods: {
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
        submitReservation(e) {
            e.preventDefault();

            axios
                .post('api/reservations', {
                    address: this.address,
                    contact_num: this.contact_num,
                    comments: this.comments,
                    vehicle_id: this.vehicle.id
                })
                .then(response => {
                    console.log(response.data);
                })
                .then(response => {
                    this.$router.push({ name: 'customer-dashboard' });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
