<template>
    <div>
        <div class="flex justify-center">
            <div class="relative w-full h-96 overflow-hidden">
                <div class="w-full filter blur-sm h-96">
                    <img
                        :src="main"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="absolute w-full py-24 inset-0">
                    <div class="flex justify-center">
                        <h1
                            class="font-bold text-gray-50 sm:text-3xl lg:text-6xl text-center tracking-tight"
                        >
                            Welcome to Sakura Auto Parts Trading Inc.
                        </h1>
                    </div>
                    <div class="flex justify-center mt-10">
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
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-700 px-8 transition duration-300"
                            >Get Started</router-link
                        >
                        <router-link
                            to="/aboutus"
                            style="text-decoration:none;"
                            class="py-2 border-2 rounded-lg border-gray-50 text-gray-50 font-sans font-bold text-lg hover:bg-gray-50 hover:text-gray-700 px-8 transition duration-300"
                            >Explore now</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="flex justify-center mt-20">
                <h1 class="text-3xl text-gray-700 font-bold">
                    Sakura offers available features
                </h1>
            </div>
            <div class="flex justify-center mt-2">
                <p class="text-xs text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nesciunt inventore quis quibusdam eveniet quos.
                </p>
            </div>

            <div class="flex justify-center mt-10 px-10">
                <div class="sm:flex flex-col lg:grid grid-cols-6 gap-4">
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="bg-yellow-700 p-2 rounded-full">
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
                            <h1 class="text-gray-700 text-lg font-bold">
                                Reservation
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                In this hectic lifestyle that we have today and
                                the more limited time we can spend outside. We
                                people can only do so much, so why waste time by
                                going to your local automotive dealers when you
                                can use the Sakura website. In Sakura you can
                                choose in the wide variety of vehicles that we
                                have and make a reservation with just a touch of
                                hand. Saves you time for your family, work and
                                enjoyment. What more can you ask?
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="bg-yellow-700 p-2 rounded-full">
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
                            <h1 class="text-gray-700 text-lg font-bold">
                                Services
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                These days we have widely observed that it is
                                much safer to be travelling in your own car and
                                not be on a public utility vehicle. It has
                                always been that way but since the pandemic hit.
                                It gave a compelling reason why you should get
                                your own car. But what if your car also needed
                                help? Not to worry! In Sakura we offer services
                                that helps you with maintenance and even fixing
                                your car.
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="bg-yellow-700 p-2 rounded-full">
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
                            <h1 class="text-gray-700 text-lg font-bold">
                                Order
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                These days it’s a shame that we cannot spend
                                much time out doors especially in the big city
                                where higher cases of COVID-19 had been
                                recorded. We won’t be able to shop and stroll as
                                much as we do back then. Sakura got an answer to
                                that we also provide online ordering of
                                automotive goods that you can use for your car.
                                It’s great! You should try!
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="bg-yellow-700 p-2 rounded-full">
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
                            <h1 class="text-gray-700 text-lg font-bold">
                                Inquiries
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                So if you want to make a reservation it’s as
                                easy as 1, 2, 3 really, you can go to
                                Sakura.com, choose a car like and click on
                                reserve button after that you are going to be
                                asked for some information, click on submit and
                                voila! You made a reservation
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="bg-yellow-700 p-2 rounded-full">
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
                            <h1 class="text-gray-700 text-lg font-bold">
                                Quotations
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Nesciunt inventore quis
                                quibusdam eveniet quos. Illum, enim. Sapiente
                                culpa iusto, nemo voluptatum eaque cupiditate
                                qui quisquam praesentium optio id commodi animi.
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="bg-yellow-700 p-2 rounded-full">
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
                            <h1 class="text-gray-700 text-lg font-bold">
                                Test Drive
                            </h1>
                        </div>
                        <div class="flex mt-2">
                            <p class="text-center text-gray-500 text-sm">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Nesciunt inventore quis
                                quibusdam eveniet quos. Illum, enim. Sapiente
                                culpa iusto, nemo voluptatum eaque cupiditate
                                qui quisquam praesentium optio id commodi animi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border-2 my-10 bg-gray-200" />
        </div>

        <div class="flex justify-center space-x-4 px-20 mt-20">
            <div class="md:flex no-wrap md:-mx-2 lg:space-x-10">
                <div class="space-y-4">
                    <div class="flex">
                        <h1 class="text-3xl text-gray-700">
                            Reserve A Vehicle
                        </h1>
                    </div>
                    <div class="flex">
                        <p class="text-xs text-gray-500">
                            So if you want to make a reservation it’s as easy as
                            1, 2, 3 really, you can go to Sakura.com, choose a
                            car like and click on reserve button after that you
                            are going to be asked for some information, click on
                            submit and voila! You made a reservation
                        </p>
                    </div>
                    <div class="flex">
                        <button
                            class="px-8 py-2 rounded bg-yellow-700 hover:bg-yellow-500 transition duration-300 text-md text-gray-50 font-bold"
                        >
                            See Available Vehicles
                        </button>
                    </div>
                </div>
                <div class="sm:mt-10">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.1106018736573!2d123.9383581151998!3d10.333033170045496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999e72548f901%3A0xb66ee62221483521!2sSakura%20Auto%20Parts%20Trading%20Inc.!5e0!3m2!1sen!2sph!4v1631886393137!5m2!1sen!2sph"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>
                </div>
            </div>
        </div>
        <!-- <div class="flex justify-center px-20 mt-20">
            <div class="lg:w-1/2">
                <div class="flex">
                    <h1 class="text-3xl text-gray-700">
                        Reserve A Vehicle
                    </h1>
                </div>
                <div class="flex mt-4">
                    <p class="text-xs text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo porro rerum iure nam fugit nisi aliquam perferendis
                        cumque voluptates consectetur. Aspernatur iure iste hic
                        suscipit veritatis, ex ea similique illum.
                    </p>
                </div>
                <div class="flex mt-8">
                    <button
                        class="px-8 py-2 rounded bg-yellow-700 hover:bg-yellow-500 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Available Vehicles
                    </button>
                </div>
            </div>
            <div class="sm:full lg:w-2/5">
                <div class="flex ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.1106018736573!2d123.9383581151998!3d10.333033170045496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999e72548f901%3A0xb66ee62221483521!2sSakura%20Auto%20Parts%20Trading%20Inc.!5e0!3m2!1sen!2sph!4v1631886393137!5m2!1sen!2sph"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>
                </div>
            </div>
        </div> -->

        <div class="flex mt-20 sm:h-full">
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="group1"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
            <div class="w-1/2 sm:h-96 bg-gray-100 px-20">
                <div class="flex justify-start mt-20">
                    <p class="text-xl text-gray-700">Services</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="sm:text-xs lg:text-sm text-gray-500">
                        If you want your car fixed or just want to have a good
                        old routine check-up for your car. Sakura.com can also
                        help you with that it’s as easy as peanut butter and
                        jelly! You can go to the Sakura website look for
                        services then choose which of the following services
                        would you like to get. That’s it! What are you waiting
                        for avail our services so you can be sure that your car
                        is in good shape.
                    </p>
                </div>
                <div class="flex mt-8">
                    <button
                        class="px-8 py-2 rounded bg-yellow-700 hover:bg-yellow-500 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Services Available
                    </button>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2 sm:h-96 bg-gray-100 px-20">
                <div class="flex justify-start mt-20">
                    <p class="text-xl text-gray-700">Buying A Car</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="sm:text-xs lg:text-sm text-gray-500">
                        If you want to buy a car. You can go to our store Sakura
                        Auto Parts Trading located at C.P, Batiller, Mandaue
                        City, Cebu and our lovely staff will attend to all your
                        inquiries and make sure you are well informed so that
                        you can choose wisely. Or you can also send us a message
                        at our facebook page Sakura Auto Parts Trading.
                    </p>
                </div>
                <div class="flex mt-8">
                    <button
                        class="px-8 py-2 rounded bg-yellow-700 hover:bg-yellow-500 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Vehicles Available
                    </button>
                </div>
            </div>
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="buycar1"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                <div class="h-96 w-full">
                    <img
                        :src="male"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
            <div class="w-1/2 sm:h-96 bg-gray-100 px-20">
                <div class="flex justify-start mt-20">
                    <p class="text-xl text-gray-700">Buying Auto-Parts</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="sm:text-xs lg:text-sm text-gray-500">
                        Online Shopping? Buying upgrades for your beloved car?
                        We got that covered for you! In Sakura.com we also
                        provide a wide range of automotive products that we can
                        choose from you can look for products and then just make
                        an order and wait for it. That’s it easy-peasy!
                    </p>
                </div>
                <div class="flex mt-8">
                    <button
                        class="px-8 py-2 rounded bg-yellow-700 hover:bg-yellow-500 transition duration-300 text-md text-gray-50 font-bold"
                    >
                        See Auto Parts Available
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            check: '/images/check.png',
            main: '/images/FinalImage.jpg',
            group1: '/images/group1.jpg',
            buycar1: '/images/buycar.jpg',
            male: '/images/male.jpg'
        };
    }
};
</script>

<style></style>
