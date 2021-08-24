<template>
    <div>
        <div class="flex flex-col h-screen justify-between">
            <nav class="bg-white shadow-sm sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-4">
                            <div>
                                <router-link
                                    to="/"
                                    style="text-decoration:none"
                                    class="flex items-center py-4 px-3 text-gray-700 text-blue-400"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                        />
                                    </svg>
                                    <span
                                        class="font-sans text-gray-700 text-lg font-bold"
                                        >Sakura</span
                                    ></router-link
                                >
                            </div>
                            <div class="hidden md:flex items-center space-x-2">
                                <router-link
                                    :to="{ name: 'view-cars' }"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                    >Cars</router-link
                                >
                                <router-link
                                    :to="{ name: 'auto-parts' }"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                    >Products</router-link
                                >
                                <router-link
                                    :to="{ name: 'services' }"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                    >Services</router-link
                                >
                                <router-link
                                    :to="{ name: 'gallery' }"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                    >Gallery</router-link
                                >
                                <router-link
                                    to="/aboutus"
                                    style="text-decoration:none"
                                    class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                    >About us</router-link
                                >
                            </div>
                        </div>

                        <div class="hidden md:flex items-center space-x-5">
                            <router-link
                                :to="{ name: 'login' }"
                                v-if="!isLogged"
                                style="text-decoration:none"
                                class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                >Login</router-link
                            >
                            <router-link
                                :to="{ name: 'register' }"
                                v-if="!isLogged"
                                style="text-decoration:none"
                                class="font-sans text-gray-700 hover:bg-indigo-700 py-2 px-3 hover:text-white rounded"
                                >Register</router-link
                            >
                            <div
                                v-if="isLogged"
                                class="flex items-center space-x-2"
                            >
                                <h5
                                    v-if="admin == 1"
                                    class="font-sans text-gray-700 py-2 px-3"
                                >
                                    Welcome, {{ fname }}
                                </h5>
                                <h5
                                    v-if="secretary == 1"
                                    class="font-sans text-gray-700 py-2 px-3"
                                >
                                    Welcome, {{ fname }}
                                </h5>
                                <h5
                                    v-if="manager == 1"
                                    class="font-sans text-gray-700 py-2 px-3"
                                >
                                    Welcome, {{ fname }}
                                </h5>
                                <h5
                                    v-if="customer == 1"
                                    class="font-sans text-gray-700 py-2 px-3"
                                >
                                    Welcome, {{ fname }}
                                </h5>
                                <button
                                    @click="showDropDown = !showDropDown"
                                    class="rounded-md focus:outline-none"
                                >
                                    <div class="flex items-center">
                                        <div v-if="image == null">
                                            <img
                                                :src="avatar"
                                                alt=""
                                                class="rounded-full h-12 w-12"
                                            />
                                        </div>
                                        <div v-else>
                                            <img
                                                :src="image"
                                                alt=""
                                                class="rounded-full h-12 w-12"
                                            />
                                        </div>
                                        <svg
                                            class="ml-2 h-4 w-4 text-gray-800"
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
                                    class="fixed inset-0 h-full w-full"
                                ></div>

                                <div
                                    v-show="showDropDown"
                                    class="absolute mt-60 py-2 w-48 bg-white rounded-md shadow-xl z-20"
                                >
                                    <router-link
                                        :to="{ name: 'admin-dashboard' }"
                                        v-if="admin == 1"
                                        style="text-decoration:none"
                                        class="block px-4 py-2 text-md capitalize text-gray-800 hover:bg-indigo-600 hover:text-white"
                                        >Dashboard</router-link
                                    >
                                    <router-link
                                        :to="{ name: 'secretary-dashboard' }"
                                        v-if="secretary == 1"
                                        style="text-decoration:none"
                                        class="block px-4 py-2 text-md capitalize text-gray-800 hover:bg-indigo-600 hover:text-white"
                                        >Dashboard</router-link
                                    >
                                    <router-link
                                        :to="{ name: 'manager-dashboard' }"
                                        v-if="manager == 1"
                                        style="text-decoration:none"
                                        class="block px-4 py-2 text-md capitalize text-gray-800 hover:bg-indigo-600 hover:text-white"
                                        >Dashboard</router-link
                                    >
                                    <router-link
                                        :to="{ name: 'customer-dashboard' }"
                                        v-if="customer == 1"
                                        style="text-decoration:none"
                                        class="block px-4 py-2 text-md capitalize text-gray-800 hover:bg-indigo-600 hover:text-white"
                                        >Dashboard</router-link
                                    >
                                    <a
                                        style="text-decoration:none;"
                                        href="#"
                                        class="block px-4 py-2 text-md capitalize text-gray-800 hover:bg-indigo-600 hover:text-white"
                                    >
                                        My profile
                                    </a>
                                    <hr class="mt-2 mb-2" />
                                    <button
                                        v-if="isLogged"
                                        @click="logout"
                                        class="w-full px-4 py-2 text-md capitalize text-gray-800 hover:bg-indigo-600 hover:text-white"
                                    >
                                        Logout
                                    </button>
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
            <main>
                <router-view @isLogged="change"> </router-view>
            </main>
            <footer class="bg-white text-gray-700 mt-32">
                <div
                    class="bg-white p-3 border-t-4 shadow-md border-indigo-600"
                ></div>
                <div class="max-w-3xl mx-auto py-6">
                    <h1 class="text-center font-bold text-md lg:text-lg">
                        Join us on our facebook as a member to Sakura <br />
                        for more click here
                    </h1>

                    <hr class="h-px mt-6 bg-gray-200 border-none" />

                    <div
                        class="flex flex-col items-center justify-center mt-6 md:flex-row"
                    >
                        <div class="flex md:m-0">
                            <div class="-mx-4">
                                <a
                                    href="#"
                                    class="px-4 text-sm text-gray-700 font-medium"
                                    >Cars</a
                                >
                                <a
                                    href="#"
                                    class="px-4 text-sm text-gray-700 font-medium"
                                    >Products</a
                                >
                                <a
                                    href="#"
                                    class="px-4 text-sm text-gray-700 font-medium"
                                    >Services</a
                                >
                                <a
                                    href="#"
                                    class="px-4 text-sm text-gray-700 font-medium"
                                    >Gallery</a
                                >
                                <a
                                    href="#"
                                    class="px-4 text-sm text-gray-700 font-medium"
                                    >About us</a
                                >
                                <a
                                    href="#"
                                    class="px-4 text-sm text-gray-700 font-medium"
                                    >Contact</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
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

<style></style>
