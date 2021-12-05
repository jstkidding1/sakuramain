<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 rounded shadow-md mt-10">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/secretary/order"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/secretary/order"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Orders List
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
                                    name: 'secretary_view_order',
                                    params: { id: order.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >View Order</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex px-3 mt-4">
                    <span
                        class="w-full px-3 py-3 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                        v-if="errors.message"
                        >{{ errors.message[0] }}</span
                    >
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
                        {{ order.user.fname }}
                        {{ order.user.mname }}
                        {{ order.user.lname }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Email:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.user.email }}
                    </p>
                </div>
                <div class="flex py-2 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Address:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.user.address }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Contact Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.user.contact_num }}
                    </p>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Order Information
                    </h1>
                </div>
                <div class="flex py-1 px-3 mt-2 space-x-2">
                    <div class="flex inline-block w-full">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Delivery Address
                        </p>
                    </div>
                    <div
                        v-if="order.delivery_option == true"
                        class="flex flex-col w-full"
                    >
                        <p class="text-md text-gray-700">
                            {{ order.street_name }}
                        </p>
                        <p class="text-md text-gray-700">
                            {{ order.building }} {{ order.house_num }}
                        </p>
                        <p class="text-md text-gray-700">
                            {{ order.region }} {{ order.province }}
                            {{ order.city }} {{ order.barangay }}
                        </p>
                        <p class="text-md text-gray-700">
                            {{ order.postal_code }}
                        </p>
                    </div>
                    <div
                        v-if="order.delivery_option == false"
                        class="flex flex-col w-full"
                    >
                        Pick up to store
                    </div>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Order at:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.created_at | date }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Total Price:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        ₱
                        {{ order.quantity * order.product.price }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Quantity:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ order.quantity }}
                    </p>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Status:
                    </p>
                    <select
                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        v-model="order.status"
                    >
                        <option value="Pending">Pending</option>
                        <option value="Preparing">Preparing</option>
                        <option value="To be delivered">To be delivered</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="flex px-3 py-2 mt-10">
                    <button
                        @click="toggleRemarks = !toggleRemarks"
                        class="px-10 py-2 bg-green-500 rounded-lg font-bold text-gray-800"
                    >
                        Add Remarks
                    </button>
                </div>
                <div v-if="toggleRemarks" class="px-3 py-2">
                    <div class="flex mb-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Remarks:
                        </p>
                    </div>
                    <div class="flex">
                        <vue-editor v-model="order.remarks"></vue-editor>
                        <!-- <textarea
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                cols="30"
                                rows="5"
                                placeholder="Type comments here"
                                v-model="reservation.remarks"
                            ></textarea> -->
                    </div>
                    <div class="flex justify-end mt-24">
                        <button
                            @click="sendRemarks"
                            :disabled="loadingRemarks"
                            class="flex items-center bg-gray-700 px-3 py-2 text-xs text-white rounded font-bold text-md hover:bg-gray-600 transition duration-300"
                        >
                            <svg
                                v-if="loadingRemarks"
                                class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                style="border-right-color: white; border-top-color: white;"
                                viewBox="0 0 24 24"
                            ></svg>
                            <span v-if="loadingRemarks">Please wait..</span>
                            <span v-else>Send Remark</span>
                        </button>
                    </div>
                    <hr class="my-2" />
                </div>
                <div class="flex px-3 py-2 my-20">
                    <div class="flex justify-start">
                        <!-- <button
                                @click="deliver"
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
                            </button> -->
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
                            Product Details
                        </h1>
                    </div>
                    <div class="flex py-2">
                        <div class="relative h-72 w-full overflow-hidden">
                            <img
                                :src="`/images/${order.product.image}`"
                                alt=""
                                class="absolute h-full w-full"
                            />
                        </div>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold">
                            {{ order.product.product_name }}
                            {{ order.product.product_brand }}
                            {{ order.product.product_model }}
                        </h1>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Description:
                            </p>
                        </div>
                        <div class="flex items-center px-3 pb-10">
                            <div v-html="order.product.description"></div>
                            <!-- <p
                                class="w-full text-sm text-gray-700 text-justify tracking-tight"
                            >
                                {{ order.product.description }}
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
import { VueEditor } from 'vue2-editor';
export default {
    components: {
        VueEditor
    },
    data() {
        return {
            user: null,
            loading: false,
            toggleRemarks: false,
            loadingRemarks: false,
            errors: [],
            order: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getOrder();
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
        getOrder() {
            axios
                .get(`/api/orders/${this.$route.params.id}`)
                .then(response => {
                    this.order = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        sendRemarks() {
            this.loadingRemarks = true;

            axios
                .put(
                    `/api/ordering/${this.$route.params.id}/send/remarks`,
                    this.order
                )
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Remarks has successfully submitted.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        this.$router.push({ name: 'secretary_order' });
                    });
                })
                .finally(() => {
                    this.loadingRemarks = false;
                });
        },
        updateStatus() {
            this.loading = true;

            // setTimeout(() => {
            //     this.loading = !true;
            axios
                .put(`/api/orders/${this.$route.params.id}`, this.order)
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Status has successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'secretary_order' });
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        }
    }
};
</script>

<style></style>
