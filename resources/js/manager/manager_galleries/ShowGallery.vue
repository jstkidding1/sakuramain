<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 rounded shadow-md mt-10 h-full">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/manager/gallery/list"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                to="/manager/gallery/list"
                                >Gallery List</router-link
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
                                :to="{
                                    name: 'manager-view-gallery',
                                    params: { id: gallery.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >{{ gallery.name }}</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <div class="relative overflow-hidden">
                        <div class="h-72 w-full">
                            <img
                                :src="`/images/${gallery.image}`"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4 space-x-10">
                    <div class="font-bold text-gray-700 text-lg">
                        Customer Name
                    </div>
                    <div class="text-gray-700 text-lg">
                        {{ gallery.name }}
                    </div>
                </div>
                <div class="flex mt-4 space-x-4 px-4">
                    <div class="font-bold text-gray-700 text-lg">
                        Description
                    </div>
                </div>
                <div class="flex mt-4 space-x-4 px-4 mb-4">
                    <div class="text-gray-700 text-lg">
                        {{ gallery.description }}
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
            user: null,
            gallery: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getGallery();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getGallery() {
            axios
                .get(`/api/galleries/${this.$route.params.id}`)
                .then(response => {
                    this.gallery = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
