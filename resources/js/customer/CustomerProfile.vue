<template>
    <div>
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div
                        class="bg-white p-3 border-t-4 shadow-md border-green-400"
                    >
                        <div class="image overflow-hidden">
                            <div v-if="user.image == null">
                                <img
                                    :src="avatar"
                                    alt=""
                                    class="h-96 w-full object-cover mx-auto"
                                />
                            </div>
                            <div v-else>
                                <img
                                    class="h-96 w-full object-cover mx-auto"
                                    :src="user.image"
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
                            <div class="flex items-center justify-between">
                                <input
                                    type="file"
                                    @change="onChange"
                                    class="w-full mt-4"
                                />
                                <button
                                    @click.prevent="uploadImage"
                                    class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600 mt-2"
                                >
                                    <svg
                                        v-if="loadingImage"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loadingImage">Change</span>
                                    <span v-else>Change</span>
                                </button>
                            </div>
                        </div>
                        <h1
                            class="text-gray-900 font-bold text-xl leading-8 my-1"
                        >
                            {{ user.fname }} {{ user.mname }} {{ user.lname }}
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
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div
                            class="flex items-center space-x-2 font-semibold text-gray-900 leading-8"
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
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        First Name
                                    </div>
                                    <div class="px-4 py-2">
                                        {{ user.fname }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Last Name
                                    </div>
                                    <div class="px-4 py-2">
                                        {{ user.lname }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Middle Name
                                    </div>
                                    <div class="px-4 py-2">
                                        {{ user.mname }}
                                    </div>
                                </div>
                                <!-- <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Gender
                                    </div>
                                    <div class="px-4 py-2">Female</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Contact No.
                                    </div>
                                    <div class="px-4 py-2">
                                        +11 998001001
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Current Address
                                    </div>
                                    <div class="px-4 py-2">
                                        Beech Creek, PA, Pennsylvania
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Permanant Address
                                    </div>
                                    <div class="px-4 py-2">
                                        Arlington Heights, IL, Illinois
                                    </div>
                                </div> -->
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Email.
                                    </div>
                                    <div class="px-4 py-2">
                                        <a
                                            class="text-blue-800"
                                            href="mailto:jane@example.com"
                                            >{{ user.email }}</a
                                        >
                                    </div>
                                </div>
                                <!-- <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">
                                        Birthday
                                    </div>
                                    <div class="px-4 py-2">
                                        Feb 06, 1998
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="flex space-x-4 justify-end mt-4">
                            <button
                                @click="updateUser"
                                class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600"
                            >
                                <svg
                                    v-if="loading"
                                    class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                                <span v-if="loading">Submit</span>
                                <span v-else>Submit</span>
                            </button>
                        </div>
                        <!-- <button
                            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4"
                        >
                            Show Full Information
                        </button> -->
                    </div>
                    <!-- End of about section -->

                    <!-- End of profile tab -->
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
                return moment(String(value))
                    .startOf('hour')
                    .fromNow();
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
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        uploadImage() {
            this.loadingImage = !false;
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('image', this.image);
            setTimeout(() => {
                this.loadingImage = !true;
                axios
                    .post('/api/users/upload/image', formData, config)
                    .then(response => {
                        this.customer.image = response.data;
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Image successfully added.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
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
                            title: 'User has successfully updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'customer-dashboard' });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        }
    }
};
</script>

<style></style>
