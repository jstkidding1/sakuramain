<template>
    <div>
        <div class="container mb-96">
            <div v-if="!isLogged">
                <div class="flex items-center justify-center mt-56">
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
                        <div class="bg-white w-full shadow-md">
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
                                            to="/auto-parts"
                                            >Auto Parts</router-link
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
                                                name: 'single-product',
                                                params: { id: product.id }
                                            }"
                                            style="text-decoration:none"
                                            class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                            aria-current="page"
                                            >{{ product.product_name }}
                                            {{ product.product_model }}
                                            {{
                                                product.product_brand
                                            }}</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="flex px-3 mt-4">
                                <h1 class="text-xl text-gray-800 font-bold">
                                    Checkout
                                </h1>
                            </div>
                            <div
                                class="flex items-center py-2 px-3 border-l-2 border-green-500 mt-4"
                            >
                                <p class="text-xs text-gray-600">
                                    Please enter your details and preferred
                                    address and we'll coordinate with the staff
                                    on your behalf. The staff will update your
                                    delivery.
                                </p>
                            </div>
                            <div class="flex px-3 mt-4">
                                <h1 class="text-xl text-gray-800 font-bold">
                                    Personal Information
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
                                    >Delivery Address
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
                                        v-model="contact_num"
                                    />
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    placeholder="Location"
                                    v-model="address"
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
                            <div class="flex px-3 py-2 mt-8">
                                <p class="text-xs text-gray-500">
                                    By clicking “Submit”, I agree that Sakura
                                    may communicate with me via text, or phone
                                    call. For more information on how we handle
                                    order information, please read our
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
                                        @click="placeOrder"
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
                            <div class="flex justify-center">
                                <router-link
                                    :to="{
                                        name: 'single-product',
                                        params: { id: product.id }
                                    }"
                                >
                                    <div class="h-96 w-full overflow-hidden">
                                        <img
                                            :src="`/images/${product.image}`"
                                            alt=""
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </router-link>
                            </div>
                            <div class="flex px-3 py-2">
                                <p class="text-lg text-gray-800 font-bold">
                                    {{ product.product_name }}
                                    {{ product.product_model }}
                                    {{ product.product_brand }}
                                </p>
                            </div>
                            <div class="flex px-3 py-2">
                                <p class="text-lg font-bold text-yellow-600">
                                    ₱
                                    {{ product.price.toLocaleString() }}
                                </p>
                            </div>
                            <div class="flex items-center px-3 py-2">
                                <p class="text-sm text-gray-500 mr-4">
                                    Quantity
                                </p>
                                <input
                                    type="number"
                                    name="units"
                                    :min="1"
                                    step="1"
                                    :max="product.units"
                                    class="w-1/3 focus:bg-white border-2 border-gray-600 p-2 rounded outline-none focus:border-gray-800 transition duration-300"
                                    v-model="quantity"
                                    @keydown="onKeydown"
                                    @change="checkUnits"
                                />
                                <p class="text-sm text-gray-500 ml-2">
                                    {{ product.units }} piece available.
                                </p>
                            </div>
                            <div class="flex px-3 py-2">
                                <span
                                    class="text-xs text-red-500"
                                    v-if="errors.quantity"
                                    >{{ errors.quantity[0] }}</span
                                >
                            </div>
                            <div class="flex px-3 py-2 mt-4">
                                <p class="w-1/5 text-sm text-gray-500 mr-4">
                                    Total
                                </p>
                                <p
                                    class="w-full text-sm font-sans font-bold text-gray-800"
                                >
                                    ₱
                                    {{ quantity * product.price }}
                                </p>
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
            user: null,
            address: '',
            contact_num: '',
            quantity: 1,
            isLogged: null,
            termsState: false,
            validated: false,
            loading: false,
            product: [],
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        axios
            .get(`/api/products/${this.pid}`)
            .then(response => {
                this.product = response.data;
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
        onKeydown(event) {
            const char = String.fromCharCode(event.keyCode);
            if (!/[0-9]/.test(char)) {
                event.preventDefault();
            }
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
        placeOrder(e) {
            e.preventDefault();
            this.validated = true;
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
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
            }, 2000);
        },
        checkUnits(e) {
            if (this.quantity > this.product.units) {
                this.quantity = this.product.units;
            }
        }
    }
};
</script>

<style></style>
