<template>
    <div>
        <div class="bg-white shadow-md flex mt-20">
            <div class="w-1/2 pl-40 pt-4">
                <h1 class="font-sans font-bold text-8xl text-gray-800">
                    Welcome <br />to Sakura <br />
                    Auto Parts <br />
                    Trading Inc.
                </h1>
                <div class="flex">
                    <h5 class="font-sans font-bold text-xl text-gray-800 mt-4">
                        An Automotive Wholesaler from
                    </h5>
                    <h5
                        class="font-sans font-bold text-xl text-indigo-800 mt-4 ml-1"
                    >
                        Direct Importer
                    </h5>
                    <h5
                        class="font-sans font-bold text-xl text-gray-800 mt-4 ml-1"
                    >
                        of Japan and
                    </h5>
                    <h5
                        class="font-sans font-bold text-xl text-indigo-800 mt-4 ml-1"
                    >
                        Spare Parts.
                    </h5>
                </div>
                <div class="flex mt-4">
                    <router-link
                        to="/aboutus"
                        style="text-decoration:none;"
                        class="bg-indigo-500 py-3 text-white font-sans font-bold text-lg hover:bg-indigo-600 px-8"
                        >Click here</router-link
                    >
                    <!-- <button
                        class="bg-indigo-500 py-3 text-white font-sans font-bold text-lg hover:bg-indigo-600 px-8"
                    >
                        Click here
                    </button> -->
                </div>
            </div>
            <div class="w-1/2">
                <img :src="main" alt="" class="h-full w-full object-contain" />
            </div>
        </div>
        <div
            class="bg-gradient-to-r from-indigo-400 via-purple-500 to-purple-500 shadow-md flex mt-10 mb-10"
        >
            <div class="w-full py-10 px-20">
                <h1 class="font-sans font-bold text-6xl text-white mb-10">
                    We offer
                </h1>
                <div class="grid grid-cols-3 gap-48">
                    <div class="bg-white rounded-xl p-5">
                        <div class="flex justify-center">
                            <h5
                                class="font-sans font-bold text-3xl text-gray-800"
                            >
                                Services
                            </h5>
                        </div>
                        <div class="flex justify-center">
                            <h5
                                class="font-sans text-lg text-gray-800 text-justify mt-4 px-4"
                            >
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Atque, dolor cupiditate
                                quibusdam unde eligendi ab officiis, nesciunt
                                quia esse cum exercitationem commodi? Tempore
                                illum quasi quod eveniet doloremque numquam eos.

                                <br />
                                <br />

                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Hic exercitationem quisquam
                                dolorum incidunt numquam magni accusamus ut nam,
                                quod quo repellat facilis doloremque vero
                                tempore quibusdam veniam tenetur optio unde!
                            </h5>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-5">
                        <div class="flex justify-center">
                            <h5
                                class="font-sans font-bold text-3xl text-gray-800"
                            >
                                Reservations
                            </h5>
                        </div>
                        <div class="flex justify-center">
                            <h5
                                class="font-sans text-lg text-gray-800 text-justify mt-4 px-4"
                            >
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Atque, dolor cupiditate
                                quibusdam unde eligendi ab officiis, nesciunt
                                quia esse cum exercitationem commodi? Tempore
                                illum quasi quod eveniet doloremque numquam eos.

                                <br />
                                <br />

                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Hic exercitationem quisquam
                                dolorum incidunt numquam magni accusamus ut nam,
                                quod quo repellat facilis doloremque vero
                                tempore quibusdam veniam tenetur optio unde!
                            </h5>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-5">
                        <div class="flex justify-center">
                            <h5
                                class="font-sans font-bold text-3xl text-gray-800"
                            >
                                Auto-parts
                            </h5>
                        </div>
                        <div class="flex justify-center">
                            <h5
                                class="font-sans text-lg text-gray-800 text-justify mt-4 px-4"
                            >
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Atque, dolor cupiditate
                                quibusdam unde eligendi ab officiis, nesciunt
                                quia esse cum exercitationem commodi? Tempore
                                illum quasi quod eveniet doloremque numquam eos.

                                <br />
                                <br />

                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Hic exercitationem quisquam
                                dolorum incidunt numquam magni accusamus ut nam,
                                quod quo repellat facilis doloremque vero
                                tempore quibusdam veniam tenetur optio unde!
                            </h5>
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
            main: '/images/Capture.png'
        };
    }
};
</script>

<style></style>
