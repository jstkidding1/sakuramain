<template>
    <div>
        <div class="mt-10 w-full">
            <div
                class="bg-gradient-to-r from-indigo-800 h-60 via-purple-600 to-red-500 px-72 py-10"
            >
                <div class="flex">
                    <h1 class="text-4xl font-bold text-white">
                        Here are the list of our offered services
                    </h1>
                </div>
                <div class="flex mt-4">
                    <p class="text-md font-bold text-white text-justify">
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
        <div class="container">
            <div class="flex justify-center mt-10 mb-20">
                <div v-if="services.length > 0">
                    <div class="grid grid-cols-3 gap-10">
                        <div v-for="(service, index) in services" :key="index">
                            <div
                                class="bg-white mx-auto shadow-lg rounded-lg max-w-sm transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    class="h-72 w-full object-cover rounded-t-lg"
                                    :src="service.image"
                                    alt=""
                                />
                                <div class="py-4 px-8">
                                    <h1
                                        class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight"
                                    >
                                        {{ service.service_name }}
                                    </h1>
                                    <p
                                        class="hover:cursor-pointer py-3 text-gray-600 leading-6"
                                    >
                                        {{ service.description }}
                                    </p>
                                </div>
                                <div class="flex justify-end p-3">
                                    <router-link
                                        style="text-decoration:none;"
                                        :to="{
                                            path:
                                                '/make/appointment/?aid=' +
                                                service.id
                                        }"
                                        class="bg-indigo-600 hover:bg-indigo-400 rounded p-2 hover:cursor-pointer text-white leading-6"
                                        >Make an appointment</router-link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
                    >
                        No Services Found.
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
            services: []
        };
    },
    mounted() {
        this.getServices();
    },
    methods: {
        getServices() {
            axios.get('/api/services').then(response => {
                this.services = response.data;
                console.log(response.data);
            });
        }
    }
};
</script>

<style></style>
