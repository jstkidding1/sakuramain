<template>
    <div class="mt-10">
        <div class="container px-5 mx-auto">
            <h1 class="text-4xl md:text-2xl text-gray-700 font-semibold">
                Admin Dashboard
            </h1>
        </div>
        <div class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-8 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                src="https://www.pixelstalk.net/wp-content/uploads/images1/Free-Anime-Landscape-Backgrounds-High.jpg"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    User Management
                                </h2>
                                <router-link
                                    to="/users"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                src="https://www.pixelstalk.net/wp-content/uploads/2016/10/Anime-Landscape-Backgrounds.jpg"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Vehicle Management
                                </h2>
                                <router-link
                                    to="/vehicles"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                src="https://www.pixelstalk.net/wp-content/uploads/2016/10/Anime-scenery-high-quality.jpg"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Product Management
                                </h2>
                                <router-link
                                    to="/products"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 sm:w-1/2 lg:w-1/3 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <div
                            class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-2xl"
                        >
                            <img
                                src="https://free4kwallpapers.com/uploads/originals/2019/09/22/anime-scenery-art-wallpaper.jpg"
                                alt="image"
                                class="lg:h-64 md:h-48 w-full object-cover object-center"
                            />

                            <div
                                class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in"
                            >
                                <h2 class="text-lg font-semibold mb-3">
                                    Order Management
                                </h2>
                                <router-link
                                    to="/orders"
                                    class="text-md font-semibold mb-3 hover:text-white"
                                    >Click here to manage</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer' + localStorage.getItem('jwt');
    },
    methods: {}
};
</script>

<style></style>
