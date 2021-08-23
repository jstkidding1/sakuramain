<template>
    <div>
        <div class="w-full h-auto mb-52">
            <div
                class="bg-gradient-to-r from-purple-500 via-indigo-500 to-blue-800"
            >
                <div class="p-52">
                    <div class="flex">
                        <div class="w-1/2">
                            <h1 class="font-sans font-bold text-8xl text-white">
                                Hi! We're part of the Sakura Team
                            </h1>
                            <br />
                            <h5
                                class="font-sans font-semibold text-lg text-white"
                            >
                                We partner with growth-minded companies helping
                                them accelerate their digital marketing results
                            </h5>
                        </div>
                        <div class="w-1/2">
                            <img
                                :src="ulols"
                                alt=""
                                class="h-96 w-full object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-24">
                <h3 class="font-sans font-bold text-3xl text-gray-800">
                    We're More Than A Digital Marketing Agency
                </h3>
            </div>
            <div class="flex justify-center mt-10">
                <div class="w-1/3">
                    <p
                        class="font-sans text-lg text-gray-800 text-center tracking-tight leading-relaxed"
                    >
                        Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Sint eligendi quidem at assumenda nemo!
                        Repellendus, cumque harum! Sint quo id, asperiores quae
                        nulla, nostrum officiis laborum aliquam repudiandae
                        sequi obcaecati!
                    </p>
                </div>
            </div>
            <div class="flex justify-center mt-24">
                <h5 class="font-sans font-bold text-3xl text-gray-800">
                    Meet our one and only
                </h5>
            </div>
            <div class="flex justify-center mt-10">
                <div class="w-1/2">
                    <div class="grid grid-cols-3 gap-8">
                        <div class="bg-white shadow-md p-4">
                            <div class="flex justify-center">
                                <img
                                    :src="ken"
                                    alt=""
                                    class="h-24 w-24 object-cover rounded-full"
                                />
                            </div>
                            <div class="flex justify-center">
                                <h5
                                    class="font-sans font-bold text-lg mt-4 text-gray-800"
                                >
                                    Ken Ray Dignos
                                </h5>
                            </div>
                            <div class="flex justify-center">
                                <h5
                                    class="font-sans font-bold text-lg mt-4 text-gray-800"
                                >
                                    Senior Front-end Programmer
                                </h5>
                            </div>
                        </div>
                        <div class="bg-white shadow-md p-4">
                            <div class="flex justify-center">
                                <img
                                    :src="ken"
                                    alt=""
                                    class="h-24 w-24 object-cover rounded-full"
                                />
                            </div>
                            <div class="flex justify-center">
                                <h5
                                    class="font-sans font-bold text-lg mt-4 text-gray-800"
                                >
                                    Ken Ray Dignos
                                </h5>
                            </div>
                            <div class="flex justify-center">
                                <h5
                                    class="font-sans font-bold text-lg mt-4 text-gray-800"
                                >
                                    Senior Front-end Programmer
                                </h5>
                            </div>
                        </div>
                        <div class="bg-white shadow-md p-4">
                            <div class="flex justify-center">
                                <img
                                    :src="ken"
                                    alt=""
                                    class="h-24 w-24 object-cover rounded-full"
                                />
                            </div>
                            <div class="flex justify-center">
                                <h5
                                    class="font-sans font-bold text-lg mt-4 text-gray-800"
                                >
                                    Ken Ray Dignos
                                </h5>
                            </div>
                            <div class="flex justify-center">
                                <h5
                                    class="font-sans font-bold text-lg mt-4 text-gray-800"
                                >
                                    Senior Front-end Programmer
                                </h5>
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
            ulols: '/images/ulols.jpg',
            ken: '/images/Ken.png'
        };
    }
};
</script>

<style></style>
