<template>
    <div>
        <div class="flex mt-20">
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
                        class="font-sans font-bold text-xl text-yellow-600 mt-4 ml-1"
                    >
                        Direct Importer
                    </h5>
                    <h5
                        class="font-sans font-bold text-xl text-gray-800 mt-4 ml-1"
                    >
                        of Japan and
                    </h5>
                    <h5
                        class="font-sans font-bold text-xl text-yellow-600 mt-4 ml-1"
                    >
                        Spare Parts.
                    </h5>
                </div>
                <div class="flex mt-4">
                    <router-link
                        to="/aboutus"
                        style="text-decoration:none;"
                        class="py-3 border-4 rounded-lg border-yellow-700 text-yellow-700 font-sans font-bold text-2xl hover:bg-yellow-700 hover:text-gray-50 px-8 transition duration-300"
                        >Explore now</router-link
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
        <div class="mt-10 w-full bg-gray-200">
            <div class="px-72 py-10">
                <div class="flex">
                    <h1 class="text-4xl font-bold text-gray-800">
                        We offer you the best of our products
                    </h1>
                </div>
                <div class="flex mt-4">
                    <p class="text-md font-bold text-gray-800 text-justify">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and
                        more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex mt-10 mb-10">
            <div class="w-full py-10 px-20">
                <h1 class="font-sans font-bold text-6xl text-gray-700 mb-10">
                    We offer
                </h1>
                <div class="grid grid-cols-3 gap-48">
                    <div class="bg-white shadow-lg rounded-xl p-5">
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
                    <div class="bg-white shadow-lg rounded-xl p-5">
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
                    <div class="bg-white shadow-lg rounded-xl p-5">
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
