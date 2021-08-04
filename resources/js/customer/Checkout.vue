<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <router-link class="ml-2" to="/auto-parts"
                            >All Products</router-link
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
                                name: 'single-product',
                                params: { id: product.id }
                            }"
                            aria-current="page"
                            >View Product</router-link
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
                        <router-link to="/checkout" aria-current="page"
                            >Order Product</router-link
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
                            You need to login
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
                <div class="flex justify-center">
                    <div class="w-4/6 mr-2 mt-4">
                        <div class="bg-white border-2 shadow-md p-4 w-full">
                            <h4
                                class="font-sans text-lg font-bold text-gray-800 mb-4"
                            >
                                You need to fill the form
                            </h4>
                            <div class="space-y-4">
                                <div class="flex mb-8">
                                    <img
                                        :src="product.image"
                                        class="w-72 h-72 object-cover"
                                    />
                                    <div class="ml-40">
                                        <!-- <div class="space-y-2"> -->
                                        <h1
                                            class="text-lg font-sans font-bold text-gray-800"
                                        >
                                            {{ product.product_name }}
                                            {{ product.product_brand }}
                                        </h1>
                                        <div class="flex">
                                            <p
                                                class="text-lg font-sans font-bold text-indigo-600"
                                            >
                                                ₱
                                                {{
                                                    product.price.toLocaleString()
                                                }}
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <p
                                                class="hover:cursor-pointer py-3 text-gray-600 leading-6"
                                            >
                                                {{ product.description }}
                                            </p>
                                        </div>
                                        <div class="flex items-center">
                                            <p
                                                class="hover:cursor-pointer py-3 text-gray-600 leading-6 mr-2"
                                            >
                                                Available Units:
                                                {{ product.units }}
                                            </p>
                                        </div>
                                        <div class="flex items-center">
                                            <p
                                                class="hover:cursor-pointer py-3 text-gray-600 leading-6 mr-2"
                                            >
                                                Quantity
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <!-- <button
                                                    @click="quantity--"
                                                    class="bg-gray-200 py-2 px-3 hover:bg-gray-300"
                                                >
                                                    <i class="fas fa-minus"></i>
                                                </button> -->
                                            <input
                                                type="number"
                                                name="units"
                                                min="1"
                                                :max="product.units"
                                                class="w-1/3focus:bg-white border-2 border-gray-600 p-2 rounded outline-none focus:border-indigo-500"
                                                v-model="quantity"
                                                @change="checkUnits"
                                            />
                                            <!-- <button
                                                    @click="quantity++"
                                                    class="bg-gray-200 py-2 px-3 hover:bg-gray-300"
                                                >
                                                    <i class="fas fa-plus"></i>
                                                </button> -->
                                        </div>
                                        <div class="flex items-center mt-5">
                                            <p
                                                class="text-lg font-sans font-bold text-gray-800 mr-2"
                                            >
                                                Total:
                                            </p>
                                            <p
                                                class="text-lg font-sans font-bold text-gray-800 mr-2"
                                            >
                                                ₱
                                                {{ quantity * product.price }}
                                            </p>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
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
                                <form @submit="placeOrder">
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
                                                    >{{
                                                        errors.address[0]
                                                    }}</span
                                                >
                                            </div>
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                                type="text"
                                                v-model="address"
                                            />
                                        </div>
                                    </div>
                                    <div class="flex mt-4">
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
                                                    required
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
                                </form>

                                <div class="flex justify-end">
                                    <button
                                        v-if="isLogged"
                                        @click="placeOrder"
                                        class="bg-indigo-500 p-2 text-white font-sans font-bold text-md hover:bg-indigo-600"
                                    >
                                        Buy now
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
    props: ['pid'],
    data() {
        return {
            // min: 1,
            user: null,
            address: '',
            contact_num: '',
            quantity: 1,
            isLogged: null,
            termsState: false,
            validated: false,
            product: [],
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        this.getProducts();
        this.getUser();
    },
    computed: {
        termsError() {
            return this.validated && !this.termsState;
        }
    },
    methods: {
        getProducts() {
            axios
                .get(`/api/products/${this.pid}`)
                .then(response => {
                    this.product = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
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
        placeOrder(e) {
            e.preventDefault();
            this.validated = true;

            axios
                .post('api/orders/', {
                    address: this.address,
                    contact_num: this.contact_num,
                    quantity: this.quantity,
                    product: this.product.id
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Order Sent Successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                        this.$router.push({ name: 'confirmation' });
                        console.log(response.data);
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        checkUnits(e) {
            if (this.quantity > this.product.units) {
                this.quantity = this.product.units;
            }
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
