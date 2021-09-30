<template>
    <div class="mt-10">
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Secretary Dashboard
            </h1>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Products & Servicing Management
            </h1>
            <div class="flex mt-4">
                <div class="grid grid-cols-5 gap-4">
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-400 mr-2 text-pink-500"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                users
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countUsers }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500 mr-2 text-purple-500"
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
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                vehicles
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countVehicles }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-500 mr-2 text-indigo-500"
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
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                products
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countProducts }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-500 mr-2 text-blue-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                gallery
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countGalleries }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-500 mr-2 text-green-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                services
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countServices }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/gallery">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="gallery"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/gallery"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Gallery Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/gallery"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/services">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="service"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/services"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Service Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/services"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Customer Management
            </h1>
            <div class="flex mt-4">
                <div class="grid grid-cols-6 gap-4">
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 mr-2 text-pink-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                orders
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countOrders }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-purple-500 mr-2"
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
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                reservations
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countReservations }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-indigo-500 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                appointments
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countAppointments }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-blue-500 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                inquiries
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countInquiry }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-green-500 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                requests
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countRequests }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow-md hover:shadow-lg rounded-xl transition duration-300"
                    >
                        <div class="flex items-center justify-center px-8 pt-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-yellow-500 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                />
                            </svg>
                            <h1
                                class="text-xs text-gray-400 tracking-wide uppercase font-bold"
                            >
                                quotations
                            </h1>
                        </div>
                        <div class="flex items-center justify-center px-8 py-2">
                            <p
                                class="text-lg text-gray-700 tracking-wide font-bold"
                            >
                                {{ countQuotations }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/order">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="shop"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/order"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Order Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/order"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/reservations">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="reserve"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/reservations"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Reservation Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/reservations"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <div
                                class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                            >
                                <router-link to="/secretary/appointments">
                                    <div
                                        class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                    >
                                        <div
                                            class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                        >
                                            <img
                                                :src="appointment"
                                                alt="image"
                                                class="h-full w-full object-cover"
                                            />
                                        </div>
                                    </div>
                                </router-link>
                            </div>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/appointments"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Appointment Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/appointments"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/inquiry">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="inquiry"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/inquiry"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Inquiry Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/inquiry"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/request">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="testdrive"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/request"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Request Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/request"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/quotation">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="quote"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/quotation"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Quotation Management
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/quotation"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/secretary/contact/list">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="'/images/contactus.png'"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>

                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/secretary/contact/list"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Contacts
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/secretary/contact/list"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-5 py-8 mx-auto">
            <hr />
        </div>
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Reports
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg"
                        >
                            <router-link to="/charts">
                                <div
                                    class="flex justify-center transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                                >
                                    <div
                                        class="lg:h-64 md:h-48 w-92 overflow-hidden"
                                    >
                                        <img
                                            :src="report"
                                            alt="image"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </router-link>
                            <div
                                class="p-6 hover:bg-gray-100 hover:text-gray-700 transition duration-300 ease-in"
                            >
                                <router-link
                                    to="/charts"
                                    style="text-decoration:none;"
                                >
                                    <h2
                                        class="text-lg font-bold text-gray-700 hover:text-yellow-700 transition duration-300 mb-3"
                                    >
                                        Chart
                                    </h2>
                                </router-link>
                                <router-link
                                    to="/charts"
                                    style="text-decoration:none;"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            countUsers: '',
            countVehicles: '',
            countProducts: '',
            countGalleries: '',
            countServices: '',
            countOrders: '',
            countReservations: '',
            countAppointments: '',
            countInquiry: '',
            countRequests: '',
            countQuotations: ''
        };
    },
    beforeMount() {
        this.getAuthenticate();
        this.countAllUser();
        this.countAllVehicles();
        this.countAllProducts();
        this.countAllGalleries();
        this.countAllServices();
        this.countAllOrders();
        this.countAllReservations();
        this.countAllAppointments();
        this.countAllInquiries();
        this.countAllRequests();
        this.countAllQuotations();
    },
    methods: {
        getAuthenticate() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        countAllUser() {
            axios.get('/api/users').then(response => {
                this.countUsers = response.data.user_count;
            });
        },
        countAllVehicles() {
            axios.get('/api/vehicle').then(response => {
                this.countVehicles = response.data.vehicle_count;
            });
        },
        countAllProducts() {
            axios.get('/api/products').then(response => {
                this.countProducts = response.data.products_count;
            });
        },
        countAllGalleries() {
            axios.get('/api/galleries').then(response => {
                this.countGalleries = response.data.gallery_count;
            });
        },
        countAllServices() {
            axios.get('/api/services').then(response => {
                this.countServices = response.data.service_count;
            });
        },
        countAllOrders() {
            axios.get('/api/orders').then(response => {
                this.countOrders = response.data.order_count;
            });
        },
        countAllReservations() {
            axios.get('/api/reservations').then(response => {
                this.countReservations = response.data.reservation_count;
            });
        },
        countAllAppointments() {
            axios.get('/api/appointments').then(response => {
                this.countAppointments = response.data.appointment_count;
            });
        },
        countAllInquiries() {
            axios.get('/api/inquiries').then(response => {
                this.countInquiry = response.data.inquiries_count;
            });
        },
        countAllRequests() {
            axios.get('/api/tests').then(response => {
                this.countRequests = response.data.testdrive_count;
            });
        },
        countAllQuotations() {
            axios.get('/api/quotes').then(response => {
                this.countQuotations = response.data.quotations_count;
            });
        }
    }
};
</script>

<style></style>
