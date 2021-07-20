<template>
    <div>
        <div class="flex mt-10">
            <div class="w-2/12 mr-2">
                <div class="bg-white rounded w-full shadow-md p-4">
                    <h3 class="text-center py-2 text-lg">Categories</h3>
                    <div class="flex mt-4">
                        <select
                            class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        >
                            <option>Body Components</option>
                            <option>Doors</option>
                            <option>Windows</option>
                            <option>Audio/Video Devices</option>
                            <option>Cameras</option>
                            <option>Ignition System</option>
                            <option>Sensors</option>
                            <option>Electrical Systems</option>
                        </select>
                    </div>
                    <div class="flex mt-4">
                        <select
                            class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        >
                            <option>Body Components</option>
                            <option>Doors</option>
                            <option>Windows</option>
                            <option>Audio/Video Devices</option>
                            <option>Cameras</option>
                            <option>Ignition System</option>
                            <option>Sensors</option>
                            <option>Electrical Systems</option>
                        </select>
                    </div>
                    <div class="flex mt-4">
                        <select
                            class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        >
                            <option>Body Components</option>
                            <option>Doors</option>
                            <option>Windows</option>
                            <option>Audio/Video Devices</option>
                            <option>Cameras</option>
                            <option>Ignition System</option>
                            <option>Sensors</option>
                            <option>Electrical Systems</option>
                        </select>
                    </div>
                    <div class="flex mt-4">
                        <select
                            class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        >
                            <option>Body Components</option>
                            <option>Doors</option>
                            <option>Windows</option>
                            <option>Audio/Video Devices</option>
                            <option>Cameras</option>
                            <option>Ignition System</option>
                            <option>Sensors</option>
                            <option>Electrical Systems</option>
                        </select>
                    </div>
                    <div class="flex mt-4">
                        <select
                            class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        >
                            <option>Body Components</option>
                            <option>Doors</option>
                            <option>Windows</option>
                            <option>Audio/Video Devices</option>
                            <option>Cameras</option>
                            <option>Ignition System</option>
                            <option>Sensors</option>
                            <option>Electrical Systems</option>
                        </select>
                    </div>
                    <div class="flex mt-4">
                        <select
                            class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        >
                            <option>Body Components</option>
                            <option>Doors</option>
                            <option>Windows</option>
                            <option>Audio/Video Devices</option>
                            <option>Cameras</option>
                            <option>Ignition System</option>
                            <option>Sensors</option>
                            <option>Electrical Systems</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-10/12">
                <div class="w-full p-4">
                    <div class="grid grid-cols-4 gap-8">
                        <div v-for="(product, index) in products" :key="index">
                            <div
                                class="bg-white shadow-md transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                            >
                                <img
                                    :src="product.image"
                                    :alt="product.product_name"
                                    class="h-52 w-full object-cover"
                                />
                                <div class="h-40 p-4">
                                    <div class="flex justify-between">
                                        <div
                                            class="text-lg font-sans text-gray-800"
                                        >
                                            {{ product.product_name }}
                                        </div>
                                        <div
                                            class="text-lg font-bold font-sans text-gray-800"
                                        >
                                            ₱
                                            {{ product.price.toLocaleString() }}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        {{ product.product_brand }}
                                    </div>
                                    <div class="flex">
                                        {{ product.product_model }}
                                    </div>
                                    <div class="flex justify-end">
                                        <router-link
                                            style="text-decoration:none;"
                                            :to="{
                                                path:
                                                    '/auto-parts/' + product.id
                                            }"
                                            class="btn btn-primary"
                                        >
                                            Buy now
                                        </router-link>
                                    </div>
                                </div>
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
            products: []
        };
    },
    mounted() {
        axios
            .get('api/products')
            .then(response => {
                this.products = response.data;
                console.log(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }
};
</script>

<style></style>
