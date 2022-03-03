<template>
    <div class="container mb-10">
        <div class="flex justify-center mt-10">
            <div class="bg-white px-10 pb-10 rounded shadow-md w-1/2">
                <div class="flex py-3 mb-10">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/manager/services"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/manager/services"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Services List
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
                                to="/manager/create/service"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                aria-current="page"
                                >Create Service</router-link
                            >
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
                        class="flex flex-col rounded-lg border-4 border-dashed w-1/2 h-72 p-10 group text-center"
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
                        class="flex flex-col rounded-lg border-4 w-1/2 h-72 group text-center"
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
                        class="ml-2 text-red-500 text-xs"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div>
                <hr class="my-4" />
                <div class="flex items-center">
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Service Name <span style="color:#ff0000">*</span>
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.service_name"
                            >{{ errors.service_name[0] }}</span
                        ></label
                    >
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Service Name"
                        v-model="service_name"
                    />
                </div>
                <div class="flex mt-4">
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Description <span style="color:#ff0000">*</span>
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.description"
                            >{{ errors.description[0] }}</span
                        ></label
                    >
                </div>
                <div class="flex mt-4">
                    <vue-editor v-model="description"></vue-editor>
                </div>
                <!-- <div class="flex">
                    <div class="flex-initial w-2/5">
                        <div v-if="preview === false">
                            <div
                                class="border-dashed border-4 border-indigo-400 w-full h-64 text-center p-20 shadow-lg mt-4"
                            >
                                <i class="far fa-image"></i>
                                <p
                                    class="font-sans font-semibold text-xl text-gray-700"
                                >
                                    Image not found
                                </p>
                                <br />
                                <p class="font-sans text-gray-700 text-xs">
                                    PNG, JPG, JPEG up to 20mb
                                </p>
                            </div>
                        </div>
                        <div v-else>
                            <img
                                :src="preview"
                                class="border-solid border-4 border-gray-400 w-full h-64 object-cover shadow-lg mt-4"
                            />
                        </div>
                        <div class="flex">
                            <input
                                type="file"
                                @change="onChange"
                                class="w-full mt-4"
                            />
                            <span
                                class="fixed w-full text-red-500 text-xs mt-14"
                                v-if="errors.image"
                                >{{ errors.image[0] }}</span
                            >
                        </div>
                    </div>
                    <div class="grid grid-cols-1 w-full gap-2 ml-4 mt-4">
                        <div class="w-full">
                            <label>Service name</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.service_name"
                                >{{ errors.service_name[0] }}</span
                            >
                            <input
                                type="text"
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                v-model="service_name"
                            />
                        </div>
                        <div class="w-full">
                            <label>Description</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.description"
                                >{{ errors.description[0] }}</span
                            >
                            <textarea
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                cols="30"
                                rows="10"
                                v-model="description"
                            >
                            </textarea>
                        </div>
                    </div>
                </div> -->
                <div class="flex space-x-4 justify-end mt-20">
                    <button
                        @click.prevent="createService"
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
import { VueEditor } from 'vue2-editor';
export default {
    components: {
        VueEditor
    },
    data() {
        return {
            user: null,
            service_name: '',
            description: '',
            image: '',
            preview: false,
            loading: false,
            errors: []
        };
    },
    beforeMount() {
        this.getUser();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        createService() {
            this.loading = true;
            // setTimeout(() => {
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('service_name', this.service_name);
            formData.append('description', this.description);
            formData.append('image', this.image);
            // this.loading = !true;
            axios
                .post('/api/services', formData, config)
                .then(response => {
                    console.log(response);
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Service has successfully created.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'manager-services' });
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        }
    }
};
</script>

<style></style>
