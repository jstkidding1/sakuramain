<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/3 px-4 shadow-md mt-10 mb-96">
                <div class="w-full py-3 flex justify-between">
                    <div class="flex inline-block">
                        <router-link
                            to="/vehicles"
                            style="text-decoration:none;"
                            class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                        >
                            Return to Previous Page
                        </router-link>
                    </div>
                    <div class="flex items-center">
                        <router-link
                            style="text-decoration:none"
                            class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                            to="/vehicles"
                            >Vehicle List</router-link
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
                                name: 'view-vehicle',
                                params: { id: vehicle.id }
                            }"
                            style="text-decoration:none"
                            class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                        >
                            {{ vehicle.brand_name }}
                            {{ vehicle.year_model }}
                            {{ vehicle.model_type }}</router-link
                        >
                    </div>
                </div>
                <div class="flex justify-start mt-2 px-3 py-2">
                    <div class="h-full w-1/2 mb-4">
                        <div class="aspect-w-16 aspect-h-11">
                            <img
                                :src="`/images/${vehicle.thumbnail}`"
                                class=""
                                alt=""
                            />
                        </div>
                        <div class="flex my-2">
                            <button
                                @click="toggleModal = !toggleModal"
                                class="text-xs text-gray-500 hover:text-blue-600 transition duration-300"
                            >
                                Click me to view more image
                            </button>
                        </div>
                        <div class="flex mt-2">
                            <h1 class="text-lg font-bold text-gray-700">
                                Description
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <div v-html="vehicle.vehicle_overview"></div>
                        </div>
                    </div>
                    <div class="w-1/2 ml-4">
                        <div class="flex items-center">
                            <img
                                :src="`/images/${vehicle.category.image}`"
                                class="h-8 w-8"
                                alt=""
                            />
                            <h1 class="text-2xl text-gray-700 font-bold ml-2">
                                {{ vehicle.brand_name }}
                                {{ vehicle.year_model }}
                                {{ vehicle.model_type }}
                            </h1>
                        </div>
                        <div class="flex mt-6">
                            <div class="bg-gray-50 w-full px-3 py-2">
                                <h1 class="text-3xl text-gray-600">
                                    ₱ {{ vehicle.price.toLocaleString() }}
                                </h1>
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <h1 class="text-lg font-bold text-gray-700">
                                Specifications
                            </h1>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-full border-2 border-gray-200 p-2">
                                <div class="w-full bg-gray-100 p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Body type</p>
                                        <p>{{ vehicle.body_type }}</p>
                                    </div>
                                </div>
                                <div class="w-full p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Mileage</p>
                                        <p>{{ vehicle.mileage }}</p>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-100 p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Fuel type</p>
                                        <p>{{ vehicle.fuel_type }}</p>
                                    </div>
                                </div>
                                <div class="w-full p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Transmission</p>
                                        <p>{{ vehicle.transmission }}</p>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-100 p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Drive type</p>
                                        <p>{{ vehicle.drive_type }}</p>
                                    </div>
                                </div>
                                <div class="w-full p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Color</p>
                                        <p>{{ vehicle.color }}</p>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-100 p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Drive type</p>
                                        <p>{{ vehicle.drive_type }}</p>
                                    </div>
                                </div>
                                <div class="w-full p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Engine</p>
                                        <p>{{ vehicle.engine }}</p>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-100 p-2">
                                    <div class="grid grid-cols-2">
                                        <p>Interior color</p>
                                        <p>{{ vehicle.interior_color }}</p>
                                    </div>
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
                            <div class="h-full w-full overflow-hidden">
                                <img
                                    :src="`/images/${item}`"
                                    class="w-full h-full object-cover"
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
export default {
    components: {
        slider,
        slideritem
    },
    data() {
        return {
            user: null,
            toggleModal: false,
            vehicle: '',
            options: {
                currentPage: 0,
                tracking: false,
                thresholdDistance: 100,
                thresholdTime: 300,
                infinite: 4,
                slidesToScroll: 1,
                loop: true
            }
        };
    },
    beforeMount() {
        this.getUser();
        this.getVehicle();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
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
        }
    }
};
</script>

<style></style>
