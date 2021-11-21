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
                Gallery & Servicing Management
            </h1>
            <div class="flex mt-4">
                <div
                    class="sm:flex flex-col gap-y-4 w-full lg:grid grid-cols-5 gap-4"
                >
                    <router-link
                        to="/secretary/gallery"
                        style="text-decoration:none"
                    >
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-blue-500"
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
                                        </div>
                                        <router-link
                                            to="/secretary/gallery"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Gallery Management
                                            </p>
                                        </router-link>
                                    </div>
                                    <h3
                                        class="text-white text-xl mt-2 font-bold"
                                    >
                                        {{ countGalleries }} Galleries
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </router-link>
                    <router-link
                        to="/secretary/services"
                        style="text-decoration:none;"
                    >
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-green-500"
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
                                        </div>
                                        <router-link
                                            to="/secretary/services"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Service Management
                                            </p>
                                        </router-link>
                                    </div>
                                    <h3
                                        class="text-white text-xl mt-2 font-bold"
                                    >
                                        {{ countServices }} Services
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </router-link>
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
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex mt-4">
                    <div
                        class="sm:flex flex-col w-full lg:grid grid-cols-5 gap-4"
                    >
                        <router-link
                            to="/secretary/order"
                            style="text-decoration:none;"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-center text-pink-500"
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
                                            </div>
                                            <router-link
                                                to="/secretary/order"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Order Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countOrders }} Orders
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <router-link
                            to="/secretary/reservations"
                            style="text-decoration:none;"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-purple-500 text-center"
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
                                            <router-link
                                                to="/secretary/reservations"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Reservation Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countReservations }} Reservations
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <router-link
                            to="/secretary/appointments"
                            style="text-decoration:none;"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-indigo-500 text-center"
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
                                            </div>
                                            <router-link
                                                to="/secretary/appointments"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Appointment Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countAppointments }} Appointments
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <router-link
                            to="/secretary/inquiry"
                            style="text-decoration:none"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-blue-500 text-center"
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
                                            </div>
                                            <router-link
                                                to="/secretary/inquiry"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Inquiry Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countInquiry }} Inquiries
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <router-link
                            to="/secretary/request"
                            style="text-decoration:none;"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-green-500 text-center"
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
                                            </div>
                                            <router-link
                                                to="/secretary/request"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Request Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countRequests }} Requests
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <!-- <router-link
                            to="/secretary/quotation"
                            style="text-decoration:none;"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-yellow-500 text-center"
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
                                            </div>
                                            <router-link
                                                to="/secretary/quotation"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Quotation Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countQuotations }} Quotations
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link> -->
                        <router-link
                            to="/secretary/contact/list"
                            style="text-decoration:none;"
                        >
                            <div
                                class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                                style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                            >
                                <div
                                    class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                                ></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                                >
                                    <div>
                                        <div
                                            class="text-white text-lg flex space-x-2 items-center"
                                        >
                                            <div
                                                class="bg-white rounded-md p-1 flex items-center"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-gray-500 text-center text-green-500"
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
                                            </div>
                                            <router-link
                                                to="/secretary/contact/list"
                                                style="text-decoration:none;"
                                            >
                                                <p
                                                    class="text-lg text-white font-bold"
                                                >
                                                    Contact Management
                                                </p>
                                            </router-link>
                                        </div>
                                        <h3
                                            class="text-white text-xl mt-2 font-bold"
                                        >
                                            {{ countContacts }} Contacts
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </router-link>
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
            <div class="container px-5 py-8 mx-auto mb-20">
                <div class="sm:flex flex-col w-full lg:grid grid-cols-5 gap-4">
                    <router-link to="/charts" style="text-decoration:none;">
                        <div
                            class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out"
                            style="background-image: url('https://free4kwallpapers.com/uploads/originals/2016/03/03/my-girlfriend-ubrbimcrying-made-this-minimalistic-landscape-in-her-spare-time.-wallpaper_.jpg');"
                        >
                            <div
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 transition duration-300 ease-in-out"
                            ></div>
                            <div
                                class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center"
                            >
                                <div>
                                    <div
                                        class="text-white text-lg flex space-x-2 items-center"
                                    >
                                        <div
                                            class="bg-white rounded-md p-1 flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-500 text-center text-green-500"
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
                                        </div>
                                        <router-link
                                            to="/charts"
                                            style="text-decoration:none;"
                                        >
                                            <p
                                                class="text-lg text-white font-bold"
                                            >
                                                Chart Management
                                            </p>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </router-link>
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
            countQuotations: '',
            countContacts: ''
        };
    },
    beforeMount() {
        this.getAuthenticate();
        this.countAllGalleries();
    },
    methods: {
        getAuthenticate() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        countAllGalleries() {
            axios.get('/api/count').then(response => {
                this.countGalleries = response.data.gallery;
                this.countServices = response.data.service;
                this.countOrders = response.data.order;
                this.countReservations = response.data.reservation;
                this.countAppointments = response.data.appointment;
                this.countInquiry = response.data.inquiry;
                this.countRequests = response.data.request;
                this.countContacts = response.data.contact;
                console.log(response.data.gallery);
            });
        }
    }
};
</script>

<style></style>
