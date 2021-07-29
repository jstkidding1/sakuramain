<template>
    <div>
        <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <img
                        src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                    />
                    <router-link class="ml-2" to="/cars">All Cars</router-link>
                    <svg
                        class="fill-current w-3 h-3 mx-3"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512"
                    >
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                        />
                    </svg>
                    <router-link to="/cars/:id" aria-current="page"
                        >View Vehicle</router-link
                    >
                </li>
            </ol>
        </nav>
        <div
            class="min-h-screen flex flex-wrap items-center justify-center pb-72"
        >
            <div class="bg-white p-10 rounded shadow-md w-3/4">
                <div class="flex">
                    <div class="font-sans font-bold text-3xl text-gray-700">
                        {{ vehicle.year_model }} {{ vehicle.brand_name }}
                        {{ vehicle.model_type }}
                    </div>
                </div>
                <div class="flex">
                    <div class="font-sans text-xs font-bold text-gray-500 mt-2">
                        {{ vehicle.brand_name }} {{ vehicle.transmission }}
                        {{ vehicle.engine }}
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <div class="w-full">
                        <img
                            :src="vehicle.image"
                            alt="Image"
                            class="h-3/4 w-full object-cover"
                        />
                        <div class="flex mt-4">
                            <h3
                                class="font-sans font-bold text-2xl text-gray-800"
                            >
                                Features
                            </h3>
                        </div>
                        <div class="w-full">
                            <div
                                class="font-sans font-semibold text-md text-gray-600 mt-2"
                            >
                                <i class="fas fa-check"></i>
                                {{ vehicle.features }}
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <h3
                                class="font-sans font-bold text-2xl text-gray-800"
                            >
                                Vehicle Overview
                            </h3>
                        </div>
                        <div class="flex justify-center w-full">
                            <div
                                class="font-sans antialiased text-md mt-2 text-justify"
                            >
                                {{ vehicle.vehicle_overview }}
                            </div>
                        </div>
                    </div>

                    <div class="w-1/2">
                        <h3
                            class="font-sans font-bold text-2xl text-gray-700 ml-4"
                        >
                            Options
                        </h3>
                        <div class="flex">
                            <div
                                class="grid grid-flow-row auto-rows-max gap-1 mr-1 ml-4 mt-4"
                            >
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Body type:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Mileage:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Fuel type:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Year:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Transmission:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Drive type:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Color:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Int. Color:
                                </div>
                                <div
                                    class="bg-gray-100 p-1 font-sans text-md text-gray-700"
                                >
                                    Engine:
                                </div>
                            </div>
                            <div
                                class="grid grid-flow-row auto-rows-max gap-1 mt-4"
                            >
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.body_type }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.mileage }} miles
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.fuel_type }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.year_model }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.transmission }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.drive_type }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.color }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.interior_color }}
                                </div>
                                <div
                                    class="bg-gray-50 p-1 font-sans text-md font-bold"
                                >
                                    {{ vehicle.engine }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="bg-gray-100 p-4 m-4">
                                <div class="flex justify-center">
                                    <div
                                        class="font-sans font-bold text-3xl text-gray-700 mb-3"
                                    >
                                        ₱ {{ vehicle.price.toLocaleString() }}
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <router-link
                                        :to="{
                                            path:
                                                '/reservation?vid=' + vehicle.id
                                        }"
                                        style="text-decoration:none;"
                                        class="bg-indigo-500 p-3 text-white font-sans font-bold text-lg hover:bg-indigo-600"
                                        >Reserve now</router-link
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="bg-gray-100 p-4 m-4">
                                <div class="flex justify-center">
                                    <div class="space-y-2">
                                        <div
                                            class="font-sans font-bold text-md text-gray-700 mb-3"
                                        >
                                            You can contact us via phone number
                                        </div>
                                        <p
                                            class="font-sans font-bold text-md text-gray-700 text-center"
                                        >
                                            <i class="fas fa-phone"></i>
                                            + 6 3 4 8 2 4 1 8 5
                                        </p>
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
            vehicle: []
        };
    },
    beforeMount() {
        this.getVehicle();
    },
    methods: {
        getVehicle() {
            axios
                .get(`/api/vehicle/${this.$route.params.id}`)
                .then(response => {
                    this.vehicle = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
