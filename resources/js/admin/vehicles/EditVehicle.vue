<template>
    <div>
        <div class="container">
            <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <img
                            src="https://img.icons8.com/material-outlined/24/000000/home--v2.png"
                        />
                        <a class="cursor-default" @click="$router.go(-1)"
                            >Dashboard</a
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
                        <router-link to="/vehicles"
                            >Vehicle Management</router-link
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
                                name: 'edit-vehicle',
                                params: { id: vehicle.id }
                            }"
                            aria-current="page"
                            >Edit Vehicle</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-10 rounded-3xl shadow-lg w-full">
                <div>
                    <h1 class="text-4xl font-bold">Edit vehicle</h1>
                    <p class="text-gray-600">
                        Form will be save once you submit
                    </p>
                </div>
                <div class="flex">
                    <div class="flex-initial w-2/5">
                        <div v-if="preview === false">
                            <img
                                :src="vehicle.image"
                                class="border-solid border-4 border-gray-400 w-full h-64 object-cover shadow-lg mt-4"
                            />
                        </div>
                        <div v-else>
                            <img
                                :src="preview"
                                class="border-solid border-4 border-gray-400 w-full h-64 object-cover shadow-lg mt-4"
                            />
                        </div>
                        <span
                            class="fixed w-full text-red-500 text-xs mt-14"
                            v-if="errors.image"
                            >{{ errors.image[0] }}</span
                        >
                        <input
                            type="file"
                            @change="onChange"
                            class="w-full mt-4"
                        />
                    </div>
                    <div class="grid grid-cols-3 gap-2 ml-4 mt-4">
                        <div class="w-full">
                            <label>Brand name</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.brand_name"
                                >{{ errors.brand_name[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.brand_name"
                            >
                                <option>Toyota</option>
                                <option>Mitsubishi</option>
                                <option>Nissan</option>
                                <option>Hyundai</option>
                                <option>Suzuki</option>
                                <option>Honda</option>
                                <option>Isuzu</option>
                                <option>KIA</option>
                                <option>Ford</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Year Model</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.year_model"
                                >{{ errors.year_model[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="2018"
                                v-model="vehicle.year_model"
                            />
                        </div>
                        <div class="w-full">
                            <label>Model Type</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.model_type"
                                >{{ errors.model_type[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Rush"
                                v-model="vehicle.model_type"
                            />
                        </div>
                        <div class="w-full">
                            <label>Body type</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.body_type"
                                >{{ errors.body_type[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.body_type"
                            >
                                <option>Micro</option>
                                <option>Sedan</option>
                                <option>CUV</option>
                                <option>SUV</option>
                                <option>Hatchback</option>
                                <option>Roadster</option>
                                <option>Pickup</option>
                                <option>Van</option>
                                <option>Minivan</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Mileage</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.mileage"
                                >{{ errors.mileage[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="number"
                                v-model="vehicle.mileage"
                            />
                        </div>
                        <div class="w-full">
                            <label>Fuel Type</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.fuel_type"
                                >{{ errors.fuel_type[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.fuel_type"
                            >
                                <option>Gasoline</option>
                                <option>Diesel</option>
                                <option>Liquefied Petroleum</option>
                                <option>Compressed Natural Gas</option>
                                <option>Ethanol</option>
                                <option>Bio-diesel</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Transmission</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.transmission"
                                >{{ errors.transmission[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.transmission"
                            >
                                <option>Manual</option>
                                <option>Automatic</option>
                                <option>Semi-automatic</option>
                                <option>Semi-automatic and Dual Clutch </option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Drive Type</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.drive_type"
                                >{{ errors.drive_type[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.drive_type"
                            >
                                <option>Front Wheel Drive</option>
                                <option>Rear Wheel Drive</option>
                                <option>Four Wheel Drive</option>
                                <option>All Wheel Drive</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Color</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.color"
                                >{{ errors.color[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.color"
                            >
                                <option>White</option>
                                <option>Black</option>
                                <option>Gray</option>
                                <option>Silver</option>
                                <option>Blue</option>
                                <option>Red</option>
                                <option>Green</option>
                                <option>Brown</option>
                                <option>Orange</option>
                                <option>Gold/Biege</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Interior Color</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.interior_color"
                                >{{ errors.interior_color[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.interior_color"
                            >
                                <option>White</option>
                                <option>Black</option>
                                <option>Gray</option>
                                <option>Silver</option>
                                <option>Blue</option>
                                <option>Red</option>
                                <option>Green</option>
                                <option>Brown</option>
                                <option>Orange</option>
                                <option>Gold/Biege</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Engine</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.engine"
                                >{{ errors.engine[0] }}</span
                            >
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="vehicle.engine"
                            >
                                <option>Two-Stroke Engine</option>
                                <option>Four-Stroke Engine</option>
                                <option>Six-Stroke Engine</option>
                                <option>Reciprocating Engine</option>
                                <option>Wankel Engine</option>
                                <option>Compression-Ignition Engine</option>
                                <option>Spark-Ignition Engine</option>
                                <option>Electirc Motor</option>
                                <option>HCCI</option>
                                <option>Single Cylinder Engine</option>
                                <option>Multiple Cylinder Engine</option>
                                <option>In-line Engine</option>
                                <option>V Engine</option>
                                <option>W Engine</option>
                                <option>OPOC Engine</option>
                                <option>Naturally Aspirated</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Features</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.features"
                                >{{ errors.features[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                placeholder="Toyota"
                                v-model="vehicle.features"
                            />
                        </div>
                        <div class="w-full">
                            <label>Price</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.price"
                                >{{ errors.price[0] }}</span
                            >
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="number"
                                placeholder="Toyota"
                                v-model="vehicle.price"
                            />
                        </div>
                        <div class="w-full">
                            <label>Status</label>
                            <input
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="vehicle.status"
                            />
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <label>Vehicle Overview</label>
                    <span
                        class="fixed w-full ml-2 text-red-500 text-xs"
                        v-if="errors.vehicle_overview"
                        >{{ errors.vehicle_overview[0] }}</span
                    >
                    <textarea
                        class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        type="text"
                        cols="4"
                        v-model="vehicle.vehicle_overview"
                    ></textarea>
                </div>
                <div class="flex space-x-4 justify-end">
                    <button
                        @click.prevent="updateVehicle"
                        class="bg-green-600 hover:bg-green-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-gray-700 transition duration-300"
                    >
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // user: null,
            vehicle: {},
            errors: [],
            preview: null
        };
    },
    beforeMount() {
        this.getUser();
        this.getVehicle();
    },
    methods: {
        onChange(e) {
            this.vehicle.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.vehicle.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        getVehicle() {
            axios
                .get(`/api/vehicle/${this.$route.params.id}`)
                .then(response => {
                    this.vehicle = response.data;
                });
        },
        updateVehicle() {
            axios
                .put(`api/vehicle/${this.$route.params.id}`, this.vehicle)
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Vehicle has successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'vehicle-management' });
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        }
    }
};
</script>

<style></style>
