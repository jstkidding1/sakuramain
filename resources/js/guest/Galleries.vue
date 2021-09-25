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
            <div class="flex justify-end">
                <div class="relative w-2/6">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </span>
                    <input
                        class="w-full bg-white focus:bg-white border-2 border-gray-400 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        v-model.trim="search"
                        placeholder="Search..."
                        @keyup="searchGallery"
                    />
                    <svg
                        v-if="searchLoading"
                        class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                        style="border-right-color: white; border-top-color: white;"
                        viewBox="0 0 24 24"
                    ></svg>
                </div>
            </div>
            <div v-if="loadingData" class="flex justify-center pt-56">
                <svg
                    v-if="loadingData"
                    class="text-center animate-spin h-24 w-24 rounded-full bg-transparent border-4 border-gray-800 border-opacity-50 mr-3"
                    style="border-right-color: white; border-top-color: white;"
                    viewBox="0 0 24 24"
                ></svg>
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
                        v-if="!loadingData"
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
            },
            search: '',
            searchLoading: false,
            loadingData: false
        };
    },
    mounted() {
        this.getGallery();
    },
    methods: {
        getGallery() {
            this.loadingData = true;

            setTimeout(() => {
                this.loadingData = false;
                axios
                    .get('/api/galleries')
                    .then(response => {
                        this.galleries = response.data.gallery;
                        console.log(response.data.gallery);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }, 2000);
        },
        searchGallery: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get('/api/galleries?search=' + this.search)
                .then(response => {
                    this.galleries = response.data.gallery;
                    console.log(response.data.gallery);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 2000),
        getResults(page = 1) {
            axios.get('/api/galleries?page=' + page).then(response => {
                this.galleries = response.data.gallery;
                console.log(response.data.gallery);
            });
        }
    }
};
</script>

<style></style>
