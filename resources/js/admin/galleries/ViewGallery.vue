<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <router-link to="/admin/dashboard" class="ml-2"
                            >Dashboard</router-link
                        >
                        <svg
                            class="fill-current w-3 h-3 mx-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                        >
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                            />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <router-link to="/gallery/management"
                            >Gallery Management</router-link
                        >
                        <svg
                            class="fill-current w-3 h-3 mx-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                        >
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                            />
                        </svg>
                        <router-link
                            :to="{
                                name: 'view-gallery',
                                params: { id: gallery.id }
                            }"
                            aria-current="page"
                            >View Gallery</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="flex justify-center mt-10 mb-20">
                <!-- <div class="grid grid-cols-3 gap-10"> -->
                <div
                    class="bg-white mx-auto shadow-lg rounded-lg max-w-sm transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                >
                    <img
                        class="h-72 w-full object-cover rounded-t-lg"
                        :src="gallery.image"
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
                <!-- </div> -->
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
