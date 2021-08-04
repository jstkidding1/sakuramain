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
                        <router-link to="/services"
                            >Service Management</router-link
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
                                name: 'view-service',
                                params: { id: service.id }
                            }"
                            aria-current="page"
                            >View Service</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white w-full rounded shadow-md p-4 mt-10">
                <div class="flex mb-10">
                    <h5 class="font-sans font-bold text-lg text-gray-800">
                        View Service
                    </h5>
                </div>
                <div class="flex mt-4">
                    <div class="flex mr-4">
                        <div class="w-full">
                            <img
                                :src="service.image"
                                class="w-72 h-72 object-cover"
                            />
                        </div>
                    </div>
                    <div class="flex w-1/2">
                        <div class="p-4">
                            <div class="flex">
                                <h5
                                    class="font-sans font-bold text-lg text-gray-800 mr-2"
                                >
                                    Service Information
                                </h5>
                            </div>
                            <div class="flex mt-4">
                                <h5
                                    class="font-sans text-md text-gray-800 mr-2"
                                >
                                    Service Name:
                                </h5>
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ service.service_name }}
                                </h5>
                            </div>
                            <div class="flex mt-2">
                                <h5
                                    class="font-sans font-bold text-md text-gray-800"
                                >
                                    {{ service.description }}
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
            user: null,
            service: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getService();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getService() {
            axios
                .get(`/api/services/${this.$route.params.id}`)
                .then(response => {
                    this.service = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
