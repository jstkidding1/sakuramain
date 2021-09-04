<template>
    <div>
        <div class="container">
            <div class="w-full">
                <div class="flex py-4">
                    <div class="w-full flex justify-start">
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
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                to="/gallery"
                                >Gallery</router-link
                            >
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="flex w-full mt-10">
                <h1 class="text-3xl text-gray-800 font-bold">
                    Sakura's satified customers
                </h1>
            </div>
            <div class="flex w-full mt-2">
                <p class="text-lg text-gray-600">
                    Want to inquire our brand new cars exported from japan?
                </p>
            </div>
            <div class="flex justify-center mt-10 mb-20">
                <div v-if="galleries.data.length > 0">
                    <div class="grid grid-cols-3 gap-10">
                        <div
                            v-for="(gallery, index) in galleries.data"
                            :key="index"
                        >
                            <div
                                class="bg-white mx-auto shadow-lg rounded-lg w-96 transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    class="h-72 w-full object-cover rounded-t-lg"
                                    :src="`/images/${gallery.image}`"
                                    alt=""
                                />
                                <div class="py-4 px-8">
                                    <h1
                                        class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight"
                                    >
                                        {{ gallery.name }}
                                    </h1>
                                    <p
                                        class="hover:cursor-pointer py-3 text-gray-600 leading-6"
                                    >
                                        {{ gallery.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                    >
                        No Galleries Found.
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
            galleries: {
                data: []
            }
            // galleries: [],
        };
    },
    mounted() {
        axios
            .get('/api/galleries')
            .then(response => {
                this.galleries = response.data;
                console.log(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }
};
</script>

<style></style>
