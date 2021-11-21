<template>
    <div>
        <div class="container-mx-auto">
            <div class="flex justify-center">
                <div class="relative w-full h-full overflow-hidden">
                    <div class="filter-blur-sm w-full  h-full">
                        <img
                            :src="`/images/maincover.webp`"
                            alt=""
                            class="h-full w-full object-cover"
                        />
                    </div>
                    <div class="absolute w-full py-24 inset-0">
                        <div class="flex justify-center">
                            <h1
                                class="font-bold text-gray-50 sm:text-3xl lg:text-6xl text-center tracking-tight"
                            ></h1>
                        </div>

                        <!-- <div class="flex justify-center mt-10">
                        <h1
                            class="font-bold text-gray-50 text-lg text-center leading-4"
                        >
                            We offer you best products available in Sakura.
                        </h1>
                    </div> -->
                        <!-- <div class="flex justify-center mt-8 space-x-4">
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-600 px-8 transition duration-300"
                            >Get Started</router-link
                        >
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-600 px-8 transition duration-300"
                            >Explore now</router-link
                        >
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- <div class="flex justify-center mt-10 mb-5">
                <h1 class="text-3xl text-blue-900 font-sans-bold">
                    SAKURA OFFERS THESE FEATURES
                </h1>
            </div> -->
            <div class="flex justify-center mt-20">
                <p class="text-xs text-gray-500"></p>
            </div>

            <div class="container">
                <div class="sm:flex flex-col lg:grid grid-cols-3 gap-8">
                    <div
                        class="rounded bg-white shadow-md px-5 py-5 border-b-2 border-blue-600"
                    >
                        <div class="flex justify-center">
                            <div class=" bg-blue-600 p-2 rounded-full">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <h1 class="text-gray-600 text-lg font-bold">
                                Reservation
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Reservation of vehicles is always available and
                                customer can book anytime from anywhere.
                            </p>
                        </div>
                    </div>

                    <div
                        class="rounded bg-white shadow-md px-5 py-5 border-b-2 border-blue-600"
                    >
                        <div class="flex justify-center">
                            <div class="bg-blue-600 p-2 rounded-full">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <h1 class="text-gray-600 text-lg font-bold">
                                Services
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Schedule an Appointment for repairs, services
                                and maintainance of vehicles.
                            </p>
                        </div>
                    </div>
                    <div
                        class="rounded bg-white shadow-md px-5 py-5 border-b-2 border-blue-600"
                    >
                        <div class="flex justify-center">
                            <div class="bg-blue-600 p-2 rounded-full">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <h1 class="text-gray-600 text-lg font-bold">
                                Order
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Ordering of Products such as: Auto-Parts and
                                Accessories.
                            </p>
                        </div>
                    </div>

                    <div
                        class="rounded bg-white shadow-md px-5 py-5 border-b-2 border-blue-600"
                    >
                        <div class="flex justify-center">
                            <div class="bg-blue-600 p-2 rounded-full">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                    />
                                </svg>
                            </div>
                        </div>

                        <div class="flex justify-center mt-4">
                            <h1 class="text-gray-600 text-lg font-bold">
                                Inquiries
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Feel free to inquire about our Products and
                                Services. We'll get back to you as soon as we
                                can.
                            </p>
                        </div>
                    </div>
                    <div
                        class="rounded bg-white shadow-md px-5 py-5 border-b-2 border-blue-600"
                    >
                        <div class="flex justify-center">
                            <div class="bg-blue-600 p-2 rounded-full">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <h1 class="text-gray-600 text-lg font-bold">
                                Quotations
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                See an estimated financial breakdown of amount
                                of our offered Vehicles.
                            </p>
                        </div>
                    </div>
                    <div
                        class="rounded bg-white shadow-md px-5 py-5 border-b-2 border-blue-600"
                    >
                        <div class="flex justify-center">
                            <div class="bg-blue-600 p-2 rounded-full">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-white"
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
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <h1 class="text-gray-600 text-lg font-bold">
                                Test Drive
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Want to feel how your chosen vehicle drives?
                                Send a Request.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-20">
            <div class="relative w-full h-full overflow-hidden">
                <div class="filter-blur-sm w-full  h-full">
                    <img
                        :src="`/images/suzukievery.webp`"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
                <!-- <div class="absolute w-full p-24 inset-0">
                    <div class="flex justify-end mt-96 ml-96">
                        <h1
                            class="font-bold text-gray-50 text-lg text-center leading-4"
                        >
                            We offer you best products available in Sakura.
                        </h1>
                    </div>
                    <div class="flex justify-center mt-8 space-x-4">
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-600 px-8 transition duration-300"
                            >Explore now</router-link
                        >
                    </div>
                </div> -->
            </div>
        </div>

        <div class="flex justify-center mt-10">
            <div class="relative w-full h-96 overflow-hidden">
                <div class="filter blur-sm w-full  h-full">
                    <img
                        :src="`/images/Capture.webp`"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="absolute w-full py-24 inset-0">
                    <div class="flex justify-center">
                        <h1 class="font-bold text-gray-50 text-5xl text-center">
                            Visit our Showroom located at Mandaue City, Cebu,
                            Philippines.
                        </h1>
                    </div>
                    <div class="flec justify-center mt-10">
                        <h2 class="font-sans text-gray-50 text-2xl text-center">
                            Please feel free to visit our Showroom to check for
                            Quality Vehicles and Products.
                        </h2>
                    </div>
                    <div class="flex justify-center mt-4">
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-600 px-8 transition duration-300"
                            >About Sakura</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-10">
            <div class="relative w-full h-full overflow-hidden">
                <div class="filter-blur-sm w-full  h-full">
                    <img
                        :src="`/images/suzukicarry.webp`"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="absolute w-full py-24 inset-0">
                    <div class="flex justify-center">
                        <h1
                            class="font-bold text-gray-50 sm:text-3xl lg:text-6xl text-center tracking-tight"
                        ></h1>
                    </div>
                    <!-- <div class="flex justify-center mt-10">
                        <h1
                            class="font-bold text-gray-50 text-lg text-center leading-4"
                        >
                            We offer you best products available in Sakura.
                        </h1>
                    </div> -->
                    <!-- <div class="flex justify-center mt-8 space-x-4">
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-600 px-8 transition duration-300"
                            >Get Started</router-link
                        >
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-600 px-8 transition duration-300"
                            >Explore now</router-link
                        >
                    </div> -->
                </div>
            </div>
        </div>

        <div class="flex mt-20 sm:h-full">
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="`/images/every1.jpg`"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
            <div class="w-1/2 sm:h-96 px-20">
                <div class="flex justify-start mt-10">
                    <p class="text-2xl text-gray-900">Schedule a Service</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-lg text-gray-800 leading-relaxed">
                        If you want your car fixed or just want to have a good
                        old routine check-up for your car. sakuraautoparts.com
                        can also help you with that! You can go to the Sakura
                        website look for services then choose which of the
                        following services would you like to select. That’s it!
                        What are you waiting for avail our services so you can
                        be sure that your car is in good shape.
                    </p>
                </div>
                <div class="flex mt-8">
                    <router-link
                        to="/all/services"
                        style="text-decoration:none;"
                        class="px-8 py-2 rounded bg-blue-600 hover:bg-blue-500 hover:text-gray-50 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Services Available
                    </router-link>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2 sm:h-96 px-20">
                <div class="flex justify-start mt-20">
                    <p class="text-2xl text-gray-900 leading-relaxed">
                        Buying or Reserving a Car
                    </p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-lg text-gray-800">
                        If you want to buy a car. You can go to our store Sakura
                        Auto Parts Trading located at C.P, Batiller, Mandaue
                        City, Cebu and our lovely staff will attend to all your
                        inquiries and make sure you are well informed so that
                        you can choose wisely. Or you can also send us a message
                        at our facebook page Sakura Auto Parts Trading.
                    </p>
                </div>
                <div class="flex mt-8">
                    <router-link
                        to="/cars"
                        style="text-decoration:none;"
                        class="px-8 py-2 rounded bg-blue-600 hover:bg-blue-500 hover:text-gray-50 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Vehicles Available
                    </router-link>
                </div>
            </div>
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="`/images/every2.jpg`"
                        alt=""
                        class="h-full w-full"
                    />
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="`/images/every3.jpg`"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
            <div class="w-1/2 sm:h-96 px-20">
                <div class="flex justify-start mt-20">
                    <p class="text-2xl text-gray-900">
                        Order Auto-Parts and other Products
                    </p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-lg text-gray-800 leading-relaxed">
                        Online Ordering? Buying upgrades for your beloved car?
                        We got that covered for you! In sakuraautoparts.com we
                        also provide a wide range of automotive products that
                        you can choose from you can look for products and then
                        just make an order and wait for it to be delivered in
                        your door-steps. That’s it so easy!
                    </p>
                </div>
                <div class="flex mt-8">
                    <router-link
                        to="/auto-parts"
                        style="text-decoration:none;"
                        class="px-8 py-2 rounded bg-blue-600 hover:bg-blue-500 hover:text-gray-50 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Products Available
                    </router-link>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2 sm:h-96 px-20">
                <div class="flex justify-start mt-20">
                    <p class="text-2xl text-gray-900">
                        Inquire, See Quotes, and Test our Vehicles
                    </p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-lg text-gray-800 leading-relaxed">
                        Interested in our products? Send us a message or contact
                        us. See our estimated Quotations everytime you select a
                        vehicle. We also approve in requesting to test drive our
                        vehicles for you to know if it suits your style and
                        comfort
                    </p>
                </div>
                <div class="flex mt-8">
                    <router-link
                        to="/cars"
                        style="text-decoration:none;"
                        class="px-8 py-2 rounded bg-blue-600 hover:bg-blue-500 hover:text-gray-50 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        Find out here
                    </router-link>
                </div>
            </div>
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="`/images/every4.jpg`"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-10 ml-24 mr-24 sm:px-3">
            <div class="bg-white sm:w-full lg:w-full rounded-lg shadow-md">
                <div class="flex">
                    <div class="w-2/3">
                        <div class="flex px-4 py-2 mt-10">
                            <h1 class="text-xl text-gray-800 font-bold">
                                Contact Us
                            </h1>
                        </div>
                        <div class="flex items-center px-4 py-2 mt-4">
                            <h1 class="text-md text-gray-600">
                                Full Name
                            </h1>
                            <span
                                class="text-xs text-red-500 ml-2"
                                v-if="errors.name"
                                >{{ errors.name[0] }}</span
                            >
                        </div>
                        <div class="flex px-4 py-2 mt-2">
                            <input
                                type="text"
                                placeholder="Juan Carlos"
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                v-model="form.name"
                            />
                        </div>
                        <div class="flex items-center px-4 py-2 mt-2">
                            <h1 class="text-md text-gray-600">
                                Email Address
                            </h1>
                            <span
                                class="text-xs text-red-500 ml-2"
                                v-if="errors.email"
                                >{{ errors.email[0] }}</span
                            >
                        </div>
                        <div class="flex px-4 py-2 mt-2">
                            <input
                                type="email"
                                placeholder="juancarlos@gmail.com"
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                v-model="form.email"
                            />
                        </div>
                        <div class="flex items-center px-4 py-2 mt-2">
                            <h1 class="text-md text-gray-600">Message</h1>
                            <span
                                class="text-xs text-red-500 ml-2"
                                v-if="errors.message"
                                >{{ errors.message[0] }}</span
                            >
                        </div>
                        <div class="flex px-4 py-2 mt-2">
                            <textarea
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                cols="30"
                                rows="5"
                                placeholder="Type comments here"
                                v-model="form.message"
                            ></textarea>
                        </div>
                        <div class="flex px-4 py-2 mt-8">
                            <p class="text-xs text-gray-500">
                                By clicking “Submit”, I agree that Sakura may
                                communicate with me via text, or phone call. For
                                more information on how we handle personal
                                information, please read our
                                <a
                                    href="/terms"
                                    style="text-decoration:none;"
                                    class="text-blue-600 hover:text-blue-800 transition duration-300"
                                >
                                    privacy policy. </a
                                >.
                            </p>
                        </div>
                        <div class="flex justify-end px-3 py-2 mt-2">
                            <div class="flex mb-8">
                                <button
                                    @click="submitContact"
                                    :disabled="loading"
                                    class="flex items-center bg-blue-600 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-blue-500 transition duration-300"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loading">Please wait..</span>
                                    <span v-else>Send Message</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.0543351512742!2d123.95165421533282!3d10.337536969966466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99989d6e6baeb%3A0x8590a88318160b9!2sSakura%20Auto%20Parts%20Trading%20Inc.!5e0!3m2!1sen!2sph!4v1635070520833!5m2!1sen!2sph"
                                width="600"
                                height="450"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                            ></iframe>
                        </div>
                    </div>
                </div>
                <!-- <div class="flex"> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                message: ''
            },
            errors: [],
            loading: false,
            check: '/images/check.png',
            main: '/images/Sakura.jpg',
            group1: '/images/group1.jpg',
            buycar1: '/images/buycar.jpg',
            male: '/images/male.jpg',
            carHome: '/images/carrhome.jpg',
            engineHome: '/images/enginehome.png'
        };
    },
    methods: {
        submitContact(e) {
            this.loading = true;

            setTimeout(() => {
                this.loading = false;
                axios
                    .post('/api/contacts', {
                        name: this.form.name,
                        email: this.form.email,
                        message: this.form.message
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Message Sent Successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.form = '';
                            console.log(response.data);
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);

            e.preventDefault();
        }
    }
};
</script>

<style></style>
