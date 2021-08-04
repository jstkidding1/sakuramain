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
                        <router-link to="/gallery/management"
                            >Gallery Management</router-link
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
                        <router-link to="/create/gallery" aria-current="page"
                            >Create Gallery</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-10 rounded-3xl shadow-lg w-full">
                <div>
                    <h1 class="text-4xl font-bold">Create Gallery</h1>
                    <p class="text-gray-600">
                        Form will be save once you submit
                    </p>
                </div>
                <div class="flex">
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
                            <label>Customer name</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.name"
                                >{{ errors.name[0] }}</span
                            >
                            <input
                                type="text"
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="name"
                            />
                        </div>
                        <div class="w-full">
                            <label>Date</label>
                            <span
                                class="fixed w-full ml-2 text-red-500 text-xs"
                                v-if="errors.date"
                                >{{ errors.date[0] }}</span
                            >
                            <input
                                type="date"
                                class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                v-model="date"
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
                                v-model="description"
                            >
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 justify-end mt-4">
                    <button
                        @click.prevent="createGallery"
                        class="bg-indigo-600 hover:bg-indigo-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-gray-700 transition duration-300"
                    >
                        Create
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
            name: '',
            date: '',
            description: '',
            image: '',
            preview: false,
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
        async createGallery() {
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('date', this.date);
            formData.append('description', this.description);
            formData.append('image', this.image);
            await axios
                .post('/api/galleries', formData, config)
                .then(response => {
                    console.log(response);
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Gallery has successfully created.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'gallery-management' });
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
