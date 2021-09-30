<template>
    <div class="container">
        <div class="flex justify-center mt-10">
            <div class="bg-white shadow-md rounded w-1/2 px-5">
                <div class="flex py-3 mb-10">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/vehicles"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/vehicles"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
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
                                to="/vehicles/create"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Create New Vehicle
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <p class="text-md text-gray-600 mb-4">
                            Form will be save once you submitted.
                        </p>
                    </div>
                </div>
                <div
                    v-if="preview == false"
                    class="flex items-center justify-center w-full"
                >
                    <label
                        class="flex flex-col rounded-lg border-4 border-dashed w-1/2 h-96 p-10 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center flex-auto max-h-72 w-2/5 mx-auto -mt-10"
                            >
                                <img
                                    class="has-mask h-36 object-center"
                                    src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                    alt="freepik image"
                                />
                            </div>
                            <p class="pointer-none text-gray-500 ">
                                <span class="text-sm">Drag and drop</span>
                                files here <br />
                                or
                                <a id="" class="text-blue-600 hover:underline"
                                    >select a file</a
                                >
                                from your computer
                            </p>
                        </div>

                        <input @change="onChange" type="file" class="hidden" />
                    </label>
                </div>
                <div v-else class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col rounded-lg border-4 w-1/2 h-96 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center flex-auto h-72 w-full mx-auto overflow-hidden border-2"
                            >
                                <img
                                    class="h-full w-full object-center"
                                    :src="preview"
                                />
                            </div>
                        </div>

                        <input @change="onChange" type="file" class="hidden" />
                    </label>
                </div>
                <div class="flex">
                    <span
                        class="ml-2 text-red-500 text-sm"
                        v-if="errors.thumbnail"
                        >{{ errors.thumbnail[0] }}</span
                    >
                </div>
                <hr class="my-4" />
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Brand name
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.brand_name"
                            >{{ errors.brand_name[0] }}</span
                        >
                    </div>

                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Year model
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.year_model"
                            >{{ errors.year_model[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.brand_name"
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

                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="2018"
                            v-model="form.year_model"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Model type
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.model_type"
                            >{{ errors.model_type[0] }}</span
                        >
                    </div>

                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Body type
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.body_type"
                            >{{ errors.body_type[0] }}</span
                        >
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Rush"
                            v-model="form.model_type"
                        />
                    </div>

                    <div class="flex inline-block">
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.body_type"
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
                </div>

                <hr class="my-4" />
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Mileage <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.mileage"
                            >{{ errors.mileage[0] }}</span
                        >
                    </div>
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Fuel type
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.fuel_type"
                            >{{ errors.fuel_type[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="number"
                            v-model="form.mileage"
                        />
                    </div>
                    <div class="flex inline-block">
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.fuel_type"
                        >
                            <option>Gasoline</option>
                            <option>Diesel</option>
                            <option>Liquefied Petroleum</option>
                            <option>Compressed Natural Gas</option>
                            <option>Ethanol</option>
                            <option>Bio-diesel</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Transmission
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.transmission"
                            >{{ errors.transmission[0] }}</span
                        >
                    </div>
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Drive type
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.drive_type"
                            >{{ errors.drive_type[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.transmission"
                        >
                            <option>Manual</option>
                            <option>Automatic</option>
                            <option>Semi-automatic</option>
                            <option>Semi-automatic and Dual Clutch </option>
                        </select>
                    </div>
                    <div class="flex inline-block">
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.drive_type"
                        >
                            <option>Front Wheel Drive</option>
                            <option>Rear Wheel Drive</option>
                            <option>Four Wheel Drive</option>
                            <option>All Wheel Drive</option>
                        </select>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Color <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.color"
                            >{{ errors.color[0] }}</span
                        >
                    </div>
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Interior Color
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.interior_color"
                            >{{ errors.interior_color[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.color"
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
                    <div>
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.interior_color"
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
                </div>
                <hr class="my-4" />
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Engine <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.engine"
                            >{{ errors.engine[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <select
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.engine"
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
                    <!-- <div class="flex inline-block">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Toyota"
                            v-model="form.features"
                        />
                    </div> -->
                </div>
                <hr class="my-4" />
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Price <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.price"
                            >{{ errors.price[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="number"
                            v-model="form.price"
                        />
                    </div>
                </div>
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="block text-sm font-medium text-gray-700"
                        >Features <span style="color:#ff0000">*</span></label
                    >
                    <span
                        class="ml-2 text-red-500 text-sm"
                        v-if="errors.features"
                        >{{ errors.features[0] }}</span
                    >
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Toyota"
                            v-model="feature"
                            @keyup.enter="addFeature"
                        />
                        <button
                            class="bg-green-500 px-3 py-2 rounded hover:bg-green-600 transition duration-300 ml-2 text-gray-50"
                            @click="addFeature"
                        >
                            Add
                        </button>
                    </div>
                    <!-- <div v-for="(feature, index) in features" :key="index">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Toyota"
                            v-model="feature.value"
                            :key="index"
                        />
                        <button @click="addFeature">Add</button>
                    </div> -->
                </div>
                <div class="grid grid-cols-5 gap-4 mt-2">
                    <div v-for="feature in features" :key="feature">
                        <p
                            class="relative bg-blue-500 text-white text-md rounded-lg px-3 py-1 mr-2"
                        >
                            {{ feature }}
                            <button
                                class="absolute text-white text-md font-bold right-0 px-2"
                                @click="deleteFeature(feature)"
                            >
                                x
                            </button>
                        </p>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="block text-sm font-medium text-gray-700"
                        >Description <span style="color:#ff0000">*</span></label
                    >
                    <span
                        class="ml-2 text-red-500 text-sm"
                        v-if="errors.vehicle_overview"
                        >{{ errors.vehicle_overview[0] }}</span
                    >
                </div>
                <div class="flex inline-block">
                    <textarea
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        placeholder="Description"
                        type="text"
                        cols="30"
                        rows="10"
                        v-model="form.vehicle_overview"
                    ></textarea>
                </div>
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="block text-sm font-medium text-gray-700"
                        >Select Multple Image
                        <span style="color:#ff0000">*</span></label
                    >
                    <span
                        class="ml-2 text-red-500 text-sm"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div>
                <div class="flex mt-4">
                    <input
                        @change="imageChange"
                        type="file"
                        name="image"
                        ref="files"
                        multiple
                    />
                </div>
                <div class="flex mt-4 pb-4 w-auto space-x-4">
                    <p v-for="(image, index) in images" :key="index">
                        {{ image.name }}
                    </p>
                </div>
                <div class="flex justify-end mt-4 mb-10">
                    <button
                        @click.prevent="createVehicle"
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
                        <span v-else>Create</span>
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
            user: null,
            form: {
                brand_name: '',
                year_model: '',
                model_type: '',
                body_type: '',
                mileage: 1,
                fuel_type: '',
                transmission: '',
                drive_type: '',
                color: '',
                interior_color: '',
                engine: '',
                vehicle_overview: '',
                price: 1,
                thumbnail: '',
                image: '',
                status: ''
            },
            feature: '',
            features: [],
            images: [],
            errors: [],
            preview: false,
            loading: false
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    methods: {
        addFeature() {
            if (!this.features.includes(this.feature)) {
                this.features.push(this.feature);
            }
            this.feature = '';
        },
        deleteFeature(feature) {
            this.features.splice(feature, 1);
        },
        imageChange() {
            for (let i = 0; i < this.$refs.files.files.length; i++) {
                this.images.push(this.$refs.files.files[i]);
            }
        },
        onChange(e) {
            this.form.thumbnail = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.form.thumbnail);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        createVehicle() {
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;

                var self = this;

                let formData = new FormData();
                for (let i = 0; i < this.images.length; i++) {
                    let file = self.images[i];

                    formData.append('image[' + i + ']', file);
                }

                formData.append('brand_name', this.form.brand_name);
                formData.append('year_model', this.form.year_model);
                formData.append('model_type', this.form.model_type);
                formData.append('body_type', this.form.body_type);
                formData.append('mileage', this.form.mileage);
                formData.append('fuel_type', this.form.fuel_type);
                formData.append('transmission', this.form.transmission);
                formData.append('drive_type', this.form.drive_type);
                formData.append('color', this.form.color);
                formData.append('interior_color', this.form.interior_color);
                formData.append('engine', this.form.engine);
                formData.append('features', this.features);
                formData.append('vehicle_overview', this.form.vehicle_overview);
                formData.append('price', this.form.price);
                formData.append('thumbnail', this.form.thumbnail);
                formData.append('status', this.form.status);

                const config = {
                    header: { content_type: 'multipart/form-data' }
                };
                axios
                    .post('/api/vehicle', formData, config)
                    .then(response => {
                        self.$refs.files.value = '';
                        self.images = [];
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Vehicle has successfully created.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'vehicle-management' });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        }
    }
};
</script>

<style></style>
