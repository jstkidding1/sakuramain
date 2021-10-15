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
                                            class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
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
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
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
                            <div class="bg-white w-full shadow-md">
                                <!-- <div class="flex py-3 px-3">
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
                                            class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
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
                                            class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
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
                                        Please enter your details and preferred
                                        address and we'll coordinate with the
                                        staff on your behalf. The staff will
                                        update your delivery.
                                    </p>
                                </div>
                                <div class="flex px-3 py-2">
                                    <div
                                        class="bg-gray-50 w-full rounded px-4 py-2"
                                    >
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
                                                We deliver free of charge within
                                                cebu and cebu provinces.
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex px-3 mt-4">
                                    <h1 class="text-xl text-gray-800 font-bold">
                                        Personal Information
                                    </h1>
                                </div>
                                <div class="flex py-2 px-3 mt-2">
                                    <div class="grid grid-cols-3 gap-x-4">
                                        <label class="font-bold text-md"
                                            >First Name
                                        </label>
                                        <label class="font-bold text-md"
                                            >Middle Name
                                        </label>
                                        <label class="font-bold text-md"
                                            >Last Name
                                        </label>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="fname"
                                            disabled
                                        />
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="mname"
                                            disabled
                                        />
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            v-model="lname"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="flex pt-2 px-3 mt-2">
                                    <label class="w-full font-bold text-md"
                                        >Email Address
                                    </label>
                                </div>
                                <div class="flex pb-2 px-3">
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="text"
                                        v-model="user.email"
                                        disabled
                                    />
                                </div>
                                <div class="flex px-3 mt-2">
                                    <label class="font-bold text-md"
                                        >Phone Number
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                    <div class="ml-2">
                                        <span
                                            class="text-xs text-red-500"
                                            v-if="errors.contact_num"
                                            >{{ errors.contact_num[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 px-3 mt-2">
                                    <div class="relative w-full">
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center pl-2"
                                        >
                                            <p
                                                class="text-gray-500 text-md font-bold"
                                            >
                                                +63
                                            </p>
                                        </span>
                                        <input
                                            class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                            type="text"
                                            placeholder="Phone Number"
                                            v-model="contact_num"
                                        />
                                    </div>
                                </div>
                                <div class="flex px-3 mt-2">
                                    <label class="w-full font-bold text-md"
                                        >Order via
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                </div>
                                <div class="flex items-center px-3 mt-2">
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
                                <!-- <div class="flex pt-2 px-3 mt-2 space-x-2">
                                <label class="w-full font-bold text-md"
                                    >Delivery Address
                                    <span style="color:#ff0000">*</span>
                                </label>
                            </div> -->
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
                                <div class="flex px-3 py-2 mt-8">
                                    <p class="text-xs text-gray-500">
                                        By clicking “Submit”, I agree that
                                        Sakura may communicate with me via text,
                                        or phone call. For more information on
                                        how we handle order information, please
                                        read our
                                        <a
                                            href="/terms"
                                            style="text-decoration:none;"
                                            class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                                        >
                                            privacy policy.
                                        </a>
                                    </p>
                                </div>
                                <div class="flex px-3 py-2 mt-2">
                                    <div class="flex justify-start mb-20">
                                        <button
                                            @click="placeOrder"
                                            :disabled="loading"
                                            class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
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
                                        <router-link
                                            to="/auto-parts"
                                            style="text-decoration:none"
                                            class="flex items-center border-2 border-gray-500 px-3 py-2 text-lg text-gray-500 rounded font-bold text-md hover:bg-gray-600 hover:text-gray-50 ml-2 transition duration-300"
                                        >
                                            <span>Cancel</span>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-full lg:w-96 mt-10">
                            <div class="bg-white rounded shadow-md pb-4">
                                <div class="flex justify-center">
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
                                    <p
                                        class="text-lg font-bold text-yellow-600"
                                    >
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
            street_name: '',
            building: '',
            house_num: '',
            postal_code: '',
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
            this.validated = true;
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .post('api/orders/', {
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
                    });
            }, 2000);
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
