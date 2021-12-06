<template>
    <div>
        <div class="container mb-20">
            <div v-if="!isLogged">
                <div class="flex flex-col h-screen">
                    <div class="flex items-center justify-center mt-56">
                        <div class="w-1/2 bg-white rounded shadow-md">
                            <div class="flex py-3 px-3">
                                <div class="w-full flex justify-start">
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
                            <div class="flex justify-center px-3 py-4">
                                <h1 class="text-lg text-gray-700 font-bold">
                                    Login Required
                                </h1>
                            </div>
                            <div class="flex justify-center px-3 py-4">
                                <div class="flex justify-between space-x-4">
                                    <button
                                        @click="login"
                                        type="submit"
                                        class="flex items-center bg-gray-900 px-4 py-2 text-white rounded font-bold text-lg hover:bg-gray-500 transition duration-300"
                                    >
                                        <span>Login</span>
                                    </button>
                                    <button
                                        @click="register"
                                        type="submit"
                                        class="flex items-center bg-gray-900 px-4 py-2 text-white rounded font-bold text-lg hover:bg-gray-500 transition duration-300"
                                    >
                                        <span>Register</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isLogged">
                <div class="flex justify-center py-4">
                    <div class="sm:w-full lg:w-3/4 flex justify-between">
                        <div class="w-full flex justify-between">
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
                                    to="/auto-parts"
                                    >Auto-Parts</router-link
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
                                        name: 'single-product',
                                        params: { id: product.id }
                                    }"
                                    style="text-decoration:none"
                                    class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                    aria-current="page"
                                    >{{ product.product_name }}
                                    {{ product.product_model }}
                                    {{ product.product_brand }}</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <hr class="sm:w-full lg:w-3/4" />
                </div>
            </div>
            <div v-if="isLogged">
                <div class="flex justify-center">
                    <div
                        class="md:flex no-wrap md:-mx-2 lg:space-x-10 lg:flex justify-center"
                    >
                        <div class="sm:w-full lg:w-2/5">
                            <div class="bg-white w-full shadow-md pb-4">
                                <!-- <div class="flex py-3 px-3">
                                <div class="w-full flex justify-between">
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
                                            class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                            to="/auto-parts"
                                            >Auto Parts</router-link
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
                                                name: 'single-product',
                                                params: { id: product.id }
                                            }"
                                            style="text-decoration:none"
                                            class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                            aria-current="page"
                                            >{{ product.product_name }}
                                            {{ product.product_model }}
                                            {{
                                                product.product_brand
                                            }}</router-link
                                        >
                                    </div>
                                </div>
                            </div> -->
                                <div class="flex px-3 py-3 mt-4">
                                    <h1 class="text-xl text-gray-800 font-bold">
                                        Checkout
                                    </h1>
                                </div>
                                <div
                                    class="flex items-center py-2 px-3 border-l-2 border-green-500 mt-4"
                                >
                                    <p class="text-xs text-gray-600">
                                        Please review the details you entered in
                                        the delivery form for a more accurate
                                        and hassle free delivery. If you have
                                        questions about our delivery method
                                        please do not hesitate to contact us
                                        through our facebook page.
                                        <a
                                            href="https://www.facebook.com/Sakura-Auto-Parts-Trading-1412649018771591"
                                            class="text-xs text-blue-500 transition duration-300"
                                            style="text-decoration:none;"
                                            >Click here to visit.</a
                                        >
                                        <!-- <a>Click here to visit</a> -->
                                    </p>
                                </div>
                                <div class="flex py-4 px-3">
                                    <h5 class="text-xl text-gray-900 font-bold">
                                        Product Information
                                    </h5>
                                </div>
                                <div class="flex w-full pl-3 mt-2">
                                    <router-link
                                        :to="{
                                            name: 'single-product',
                                            params: {
                                                id: product.id
                                            }
                                        }"
                                        style="text-decoration:none"
                                        class="h-52 w-52 overflow-hidden"
                                    >
                                        <img
                                            :src="`/images/${product.image}`"
                                            :alt="product.product_name"
                                            class="h-full w-full"
                                        />
                                    </router-link>
                                    <div>
                                        <h5
                                            class="ml-4 text-lg text-gray-900 font-bold"
                                        >
                                            {{ product.product_name }}
                                            {{ product.product_brand }}
                                            {{ product.product_model }}
                                        </h5>
                                        <h5
                                            class="ml-4 text-lg text-blue-600 font-bold mt-2"
                                        >
                                            ₱
                                            {{ product.price.toLocaleString() }}
                                        </h5>
                                        <div class="flex items-center ml-4">
                                            <p
                                                class="text-sm text-gray-500 mr-4"
                                            >
                                                Quantity
                                            </p>
                                            <input
                                                type="number"
                                                name="units"
                                                :min="1"
                                                step="1"
                                                :max="product.units"
                                                class="w-1/3 focus:bg-white border-2 border-gray-600 p-1 rounded outline-none focus:border-gray-800 transition duration-300"
                                                v-model="quantity"
                                                @keydown="onKeydown"
                                                @change="checkUnits"
                                            />
                                            <span
                                                class="text-xs text-gray-500 ml-2"
                                            >
                                                {{ product.units }} piece
                                                available.
                                            </span>
                                        </div>
                                        <div class="flex px-3 py-2">
                                            <span
                                                class="text-xs text-red-500"
                                                v-if="errors.quantity"
                                                >{{ errors.quantity[0] }}</span
                                            >
                                        </div>
                                        <div class="flex ml-4 py-2">
                                            <p
                                                class="w-1/5 text-sm text-gray-500 mr-4"
                                            >
                                                Total
                                            </p>
                                            <p
                                                class="w-full text-sm font-sans font-bold text-gray-800"
                                            >
                                                ₱
                                                {{ quantity * product.price }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-4 px-3">
                                    <h5 class="text-xl text-gray-900 font-bold">
                                        Delivery Address
                                    </h5>
                                </div>
                                <div class="flex mt-2">
                                    <div class="flex inline-block px-3 mt-2">
                                        <label class="font-bold text-md"
                                            >Order via
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <span
                                            class="ml-2 text-xs text-red-500"
                                            v-if="errors.delivery_option"
                                            >{{
                                                errors.delivery_option[0]
                                            }}</span
                                        >
                                    </div>
                                </div>
                                <div class="flex items-center px-3 my-4">
                                    <input
                                        @click="cod = false"
                                        type="radio"
                                        v-model="delivery_option"
                                        v-bind:value="false"
                                    />
                                    <p class="ml-2 text-md text-gray-600">
                                        Pick-up
                                    </p>
                                    <input
                                        @click="cod = true"
                                        type="radio"
                                        class="ml-4"
                                        v-model="delivery_option"
                                        v-bind:value="true"
                                    />
                                    <p class="ml-2 text-md text-gray-600">
                                        Cash on delivery
                                    </p>
                                </div>
                                <div v-if="cod" class="flex px-3 mt-2">
                                    <div class="w-full">
                                        <label class="font-bold text-md"
                                            >Region
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <span
                                            class="ml-2 text-xs text-red-500"
                                            v-if="errors.region"
                                            >{{ errors.region[0] }}</span
                                        >
                                    </div>
                                    <div class="w-full">
                                        <label class="font-bold text-md"
                                            >Province
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <span
                                            class="ml-2 text-xs text-red-500"
                                            v-if="errors.province"
                                            >{{ errors.province[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div
                                    v-if="cod"
                                    class="grid grid-cols-2 gap-4 px-3"
                                >
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        @change="handleProvince"
                                    >
                                        <option disabled selected
                                            >Select Region</option
                                        >
                                        <option
                                            v-for="region in regions"
                                            :value="region.region_code"
                                            :key="region.region_code"
                                            >{{ region.region_name }}
                                        </option>
                                    </select>
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        @change="handleCity"
                                    >
                                        <option disabled selected
                                            >Select Province</option
                                        >
                                        <option
                                            v-for="province in provinces"
                                            :value="province.province_code"
                                            :key="province.province_code"
                                        >
                                            {{ province.province_name }}
                                        </option>
                                    </select>
                                </div>
                                <div v-if="cod" class="flex px-3 mt-2">
                                    <div class="w-full">
                                        <label class="font-bold text-md"
                                            >City
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <span
                                            class="ml-2 text-xs text-red-500"
                                            v-if="errors.city"
                                            >{{ errors.city[0] }}</span
                                        >
                                    </div>
                                    <div class="w-full">
                                        <label class="font-bold text-md"
                                            >Barangay
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <span
                                            class="ml-2 text-xs text-red-500"
                                            v-if="errors.barangay"
                                            >{{ errors.barangay[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div
                                    v-if="cod"
                                    class="grid grid-cols-2 gap-4 px-3"
                                >
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        @change="handleBarangay"
                                    >
                                        <option disabled selected
                                            >Select City</option
                                        >
                                        <option
                                            v-for="city in cities"
                                            :value="city.city_code"
                                            :key="city.city_code"
                                            >{{ city.city_name }}</option
                                        >
                                    </select>
                                    <select
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        @change="barangaysChange"
                                    >
                                        <option disabled selected
                                            >Select Barangay</option
                                        >
                                        <option
                                            v-for="barangay in barangays"
                                            :value="barangay.brgy_code"
                                            :key="barangay.brgy_code"
                                            >{{ barangay.brgy_name }}
                                        </option>
                                    </select>
                                </div>
                                <div v-if="cod" class="flex pt-2 px-3 mt-2">
                                    <label class="font-bold text-md"
                                        >Street
                                    </label>
                                    <span
                                        class="ml-2 text-xs text-red-500"
                                        v-if="errors.street_name"
                                        >{{ errors.street_name[0] }}</span
                                    >
                                </div>
                                <div v-if="cod" class="flex pb-2 px-3">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="street_name"
                                    />
                                </div>
                                <div v-if="cod" class="flex pt-2 px-3 mt-2">
                                    <label class="font-bold text-md"
                                        >Building
                                    </label>
                                    <span
                                        class="ml-2 text-xs text-red-500"
                                        v-if="errors.building"
                                        >{{ errors.building[0] }}</span
                                    >
                                </div>
                                <div v-if="cod" class="flex pb-2 px-3">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="building"
                                    />
                                </div>
                                <div v-if="cod" class="flex pt-2 px-3 mt-2">
                                    <label class="font-bold text-md"
                                        >House Number
                                    </label>
                                    <span
                                        class="ml-2 text-xs text-red-500"
                                        v-if="errors.house_num"
                                        >{{ errors.house_num[0] }}</span
                                    >
                                </div>
                                <div v-if="cod" class="flex pb-2 px-3">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="house_num"
                                    />
                                </div>
                                <div v-if="cod" class="flex pt-2 px-3 mt-2">
                                    <label class="font-bold text-md"
                                        >Postal Code
                                    </label>
                                    <span
                                        class="ml-2 text-xs text-red-500"
                                        v-if="errors.postal_code"
                                        >{{ errors.postal_code[0] }}</span
                                    >
                                </div>
                                <div v-if="cod" class="flex pb-2 px-3">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="postal_code"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-full lg:w-96 sm:mt-6">
                            <div class="bg-white rounded shadow-md py-4">
                                <div class="space-y-2">
                                    <div class="flex justify-center px-3">
                                        <h5
                                            class="text-lg text-gray-900 font-bold"
                                        >
                                            Personal Information
                                        </h5>
                                    </div>
                                    <div class="flex justify-center mt-4">
                                        <div class="h-32 w-32 rounded-full">
                                            <img
                                                :src="
                                                    user.image
                                                        ? `/images/${user.image}`
                                                        : `/images/Avatar.png`
                                                "
                                                alt=""
                                                class="h-full w-full rounded-full"
                                            />
                                        </div>
                                    </div>
                                    <div class="px-3 space-y-4 mt-4">
                                        <div class="flex items-center px-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-blue-500 mr-3"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            <p
                                                class="w-full text-sm text-gray-700"
                                            >
                                                {{ user.fname }}
                                                {{ user.mname }}
                                                {{ user.lname }}
                                            </p>
                                        </div>
                                        <div class="flex items-center px-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-blue-500 mr-3"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                                />
                                                <path
                                                    d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                                />
                                            </svg>
                                            <p
                                                class="w-full text-sm text-gray-700"
                                            >
                                                {{ user.email }}
                                            </p>
                                        </div>
                                        <div class="flex items-center px-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-blue-500 mr-3"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                                                />
                                            </svg>
                                            <p
                                                class="w-full text-sm text-gray-700"
                                            >
                                                +63{{ user.contact_num }}
                                            </p>
                                        </div>
                                        <div class="flex items-center px-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-blue-500 mr-3"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                                                />
                                            </svg>
                                            <p
                                                class="w-full text-sm text-gray-700"
                                            >
                                                {{ user.address }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="flex justify-center">
                                    <router-link
                                        :to="{
                                            name: 'single-product',
                                            params: { id: product.id }
                                        }"
                                    >
                                        <div
                                            class="h-96 w-full overflow-hidden"
                                        >
                                            <img
                                                :src="
                                                    `/images/${product.image}`
                                                "
                                                alt=""
                                                class="h-full w-full"
                                            />
                                        </div>
                                    </router-link>
                                </div>
                                <div class="flex px-3 py-2">
                                    <p class="text-lg text-gray-800 font-bold">
                                        {{ product.product_name }}
                                        {{ product.product_model }}
                                        {{ product.product_brand }}
                                    </p>
                                </div>
                                <div class="flex px-3 py-2">
                                    <p class="text-lg font-bold text-blue-600">
                                        ₱
                                        {{ product.price.toLocaleString() }}
                                    </p>
                                </div>
                                <div class="flex items-center px-3 py-2">
                                    <p class="text-sm text-gray-500 mr-4">
                                        Quantity
                                    </p>
                                    <input
                                        type="number"
                                        name="units"
                                        :min="1"
                                        step="1"
                                        :max="product.units"
                                        class="w-1/3 focus:bg-white border-2 border-gray-600 p-2 rounded outline-none focus:border-gray-800 transition duration-300"
                                        v-model="quantity"
                                        @keydown="onKeydown"
                                        @change="checkUnits"
                                    />
                                    <p class="text-sm text-gray-500 ml-2">
                                        {{ product.units }} piece available.
                                    </p>
                                </div>
                                <div class="flex px-3 py-2">
                                    <span
                                        class="text-xs text-red-500"
                                        v-if="errors.quantity"
                                        >{{ errors.quantity[0] }}</span
                                    >
                                </div>
                                <div class="flex px-3 py-2 mt-4">
                                    <p class="w-1/5 text-sm text-gray-500 mr-4">
                                        Total
                                    </p>
                                    <p
                                        class="w-full text-sm font-sans font-bold text-gray-800"
                                    >
                                        ₱
                                        {{ quantity * product.price }}
                                    </p>
                                </div> -->
                            </div>
                            <div class="bg-white shadow-md rounded my-2 p-2">
                                <div class="flex justify-center mt-2">
                                    <p class="text-xs text-gray-500">
                                        By clicking Submit you agree to our
                                        <button
                                            @click="toggleModal = !toggleModal"
                                            class="text-blue-600 hover:text-blue-800 transition duration-300"
                                        >
                                            terms
                                        </button>
                                        and
                                        <button
                                            @click="toggleModal = !toggleModal"
                                            class="text-blue-600 hover:text-blue-800 transition duration-300"
                                        >
                                            conditions.
                                        </button>
                                    </p>
                                </div>
                                <div class="flex justify-center px-3 py-2 mt-2">
                                    <div class="flex justify-center">
                                        <button
                                            @click="placeOrder"
                                            :disabled="loading"
                                            class="flex items-center bg-blue-700 px-20 py-3 text-lg text-white rounded font-bold text-md hover:bg-blue-600 transition duration-300"
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
                                            <span v-else>Order now</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded shadow-md py-4">
                                <div
                                    class="bg-gray-50 w-full rounded px-4 py-2"
                                >
                                    <div
                                        class="flex items-center px-3 space-x-2 my-4"
                                    >
                                        <h1 class="text-red-500 mr-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8 text-yellow-500"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                                />
                                                <path
                                                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                                />
                                            </svg>
                                        </h1>
                                        <h1 class="text-gray-500 text-xs">
                                            We deliver free of charge within
                                            cebu and cebu provinces.
                                        </h1>
                                    </div>
                                    <div
                                        class="flex items-center px-3 space-x-2 my-4"
                                    >
                                        <h1 class="text-red-500 mr-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8 text-green-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                                                />
                                            </svg>
                                        </h1>
                                        <h1 class="text-gray-500 text-xs">
                                            Living outside of metro cebu? No
                                            worries we still do deliveries
                                            outside cebu. You just need to pay
                                            for the shipping fee.
                                        </h1>
                                    </div>
                                    <div
                                        class="flex items-center px-3 space-x-2 my-4"
                                    >
                                        <h1 class="text-red-500 mr-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8 text-indigo-500"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                                />
                                                <path
                                                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                                />
                                            </svg>
                                        </h1>
                                        <h1 class="text-gray-500 text-xs">
                                            Don't want to wait a long time for
                                            your item? You can always order
                                            online and just pick-up the item you
                                            bought at out shop.
                                        </h1>
                                    </div>
                                    <div
                                        class="flex items-center px-3 space-x-2 my-4"
                                    >
                                        <h1 class="text-red-500 mr-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-8 w-8 text-blue-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                                                />
                                            </svg>
                                        </h1>
                                        <h1 class="text-gray-500 text-xs">
                                            Shipping nationwide using our
                                            port-to-port delivery.
                                        </h1>
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
                    <div class="flex">
                        <div class="bg-white px-3 py-2">
                            <div class="flex mt-4">
                                <h2
                                    class="text-gray-800 text-lg font-bold tracking-widest"
                                >
                                    SAKURA AUTOPARTS TRADING CORPORATION
                                </h2>
                            </div>
                            <div class="flex mt-2">
                                <p class="text-gray-600 text-xs">
                                    Notice of Data Privacy Compliance with Data
                                    Privacy Act of 2012 and Its Implementing
                                    Rules and Regulations
                                </p>
                            </div>
                            <div class="flex mt-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    Sakura AutoParts Trading Corporation is
                                    committed to ensuring the confidentiality of
                                    your information under Republic Act No.
                                    10173 or the “Data Privacy Act of 2012” and
                                    will exert reasonable efforts to protect
                                    against its unauthorized use or disclosure.
                                </p>
                            </div>
                            <div class="flex mt-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    In compliance with the requirements of the
                                    Data Privacy Act and its implementing rules
                                    and regulations, we would like to inform you
                                    how we handle and protect the data you
                                    provide in the course of your transaction/s
                                    with Sakura AutoParts Trading Corporations
                                    and its dealers.
                                </p>
                            </div>
                            <div class="flex mt-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    These data, which include your personal or
                                    sensitive personal information, may be
                                    collected, processed, stored, updated, or
                                    disclosed by Sakura AutoPart Trading
                                    Corporation and its dealers (i) for
                                    legitimate purposes, (ii) to implement
                                    transactions which you request, allow, or
                                    authorize, (iii) to comply with Sakura
                                    AutoParts Trading Corporation and its
                                    dealers’ internal policies and its reporting
                                    obligations to governmental authorities
                                    under applicable laws.
                                </p>
                            </div>
                            <div class="flex mt-10 mb-10">
                                <p
                                    class="text-gray-700 text-sm text-justify leading-snug"
                                >
                                    By patronizing Sakura AutoParts Trading
                                    Corporation products and services, you
                                    hereby grant your express and continuing
                                    consent to allow us to process your personal
                                    information and use it as may deem
                                    necessary.
                                </p>
                            </div>
                        </div>
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
import {
    regions,
    provinces,
    cities,
    barangays
} from 'select-philippines-address';

export default {
    props: ['pid'],
    data() {
        return {
            user: null,
            contact_num: '',
            quantity: 1,
            delivery_option: '',
            isLogged: null,
            termsState: false,
            validated: false,
            loading: false,
            cod: false,
            regions: [],
            provinces: [],
            cities: [],
            barangays: [],
            region: null,
            province: null,
            city: null,
            barangay: null,
            toggleModal: false,
            street_name: '',
            building: '',
            house_num: '',
            postal_code: '',
            pickup: false,
            product: [],
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    created() {
        regions().then(response => {
            this.regions = response;
        });
    },
    beforeMount() {
        axios
            .get(`/api/products/${this.pid}`)
            .then(response => {
                this.product = response.data;
            })
            .catch(error => {
                console.error(error);
            });
        if (localStorage.getItem('jwt') != null) {
            this.user = JSON.parse(localStorage.getItem('user'));
            this.fname = this.user.fname;
            this.mname = this.user.mname;
            this.lname = this.user.lname;
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        }
    },
    methods: {
        onKeydown(event) {
            const char = String.fromCharCode(event.keyCode);
            if (!/[0-9]/.test(char)) {
                event.preventDefault();
            }
        },
        login() {
            this.$router.push({
                name: 'login',
                params: { nextUrl: this.$route.fullPath }
            });
        },
        register() {
            this.$router.push({
                name: 'register',
                params: { nextUrl: this.$route.fullPath }
            });
        },
        placeOrder(e) {
            e.preventDefault();
            this.loading = true;

            axios
                .post('/api/orders/', {
                    contact_num: this.contact_num,
                    quantity: this.quantity,
                    product: this.product.id,
                    delivery_option: this.delivery_option,
                    region: this.region,
                    province: this.province,
                    city: this.city,
                    barangay: this.barangay,
                    street_name: this.street_name,
                    building: this.building,
                    house_num: this.house_num,
                    postal_code: this.postal_code
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Order Sent Successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                        this.$router.push({ name: 'confirmation' });
                        console.log(response.data);
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        checkUnits(e) {
            if (this.quantity > this.product.units) {
                this.quantity = this.product.units;
            }
        },
        handleProvince(e) {
            this.region = e.target.selectedOptions[0].text;
            provinces(e.target.value).then(response => {
                this.provinces = response;
            });
        },
        handleCity(e) {
            this.province = e.target.selectedOptions[0].text;
            cities(e.target.value).then(response => {
                this.cities = response;
            });
        },
        handleBarangay(e) {
            this.city = e.target.selectedOptions[0].text;
            barangays(e.target.value).then(response => {
                this.barangays = response;
            });
        },
        barangaysChange(e) {
            this.barangay = e.target.selectedOptions[0].text;
        }
    }
};
</script>

<style></style>
