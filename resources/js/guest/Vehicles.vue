<template>
    <div>
        <div class="flex justify-end pt-10">
            <input
                @keyup="searchVehicle"
                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                type="text"
                v-model="search"
                placeholder="Search..."
            />
        </div>
        <div v-if="vehicles.data.length > 0">
            <div class="grid grid-cols-3 p-8 gap-8">
                <div v-for="vehicle in vehicles.data" :key="vehicle.id">
                    <div
                        class="bg-white rounded-2xl shadow-2xl transform transition duration-600 ease-in-out hover:-translate-y-1 hover:scale-105"
                    >
                        <img
                            :src="vehicle.image"
                            alt="Image"
                            class="rounded-t-xl h-1/6 w-full object-cover shadow-sm"
                        />
                        <div class="p-4">
                            <div
                                class="font-sans text-xl font-bold mb-2 text-gray-700"
                            >
                                {{ vehicle.year_model }}
                                {{ vehicle.brand_name }}
                                {{ vehicle.model_type }}
                            </div>
                            <p class="font-sans">
                                {{ vehicle.engine }}
                            </p>
                            <p
                                class="font-sans font-bold text-xl text-gray-700 mt-2"
                            >
                                ₱ {{ vehicle.price.toLocaleString() }}
                            </p>
                            <div class="flex justify-end">
                                <router-link
                                    :to="{ path: '/cars/' + vehicle.id }"
                                    class="text-xs font-sans text-gray-500"
                                    >Read for more information
                                </router-link>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div
                                class="border-t-2 border-gray-300 border-opacity-75 p-2 w-1/3 text-center hover:bg-red-600 rounded-l-lg hover:text-white"
                            >
                                <i class="fas fa-road"></i> <br />
                                <p class="font-sans font-semibold">
                                    {{ vehicle.mileage.toLocaleString() }}
                                </p>
                            </div>
                            <div
                                class="border-t-2 border-l-2 border-gray-300 border-opacity-75 p-2 w-1/3 text-center hover:bg-red-600 rounded hover:text-white"
                            >
                                <i class="fas fa-gas-pump"></i> <br />
                                <p class="font-sans font-semibold">
                                    {{ vehicle.fuel_type }}
                                </p>
                            </div>
                            <div
                                class="border-t-2 border-l-2 border-gray-300 border-opacity-75 p-2 w-1/3 text-center hover:bg-red-600 rounded-r-lg hover:text-white"
                            >
                                <i class="fas fa-cog"></i> <br />
                                <p class="font-sans font-semibold">
                                    {{ vehicle.transmission }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div
                class="font-sans text-2xl font-bold text-gray-800 text-center py-52"
            >
                No Vehicles Found.
            </div>
        </div>
        <pagination
            class="center"
            :data="vehicles"
            @pagination-change-page="getResults"
        ></pagination>
    </div>
</template>

<script>
export default {
    data() {
        return {
            vehicles: [],
            search: ''
        };
    },
    mounted() {
        this.getVehicle();
    },
    methods: {
        getVehicle() {
            axios.get('api/vehicle').then(response => {
                this.vehicles = response.data;
                console.log(response.data);
            });
        },
        searchVehicle() {
            axios.get('/api/vehicle?search=' + this.search).then(response => {
                this.vehicles = response.data;
                console.log(response.data);
            });
        },
        getResults(page = 1) {
            axios.get('/api/vehicle?page=' + page).then(response => {
                this.vehicles = response.data;
            });
        }
    }
};
</script>

<style></style>
