<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 rounded shadow-md mt-10 h-full">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/secretary/inquiry"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/secretary/inquiry"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Inquiry List
                            </router-link>
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
                                    name: 'secretary_view_inquiry',
                                    params: { id: inquiry.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >View Inquiry</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Personal Information
                    </h1>
                </div>
                <div class="flex py-2 px-3 mt-2 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Name:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ inquiry.user.fname }}
                        {{ inquiry.user.mname }}
                        {{ inquiry.user.lname }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Email:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ inquiry.user.email }}
                    </p>
                </div>
                <div class="flex py-2 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Address:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ inquiry.user.address }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Contact Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ inquiry.user.contact_num }}
                    </p>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Inquiry Information
                    </h1>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Submitted at:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ inquiry.created_at | date }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Message:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ inquiry.message }}
                    </p>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Status:
                    </p>
                    <select
                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        v-model="inquiry.status"
                    >
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Denied">Denied</option>
                    </select>
                </div>
                <div class="flex px-3 py-2 mt-10 mb-20">
                    <div class="flex justify-start">
                        <button
                            @click="updateStatus"
                            :disabled="loading"
                            class="flex items-center bg-blue-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-blue-600 transition duration-300"
                        >
                            <svg
                                v-if="loading"
                                class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                style="border-right-color: white; border-top-color: white;"
                                viewBox="0 0 24 24"
                            ></svg>
                            <span v-if="loading">Please wait..</span>
                            <span v-else>Update</span>
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
            <div class="w-96 mt-10 ml-4">
                <div class="bg-white rounded shadow-md">
                    <div class="flex py-4 px-3">
                        <h1 class="text-gray-700 font-bold text-lg">
                            Vehicle Details
                        </h1>
                    </div>
                    <div class="flex py-2">
                        <div class="relative h-72 w-full overflow-hidden">
                            <img
                                :src="`/images/${inquiry.vehicle.thumbnail}`"
                                alt=""
                                class="absolute h-full w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold">
                            {{ inquiry.vehicle.brand_name }}
                            {{ inquiry.vehicle.model_type }}
                            {{ inquiry.vehicle.year_model }}
                        </h1>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold">
                            ₱
                            {{ inquiry.vehicle.price.toLocaleString() }}
                        </h1>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Body Type:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.body_type }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Mileage:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.mileage }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Fuel Type:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.fuel_type }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Transmission:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.transmission }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Engine:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.engine }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Drive Type:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.drive_type }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Color:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.color }}
                            </p>
                        </div>
                        <div class="flex items-center px-3 pb-10">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Interior Color:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ inquiry.vehicle.interior_color }}
                            </p>
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
            inquiry: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getInquiry();
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
        getInquiry() {
            axios
                .get(`/api/inquiries/${this.$route.params.id}`)
                .then(response => {
                    this.inquiry = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        updateStatus() {
            this.loading = true;

            axios
                .put(`/api/inquiries/${this.$route.params.id}`, this.inquiry)
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Status has successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'secretary_inquiry' });
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
        }
    }
};
</script>

<style></style>
