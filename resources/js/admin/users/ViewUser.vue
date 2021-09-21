<template>
    <div>
        <div class="container mx-auto my-5 p-5">
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
                                        user.image
                                            ? `/images/${user.image}`
                                            : avatar
                                    "
                                    alt=""
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
                                user.user == 1
                                    ? 'user'
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
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.fname"
                                    disabled
                                />
                                <div class="w-full px-4 py-2 font-semibold">
                                    Last Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.lname"
                                    disabled
                                />
                            </div>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Middle Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="user.mname"
                                    disabled
                                />
                                <div class="w-full px-4 py-2 font-semibold">
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
                            <div class="grid grid-cols-4 gap-4">
                                <div class="px-4 py-2 font-semibold">
                                    Age
                                </div>
                                <div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="user.age"
                                        disabled
                                    />
                                </div>
                                <div class="px-4 py-2 font-semibold">
                                    Birth Date
                                </div>
                                <div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="date"
                                        v-model="user.birth_date"
                                        disabled
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Gender
                                </div>
                                <div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="user.gender"
                                        disabled
                                    />
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="grid grid-cols-4 gap-4 mb-10">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Contact Number
                                </div>
                                <div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="user.contact_num"
                                        disabled
                                    />
                                </div>
                                <div class="w-full px-4 py-2 font-semibold">
                                    Address
                                </div>
                                <div>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="user.address"
                                        disabled
                                    />
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
    data() {
        return {
            user: [],
            avatar: '/images/Avatar.png'
        };
    },
    beforeMount() {
        this.getUser();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value))
                    .startOf('hour')
                    .fromNow();
            }
        }
    },
    methods: {
        getUser() {
            axios
                .get(`/api/users/${this.$route.params.id}`)
                .then(response => {
                    this.user = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
