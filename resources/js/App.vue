<template>
    <div>
        <div class="flex flex-col h-screen">
            <main class="relative inset-0">
                <nav class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto px-4">
                        <div class="flex justify-between">
                            <div class="flex space-x-10">
                                <div>
                                    <a
                                        href="/"
                                        style="text-decoration:none"
                                        class="flex items-center py-4 px-3 text-gray-700 text-blue-400"
                                    >
                                        <span
                                            class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-xl font-bold transition duration-300"
                                            >Sakura</span
                                        ></a
                                    >
                                </div>
                                <div
                                    class="hidden md:flex items-center space-x-2"
                                >
                                    <a
                                        href="/cars"
                                        style="text-decoration:none"
                                        class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                    >
                                        Cars</a
                                    >
                                    <a
                                        href="/auto-parts"
                                        style="text-decoration:none"
                                        class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                    >
                                        Auto-parts</a
                                    >
                                    <a
                                        href="/all/services"
                                        style="text-decoration:none"
                                        class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                    >
                                        Services</a
                                    >
                                    <a
                                        href="/gallery"
                                        style="text-decoration:none"
                                        class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                    >
                                        Gallery</a
                                    >
                                    <a
                                        href="/aboutus"
                                        style="text-decoration:none"
                                        class="text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                    >
                                        About us</a
                                    >
                                </div>
                            </div>

                            <div class="hidden lg:flex items-center space-x-5">
                                <a
                                    href="/login"
                                    v-if="!isLogged"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                >
                                    Login
                                </a>
                                <a
                                    href="/register"
                                    v-if="!isLogged"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-gray-200 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                >
                                    Register
                                </a>
                                <div
                                    v-if="isLogged"
                                    class="relative inline-block dropdown flex items-center space-x-2"
                                >
                                    <h5
                                        v-if="admin == 1"
                                        class="font-sans text-gray-700 py-2 px-3 rounded text-lg font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <h5
                                        v-if="secretary == 1"
                                        class="font-sans text-gray-700 py-2 px-3 rounded text-lg font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <h5
                                        v-if="manager == 1"
                                        class="font-sans text-gray-700 py-2 px-3 rounded text-lg font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <h5
                                        v-if="customer == 1"
                                        class="font-sans text-gray-700 py-2 px-3 rounded text-lg font-bold transition duration-300"
                                    >
                                        Welcome, {{ fname }}
                                    </h5>
                                    <button
                                        @click="showDropDown = !showDropDown"
                                        class="relative rounded-md focus:outline-none transition duration-300 ease-in-out"
                                    >
                                        <div class="flex items-center">
                                            <div
                                                class="block h-12 w-12 rounded-full overflow-hidden border-2"
                                                v-if="image == null"
                                            >
                                                <img
                                                    :src="avatar"
                                                    alt=""
                                                    class="h-full w-full object-cover"
                                                />
                                            </div>
                                            <div
                                                v-else
                                                class="block h-12 w-12 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white"
                                            >
                                                <img
                                                    :src="image"
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
                                            <a
                                                href="/admin/dashboard"
                                                v-if="admin == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-yellow-600 transition duration-150"
                                            >
                                                Dashboard</a
                                            >
                                            <a
                                                href="/secretary/dashboard"
                                                v-if="secretary == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-yellow-600 transition duration-150"
                                            >
                                                Dashboard</a
                                            >
                                            <a
                                                href="/manager/dashboard"
                                                v-if="manager == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-yellow-600 transition duration-150"
                                            >
                                                Dashboard</a
                                            >
                                            <a
                                                href="/dashboard"
                                                v-if="customer == 1"
                                                style="text-decoration:none"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-yellow-600 transition duration-150"
                                            >
                                                Dashboard</a
                                            >
                                            <a
                                                style="text-decoration:none;"
                                                href="#"
                                                class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-yellow-600 transition duration-150"
                                            >
                                                My profile
                                            </a>
                                        </div>
                                        <div class="py-1">
                                            <button
                                                v-if="isLogged"
                                                @click="logout"
                                                class="text-gray-700 flex items-center justify-start w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 hover:text-yellow-600 transition duration-150"
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
                <router-view @isLogged="change"> </router-view>
                <footer class="relative bg-gray-900 mt-96">
                    <div
                        class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-center"
                    >
                        <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                Home
                            </div>
                            <a class="my-3 block text-gray-50" href="/#"
                                >Services
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Products
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >About Us
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Pricing
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Partners
                                <span class="text-gray-50 text-xs p-1"
                                    >New</span
                                ></a
                            >
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                User
                            </div>
                            <a class="my-3 block text-gray-50" href="/#"
                                >Sign in
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >New Account
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Demo
                                <span class="text-gray-50 text-xs p-1"
                                    >New</span
                                ></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Career
                                <span class="text-gray-50 text-xs p-1"
                                    >We're hiring</span
                                ></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Surveys
                                <span class="text-gray-50 text-xs p-1"
                                    >New</span
                                ></a
                            >
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                Resources
                            </div>
                            <a class="my-3 block text-gray-50" href="/#"
                                >Documentation
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Tutorials
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Support
                                <span class="text-gray-50 text-xs p-1"
                                    >New</span
                                ></a
                            >
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                Product
                            </div>
                            <a class="my-3 block text-gray-50" href="/#"
                                >Our Products
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Great Deals
                                <span class="text-gray-50 text-xs p-1"
                                    >New</span
                                ></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Analytics
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Mobile
                                <span class="text-gray-50 text-xs p-1"></span
                            ></a>
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                Support
                            </div>
                            <a class="my-3 block text-gray-50" href="/#"
                                >Help Center
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Privacy Policy
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >Conditions
                                <span class="text-gray-50 text-xs p-1"></span
                            ></a>
                        </div>
                        <div class="p-5 w-48 ">
                            <div
                                class="text-xs uppercase text-gray-50 font-medium"
                            >
                                Contact us
                            </div>
                            <a class="my-3 block" href="/#"
                                >XXX XXXX, Floor 4 San Francisco, CA
                                <span
                                    class="text-gray-50 text-xs p-1"
                                ></span></a
                            ><a class="my-3 block text-gray-50" href="/#"
                                >contact@company.com
                                <span class="text-gray-50 text-xs p-1"></span
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
            // user: {},
            showMenu: false,
            showDropDown: false,
            fname: null,
            email: null,
            admin: 0,
            secretary: 0,
            manager: 0,
            customer: 0,
            image: null,
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
                this.fname = user.fname;
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
            this.$router.push('/');
        }
    }
};
</script>

<style>
.dropdown:focus-within .dropdown-menu {
    opacity: 1;
    transform: translate(0) scale(1);
    visibility: visible;
}
</style>
