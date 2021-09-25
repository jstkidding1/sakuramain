<template>
    <div>
        <div class="container">
            <div class="flex justify-center py-4">
                <div class="w-3/4 flex justify-between">
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
                <hr class="w-3/4" />
            </div>
            <div class="flex justify-center mt-4">
                <div class="w-3/4 flex justify-start">
                    <p class="text-4xl text-gray-700">
                        {{ vehicle.brand_name }}
                        {{ vehicle.year_model }}
                        {{ vehicle.model_type }}
                    </p>
                </div>
            </div>
        </div>
        <div class="min-h-screen container">
            <div class="flex justify-center">
                <div class="w-3/4 mt-10">
                    <div class="flex space-x-10">
                        <div class="w-2/3">
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
                                        class="text-xs text-gray-500 hover:text-yellow-600 transition duration-300"
                                    >
                                        Click me to view more image
                                    </button>
                                </div>
                                <div class="flex">
                                    <!-- <div class="w-full px-3 py-2">
                                        <p
                                            class="text-gray-500 text-md text-justify"
                                        >
                                            Lorem ipsum, dolor sit amet
                                            consectetur adipisicing elit. Non
                                            quos tempore voluptatem voluptates
                                            explicabo voluptatibus
                                            exercitationem, debitis unde impedit
                                            ex iste odit? Architecto suscipit
                                            consequuntur eligendi explicabo
                                            aspernatur alias itaque.
                                        </p>
                                        <p
                                            class="text-gray-500 text-md text-justify mt-4"
                                        >
                                            Lorem ipsum, dolor sit amet
                                            consectetur adipisicing elit. Non
                                            quos tempore voluptatem voluptates
                                            explicabo voluptatibus
                                            exercitationem, debitis unde impedit
                                            ex iste odit? Architecto suscipit
                                            consequuntur eligendi explicabo
                                            aspernatur alias itaque.
                                        </p>
                                    </div> -->
                                    <!-- <slider ref="slider" :options="options">
                                        <slideritem
                                            v-for="(item,
                                            index) in vehicle.image"
                                            :key="index"
                                            :style="item.style"
                                        >
                                            <div
                                                class="relative h-96 w-full overflow-hidden"
                                            >
                                                <img
                                                    :src="`/images/${item}`"
                                                    class="w-full h-full object-cover"
                                                />
                                            </div>
                                        </slideritem>
                                    </slider> -->
                                    <button
                                        class="w-full"
                                        @click="toggleModal = !toggleModal"
                                    >
                                        <div class="h-full w-full">
                                            <img
                                                :src="
                                                    `/images/${vehicle.thumbnail}`
                                                "
                                                :alt="vehicle.brand_name"
                                                class="w-full h-full object-cover overflow-hidden"
                                            />
                                        </div>
                                    </button>
                                </div>
                                <!-- <slider ref="slider" :options="options">
                                    <slideritem
                                        v-for="(item, index) in vehicle.image"
                                        :key="index"
                                    >
                                        <div
                                            class="h-96 w-full overflow-hidden"
                                        >
                                            <img
                                                @click="
                                                    toggleModal = !toggleModal
                                                "
                                                :src="`/images/${item}`"
                                                class="w-full h-full object-cover"
                                            />
                                        </div>
                                    </slideritem>
                                </slider> -->
                            </div>
                            <div class="bg-white shadow-md rounded mt-10">
                                <div class="flex pt-4 px-3">
                                    <p class="text-lg text-gray-700 font-bold">
                                        Contents
                                    </p>
                                </div>
                                <div class="flex py-4 px-3 space-x-20">
                                    <!-- <div class="grid grid-cols-4 gap-6 my-4"> -->
                                    <a
                                        href="#overview"
                                        style="text-decoration:none;"
                                        class="text-md text-gray-700 hover:text-yellow-600 transition duration-300"
                                        >Overview
                                        <i class="fas fa-chevron-right ml-2"></i
                                    ></a>

                                    <a
                                        href="#specifications"
                                        style="text-decoration:none;"
                                        class="text-md text-gray-700 hover:text-yellow-600 transition duration-300"
                                        >Specifications
                                        <i class="fas fa-chevron-right ml-2"></i
                                    ></a>

                                    <a
                                        href=""
                                        style="text-decoration:none;"
                                        class="text-md text-gray-700 hover:text-yellow-600 transition duration-300"
                                        >Price
                                        <i class="fas fa-chevron-right ml-2"></i
                                    ></a>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div
                                id="overview"
                                class="bg-white shadow-md rounded py-4 mt-14"
                            >
                                <div class="flex px-3">
                                    <h1 class="text-2xl text-gray-900">
                                        {{ vehicle.brand_name }}
                                        {{ vehicle.model_type }}
                                        Overview
                                    </h1>
                                </div>
                                <div class="flex pt-4 px-3">
                                    <p
                                        class="text-md text-gray-600 text-justify tracking-normal"
                                    >
                                        {{ vehicle.vehicle_overview }}
                                    </p>
                                </div>
                            </div>
                            <div
                                id="specifications"
                                class="bg-white shadow-md rounded py-4 mt-14"
                            >
                                <div class="flex px-3">
                                    <h1 class="text-2xl text-gray-900">
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
                                        class="text-gray-50 bg-gray-900 mt-4 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300 mr-2"
                                    >
                                        Key Specs
                                    </button>
                                    <button
                                        class="text-gray-500 border-2 border-gray-500 mt-4 py-2 px-3 hover:text-yellow-600 rounded text-lg font-bold transition duration-300"
                                    >
                                        View Full Specs
                                    </button>
                                </div>
                                <div class="flex">
                                    <div class="px-3 mt-2 w-full">
                                        <div
                                            class="border-2 borde-gray-700 p-2"
                                        >
                                            <div
                                                class="grid grid-cols-2 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Body type</label
                                                >
                                                <div
                                                    class="text-gray-700 text-md"
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
                                                    class="text-gray-700 text-md"
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
                                                    class="text-gray-700 text-md"
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
                                                    class="text-gray-700 text-md"
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
                                                    class="text-gray-700 text-md"
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
                                                    class="text-gray-700 text-md"
                                                >
                                                    {{ vehicle.engine }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="bg-white shadow-md rounded py-4 mt-10">
                                <div class="flex px-3">
                                    <p class="text-gray-700 text-sm">
                                        Reviews
                                    </p>
                                </div>
                                <div
                                    class="flex justify-between items-center px-3 space-x-5"
                                >
                                    <p
                                        class="text-gray-500 mt-10 text-xs mb-20"
                                    >
                                        Detailed, constructive and polite
                                        feedback in reviews is valuable input
                                        for our online review community,
                                        including the businesses reviewed.
                                    </p>
                                    <div
                                        class="h-full w-72 transform transition duration-700 hover:-translate-y-1 hover:scale-105"
                                    >
                                        <img
                                            :src="review2"
                                            alt=""
                                            class="w-40 h-40 object-cover"
                                        />
                                    </div>
                                </div>
                                <div class="px-3">
                                    <hr />
                                </div>
                                <div class="flex px-3 mt-2">
                                    <div
                                        class="border-2 border-gray-200 w-full rounded-lg p-2"
                                    >
                                        <div class="flex items-center">
                                            <img
                                                :src="avatar"
                                                alt=""
                                                class="relative w-12 h-12 mr-3 rounded-full md:block"
                                            />
                                            <p class="text-gray-700 text-sm">
                                                {{ vehicle.review.name }}
                                            </p>
                                        </div>
                                        <div class="flex px-16">
                                            <p class="text-sm text-gray-700">
                                                {{ vehicle.review.comments }}
                                            </p>
                                        </div>
                                        <div class="flex justify-end px-3 py-2">
                                            <p class="text-xs text-gray-500">
                                                Posted:
                                                {{
                                                    vehicle.review.created_at
                                                        | date
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="bg-white shadow-md rounded py-4 mt-10">
                                <div class="flex px-3">
                                    <p class="text-gray-700 text-sm">
                                        Add a review
                                    </p>
                                </div>
                                <div
                                    class="flex justify-between items-center px-3 space-x-5"
                                >
                                    <p
                                        class="text-gray-500 mt-10 text-xs mb-20"
                                    >
                                        Detailed, constructive and polite
                                        feedback in reviews is valuable input
                                        for our online review community,
                                        including the businesses reviewed.
                                    </p>
                                    <div
                                        class="h-full w-72 transform transition duration-700 hover:-translate-y-1 hover:scale-105"
                                    >
                                        <img
                                            :src="review1"
                                            alt=""
                                            class="w-40 h-40 object-cover"
                                        />
                                    </div>
                                </div>
                                <div class="px-3">
                                    <hr />
                                </div>
                                <div class="flex">
                                    <div class="px-3 mt-2 w-full">
                                        <div class="p-2">
                                            <div
                                                class="grid grid-cols-2 gap-4 p-2"
                                            >
                                                <label class="font-bold text-md"
                                                    >Name
                                                    <span style="color:#ff0000"
                                                        >*</span
                                                    ></label
                                                >
                                                <label class="font-bold text-md"
                                                    >Email
                                                    <span style="color:#ff0000"
                                                        >*</span
                                                    ></label
                                                >
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <input
                                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                    type="text"
                                                    placeholder="Name"
                                                    v-model="form.name"
                                                />
                                                <input
                                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                    type="text"
                                                    placeholder="Email"
                                                    v-model="form.email"
                                                />
                                            </div>
                                            <div class="flex w-full">
                                                <div class="w-1/2">
                                                    <span
                                                        class="text-xs text-red-500"
                                                        v-if="errors.name"
                                                        >{{
                                                            errors.name[0]
                                                        }}</span
                                                    >
                                                </div>
                                                <div class="w-1/2">
                                                    <span
                                                        class="text-xs text-red-500"
                                                        v-if="errors.email"
                                                        >{{
                                                            errors.email[0]
                                                        }}</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="flex mt-4 px-2">
                                                <label class="font-bold text-md"
                                                    >Add a comment
                                                    <span style="color:#ff0000"
                                                        >*</span
                                                    ></label
                                                >
                                            </div>
                                            <div class="flex w-full">
                                                <textarea
                                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                                    cols="30"
                                                    rows="8"
                                                    placeholder="Type comments here"
                                                    v-model="form.comments"
                                                ></textarea>
                                            </div>
                                            <div class="flex w-full">
                                                <div class="w-1/2">
                                                    <span
                                                        class="text-xs text-red-500"
                                                        v-if="errors.comments"
                                                        >{{
                                                            errors.comments[0]
                                                        }}</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="flex justify-end mt-2">
                                                <button
                                                    @click="submitReview"
                                                    :disabled="loading"
                                                    class="flex items-center bg-gray-900 px-3 py-3 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                                                >
                                                    <svg
                                                        v-if="loading"
                                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                                        style="border-right-color: white; border-top-color: white;"
                                                        viewBox="0 0 24 24"
                                                    ></svg>
                                                    <span v-if="loading"
                                                        >Please wait..</span
                                                    >
                                                    <span v-else>Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="w-2/5 p-2">
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
                                    <p
                                        class="text-yellow-600 font-bold text-xl"
                                    >
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
                                        class="text-sm text-gray-700 hover:text-yellow-600 transition duration-300"
                                        >How does it work?</a
                                    >
                                </div>
                            </div>
                            <div class="bg-gray-100 w-full h-64 px-4 py-3 mt-4">
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
                                <div class="space-y-2 mt-2">
                                    <div class="flex justify-center px-4">
                                        <router-link
                                            :to="{
                                                path:
                                                    '/request/quote?qid=' +
                                                    vehicle.id
                                            }"
                                            style="text-decoration:none;"
                                            class="w-full text-center bg-yellow-700 px-4 py-2 text-gray-50 font-bold hover:bg-yellow-500 hover:text-gray-50 rounded text-lg transition duration-300"
                                            >Get Quotes</router-link
                                        >
                                    </div>
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
                                            class="w-full text-center border-2 border-gray-500 px-4 py-2 text-gray-500 font-bold hover:bg-gray-500 hover:text-white rounded text-lg transition duration-300"
                                            >Request A Test Drive</router-link
                                        >
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
