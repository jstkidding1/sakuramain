<template>
    <div>
        <div class="flex justify-center py-4">
            <div class="w-3/4 flex justify-start">
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
        <div class="flex justify-center">
            <hr class="w-3/4" />
        </div>
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
                                        secretary.image
                                            ? `/images/${secretary.image}`
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
                            {{ secretary.fname }} {{ secretary.mname }}
                            {{ secretary.lname }}
                        </h1>
                        <h3
                            class="text-gray-600 font-lg text-semibold leading-6"
                        >
                            {{
                                secretary.Admin == 1
                                    ? 'Admin'
                                    : 'Undefined' && secretary.Secretary == 1
                                    ? 'Secretary'
                                    : 'Undefined' && secretary.Manager == 1
                                    ? 'Manager'
                                    : 'Undefined' && secretary.Customer == 1
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
                                    v-model="secretary.fname"
                                    disabled
                                />
                                <div class="w-full px-4 py-2 font-semibold">
                                    Last Name
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="secretary.lname"
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
                                    v-model="secretary.mname"
                                    disabled
                                />
                                <div class="w-full px-4 py-2 font-semibold">
                                    Email
                                </div>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    v-model="secretary.email"
                                    disabled
                                />
                            </div>
                            <hr class="my-4" />
                            <div class="grid grid-cols-4 gap-4">
                                <div class="px-4 py-2 font-semibold">
                                    Age
                                </div>
                                <div v-if="secretary.age == null">
                                    <button
                                        v-if="!secretaryEditAge"
                                        @click="secretaryEditAge = true"
                                        class="p-2 text-gray-200 bg-gray-800 hover:bg-gray-400 hover:text-gray-50 rounded transition duration-300"
                                    >
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
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>
                                    <div v-show="secretaryEditAge">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="secretary.age"
                                        />
                                    </div>
                                </div>
                                <div v-if="secretary.age != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="secretary.age"
                                    />
                                </div>
                                <div class="px-4 py-2 font-semibold">
                                    Birth Date
                                </div>
                                <div v-if="secretary.birth_date == null">
                                    <button
                                        v-if="!secretaryEditBirthDate"
                                        @click="secretaryEditBirthDate = true"
                                        class="p-2 text-gray-200 bg-gray-800 hover:bg-gray-400 hover:text-gray-50 rounded transition duration-300"
                                    >
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
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>
                                    <div v-show="secretaryEditBirthDate">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="date"
                                            v-model="secretary.birth_date"
                                        />
                                    </div>
                                </div>
                                <div v-if="secretary.birth_date != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="date"
                                        v-model="secretary.birth_date"
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <div class="w-full px-4 py-2 font-semibold">
                                    Gender
                                </div>
                                <div v-if="secretary.gender == null">
                                    <button
                                        v-if="!secretaryEditGender"
                                        @click="secretaryEditGender = true"
                                        class="p-2 text-gray-200 bg-gray-800 hover:bg-gray-400 hover:text-gray-50 rounded transition duration-300"
                                    >
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
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>

                                    <div v-show="secretaryEditGender">
                                        <select
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="secretary.gender"
                                        >
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div v-if="secretary.gender != null">
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="secretary.gender"
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
                                <div v-if="secretary.contact_num == null">
                                    <button
                                        v-if="!secretaryEditContact"
                                        @click="secretaryEditContact = true"
                                        class="p-2 text-gray-200 bg-gray-800 hover:bg-gray-400 hover:text-gray-50 rounded transition duration-300"
                                    >
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
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>

                                    <div v-show="secretaryEditContact">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="secretary.contact_num"
                                        />
                                    </div>
                                </div>
                                <div v-if="secretary.contact_num != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="secretary.contact_num"
                                    />
                                </div>
                                <div class="w-full px-4 py-2 font-semibold">
                                    Address
                                </div>
                                <div v-if="secretary.address == null">
                                    <button
                                        v-if="!secretaryEditAddress"
                                        @click="secretaryEditAddress = true"
                                        class="p-2 text-gray-200 bg-gray-800 hover:bg-gray-400 hover:text-gray-50 rounded transition duration-300"
                                    >
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
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>

                                    <div v-show="secretaryEditAddress">
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="secretary.address"
                                        />
                                    </div>
                                </div>
                                <div v-if="secretary.address != null">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="secretary.address"
                                    />
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
            user: null,
            loading: false,
            loadingImage: false,
            preview: false,
            secretaryEditAge: false,
            secretaryEditBirthDate: false,
            secretaryEditGender: false,
            secretaryEditContact: false,
            secretaryEditAddress: false,
            secretary: {},
            image: '',
            avatar: '/images/Avatar.png',
            errors: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getSecretary();
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
        getSecretary() {
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                this.secretary = response.data;
                console.log(response.data);
            });
        },
        updateUser() {
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .put(`/api/users/${this.$route.params.id}`, this.secretary)
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Profile has been updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'secretary-dashboard' });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
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
                    this.secretary.image = response.data;
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
