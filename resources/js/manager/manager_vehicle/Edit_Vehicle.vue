<template>
    <div class="container">
        <div class="flex justify-center">
            <div
                class="bg-white px-10 pb-10 rounded shadow-md w-2/3 mt-10 h-full"
            >
                <div class="flex py-3 mb-10">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <button
                                @click="$router.go(-1)"
                                class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                            >
                                Return to Previous Page
                            </button>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/manager/vehicleList"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                            >
                                Vehicle List
                            </router-link>
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
                                    name: 'manager-edit-vehicle',
                                    params: { id: vehicle.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                >{{ vehicle.brand_name }}
                                {{ vehicle.brand_name }}
                                {{ vehicle.brand_name }}</router-link
                            >
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="text-xl text-gray-700">Edit vehicle</h1>
                    <p class="text-gray-600">
                        Form will be save once you submit
                    </p>
                </div>
                <div class="flex mt-10">
                    <label class="block text-sm font-medium text-gray-700"
                        >Thumbnail <span style="color:#ff0000">*</span></label
                    >
                    <span
                        class="ml-2 text-red-500 text-sm"
                        v-if="errors.thumbnail"
                        >{{ errors.thumbnail[0] }}</span
                    >
                </div>
                <div class="flex justify-center mt-4">
                    <div v-if="preview" class="relative overflow-hidden">
                        <div class="h-96 w-full">
                            <img
                                :src="preview"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                    <div v-else class="relative overflow-hidden">
                        <div class="h-96 w-full">
                            <img
                                :src="
                                    `/images/${vehicle.thumbnail}`
                                        ? `/images/${vehicle.thumbnail}`
                                        : avatar
                                "
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center my-4">
                    <input type="file" @change="onChange" />
                    <span
                        class="text-red-500 text-xs mt-14"
                        v-if="errors.thumbnail"
                        >{{ errors.thumbnail[0] }}</span
                    >
                </div>
                <!-- <div class="flex justify-center items-center my-4">
                    <input
                        @change="imageChange"
                        type="file"
                        name="image"
                        ref="files"
                        multiple
                    />
                    <span
                        class="text-red-500 text-xs mt-14"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div> -->

                <div class="flex">
                    <div class="grid grid-cols-3 gap-2 ml-4 mt-4">
                        <div class="w-full">
                            <label>Brand name</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.brand_name"
                                >{{ errors.brand_name[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.year_model"
                                >{{ errors.year_model[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="2018"
                                v-model="vehicle.year_model"
                            />
                        </div>
                        <div class="w-full">
                            <label>Model Type</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.model_type"
                                >{{ errors.model_type[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="Rush"
                                v-model="vehicle.model_type"
                            />
                        </div>
                        <div class="w-full">
                            <label>Body type</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.body_type"
                                >{{ errors.body_type[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.mileage"
                                >{{ errors.mileage[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="number"
                                v-model="vehicle.mileage"
                            />
                        </div>
                        <div class="w-full">
                            <label>Fuel Type</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.fuel_type"
                                >{{ errors.fuel_type[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.transmission"
                                >{{ errors.transmission[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.drive_type"
                                >{{ errors.drive_type[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.color"
                                >{{ errors.color[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.interior_color"
                                >{{ errors.interior_color[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.engine"
                                >{{ errors.engine[0] }}</span
                            >
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
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
                            <label>Price</label>
                            <span
                                class="w-full ml-2 text-red-500 text-xs"
                                v-if="errors.price"
                                >{{ errors.price[0] }}</span
                            >
                            <input
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="number"
                                placeholder="Toyota"
                                v-model="vehicle.price"
                            />
                        </div>
                        <div class="w-full">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Category<span style="color:#ff0000"
                                            >*</span
                                        ></label
                                    >
                                    <span
                                        class="ml-2 text-red-500 text-sm"
                                        v-if="errors.category_id"
                                        >{{ errors.category_id[0] }}</span
                                    >
                                </div>
                            </div>
                            <select
                                v-model="vehicle.category_id"
                                v-if="categories.length > 0"
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            >
                                <option
                                    v-for="(category, index) in categories"
                                    :key="index"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Status</label>
                            <select
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                v-model="vehicle.status"
                            >
                                <option value="Available">Available</option>
                                <option value="Reserved">Reserved</option>
                                <option value="Sold">Sold</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex px-4 mt-2">
                    <div class="w-full">
                        <label>Vehicle Overview</label>
                        <span
                            class="w-full ml-2 text-red-500 text-xs"
                            v-if="errors.vehicle_overview"
                            >{{ errors.vehicle_overview[0] }}</span
                        >
                        <vue-editor
                            v-model="vehicle.vehicle_overview"
                        ></vue-editor>
                        <!-- <textarea
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            cols="30"
                            rows="5"
                            v-model="vehicle.vehicle_overview"
                        ></textarea> -->
                    </div>
                </div>
                <div class="flex px-4 mt-2">
                    <label>Multiple Images</label>
                </div>
                <div class="grid grid-cols-5 gap-2 px-4 mt-2">
                    <div v-for="(data, index) in vehicle.image" :key="data">
                        <div class="relative w-32 h-32">
                            <img
                                :src="`/images/${data}`"
                                class="h-full w-full rounded-xl"
                                alt=""
                            />
                            <div class="absolute right-0 top-0 p-2">
                                <button
                                    class="bg-gray-200 hover:bg-gray-500 hover:text-gray-50 opacity-50 rounded p-2 transition duration-300"
                                    @click="removeFile(index)"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="this.files.length < this.option.maxFileCount">
                        <div
                            @drop="loaddropfile"
                            @click="openinput"
                            class="cursor-pointer flex justify-center border-dashed border-2 border-gray-500 h-32 w-32 rounded-xl p-2"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-8 w-8 m-auto text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                />
                            </svg>
                            <input
                                type="file"
                                class="d-none"
                                id="upload-multiple-image"
                                @change="addImage"
                            />
                        </div>
                    </div>
                </div>
                <!-- <button
                    @click="uploadMultipleImage"
                    :disabled="loadingMultipleImage"
                    class="flex items-center bg-gray-900 px-3 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                >
                    <svg
                        v-if="loadingMultipleImage"
                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                        style="border-right-color: white; border-top-color: white;"
                        viewBox="0 0 24 24"
                    ></svg>
                    <span v-if="loadingMultipleImage">Please wait..</span>
                    <span v-else>Upload</span>
                </button> -->
                <div class="flex space-x-4 justify-end">
                    <button
                        @click.prevent="updateVehicle"
                        :disabled="loading"
                        class="flex items-center bg-gray-900 px-3 py-2 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300 mt-2"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Please wait..</span>
                        <span v-else>Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueEditor } from 'vue2-editor';
export default {
    components: {
        VueEditor
    },
    data() {
        return {
            user: null,
            preview: false,
            loading: false,
            loadingUpload: false,
            loadingMultipleImage: false,
            avatar: '/images/Avatar.png',
            thumbnail: '',
            option: {
                maxFileCount: 15
            },
            files: [],
            rawData: [],
            vehicle: {},
            errors: [],
            images: [],
            categories: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getVehicle();
        this.getCategory();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getVehicle() {
            axios
                .get(`/api/vehicle/${this.$route.params.id}`)
                .then(response => {
                    this.vehicle = response.data;
                });
        },
        updateVehicle() {
            this.loading = true;

            // setTimeout(() => {
            //     this.loading = !true;
            axios
                .put(`/api/vehicle/${this.$route.params.id}`, this.vehicle)
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Vehicle has successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'manager-list-vehicle' });
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        },
        // uploadMultipleImage() {
        //     this.loadingMultipleImage = !false;

        //     setTimeout(() => {
        //         this.loadingMultipleImage = !true;

        //         var self = this.vehicle.image;

        //         let formData = new FormData();

        //         for (let i = 0; i < this.files.length; i++) {
        //             let file = self.files[i];

        //             formData.append('image[' + i + ']', file);
        //         }
        //         const config = {
        //             header: { content_type: 'multipart/form-data' }
        //         };
        //         axios
        //             .post(
        //                 '/api/vehicle/upload/multiple/image',
        //                 formData,
        //                 config
        //             )
        //             .then(response => {
        //                 self.$refs.files.value = '';
        //                 self.files = [];
        //                 console.log(response.data);
        //             })
        //             .then(() => {
        //                 this.$swal({
        //                     position: 'center',
        //                     icon: 'success',
        //                     title: 'Images has been updated.',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                 });
        //             })
        //             .catch(error => {
        //                 this.errors = error.response.data.errors;
        //             });
        //     }, 2000);
        // },
        getCategory() {
            axios
                .get('/api/get/category')
                .then(response => {
                    this.categories = response.data.category;
                    console.log(response.data.category);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        onChange(e) {
            this.thumbnail = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.thumbnail);
            reader.onload = e => {
                this.preview = e.target.result;
            };

            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            var formData = new FormData();
            formData.append('thumbnail', this.thumbnail);
            axios
                .post('/api/vehicle/upload/image', formData, config)
                .then(response => {
                    this.vehicle.thumbnail = response.data;
                    console.log(response.data);
                })

                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        loaddropfile: function(e) {
            e.preventDefault();
            e.stopPropagation();
            alert('ok');
            console.log(e);
        },
        openinput: function() {
            document.getElementById('upload-multiple-image').click();
        },
        addImage: function(e) {
            const tmpFiles = e.target.files;
            if (tmpFiles.length === 0) {
                return false;
            }
            const file = tmpFiles[0];
            this.files.push(file);
            const self = this;
            const reader = new FileReader();
            reader.onload = function(e) {
                self.rawData.push(e.target.result);
            };
            reader.readAsDataURL(file);
        },
        removeFile: function(index) {
            this.files.splice(index, 1);
            this.vehicle.image.splice(index, 1);
            document.getElementById('upload-multiple-image').value = null;
        }
    }
};
</script>

<style></style>
