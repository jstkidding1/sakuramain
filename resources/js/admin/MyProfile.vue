<template>
    <div>
        <div class="flex justify-center py-4">
            <div class="w-3/4 flex justify-start">
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
        <div class="flex justify-center">
            <hr class="w-3/4" />
        </div>
        <div class="container mx-auto my-5 p-5 h-full">
            <div class="md:flex no-wrap md:-mx-2">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div
                        class="bg-white p-3 border-t-4 shadow-md border-blue-400"
                    >
                        <div class="aspect-w-9 aspect-h-9">
                            <div>
                                <img
                                    class="h-full w-full object-cover"
                                    :src="
                                        user.image
                                            ? `/images/${user.image}`
                                            : avatar
                                    "
                                    alt=""
                                />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <span
                                class="fixed w-full text-red-500 text-xs mt-14"
                                v-if="errors.image"
                                >{{ errors.image[0] }}</span
                            >
                            <div class="flex items-center justify-start">
                                <input
                                    type="file"
                                    @change="onChange"
                                    class="w-full mt-4"
                                />
                            </div>
                        </div>
                        <h1
                            class="text-gray-900 font-bold text-xl leading-8 my-1"
                        >
                            {{ user.fname }} {{ user.mname }}
                            {{ user.lname }}
                        </h1>
                        <h3
                            class="text-gray-600 font-lg text-semibold leading-6"
                        >
                            {{
                                user.Admin == 1
                                    ? 'Admin'
                                    : 'Undefined' && user.Secretary == 1
                                    ? 'Secretary'
                                    : 'Undefined' && user.Manager == 1
                                    ? 'Manager'
                                    : 'Undefined' && user.Customer == 1
                                    ? 'Customer'
                                    : 'Undefined'
                            }}
                        </h3>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm"
                        >
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span
                                    class="ml-auto"
                                    v-if="user.status == 'Active'"
                                    ><span
                                        class="bg-blue-500 py-1 px-2 rounded text-white text-sm"
                                        >Active</span
                                    ></span
                                >
                                <span
                                    class="ml-auto"
                                    v-if="user.status == 'Inactive'"
                                    ><span
                                        class="bg-red-500 py-1 px-2 rounded text-white text-sm"
                                        >Inactive</span
                                    ></span
                                >
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{
                                    user.created_at | date
                                }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-9/12 h-full">
                    <div class="bg-white p-3 shadow-sm lg:rounded-sm">
                        <div
                            class="flex items-center space-x-2 font-semibold leading-8 mb-4"
                        >
                            <span class="text-blue-500">
                                <svg
                                    class="h-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </span>
                            <span class="text-lg text-gray-700 tracking-wide"
                                >Customer Name</span
                            >
                        </div>
                        <div class="text-gray-700">
                            <div
                                class="sm:flex flex-col lg:grid grid-cols-4 gap-4"
                            >
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    First Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.fname"
                                    disabled
                                />
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Last Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.lname"
                                    disabled
                                />
                            </div>
                            <div
                                class="sm:flex flex-col lg:grid grid-cols-4 gap-4 mt-4"
                            >
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Middle Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.mname"
                                    disabled
                                />
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Email
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.email"
                                    disabled
                                />
                            </div>
                            <hr class="my-4" />

                            <div
                                class="sm:flex flex-col lg:grid grid-cols-4 gap-4"
                            >
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Age
                                </div>

                                <div>
                                    <div v-if="user.age == null">
                                        <button
                                            v-if="!userEditAge"
                                            @click="userEditAge = true"
                                            class="p-2 text-gray-200 bg-blue-500 hover:bg-blue-600 hover:text-gray-50 rounded transition duration-300"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                        <div v-show="userEditAge">
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                type="text"
                                                v-model="user.age"
                                            />
                                            <div class="flex">
                                                <span
                                                    class="fixed w-full text-red-500 text-xs mt-14"
                                                    v-if="errors.age"
                                                    >{{ errors.age[0] }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="user.age != null">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="user.age"
                                        />
                                        <div class="flex">
                                            <span
                                                class="w-full ml-2 text-red-500"
                                                v-if="errors.age"
                                                >{{ errors.age[0] }}</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Birth Date
                                </div>
                                <div>
                                    <div v-if="user.birth_date == null">
                                        <button
                                            v-if="!userEditBirthDate"
                                            @click="userEditBirthDate = true"
                                            class="p-2 text-gray-200 bg-blue-500 hover:bg-blue-600 hover:text-gray-50 rounded transition duration-300"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                        <div v-show="userEditBirthDate">
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                type="date"
                                                v-model="user.birth_date"
                                            />
                                            <div class="flex">
                                                <span
                                                    class="fixed w-full text-red-500 text-xs mt-14"
                                                    v-if="errors.birth_date"
                                                    >{{
                                                        errors.birth_date[0]
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="user.birth_date != null">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="date"
                                            v-model="user.birth_date"
                                        />
                                        <div class="flex">
                                            <span
                                                class="w-full ml-2 text-red-500"
                                                v-if="errors.birth_date"
                                                >{{
                                                    errors.birth_date[0]
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sm:flex flex-col lg:grid grid-cols-4 gap-4 mt-4"
                            >
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Gender
                                </div>
                                <div>
                                    <div v-if="user.gender == null">
                                        <button
                                            v-if="!userEditGender"
                                            @click="userEditGender = true"
                                            class="p-2 text-gray-200 bg-blue-500 hover:bg-blue-600 hover:text-gray-50 rounded transition duration-300"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                        <div v-show="userEditGender">
                                            <select
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                type="text"
                                                v-model="user.gender"
                                            >
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div v-if="user.gender != null">
                                        <select
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="user.gender"
                                        >
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div
                                class="sm:flex flex-col lg:grid grid-cols-4 gap-4"
                            >
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Contact Number
                                </div>
                                <div>
                                    <div v-if="user.contact_num == null">
                                        <button
                                            v-if="!userEditContact"
                                            @click="userEditContact = true"
                                            class="p-2 text-gray-200 bg-blue-500 hover:bg-blue-600 hover:text-gray-50 rounded transition duration-300"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                        <div v-show="userEditContact">
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                type="text"
                                                v-model="user.contact_num"
                                            />
                                        </div>
                                    </div>
                                    <div v-if="user.contact_num != null">
                                        <div class="relative w-full">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center px-2 text-gray-500"
                                            >
                                                +63
                                            </span>
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                                type="text"
                                                v-model="user.contact_num"
                                            />
                                        </div>
                                        <div class="flex">
                                            <span
                                                class="w-full ml-2 text-red-500"
                                                v-if="errors.contact_num"
                                                >{{
                                                    errors.contact_num[0]
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-full sm:px-2 sm:py-1 lg:px-4 lg:py-2 font-semibold"
                                >
                                    Address
                                </div>
                                <div>
                                    <div v-if="user.address == null">
                                        <button
                                            v-if="!userEditAddress"
                                            @click="userEditAddress = true"
                                            class="p-2 text-gray-200 bg-blue-500 hover:bg-blue-600 hover:text-gray-50 rounded transition duration-300"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                        <div v-show="userEditAddress">
                                            <input
                                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                type="text"
                                                v-model="user.address"
                                            />
                                        </div>
                                    </div>
                                    <div v-if="user.address != null">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="user.address"
                                        />
                                        <div class="flex">
                                            <span
                                                class="w-full ml-2 text-red-500"
                                                v-if="errors.address"
                                                >{{ errors.address[0] }}</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="flex px-3">
                            <button
                                @click="showRequest = !showRequest"
                                class="relative pl-3 pr-8 py-2 bg-blue-500 text-gray-50 font-bold text-md rounded hover:bg-blue-600 hover:text-gray-50 transition duration-300"
                            >
                                Request New Password
                                <span
                                    class="absolute inset-y-0 right-0 flex items-center px-2"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div v-show="showRequest">
                            <div
                                class="bg-gray-50 sm:w-full lg:w-1/2 p-4 rounded mt-2"
                            >
                                <div class="flex inline-block px-4 mt-8">
                                    <label class="font-semibold"
                                        >Old Password</label
                                    >
                                    <span
                                        class="ml-2 text-red-500"
                                        v-if="errors.old_password"
                                        >{{ errors.old_password[0] }}</span
                                    >
                                </div>
                                <div class="flex w-full px-4">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="password"
                                        v-model="form.old_password"
                                    />
                                </div>
                                <div class="flex inline-block px-4 mt-2">
                                    <label class="font-semibold"
                                        >New Password</label
                                    >
                                    <span
                                        class="ml-2 text-red-500"
                                        v-if="errors.password"
                                        >{{ errors.password[0] }}</span
                                    >
                                </div>
                                <div class="flex w-full px-4">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="password"
                                        v-model="form.password"
                                    />
                                </div>
                                <div class="flex inline-block px-4 mt-2">
                                    <label class="font-semibold"
                                        >Confirm New Password</label
                                    >
                                    <span
                                        class="ml-2 text-red-500"
                                        v-if="errors.password_confirmation"
                                        >{{
                                            errors.password_confirmation[0]
                                        }}</span
                                    >
                                </div>
                                <div class="flex w-full px-4">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="password"
                                        v-model="form.password_confirmation"
                                    />
                                </div>
                                <div class="flex justify-end mt-4 px-4">
                                    <button
                                        @click="changePassword"
                                        class="flex items-center bg-gray-800 px-3 py-1 text-lg text-white rounded font-bold text-xs hover:bg-gray-600 transition duration-300"
                                    >
                                        <svg
                                            v-if="loadingPassword"
                                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                            style="border-right-color: white; border-top-color: white;"
                                            viewBox="0 0 24 24"
                                        ></svg>
                                        <span v-if="loadingPassword"
                                            >Please wait...</span
                                        >
                                        <span v-else>Change Password</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4 justify-end mt-20">
                            <button
                                @click="updateUser"
                                class="flex items-center bg-gray-800 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-gray-600 transition duration-300"
                            >
                                <svg
                                    v-if="loading"
                                    class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                                <span v-if="loading">Please wait...</span>
                                <span v-else>Update</span>
                            </button>
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
    data() {
        return {
            userB: null,
            loading: false,
            loadingPassword: false,
            loadingImage: false,
            loadingAddress: false,
            preview: false,
            userEditAge: false,
            userEditBirthDate: false,
            userEditGender: false,
            userEditContact: false,
            userEditAddress: false,
            showRequest: false,
            form: {
                old_password: '',
                password: '',
                password_confirmation: ''
            },
            formAddress: {
                address: '',
                contact_num: ''
            },
            user: {},
            toggleInformation: false,
            toggleAddress: false,
            image: '',
            avatar: '/images/Avatar.png',
            errors: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getAdmin();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getUser() {
            this.userB = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getAdmin() {
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                this.user = response.data;
                console.log(response.data);
            });
        },
        updateUser() {
            this.loading = true;

            // setTimeout(() => {
            //     this.loading = !true;
            axios
                .put(`/api/users/${this.$route.params.id}`, this.user)
                .then(response => {
                    localStorage.setItem(
                        'user',
                        JSON.stringify(response.data.user)
                    );
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Profile has been updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        if (this.user.Admin) {
                            this.$router.go({
                                name: 'admin-dashboard'
                            });
                        } else if (this.user.Secretary) {
                            this.$router.go({
                                name: 'secretary-dashboard'
                            });
                        } else if (this.user.Manager) {
                            this.$router.go({
                                name: 'manager-dashboard'
                            });
                        } else if (this.user.Customer) {
                            this.$router.go('/dashboard/main');
                        }
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        },
        changePassword() {
            this.loadingPassword = true;

            axios
                .put(`/api/change/password/${this.$route.params.id}`, {
                    old_password: this.form.old_password,
                    password: this.form.password,
                    password_confirmation: this.form.password_confirmation
                })
                .then(response => {
                    console.log(response.data);
                })
                .then(() => {
                    this.$toast.open({
                        position: 'top-right',
                        type: 'success',
                        duration: 3000,
                        message: 'Password Updated!',
                        dismissible: true
                    });
                })
                .then(() => {
                    this.form = '';
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loadingPassword = false;
                });
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };

            this.loadingImage = !false;

            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('image', this.image);

            this.loadingImage = !true;
            axios
                .post('/api/users/upload/image', formData, config)
                .then(response => {
                    this.user.image = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        }
    }
};
</script>

<style></style>
