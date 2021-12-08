<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 h-full rounded shadow-md mt-10">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <button
                                @click="$router.go(-1)"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </button>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                to="/dashboard/main"
                                >Home</router-link
                            >
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
                                    name: 'customer-view-reservation',
                                    params: { id: reservation.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >View Reservation</router-link
                            >
                        </div>
                    </div>
                </div>
                <div v-if="reservation.remarks != null" class="flex px-3 py-4">
                    <div class="bg-gray-50 w-full rounded px-4 py-2">
                        <div class="flex items-center px-3 space-x-2 mt-4">
                            <h1 class="text-green-500 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </h1>
                            <h1 class="text-gray-500 text-md font-bold">
                                Remarks
                            </h1>
                        </div>
                        <div class="flex px-3 my-4">
                            <div v-html="reservation.remarks"></div>
                        </div>
                        <div class="flex px-3 my-4">
                            <span class="text-gray-400 text-xs">{{
                                reservation.updated_at | date
                            }}</span>
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
                        Ordered by:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ user.fname }}
                        {{ user.mname }}
                        {{ user.lname }}
                    </p>
                </div>
                <div class="flex px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Email:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ user.email }}
                    </p>
                </div>
                <div class="flex py-2 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Address:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ user.address }}
                    </p>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Contact Number:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        +63{{ user.contact_num }}
                    </p>
                </div>
                <div class="flex px-3 py-2 mt-4">
                    <h1 class="text-gray-700 font-bold text-lg">
                        Reservation Information
                    </h1>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Submitted:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ reservation.created_at | date }}
                    </p>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2">
                    <p class="w-1/2 text-md text-gray-700 font-bold">
                        Status:
                    </p>
                    <div class="flex justify-start">
                        <p
                            v-if="reservation.status == 'Reserved'"
                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                        >
                            Reserved
                        </p>
                        <p
                            v-if="reservation.status == 'Approved'"
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Approved
                        </p>
                        <p
                            v-if="reservation.status == 'Refunded'"
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Refunded
                        </p>
                        <p
                            v-if="reservation.status == 'Fully Paid'"
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Fully Paid
                        </p>
                        <p
                            v-if="reservation.status == 'Pending'"
                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                        >
                            Pending
                        </p>
                        <p
                            v-if="reservation.status == 'Declined'"
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                        >
                            Declined
                        </p>
                    </div>
                </div>
                <div class="flex py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Comments:
                    </p>
                    <p class="w-full text-md text-gray-700">
                        {{ reservation.comments }}
                    </p>
                </div>
                <div class="flex px-3 py-4">
                    <div class="bg-gray-50 rounded px-4 py-2">
                        <div class="flex items-center px-3 space-x-2 my-4">
                            <h1 class="text-red-500 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </h1>
                            <h1 class="text-gray-500 text-xs">
                                Please be advised that your reservation fee for
                                your reservation is totally refundable.
                            </h1>
                        </div>
                        <div class="flex items-center px-3 space-x-2 my-4">
                            <h1 class="text-green-500 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                </svg>
                            </h1>
                            <h1 class="text-gray-500 text-xs">
                                Note that the reservation fee will be 20% of the
                                total amount of the vehicle. Do not worry if you
                                are still hesitating to actually purchase the
                                unit your reservation fee is 100% refundable.
                            </h1>
                        </div>
                        <div class="flex items-center px-3 space-x-2 my-4">
                            <h1 class="text-indigo-500 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                    />
                                </svg>
                            </h1>
                            <h1 class="text-gray-500 text-xs">
                                <div class="flex">
                                    <p>
                                        Payment thru: Gcash - 09297806933
                                    </p>
                                </div>
                                <div class="flex">
                                    <p>
                                        Bank Transfer - Jan Palacio: Acct. No. -
                                        0902384092
                                    </p>
                                </div>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2">
                    <p class="w-full text-md text-gray-700 font-bold">
                        Add reciept of reservation fee:
                    </p>
                </div>
                <div class="flex items-center py-1 px-3 space-x-2 mt-2">
                    <span class="text-red-500 text-xs" v-if="errors.image">{{
                        errors.image[0]
                    }}</span>
                </div>
                <div v-if="!reservation.image">
                    <div
                        v-if="preview == false"
                        class="flex items-center justify-center w-full mb-20"
                    >
                        <label
                            class="flex flex-col rounded-lg border-4 border-dashed h-96 p-10 group text-center"
                        >
                            <div
                                class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                            >
                                <div
                                    class="flex justify-center flex-auto h-96 mx-auto -mt-10"
                                >
                                    <img
                                        class="has-mask h-36 object-center"
                                        src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                        alt="freepik image"
                                    />
                                </div>
                                <p class="pointer-none text-gray-500 ">
                                    <span class="text-sm">Drag and drop</span>
                                    image here <br />
                                    or
                                    <a
                                        id=""
                                        class="text-blue-600 hover:underline"
                                        >select an image</a
                                    >
                                    from your computer
                                </p>
                            </div>

                            <input
                                @change="onChange"
                                type="file"
                                class="hidden"
                            />
                        </label>
                    </div>
                    <div
                        v-else
                        class="flex items-center justify-center w-full mb-20"
                    >
                        <label
                            class="flex flex-col rounded-lg h-96 group text-center"
                        >
                            <div
                                class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                            >
                                <div
                                    class="flex justify-center flex-auto h-96 mx-auto overflow-hidden"
                                >
                                    <img
                                        class="h-full w-full object-cover"
                                        :src="preview"
                                    />
                                </div>
                            </div>

                            <input
                                @change="onChange"
                                type="file"
                                class="hidden"
                            />
                        </label>
                    </div>
                </div>

                <div v-if="reservation.image">
                    <div class="flex justify-center mt-4">
                        <button @click="toggleModal = true">
                            <div class="relative h-96 overflow-hidden">
                                <img
                                    :src="`/images/${reservation.image}`"
                                    alt=""
                                    class="h-full w-full object-cover bg-center"
                                />
                            </div>
                        </button>
                    </div>
                    <div class="flex px-24 mb-20 mt-4">
                        <input @change="onChange" type="file" />
                    </div>
                </div>
                <div
                    v-if="preview"
                    class="flex space-x-4 justify-end px-8 py-8"
                >
                    <button
                        @click.prevent="postImage"
                        :disabled="loading"
                        class="flex items-center bg-gray-900 px-3 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300 mt-2"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Please wait..</span>
                        <span v-else>Submit</span>
                    </button>
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
                                :src="
                                    `/images/${reservation.vehicle.thumbnail}`
                                "
                                alt=""
                                class="absolute h-full w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold capitalize">
                            {{ reservation.vehicle.brand_name }}
                            {{ reservation.vehicle.model_type }}
                            {{ reservation.vehicle.year_model }}
                        </h1>
                    </div>
                    <div class="flex px-3 py-2">
                        <h1 class="text-lg text-gray-700 font-bold">
                            ₱
                            {{ reservation.vehicle.price.toLocaleString() }}
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
                                {{ reservation.vehicle.body_type }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Mileage:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.mileage }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Fuel Type:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.fuel_type }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Transmission:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.transmission }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Engine:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.engine }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Drive Type:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.drive_type }}
                            </p>
                        </div>
                        <div class="flex items-center px-3">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Color:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.color }}
                            </p>
                        </div>
                        <div class="flex items-center px-3 pb-10">
                            <p
                                class="w-full text-sm text-gray-700 font-bold mr-2"
                            >
                                Interior Color:
                            </p>
                            <p class="w-full text-sm text-gray-700">
                                {{ reservation.vehicle.interior_color }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50"
            v-if="toggleModal"
        >
            <div class="relative mx-auto w-auto max-w-2xl">
                <div class="w-full h-full flex flex-col">
                    <div class="flex justify-end p-2 overflow-hidden">
                        <button @click="toggleModal = false">
                            <svg
                                class="fill-current h-10 w-10 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 18 18"
                            >
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                    <div class="h-full w-full overflow-hidden">
                        <img
                            :src="`/images/${reservation.image}`"
                            class="w-full h-full object-cover"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div
            v-if="toggleModal"
            class="absolute z-40 inset-0 opacity-75 bg-black"
        ></div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data() {
        return {
            user: null,
            preview: false,
            loading: false,
            toggleModal: false,
            image: '',
            reservation: [],
            errors: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getReservation();
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
        postImage() {
            this.loading = true;

            axios
                .put(
                    `/api/reservations/${this.$route.params.id}`,
                    this.reservation
                )
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Image has been added.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push('/dashboard/reservations');
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading - false;
                });
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };

            const config = {
                header: { content_type: 'multipart/form-data' }
            };
            var formData = new FormData();
            formData.append('image', this.image);
            axios
                .post('/api/reservations/upload/image', formData, config)
                .then(response => {
                    this.reservation.image = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        getReservation() {
            axios
                .get(`/api/user/${this.$route.params.id}/reservation`)
                .then(response => {
                    this.reservation = response.data;
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
