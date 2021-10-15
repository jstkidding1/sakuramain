<template>
    <div class="container h-full mb-auto">
        <div class="flex">
            <p class="text-4xl text-gray-800">Hello, {{ user.fname }}</p>
        </div>
        <div class="flex mt-4">
            <p class="text-lg text-gray-700">
                We're so happy you decided to join us. Here at Sakura, we think
                of ourselves and our customers as one big family. And that means
                helping you get the best product you deserve.
            </p>
        </div>
        <div class="w-full mt-6 py-6 sm:flex justify-center">
            <div
                class="sm:grid grid-cols-1 gap-2 lg:flex justify-center lg:space-x-10"
            >
                <div class="sm:w-full lg:w-1/4">
                    <div class="relative mb-2">
                        <router-link to="/cars">
                            <div
                                class="lg:h-64 md:h-48 w-80 overflow-hidden transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <img
                                    :src="inquiry"
                                    alt="image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        </router-link>
                    </div>

                    <div class="text-xs text-center md:text-base">
                        Inquire
                    </div>
                    <div
                        class="text-xs text-gray-500 mt-2 text-center md:text-base"
                    >
                        Inquire a car of your choice
                    </div>
                </div>

                <div class="sm:w-full lg:w-1/4">
                    <div class="relative mb-2">
                        <router-link to="/cars">
                            <div
                                class="lg:h-64 md:h-48 w-80 overflow-hidden transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <img
                                    :src="testdrive"
                                    alt="image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        </router-link>
                    </div>

                    <div class="text-xs text-center md:text-base">
                        Request A Test Drive
                    </div>
                    <div
                        class="text-xs text-gray-500 mt-2 text-center md:text-base"
                    >
                        Request a test drive of your choice
                    </div>
                </div>
                <div class="sm:w-full lg:w-1/4">
                    <div class="relative mb-2">
                        <router-link to="/cars">
                            <div
                                class="lg:h-64 md:h-48 w-80 overflow-hidden transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <img
                                    :src="quote"
                                    alt="image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        </router-link>
                    </div>

                    <div class="text-xs text-center md:text-base">
                        Request A Quotation
                    </div>
                    <div
                        class="text-xs text-gray-500 mt-2 text-center md:text-base"
                    >
                        Request a quotation for a specific car
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-6 py-6 sm:flex justify-center">
            <div
                class="sm:grid grid-cols-1 gap-2 lg:flex justify-center lg:space-x-10"
            >
                <div class="sm:w-full lg:w-1/4">
                    <div class="relative mb-2">
                        <router-link to="/auto-parts">
                            <div
                                class="lg:h-64 md:h-48 w-80 overflow-hidden transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <img
                                    :src="autoparts"
                                    alt="image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        </router-link>
                    </div>

                    <div class="text-xs text-center md:text-base">
                        Order
                    </div>
                    <div
                        class="text-xs text-gray-500 text-center md:text-base mt-2"
                    >
                        Order an auto parts
                    </div>
                </div>

                <div class="sm:w-full lg:w-1/4">
                    <div class="relative mb-2">
                        <router-link to="/all/services">
                            <div
                                class="lg:h-64 md:h-48 w-80 overflow-hidden transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <img
                                    :src="appointment"
                                    alt="image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        </router-link>
                    </div>

                    <div class="text-xs text-center md:text-base">
                        Appointment
                    </div>
                    <div
                        class="text-xs text-gray-500 mt-2 text-center md:text-base"
                    >
                        Make an appointment of your service
                    </div>
                </div>
                <div class="sm:w-full lg:w-1/4">
                    <div class="relative mb-2">
                        <router-link to="/cars">
                            <div
                                class="lg:h-64 md:h-48 w-80 overflow-hidden transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <img
                                    :src="reserve"
                                    alt="image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        </router-link>
                    </div>

                    <div class="text-xs text-center md:text-base">
                        Reserve
                    </div>

                    <div
                        class="text-xs text-gray-500 text-center md:text-base mt-2"
                    >
                        Find a car for reservation
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4" />
        <div class="flex">
            <h1 class="text-2xl text-gray-700 font-bold">
                Reservation Guide
            </h1>
        </div>
        <div class="flex px-3 pt-4">
            <h1 class="text-xl text-gray-700">
                How it works
            </h1>
        </div>
        <div class="flex px-3 pb-2">
            <p class="text-md text-gray-700">4 Step Process</p>
        </div>
        <div class="flex">
            <div class="w-full mt-6 py-6">
                <div class="flex justify-center">
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span
                                    class="flex justify-center text-white w-full"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Search
                        </div>
                        <div
                            class="text-xs text-gray-500 text-center md:text-base mt-2"
                        >
                            Search a vehicle of your choice
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-gray-200 py-1 rounded"
                                        style="width: 100%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span
                                    class="flex justify-center text-white w-full"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
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
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Reserve
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Click reserve button
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-gray-200 py-1 rounded"
                                        style="width: 100%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Fill out
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Fill out information
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-green-300 py-1 rounded"
                                        style="width: 0%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 border-2 border-gray-200 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Final Reservation Confirmation
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Receive reservation confirmation from our staff
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full px-3 py-2">
                <div class="flex">
                    <h1 class="text-2xl text-gray-700 font-bold">
                        Benefits of Reserving Online
                    </h1>
                </div>
                <div class="flex items-center mt-10">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        From the comfort of your own home you can browse through
                        cars and seamlessly reserve online, you can just reserve
                        and wait for the staff to contact you.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        You don’t need to go to the bank branch or the
                        dealership to pay the reservation.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        There is no need to find out the car dealers bank
                        details as Sakura will take care of the payment to
                        dealers, at no extra cost to the buyer.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        Aside from an online cash payment through a bank
                        transfer or Gcash, we provide credit card as an option,
                        which allows for payment flexibility.
                    </p>
                </div>
                <div class="flex items-center mt-2 mb-4">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        Easy refund from Sakura, no complications.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full px-3 py-2">
                <div class="flex">
                    <h1 class="text-2xl text-gray-700 font-bold">
                        Reservation Validity
                    </h1>
                </div>
                <div class="flex mt-4">
                    <p class="text-xs text-gray-700">
                        Reservation are valid for up to twenty-four (24) hours.
                        This means that within the time you reserve you must be
                        in the process of transaction before this expires.
                        Reservations that remain inactive after twenty-four (24)
                        hours will be subject to being canceled. If you have
                        made a reservation the staff will contact you for the
                        process of your reservation. In either of the above
                        cases you can claim a refund.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex mt-8 mb-4">
            <a
                href="/cars"
                style="text-decoration:none;"
                class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                ><span>Start Your Car Reservation Journey</span></a
            >
        </div>
        <hr class="my-4" />
        <div class="flex">
            <h1 class="text-2xl text-gray-700 font-bold">
                Appointment Guide
            </h1>
        </div>
        <div class="flex px-3 pt-4">
            <h1 class="text-xl text-gray-700">
                How it works
            </h1>
        </div>
        <div class="flex px-3 pb-2">
            <p class="text-md text-gray-700">3 Step Process</p>
        </div>
        <div class="flex">
            <div class="w-full mt-6 py-6">
                <div class="flex justify-center">
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span
                                    class="flex justify-center text-white w-full"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Search
                        </div>
                        <div
                            class="text-xs text-gray-500 text-center md:text-base mt-2"
                        >
                            Find a service for your car
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-gray-200 py-1 rounded"
                                        style="width: 100%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Book Appointment
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Book your date and time
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-green-300 py-1 rounded"
                                        style="width: 0%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 border-2 border-gray-200 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Final Booking Confirmation
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Receive confirmed booking from dealer
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full px-3 py-2">
                <div class="flex">
                    <h1 class="text-2xl text-gray-700 font-bold">
                        Benefits of Booking an Appointment Online
                    </h1>
                </div>
                <div class="flex items-center mt-10">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        You can freely make an appointment online without
                        visiting the shop.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        You can select the preferred date and time of your
                        choice.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        Our staff will prioritize the date of your appointment.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        Our staff will update your service through phone call.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full px-3 py-2 mt-4">
            <div class="flex">
                <h1 class="text-2xl text-gray-700 font-bold">
                    Appointment Validity
                </h1>
            </div>
            <div class="flex mt-4">
                <p class="text-xs text-gray-700">
                    If you don't show up on the day of your appointment. The
                    appointment will be cancelled and you need to apply for
                    appointment again.
                </p>
            </div>
        </div>
        <div class="flex mt-8 mb-4">
            <a
                href="/services"
                style="text-decoration:none;"
                class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                ><span>See Our Services Offered</span></a
            >
        </div>
        <hr class="my-4" />
        <div class="flex">
            <h1 class="text-2xl text-gray-700 font-bold">
                Order Guide
            </h1>
        </div>
        <div class="flex px-3 pt-4">
            <h1 class="text-xl text-gray-700">
                How it works
            </h1>
        </div>
        <div class="flex px-3 pb-2">
            <p class="text-md text-gray-700">3 Step Process</p>
        </div>
        <div class="flex">
            <div class="w-full mt-6 py-6">
                <div class="flex justify-center">
                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span
                                    class="flex justify-center text-white w-full"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Search
                        </div>
                        <div
                            class="text-xs text-gray-500 text-center md:text-base mt-2"
                        >
                            Find a product
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-gray-200 py-1 rounded"
                                        style="width: 100%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span
                                    class="flex justify-center text-white w-full"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
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
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Checkout
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Fill out information.
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="relative mb-2">
                            <div
                                class="absolute flex align-center items-center align-middle content-center"
                                style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                            >
                                <div
                                    class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                                >
                                    <div
                                        class="w-0 bg-green-300 py-1 rounded"
                                        style="width: 0%;"
                                    ></div>
                                </div>
                            </div>

                            <div
                                class="w-10 h-10 mx-auto bg-yellow-600 border-2 border-gray-200 rounded-full text-lg text-white flex items-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <span class="text-center text-white w-full">
                                    <svg
                                        class="w-full fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path
                                            class="heroicon-ui"
                                            d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"
                                        />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="text-xs text-center md:text-base">
                            Status
                        </div>
                        <div
                            class="text-xs text-gray-500 mt-2 text-center md:text-base"
                        >
                            Staff will update your order.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full px-3 py-2">
                <div class="flex">
                    <h1 class="text-2xl text-gray-700 font-bold">
                        Benefits of Ordering Online
                    </h1>
                </div>
                <div class="flex items-center mt-10">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        You can browse products online without visiting the
                        shop.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        You can select products of your choice.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        Our staff will keep you update of your orders.
                    </p>
                </div>
                <div class="flex items-center mt-2">
                    <img
                        :src="check"
                        alt=""
                        class="h-5 w-5 object-cover mr-3"
                    />
                    <p class="text-xs text-gray-700">
                        The orders will be delivered at your home.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full px-3 py-2 mt-4">
            <div class="flex">
                <h1 class="text-2xl text-gray-700 font-bold">
                    Order Notice
                </h1>
            </div>
            <div class="flex mt-4">
                <p class="text-xs text-gray-700">
                    Your order will be on hold if you're not able to get the
                    product.
                </p>
            </div>
        </div>
        <div class="flex mt-8 mb-4">
            <a
                href="/auto-parts"
                style="text-decoration:none;"
                class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                ><span>Buy Your Products Now</span></a
            >
        </div>
        <hr class="my-4" />
        <div class="flex">
            <h1 class="text-2xl text-gray-700 font-bold">
                Contact Us
            </h1>
        </div>
        <div class="flex px-3 pt-4">
            <p class="text-md text-gray-700">
                You can contact us at our page
                <a
                    style="text-decoration:none;"
                    class="hover:text-yellow-700 transition duration-300"
                    href="https://www.facebook.com/pages/category/Automotive-Parts-Store/Sakura-Auto-Parts-Trading-1412649018771591/"
                    >Sakura Auto Parts Tading Facebook Page</a
                >.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            autoparts: '/images/Product.png',
            car: '/images/Vehicles.png',
            shop: '/images/Order.png',
            logo: '/images/Users.png',
            reserve: '/images/Reserve.png',
            appointment: '/images/Appointment.png',
            report: '/images/Sales.png',
            gallery: '/images/Gallery.png',
            service: '/images/Service.png',
            testdrive: '/images/Testdrive.png',
            inquiry: '/images/Inquiry.png',
            quote: '/images/Quote.png',
            carOnline: '/images/CarOnline.png',
            check: '/images/check.png',
            select1: '/images/Select1.png',
            select2: '/images/Select2.png',
            select3: '/images/Select3.png',
            select4: '/images/Select4.png',
            appointments: [],
            inquiries: [],
            orders: [],
            quotations: [],
            requests: [],
            reservations: []
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    mounted() {
        this.getAppointments();
        this.getInquiries();
        this.getOrders();
        this.getQuotations();
        this.getRequests();
        this.getReservations();
    },
    methods: {
        getAppointments() {
            axios.get('api/appointments').then(response => {
                this.appointments = response.data;
            });
        },
        getInquiries() {
            axios.get('api/inquiries').then(response => {
                this.inquiries = response.data;
            });
        },
        getOrders() {
            axios.get('api/orders').then(response => {
                this.orders = response.data;
            });
        },
        getQuotations() {
            axios.get('api/quotes').then(response => {
                this.quotations = response.data;
            });
        },
        getRequests() {
            axios.get('api/tests').then(response => {
                this.requests = response.data;
            });
        },
        getReservations() {
            axios.get('api/reservations').then(response => {
                this.reservations = response.data;
            });
        }
    }
};
</script>

<style></style>
