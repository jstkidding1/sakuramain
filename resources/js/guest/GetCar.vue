<template>
    <div>
        <div class="container">
            <div class="flex justify-center py-4">
                <div class="sm:w-full lg:w-3/4 flex justify-between">
                    <div class="flex inline-block">
                        <button
                            @click="$router.go(-1)"
                            class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                        >
                            Return to Previous Page
                        </button>
                    </div>
                    <div class="flex items-center">
                        <router-link
                            style="text-decoration:none"
                            class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                            to="/"
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
                            style="text-decoration:none"
                            class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                            to="/cars"
                            >All Cars</router-link
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
                                name: 'get-car',
                                params: {
                                    id: vehicle.id
                                }
                            }"
                            class="text-xs text-gray-700 hover:text-gray-700 transition duration-300"
                            style="text-decoration:none"
                            aria-current="page"
                        >
                            {{ vehicle.year_model }}
                            {{ vehicle.brand_name }}
                            {{ vehicle.model_type }}</router-link
                        >
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <hr class="sm:w-full lg:w-3/4" />
            </div>
            <div class="flex justify-center mt-4">
                <div class="sm:w-full lg:w-3/4 flex items-center justify-start">
                    <img
                        :src="`/images/${vehicle.category.image}`"
                        class="h-12 w-12 mr-2"
                        alt=""
                    />
                    <p class="text-4xl font-bold text-gray-700">
                        {{ vehicle.brand_name }}
                        {{ vehicle.year_model }}
                        {{ vehicle.model_type }}
                    </p>
                </div>
            </div>
        </div>
        <div class="min-h-screen container">
            <div class="flex justify-center">
                <div class="sm:w-full lg:w-3/4 mt-10">
                    <div class="md:flex no-wrap md:-mx-2 lg:space-x-10">
                        <div class="lg:w-2/3 sm:w-full">
                            <div class="bg-white shadow-md rounded">
                                <div class="flex pt-4">
                                    <p
                                        class="text-lg text-gray-700 font-bold px-3"
                                    >
                                        Image Gallery
                                    </p>
                                </div>
                                <div class="flex my-2 px-3">
                                    <button
                                        @click="toggleModal = !toggleModal"
                                        class="text-xs text-gray-500 hover:text-blue-600 transition duration-300"
                                    >
                                        Click me to view more image
                                    </button>
                                </div>
                                <div class="flex">
                                    <button
                                        class="w-full"
                                        @click="toggleModal = !toggleModal"
                                    >
                                        <div class="aspect-w-16 aspect-h-11">
                                            <img
                                                :src="
                                                    `/images/${vehicle.thumbnail}`
                                                "
                                                :alt="vehicle.brand_name"
                                                class="h-full w-full"
                                            />
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div
                                id="overview"
                                class="bg-white shadow-md rounded py-4 mt-8"
                            >
                                <div class="flex px-3">
                                    <h1
                                        class="text-2xl capitalize text-gray-900"
                                    >
                                        {{ vehicle.brand_name }}
                                        {{ vehicle.model_type }}
                                        Overview
                                    </h1>
                                </div>
                                <div class="flex pt-4 px-3">
                                    <div
                                        v-html="vehicle.vehicle_overview"
                                    ></div>
                                </div>
                            </div>
                            <div
                                id="specifications"
                                class="bg-white shadow-md rounded py-4 mt-8 lg:mb-20 md:mb-20"
                            >
                                <div class="flex px-3">
                                    <h1
                                        class="text-2xl capitalize text-gray-900"
                                    >
                                        {{ vehicle.brand_name }}
                                        {{ vehicle.model_type }}
                                        Specifications
                                    </h1>
                                </div>
                                <div class="flex mt-2 px-2">
                                    <p
                                        class="text-xs text-gray-600 px-2 text-justify tracking-tight"
                                    >
                                        Key specifications & features of the
                                        {{ vehicle.brand_name }}
                                        {{ vehicle.model_type }}. View engine
                                        specs, dimensions, safety and technology
                                        features in our full variant pages.
                                    </p>
                                </div>
                                <div class="flex justify-start mt-2 px-3">
                                    <button
                                        class="text-gray-50 capitalize bg-gray-900 mt-4 py-2 px-3 hover:text-blue-600 rounded text-lg font-bold transition duration-300 mr-2"
                                    >
                                        Specifications
                                    </button>
                                </div>
                                <div class="flex">
                                    <div class="px-3 mt-2 w-full">
                                        <div
                                            class="border-2 borde-gray-700 p-2"
                                        >
                                            <div
                                                class="grid grid-cols-2 bg-gray-200 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Year model</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.year_model }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Body type</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.body_type }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 bg-gray-200 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Mileage</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.mileage }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Fuel type</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.fuel_type }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 bg-gray-200 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Transmission</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.transmission }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Drive type</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.drive_type }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 bg-gray-200 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Engine</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.engine }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Color</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.color }}
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-2 bg-gray-200 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Interior Color</label
                                                >
                                                <div
                                                    class="text-gray-700 capitalize text-md"
                                                >
                                                    {{ vehicle.interior_color }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl:w-2/5 lg:w-2/3 sm:w-full p-2">
                            <div class="w-full h-84 bg-gray-100 px-4 py-3 p-2">
                                <div class="flex py-2 px-3">
                                    <h5 class="text-gray-900 text-xl font-bold">
                                        Buy your new {{ vehicle.brand_name }}
                                        {{ vehicle.model_type }}!
                                    </h5>
                                </div>
                                <div class="flex items-center px-3">
                                    <p class="text-gray-700 text-md mr-2">
                                        Reserve for
                                    </p>
                                    <p class="text-blue-600 font-bold text-xl">
                                        ₱ {{ vehicle.price.toLocaleString() }}
                                    </p>
                                </div>
                                <div class="flex px-4">
                                    <div
                                        class="bg-white w-full p-2 mt-2 rounded"
                                    >
                                        <div
                                            class="flex items-center px-4 py-2"
                                        >
                                            <img
                                                :src="check"
                                                alt=""
                                                class="h-5 w-5 object-cover mr-4"
                                            />
                                            <p>Select Vehicle</p>
                                        </div>
                                        <div
                                            class="flex items-center px-4 py-2"
                                        >
                                            <img
                                                :src="check"
                                                alt=""
                                                class="h-5 w-5 object-cover mr-4"
                                            />
                                            <p>Make Reservation Online</p>
                                        </div>
                                        <div
                                            class="flex items-center px-4 py-2"
                                        >
                                            <img
                                                :src="check"
                                                alt=""
                                                class="h-5 w-5 object-cover mr-4"
                                            />
                                            <p>
                                                No hassle refund
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-center px-4 py-2 mt-2">
                                    <router-link
                                        :to="{
                                            path:
                                                '/reservation?vid=' + vehicle.id
                                        }"
                                        style="text-decoration:none;"
                                        class="w-full bg-gray-900 text-center px-4 py-2 text-gray-50 font-bold hover:bg-gray-500 hover:text-gray-50 rounded text-lg transition duration-300"
                                        >Reserve Your Vehicle</router-link
                                    >
                                </div>
                                <div class="flex justify-center">
                                    <a
                                        href="/reserve/online"
                                        style="text-decoration:none;"
                                        class="text-sm text-gray-700 hover:text-blue-600 transition duration-300"
                                        >How does it work?</a
                                    >
                                </div>
                            </div>
                            <div class="bg-gray-100 w-full h-52 px-4 py-3 mt-4">
                                <div class="flex px-2 mb-2">
                                    <h5 class="text-gray-900 text-xl font-bold">
                                        Get The Best Deal
                                    </h5>
                                </div>
                                <div class="flex px-2">
                                    <p class="text-gray-500 text-xs">
                                        Get quotations from Sakura Auto-Parts
                                        Trading Inc.
                                    </p>
                                </div>
                                <div class="space-y-2 mt-4">
                                    <!-- <div class="flex justify-center px-4">
                                        <router-link
                                            :to="{
                                                path:
                                                    '/request/quote?qid=' +
                                                    vehicle.id
                                            }"
                                            style="text-decoration:none;"
                                            class="w-full text-center bg-blue-700 px-4 py-2 text-gray-50 font-bold hover:bg-blue-500 hover:text-gray-50 rounded text-lg transition duration-300"
                                            >Get Quotes</router-link
                                        >
                                    </div> -->
                                    <div class="flex justify-center px-4">
                                        <router-link
                                            :to="{
                                                path:
                                                    '/make/inquiry?viq=' +
                                                    vehicle.id
                                            }"
                                            style="text-decoration:none;"
                                            class="w-full bg-gray-900 text-center px-4 py-2 text-gray-50 font-bold hover:bg-gray-500 hover:text-gray-50 rounded text-lg transition duration-300"
                                            >Inquire</router-link
                                        >
                                    </div>
                                    <div class="flex justify-center px-4">
                                        <router-link
                                            :to="{
                                                path:
                                                    '/request/test/drive?rid=' +
                                                    vehicle.id
                                            }"
                                            style="text-decoration:none;"
                                            class="w-full text-center bg-blue-700 px-4 py-2 text-gray-50 font-bold hover:bg-blue-500 hover:text-gray-50 rounded text-lg transition duration-300"
                                            >Request A Test Drive</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-100 w-full h-96 px-4 py-3 mt-4">
                                <div class="flex px-2 mb-2">
                                    <h5 class="text-gray-900 text-xl font-bold">
                                        Quotation
                                    </h5>
                                </div>
                                <div class="flex px-2">
                                    <p class="text-gray-500 text-xs">
                                        Get quotations from Sakura Auto-Parts
                                        Trading Inc.
                                    </p>
                                </div>
                                <div class="flex px-2">
                                    <p class="text-gray-500 text-xs">
                                        Take not that this is only an estimation
                                        of the actual payment.
                                    </p>
                                </div>
                                <div class="flex px-2 mt-4">
                                    <p class="text-gray-900 text-md">
                                        Price of vehicle: ₱
                                        {{ vehicle.price.toLocaleString() }}
                                    </p>
                                </div>
                                <div class="flex px-2 mt-2">
                                    <p class="text-gray-900 text-md">
                                        Downpayment Fee 30%: ₱
                                        {{ (vehicle.price * 0.3) | currency }}
                                    </p>
                                </div>
                                <div class="flex mt-8">
                                    <table class="bg-white">
                                        <thead>
                                            <tr
                                                class="text-xs tracking-wide text-left text-gray-900 bg-gray-100 capitalize border-b border-gray-600"
                                            >
                                                <th class="px-4 py-2">
                                                    Monthly Installment plan
                                                </th>
                                                <th class="px-4 py-2">
                                                    Monthly Payment
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <tr>
                                                <td
                                                    class="px-4 py-2 text-ms border"
                                                >
                                                    1st Month
                                                </td>
                                                <td
                                                    class="px-4 py-2 text-ms border"
                                                >
                                                    {{
                                                        ((vehicle.price * 0.3) /
                                                            1)
                                                            | currency
                                                    }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="px-4 py-2 text-ms border"
                                                >
                                                    2nd Month
                                                </td>
                                                <td
                                                    class="px-4 py-2 text-ms border"
                                                >
                                                    {{
                                                        ((vehicle.price *
                                                            0.35) /
                                                            1)
                                                            | currency
                                                    }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="px-4 py-2 text-ms border"
                                                >
                                                    3rd Month
                                                </td>
                                                <td
                                                    class="px-4 py-2 text-ms border"
                                                >
                                                    {{
                                                        ((vehicle.price *
                                                            0.35) /
                                                            1)
                                                            | currency
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                    <slider ref="slider" :options="options">
                        <slideritem
                            v-for="(item, index) in vehicle.image"
                            :key="index"
                            :style="item.style"
                        >
                            <div class="h-4/5 w-4/5 overflow-hidden">
                                <img
                                    :src="`/images/${item}`"
                                    class="w-full h-full"
                                />
                            </div>
                        </slideritem>
                    </slider>
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
import { slider, slideritem } from 'vue-concise-slider';
import moment from 'moment';
export default {
    components: {
        slider,
        slideritem
    },
    data() {
        return {
            loading: false,
            toggleModal: false,
            form: {
                name: '',
                email: '',
                comments: ''
            },
            options: {
                currentPage: 0,
                tracking: false,
                thresholdDistance: 100,
                thresholdTime: 300,
                infinite: 1,
                slidesToScroll: 1,
                loop: true
            },
            review1: '/images/Undraw.png',
            check: '/images/check.png',
            review2: '/images/reviews.png',
            avatar: '/images/Avatar.png',
            vehicle: '',
            reviews: [],
            errors: []
        };
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value))
                    .startOf('hour')
                    .fromNow();
            }
        },
        currency(amount) {
            const amt = Number(amount);
            return (
                (amt &&
                    amt.toLocaleString(undefined, {
                        maximumFractionDigits: 2
                    })) ||
                '0'
            );
        }
    },
    // mounted() {
    //     this.getReviews();
    // },
    beforeMount() {
        this.getVehicle();
    },
    methods: {
        // getReviews() {
        //     axios
        //         .get('/api/vehicle/reviews')
        //         .then(response => {
        //             this.reviews = response.data;
        //         })
        //         .catch(error => {
        //             console.error(error);
        //         });
        // },
        getVehicle() {
            axios
                .get(`/api/vehicle/${this.$route.params.id}`)
                .then(response => {
                    this.vehicle = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        submitReview(e) {
            e.preventDefault();
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .post('/api/reviews', {
                        name: this.form.name,
                        email: this.form.email,
                        comments: this.form.comments,
                        vehicle_id: this.vehicle.id
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Review Added.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(response => {
                            this.form = response.data;
                            console.log(response.data);
                        });
                    })
                    .then(() => {
                        window.location.reload();
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        }
        // slideNext() {
        //     this.$refs.slider.$emit('slideNext');
        // },
        // slide() {
        //     this.$refs.slider.$emit('slidePre');
        // }
    }
};
</script>

<style scoped></style>
