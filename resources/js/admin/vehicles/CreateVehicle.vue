<template>
    <div class="container">
        <div class="flex justify-center mt-10">
            <div class="bg-white shadow-md rounded w-4/6 px-3">
                <div class="flex py-3 mb-10">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/vehicles"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/vehicles"
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
                                to="/vehicles/create"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
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
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Thumbnail <span style="color:#ff0000">*</span>
                    </label>
                </div>
                <div class="flex">
                    <span
                        class="text-red-500 text-sm"
                        v-if="errors.thumbnail"
                        >{{ errors.thumbnail[0] }}</span
                    >
                </div>
                <div
                    v-if="preview == false"
                    class="flex items-center justify-center w-1/2 mt-2"
                >
                    <label
                        class="flex flex-col rounded-lg border-4 border-dashed w-full h-72 p-10 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center flex-auto max-h-72 w-full mx-auto -mt-10"
                            >
                                <img
                                    class="has-mask h-36 object-center"
                                    src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                    alt="freepik image"
                                />
                            </div>
                            <p class="pointer-none text-gray-500 ">
                                <span class="text-sm">Drag and drop</span>
                                image here <br />
                                or
                                <a id="" class="text-blue-600 hover:underline"
                                    >select an image</a
                                >
                                from your computer
                            </p>
                        </div>
                        <input @change="onChange" type="file" class="hidden" />
                    </label>
                </div>
                <div v-else class="flex items-center justify-center w-1/2">
                    <label
                        class="flex flex-col rounded-lg border-2 w-full h-72 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center flex-auto h-72 w-full mx-auto overflow-hidden border-2"
                            >
                                <img class="h-full w-full" :src="preview" />
                            </div>
                        </div>

                        <input @change="onChange" type="file" class="hidden" />
                    </label>
                </div>
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Vehicle Type
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-2">
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
                            <option>Nissan</option>
                            <option>Suzuki</option>
                            <option>Honda</option>
                            <option>Isuzu</option>
                            <option>Daihatsu</option>
                            <option>Mazda</option>
                            <option>Haojue</option>
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
                            <option>Pickup</option>
                            <option>Pickup Dropside</option>
                            <option>Double Cab</option>
                            <option>Truck</option>
                            <option>Van</option>
                            <option>Minivan</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Vehicle Engine Type
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Mileage
                            <span class="text-gray-400 text-xs"
                                >(optional)</span
                            ></label
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
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Vehicle Color
                    </label>
                </div>
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
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Vehicle Engine Type
                    </label>
                </div>
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
                        <input
                            type="text"
                            class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="form.engine"
                        />
                    </div>
                </div>
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Vehicle Price
                    </label>
                </div>
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
                    <label class="text-lg font-bold text-gray-700">
                        Vehicle Brand
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div class="flex inline-block">
                        <label class="block text-sm font-medium text-gray-700"
                            >Brand <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-sm"
                            v-if="errors.category_id"
                            >{{ errors.category_id[0] }}</span
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <select
                        v-model="category_id"
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
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Add More Images
                    </label>
                </div>
                <div class="flex inline-block my-2">
                    <span class="text-red-500 text-sm" v-if="errors.image">{{
                        errors.image[0]
                    }}</span>
                </div>
                <!-- <vue-dropzone
                    ref="myVueDropzone"
                    id="dropzone"
                    :options="dropzoneOptions"
                ></vue-dropzone> -->
                <div class="grid grid-cols-5 gap-2 mb-10">
                    <div v-for="(data, index) in rawData" :key="data">
                        <div class="relative w-32 h-32">
                            <img
                                :src="data"
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
                <hr class="my-4" />
                <div class="flex inline-block">
                    <label class="text-lg font-bold text-gray-700">
                        Description
                    </label>
                </div>
                <div class="flex">
                    <span
                        class="text-red-500 text-sm"
                        v-if="errors.vehicle_overview"
                        >{{ errors.vehicle_overview[0] }}</span
                    >
                </div>
                <!-- <div class="flex inline-block">
                    <span
                        class="ml-2 text-red-500 text-sm"
                        v-if="errors.vehicle_overview"
                        >{{ errors.vehicle_overview[0] }}</span
                    >
                </div> -->
                <div class="flex inline-block w-full mt-2">
                    <vue-editor v-model="form.vehicle_overview"></vue-editor>
                </div>
                <!-- <hr class="my-4" /> -->
                <div class="flex justify-end mt-20 mb-10">
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
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import { VueEditor } from 'vue2-editor';
export default {
    components: {
        VueEditor,
        vueDropzone: vue2Dropzone
    },
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
                features: '',
                vehicle_overview: '',
                price: 1,
                thumbnail: '',
                image: '',
                status: ''
            },
            images: [],
            errors: [],
            category_id: null,
            categories: null,
            preview: false,
            loading: false,
            option: {
                maxFileCount: 15
            },
            files: [],
            rawData: [],
            dropzoneOptions: {
                url: 'https://httpbin.org/post',
                thumbnailWidth: 300,
                maxFilesize: 0.5,
                headers: { 'My-Awesome-Header': 'header value' }
            }
        };
    },
    beforeMount() {
        this.getCategory();
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    methods: {
        onChange(e) {
            this.form.thumbnail = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.form.thumbnail);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        createVehicle() {
            this.loading = true;

            var self = this;

            let formData = new FormData();
            for (let i = 0; i < this.files.length; i++) {
                let file = self.files[i];

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
            formData.append('features', this.form.features);
            formData.append('vehicle_overview', this.form.vehicle_overview);
            formData.append('price', this.form.price);
            formData.append('thumbnail', this.form.thumbnail);
            formData.append('status', this.form.status);
            formData.append('category_id', this.category_id);

            const config = {
                header: { content_type: 'multipart/form-data' }
            };
            axios
                .post('/api/vehicle', formData, config)
                // .then(() => {
                //     self.$refs.files.value = '';
                //     self.files = [];
                //     console.log(response.data);
                // })
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
                })
                .finally(() => {
                    this.loading = false;
                });
        },
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
            this.rawData.splice(index, 1);
            document.getElementById('upload-multiple-image').value = null;
        }
    }
};
</script>

<style scoped>
/* .image-input {
    padding: 3px;
}

.image-preview {
    width: 96px;
    height: 96px;
    cursor: pointer;
    overflow: hidden;
}
.dropzone {
    width: 96px;
    height: 96px;
}
.dropzone {
    border: 1px dashed green;
    border-radius: 7%;
}
.remove-file {
    position: absolute;
    margin-top: 5px;
    margin-left: -30px;
    color: rgba(0, 0, 0, 0.5);
    padding: 1px 6px;
    background-color: rgba(0, 0, 0, 0.3);
}
.remove-file:hover {
    color: #555;
    background-color: #f4f5f7;
} */
</style>
