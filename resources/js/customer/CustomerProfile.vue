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
            <div class="md:flex no-wrap md:-mx-2 ">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div
                        class="bg-white p-3 border-t-4 shadow-md border-green-400"
                    >
                        <div class="image overflow-hidden">
                            <div>
                                <img
                                    class="h-96 w-full object-cover mx-auto"
                                    :src="
                                        customer.image
                                            ? `/images/${customer.image}`
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
                            {{ customer.fname }} {{ customer.mname }}
                            {{ customer.lname }}
                        </h1>
                        <h3
                            class="text-gray-600 font-lg text-semibold leading-6"
                        >
                            {{
                                customer.Admin == 1
                                    ? 'Admin'
                                    : 'Undefined' && customer.Secretary == 1
                                    ? 'Secretary'
                                    : 'Undefined' && customer.Manager == 1
                                    ? 'Manager'
                                    : 'Undefined' && customer.Customer == 1
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
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm"
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
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div
                            class="flex items-center space-x-2 font-semibold leading-8 mb-4"
                        >
                            <span class="text-green-500">
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
                                >Personal Information</span
                            >
                        </div>
                        <div class="text-gray-700">
                            <div class="grid grid-cols-4 gap-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    First Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="customer.fname"
                                    disabled
                                />
                                <div class="w-full px-4 py-2 font-semibold">
                                    Last Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="customer.lname"
                                    disabled
                                />
                            </div>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Middle Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="customer.mname"
                                    disabled
                                />
                                <div class="w-full px-4 py-2 font-semibold">
                                    Email
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="customer.email"
                                    disabled
                                />
                            </div>
                            <hr class="my-4" />
                            <div class="grid grid-cols-4 gap-4">
                                <div class="px-4 py-2 font-semibold">
                                    Age
                                </div>
                                <div v-if="customer.age == null">
                                    <button
                                        v-if="!customerEditAge"
                                        @click="customerEditAge = true"
                                        class="p-2 text-gray-50 bg-green-500 hover:bg-green-600 hover:text-gray-50 rounded transition duration-300"
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
                                    <div v-show="customerEditAge">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="customer.age"
                                        />
                                    </div>
                                </div>
                                <div v-if="customer.age != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="customer.age"
                                    />
                                </div>
                                <div class="px-4 py-2 font-semibold">
                                    Birth Date
                                </div>
                                <div v-if="customer.birth_date == null">
                                    <button
                                        v-if="!customerEditBirthDate"
                                        @click="customerEditBirthDate = true"
                                        class="p-2 text-gray-50 bg-green-500 hover:bg-green-600 hover:text-gray-50 rounded transition duration-300"
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
                                    <div v-show="customerEditBirthDate">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="date"
                                            v-model="customer.birth_date"
                                        />
                                    </div>
                                </div>
                                <div v-if="customer.birth_date != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="date"
                                        v-model="customer.birth_date"
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Gender
                                </div>
                                <div v-if="customer.gender == null">
                                    <button
                                        v-if="!customerEditGender"
                                        @click="customerEditGender = true"
                                        class="p-2 text-gray-50 bg-green-500 hover:bg-green-600 hover:text-gray-50 rounded transition duration-300"
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

                                    <div v-show="customerEditGender">
                                        <select
                                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="customer.gender"
                                        >
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div v-if="customer.gender != null">
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="customer.gender"
                                    >
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="grid grid-cols-4 gap-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Contact Number
                                </div>
                                <div v-if="customer.contact_num == null">
                                    <button
                                        v-if="!customerEditContact"
                                        @click="customerEditContact = true"
                                        class="p-2 text-gray-50 bg-green-500 hover:bg-green-600 hover:text-gray-50 rounded transition duration-300"
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

                                    <div v-show="customerEditContact">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="customer.contact_num"
                                        />
                                    </div>
                                </div>
                                <div v-if="customer.contact_num != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="customer.contact_num"
                                    />
                                </div>
                                <div class="w-full px-4 py-2 font-semibold">
                                    Address
                                </div>
                                <div v-if="customer.address == null">
                                    <button
                                        v-if="!customerEditAddress"
                                        @click="customerEditAddress = true"
                                        class="p-2 text-gray-50 bg-green-500 hover:bg-green-600 hover:text-gray-50 rounded transition duration-300"
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

                                    <div v-show="customerEditAddress">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="customer.address"
                                        />
                                    </div>
                                </div>
                                <div v-if="customer.address != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="customer.address"
                                    />
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="flex px-3">
                            <button
                                @click="showRequest = !showRequest"
                                class="relative pl-3 pr-8 py-2 bg-green-500 text-gray-50 font-bold text-md rounded hover:bg-green-600 hover:text-gray-50 transition duration-300"
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
                            <div class="bg-gray-50 w-1/2 p-4 rounded mt-2">
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
                                        class="relative px-8 py-2 bg-gray-800 text-gray-50 font-bold text-md rounded hover:bg-gray-500 hover:text-gray-50 transition duration-300"
                                    >
                                        Change Password
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
// import Reservations from '../customer/Reservations.vue';
export default {
    // components: { Reservations },
    data() {
        return {
            user: null,
            loading: false,
            loadingImage: false,
            preview: false,
            customerEditAge: false,
            customerEditBirthDate: false,
            customerEditGender: false,
            customerEditContact: false,
            customerEditAddress: false,
            customerEditPassword: false,
            showRequest: false,
            form: {
                old_password: '',
                password: '',
                password_confirmation: ''
            },
            customer: {},
            image: '',
            avatar: '/images/Avatar.png',
            errors: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getCustomer();
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
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getCustomer() {
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                this.customer = response.data;
                console.log(response.data);
            });
        },
        updateUser() {
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .put(`/api/users/${this.$route.params.id}`, this.customer)
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Profile has been updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'customer' });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        },
        changePassword() {
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
                    this.customer.image = response.data;
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
