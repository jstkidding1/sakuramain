<template>
    <div>
        <div class="flex justify-center">
            <div class="w-2/5 bg-white shadow-md rounded p-2 mt-10 rounded">
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
                                to="/appointment/guide"
                                >Appointment Guide</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/2 mt-4 pl-3">
                        <div class="flex">
                            <h1 class="text-5xl text-gray-700 font-bold">
                                Book an Appointment Service Online
                            </h1>
                        </div>
                        <div class="flex">
                            <p class="text-lg text-gray-700 mt-3">
                                Start booking an appointment service without
                                needing to visit to our Onsite office.
                            </p>
                        </div>
                        <div class="flex mt-10">
                            <div class="flex items-center px-3">
                                <img
                                    :src="check"
                                    alt=""
                                    class="h-5 w-5 object-cover mr-3"
                                />
                                <p class="text-xs text-gray-700">
                                    Enter your vehicle details.
                                </p>
                            </div>
                        </div>
                        <div class="flex mt-10">
                            <div class="flex items-center px-3">
                                <img
                                    :src="check"
                                    alt=""
                                    class="h-5 w-5 object-cover mr-3"
                                />
                                <p class="text-xs text-gray-700">
                                    Select service type needed.
                                </p>
                            </div>
                        </div>
                        <div class="flex mt-10">
                            <div class="flex items-center px-3">
                                <img
                                    :src="check"
                                    alt=""
                                    class="h-5 w-5 object-cover mr-3"
                                />
                                <p class="text-xs text-gray-700">
                                    Book your appointment.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 mb-2">
                        <div
                            class="h-full w-full overflow-hidden transform transition duration-700 hover:translate-y-1 hover:scale-105"
                        >
                            <img
                                :src="calendar"
                                alt=""
                                class="h-full w-full object-contain"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-2/5 rounded bg-white shadow-md mt-4 p-2">
                <div class="w-full px-3 py-2">
                    <div class="flex">
                        <h1 class="text-2xl text-gray-700 font-bold">
                            Sakura Online Service Appointment
                        </h1>
                    </div>
                    <div class="flex mt-4">
                        <p class="text-xs text-justify text-gray-700">
                            The Sakura Online Service Appointment feature
                            enables car buyers to reserve their vehicle of
                            choice from Sakura’s large volume of partner dealers
                            across the Philippines. By using the online
                            reservation feature, you can reserve your desired
                            vehicle and begin the purchase transaction from the
                            comfort of your own home or office. The online
                            reservation is depending on the status.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-2/5 rounded bg-white shadow-md mt-4 p-2">
                <div class="w-full px-3 py-2">
                    <div class="flex">
                        <h1 class="text-2xl text-gray-700 font-bold">
                            How it works
                        </h1>
                    </div>
                    <div class="flex">
                        <p class="text-md text-gray-700">4 Step Process</p>
                    </div>
                    <div class="flex mt-4">
                        <div class="grid grid-cols-4 gap-4 px-4">
                            <div
                                class="h-full w-72 transform transition duration-700 hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    :src="select1"
                                    alt=""
                                    class="w-40 h-40 object-cover"
                                />
                            </div>
                            <div
                                class="h-full w-72 transform transition duration-700 hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    :src="select2"
                                    alt=""
                                    class="w-40 h-40 object-cover"
                                />
                            </div>
                            <div
                                class="h-full w-72 transform transition duration-700 hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    :src="select3"
                                    alt=""
                                    class="w-40 h-40 object-cover"
                                />
                            </div>
                            <div
                                class="h-full w-72 transform transition duration-700 hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    :src="select4"
                                    alt=""
                                    class="w-40 h-40 object-cover"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-4">
                        <div class="grid grid-cols-4 gap-4 px-2">
                            <div class="flex justify-center">
                                <p class="text-md text-center text-gray-700">
                                    Vehicle of choice and use the ‘Reserve
                                    Online’ button to begin your transaction.
                                </p>
                            </div>
                            <div class="flex justify-center">
                                <p class="text-md text-center text-gray-700">
                                    Fill out the contact information, and select
                                    your vehicle of choice.
                                </p>
                            </div>
                            <div class="flex justify-center">
                                <p class="text-md text-center text-gray-700">
                                    Our staff will be notified about the
                                    reservation. and will provide details on how
                                    to complete your purchase.
                                </p>
                            </div>
                            <div class="flex justify-center">
                                <p class="text-md text-center text-gray-700">
                                    Satisfied Customer has purchased on us. Til
                                    next time.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-8 mb-4">
                        <a
                            href="/services"
                            style="text-decoration:none;"
                            class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                            ><span>See Our Services Offered</span></a
                        >
                        <!-- <button
                            class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                        >
                            <span>Start Your Car Reservation Journey</span>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-2/5 rounded bg-white shadow-md mt-4 p-2">
                <div class="w-full px-3 py-2">
                    <div class="flex">
                        <h1 class="text-2xl text-gray-700 font-bold">
                            Benefits of Booking Online
                        </h1>
                    </div>
                    <div class="flex items-center mt-10">
                        <img
                            :src="check"
                            alt=""
                            class="h-5 w-5 object-cover mr-3"
                        />
                        <p class="text-xs text-gray-700">
                            From the comfort of your own home you can browse
                            through cars and current promos and seamlessly
                            reserve online, you don’t need to wait for agents to
                            contact you or have any conversations, you can just
                            order and get the process going.
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
                            details as AutoDeal will take care of the payment to
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
                            transfer or Gcash, we provide credit card as an
                            option, which allows for payment flexibility.
                        </p>
                    </div>
                    <div class="flex items-center mt-2 mb-4">
                        <img
                            :src="check"
                            alt=""
                            class="h-5 w-5 object-cover mr-3"
                        />
                        <p class="text-xs text-gray-700">
                            Easy refund from AutoDeal.com.ph, no complications.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-2/5 rounded bg-white shadow-md mt-4 p-2">
                <div class="w-full px-3 py-2">
                    <div class="flex">
                        <h1 class="text-2xl text-gray-700 font-bold">
                            Service Appointment Validity
                        </h1>
                    </div>
                    <div class="flex mt-4">
                        <p class="text-xs text-gray-700">
                            Reservation payments are valid for up to Seven (7)
                            days. This means that you must be in the process of
                            completing your transaction before this window
                            expires. Reservations that remain inactive after
                            seven (7) days will be subject to being canceled. If
                            you have made a reservation through a promotion and
                            down payment was not made before the promo expiry
                            date, then discounts and special financing may be
                            subject to change. In either of the above cases you
                            can claim a refund.
                        </p>
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
            calendar: '/images/Calendar.png',
            check: '/images/Check.png',
            select1: '/images/Select1.png',
            select2: '/images/Select2.png',
            select3: '/images/Select3.png',
            select4: '/images/Select4.png'
        };
    }
};
</script>

<style></style>
