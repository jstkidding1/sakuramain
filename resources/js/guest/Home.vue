<template>
    <div>
        <div class="flex justify-center">
            <div class="relative w-full h-96 overflow-hidden">
                <div class="w-full h-96">
                    <img
                        :src="main"
                        alt=""
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="absolute w-full py-40 inset-0">
                    <div class="flex justify-center">
                        <h1
                            class="font-bold text-gray-50 text-6xl text-center leading-4"
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
                            >Explore now</router-link
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
        <div class="container">
            <div class="flex justify-center mt-20">
                <h1 class="text-2xl text-gray-700 font-bold">
                    Sakura offers available features
                </h1>
            </div>
            <div class="flex justify-center mt-2">
                <p class="text-xs text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nesciunt inventore quis quibusdam eveniet quos.
                </p>
            </div>

            <div class="flex justify-center mt-10 px-52">
                <div class="grid grid-cols-3 gap-4">
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

        <div class="flex justify-center px-96 mt-20">
            <div class="w-1/2">
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
                        See Vehicle Available
                    </button>
                </div>
            </div>
            <div class="w-2/5">
                <div class="flex">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.1106018736573!2d123.9383581151998!3d10.333033170045496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999e72548f901%3A0xb66ee62221483521!2sSakura%20Auto%20Parts%20Trading%20Inc.!5e0!3m2!1sen!2sph!4v1631886393137!5m2!1sen!2sph"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>
                </div>
                <!-- <div class="flex">
                    <h1 class="text-3xl text-gray-700">Why Should I Buy ?</h1>
                </div> -->
                <!-- <div class="">
                    <div class="flex items-center mt-10">
                        <img
                            :src="check"
                            alt=""
                            class="h-5 w-5 object-cover mr-3"
                        />
                        <p class="text-sm text-gray-700">
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
                        <p class="text-sm text-gray-700">
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
                        <p class="text-sm text-gray-700">
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
                        <p class="text-sm text-gray-700">
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
                        <p class="text-sm text-gray-700">
                            Easy refund from AutoDeal.com.ph, no complications.
                        </p>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="flex mt-36">
            <div class="w-1/2 h-96">
                <img :src="group1" alt="" class="h-full w-full object-cover" />
            </div>
            <div class="w-1/2 bg-gray-100 pl-20 pr-10">
                <div class="flex justify-start mt-20">
                    <p class="text-xl text-gray-700">Services</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit, iusto esse? Culpa ex asperiores tenetur dolore
                        placeat cumque, corrupti pariatur laborum cum ipsum
                        sapiente, unde facere laboriosam accusantium praesentium
                        dignissimos!
                    </p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit, iusto esse? Culpa ex asperiores tenetur dolore
                        placeat cumque, corrupti pariatur laborum cum ipsum
                        sapiente, unde facere laboriosam accusantium praesentium
                        dignissimos!
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
        <div class="flex mt-20">
            <div class="w-1/2 bg-gray-100 pl-20 pr-10">
                <div class="flex justify-start mt-20">
                    <p class="text-xl text-gray-700">Buying A Car</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit, iusto esse? Culpa ex asperiores tenetur dolore
                        placeat cumque, corrupti pariatur laborum cum ipsum
                        sapiente, unde facere laboriosam accusantium praesentium
                        dignissimos!
                    </p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit, iusto esse? Culpa ex asperiores tenetur dolore
                        placeat cumque, corrupti pariatur laborum cum ipsum
                        sapiente, unde facere laboriosam accusantium praesentium
                        dignissimos!
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
            <div class="w-1/2 h-96">
                <img :src="buycar1" alt="" class="h-full w-full object-cover" />
            </div>
        </div>
        <div class="flex mt-36">
            <div class="w-1/2 h-96">
                <img :src="male" alt="" class="h-full w-full object-cover" />
            </div>
            <div class="w-1/2 bg-gray-100 pl-20 pr-10">
                <div class="flex justify-start mt-20">
                    <p class="text-xl text-gray-700">Buying Auto-Parts</p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit, iusto esse? Culpa ex asperiores tenetur dolore
                        placeat cumque, corrupti pariatur laborum cum ipsum
                        sapiente, unde facere laboriosam accusantium praesentium
                        dignissimos!
                    </p>
                </div>
                <div class="flex justify-start mt-4">
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit, iusto esse? Culpa ex asperiores tenetur dolore
                        placeat cumque, corrupti pariatur laborum cum ipsum
                        sapiente, unde facere laboriosam accusantium praesentium
                        dignissimos!
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
