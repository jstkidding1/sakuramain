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
                                name: 'edit-service',
                                params: { id: service.id }
                            }"
                            aria-current="page"
                            >Edit Service</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-10 rounded shadow-lg w-full">
                <div>
                    <h1 class="text-4xl font-bold">Edit Service</h1>
                    <p class="text-gray-600">
                        Form will be save once you submit
                    </p>
                </div>
                <div class="flex items-center">
                    <div class="flex-initial w-2/5">
                        <div v-if="preview">
                            <img
                                :src="preview"
                                class="w-full h-64 object-cover shadow-lg mt-4"
                            />
                        </div>
                        <div v-else>
                            <img
                                :src="service.image"
                                v-show="service.image != null"
                                class="w-full h-64 object-cover shadow-lg mt-4"
                            />
                        </div>
                        <div class="flex items-center mt-4">
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
                            <button
                                @click.prevent="uploadService"
                                class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600"
                            >
                                <svg
                                    v-if="loadingUpload"
                                    class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                                <span v-if="loadingUpload">Upload</span>
                                <span v-else>Upload</span>
                            </button>
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
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="service.service_name"
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
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                cols="30"
                                rows="10"
                                v-model="service.description"
                            >
                            </textarea>
                        </div>
                        <div class="w-full">
                            <label>Status</label>
                            <select
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="service.status"
                            >
                                <option value="Active">Active</option>
                                <option value="Out of Service"
                                    >Out of Service</option
                                >
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4 justify-end mt-4">
                    <button
                        @click="updateService"
                        class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Update</span>
                        <span v-else>Update</span>
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
            image: '',
            user: null,
            service: {},
            errors: [],
            loading: false,
            loadingUpload: false,
            preview: false
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
                });
        },
        updateService() {
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .put(`/api/services/${this.$route.params.id}`, this.service)
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Service has successfully updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'services-management' });
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        },
        uploadService() {
            this.loadingUpload = !false;
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('image', this.image);
            setTimeout(() => {
                this.loadingUpload = !true;
                axios
                    .post('/api/services/upload/image', formData, config)
                    .then(response => {
                        this.service.image = response.data;
                        console.log(response);
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        }
    }
};
</script>

<style></style>
