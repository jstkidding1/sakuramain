<template>
    <div>
        <div class="flex flex-col h-screen">
            <main class="relative inset-0">
                <nav class="bg-white sm:w-full shadow-sm sticky top-0 z-40">
                    <div class="px-4">
                        <div class="flex justify-between">
                            <div class="flex space-x-10">
                                <div class="flex items-center">
                                    <router-link
                                        to="/"
                                        style="text-decoration:none"
                                    >
                                        <img
                                            src="/images/sakuralogooo.png"
                                            alt=""
                                            class="h-24 w-64 overflow-hidden object-cover"
                                        />
                                    </router-link>
                                </div>
                            </div>
                            <div class="hidden md:flex items-center space-x-2">
                                <router-link
                                    to="/cars"
                                    style="text-decoration:none"
                                    class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    Cars</router-link
                                >
                                <router-link
                                    to="/auto-parts"
                                    style="text-decoration:none"
                                    class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    Auto-parts</router-link
                                >
                                <router-link
                                    to="/all/services"
                                    style="text-decoration:none"
                                    class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    Services</router-link
                                >
                                <router-link
                                    to="/pictures"
                                    style="text-decoration:none"
                                    class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    Gallery</router-link
                                >
                                <router-link
                                    to="/aboutus"
                                    style="text-decoration:none"
                                    class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    About us</router-link
                                >
                            </div>

                            <div class="hidden sm:flex items-center space-x-5">
                                <router-link
                                    to="/login"
                                    v-if="!isLogged"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    Login
                                </router-link>
                                <router-link
                                    to="/register"
                                    v-if="!isLogged"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-blue-600 rounded text-md font-bold transition duration-300 uppercase"
                                >
                                    Register
                                </router-link>
                                <div
                                    v-if="isLogged"
                                    class="relative inline-block dropdown flex items-center space-x-2"
                                >
                                    <h5
                                        v-if="admin == 1"
                                        class="capitalize font-sans text-gray-700 py-2 px-3 rounded text-md font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <h5
                                        v-if="secretary == 1"
                                        class="capitalize font-sans text-gray-700 py-2 px-3 rounded text-md font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <h5
                                        v-if="manager == 1"
                                        class="capitalize font-sans text-gray-700 py-2 px-3 rounded text-md font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <h5
                                        v-if="customer == 1"
                                        class="capitalize font-sans text-gray-700 py-2 px-3 rounded text-md font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <button
                                        @click="showDropDown = !showDropDown"
                                        class="relative rounded-md focus:outline-none transition duration-300 ease-in-out"
                                    >
                                        <div
                                            class="flex justify-center items-center"
                                        >
                                            <div
                                                class="h-10 w-10 rounded-full overflow-hidden focus:outline-none focus:border-white"
                                            >
                                                <img
                                                    :src="
                                                        image
                                                            ? `/images/${image}`
                                                            : avatar
                                                    "
                                                    alt=""
                                                    class="h-full w-full object-cover"
                                                />
                                            </div>
                                            <svg
                                                class="ml-2 h-4 w-4 text-gray-700"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                    </button>
                                    <div
                                        v-show="showDropDown"
                                        @click="showDropDown = false"
                                        class="fixed inset-0 h-full w-full transition duration-300"
                                    ></div>

                                    <div
                                        v-show="showDropDown"
                                        class="absolute mt-80 py-2 w-48 bg-white rounded-md shadow-xl divide-y divide-gray-100 z-20 transition duration-300"
                                    >
                                        <div class="px-4 py-3">
                                            <p class="text-sm leading-5">
                                                Signed in as
                                            </p>
                                            <p
                                                class="text-sm font-medium leading-5 text-gray-900 truncate"
                                            >
                                                {{ email }}
                                            </p>
                                        </div>
                                        <div class="py-1">
                                            <router-link
                                                to="/admin/dashboard"
                                                v-if="admin == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                                            >
                                                Dashboard</router-link
                                            >
                                            <router-link
                                                to="/secretary/dashboard"
                                                v-if="secretary == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                                            >
                                                Dashboard</router-link
                                            >
                                            <router-link
                                                to="/manager/dashboard"
                                                v-if="manager == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                                            >
                                                Dashboard</router-link
                                            >
                                            <router-link
                                                to="/dashboard"
                                                v-if="customer == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                                            >
                                                Dashboard</router-link
                                            >
                                            <router-link
                                                :to="{
                                                    name: 'user-profile',
                                                    params: { id: id }
                                                }"
                                                style="text-decoration:none;"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                                            >
                                                My profile
                                            </router-link>
                                        </div>
                                        <div class="py-1">
                                            <button
                                                v-if="isLogged"
                                                @click="logout"
                                                class="text-gray-700 flex items-center justify-start w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                                            >
                                                Sign out
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:hidden flex items-center">
                                <button @click="showMenu ^= true">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div v-show="showMenu" class="md:hidden">
                        <router-link
                            :to="{ name: 'view-cars' }"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >Cars</router-link
                        >
                        <router-link
                            :to="{ name: 'auto-parts' }"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >Products</router-link
                        >
                        <router-link
                            :to="{ name: 'services' }"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >Services</router-link
                        >
                        <router-link
                            :to="{ name: 'gallery' }"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >Gallery</router-link
                        >
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >About us</router-link
                        >
                        <router-link
                            :to="{
                                name: 'user-profile',
                                params: { id: id }
                            }"
                            style="text-decoration:none;"
                            class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-blue-600 transition duration-150"
                        >
                            My profile
                        </router-link>
                        <hr />
                        <router-link
                            to="/login"
                            v-if="!isLogged"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >Login</router-link
                        >
                        <router-link
                            to="/register"
                            v-if="!isLogged"
                            style="text-decoration:none"
                            class="block py-2 px-4 text-sm hover:bg-gray-200"
                            >Register</router-link
                        >
                        <div v-if="isLogged">
                            <router-link
                                :to="{ name: 'admin-dashboard' }"
                                v-if="admin == 1"
                                style="text-decoration:none"
                                class="font-sans text-gray-700 py-2 px-3 rounded"
                                >Welcome, {{ fname }}</router-link
                            >
                            <router-link
                                :to="{ name: 'secretary-dashboard' }"
                                v-if="secretary == 1"
                                style="text-decoration:none"
                                class="font-sans text-gray-700 py-2 px-3 rounded"
                                >Welcome, {{ fname }}</router-link
                            >
                            <router-link
                                :to="{ name: 'manager-dashboard' }"
                                v-if="manager == 1"
                                style="text-decoration:none"
                                class="font-sans text-gray-700 py-2 px-3 rounded"
                                >Welcome, {{ fname }}</router-link
                            >
                            <router-link
                                :to="{ name: 'customer-dashboard' }"
                                v-if="customer == 1"
                                style="text-decoration:none"
                                class="font-sans text-gray-700 py-2 px-3 rounded"
                                >Welcome, {{ fname }}</router-link
                            >
                            <button
                                v-if="isLogged"
                                @click="logout"
                                class="font-sans text-gray-700 py-2 px-3 rounded hover:bg-red-700 hover:text-white"
                            >
                                Logout
                            </button>
                        </div>
                    </div>
                </nav>
                <div class="mb-auto">
                    <router-view @isLogged="change"> </router-view>
                </div>
                <footer class="relative bg-gray-900">
                    <div
                        class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-center"
                    >
                        <div class="p-5 w-48 ">
                            <div
                                class="text-md uppercase text-gray-50 font-medium"
                            >
                                Home
                            </div>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/cars"
                                >Cars </a
                            ><a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/auto-parts"
                                >Auto Parts </a
                            ><a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/all/services"
                                >Services </a
                            ><a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/pictures"
                                >Gallery
                            </a>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/aboutus"
                                >About us
                            </a>
                        </div>
                        <!-- <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                User
                            </div>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/login"
                                >Sign in
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span></a
                            ><a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/register"
                                >New Account
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                        </div> -->
                        <div class="p-5 w-48 ">
                            <div
                                style="text-decoration:none;"
                                class="text-md uppercase text-gray-50 font-medium"
                            >
                                Cars
                            </div>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/cars"
                                >Reservation
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/cars"
                                >Inquiry
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/cars"
                                >Request Quotation
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/cars"
                                >Request A Test Drive
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                class="text-md uppercase text-gray-50 font-medium"
                            >
                                Product
                            </div>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/auto-parts"
                                >Our Products
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                style="text-decoration:none;"
                                class="text-md uppercase text-gray-50 font-medium"
                            >
                                Support
                            </div>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/terms"
                                >Terms & Conditions
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span></a
                            ><a
                                style="text-decoration:none;"
                                href="/privacyPolicy"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                >Privacy Policy
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                style="text-decoration:none;"
                                class="text-md uppercase text-gray-50 font-medium"
                            >
                                Contact us
                            </div>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/#"
                                >sakuraautoparts.cebu@gmail.com
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="/#"
                                >+63664120534
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                            <a
                                style="text-decoration:none;"
                                class="my-3 block text-gray-50 hover:text-blue-700 transition duration-300"
                                href="https://www.facebook.com/Sakura-Auto-Parts-Trading-1412649018771591/about/"
                                >Facebook page
                                <span
                                    class="text-gray-50 hover:text-blue-700 transition duration-300 text-xs p-1"
                                ></span
                            ></a>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userImage: '',
            user: '',
            id: null,
            showMenu: false,
            showDropDown: false,
            fname: null,
            age: null,
            email: null,
            image: null,
            admin: 0,
            secretary: 0,
            manager: 0,
            customer: 0,
            avatar: '/images/Avatar.png',
            isLogged: localStorage.getItem('jwt') != null
        };
    },
    mounted() {
        this.setDefaults();
    },
    methods: {
        setDefaults() {
            if (this.isLogged) {
                let user = JSON.parse(localStorage.getItem('user'));
                this.id = user.id;
                this.fname = user.fname;
                this.age = user.age;
                this.email = user.email;
                this.admin = user.Admin;
                this.secretary = user.Secretary;
                this.manager = user.Manager;
                this.customer = user.Customer;
                this.image = user.image;
            }
        },
        change() {
            this.isLogged = localStorage.getItem('jwt') != null;
            this.setDefaults();
        },
        logout() {
            this.$swal({
                position: 'center',
                icon: 'success',
                title: 'Logged out successfully.',
                showConfirmButton: false,
                timer: 1500
            });
            localStorage.removeItem('jwt');
            localStorage.removeItem('user');
            this.change();
            this.$router.push('/login');
        }
    }
};
</script>

<style></style>
