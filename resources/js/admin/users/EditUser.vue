<template>
    <div class="container">
        <div class="flex justify-center mt-10">
            <div class="bg-white w-2/5 rounded shadow-md px-3">
                <div class="flex py-3 mb-10">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/users"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                to="/users"
                                >Users List</router-link
                            >
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
                                    name: 'edit-user',
                                    params: { id: user.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                aria-current="page"
                                >{{ user.fname }} {{ user.mname }}
                                {{ user.lname }}</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <p class="text-lg text-gray-700 font-bold mb-2">
                        Edit User
                    </p>
                </div>
                <div class="flex">
                    <p class="text-md text-gray-600 mb-4">
                        Form will be save once you submitted.
                    </p>
                </div>
                <div class="flex justify-center mt-4">
                    <div
                        v-if="preview"
                        class="relative rounded-full h-72 w-1/2 overflow-hidden"
                    >
                        <img
                            :src="preview"
                            class="absolute w-full h-full object-cover"
                        />
                    </div>
                    <div
                        v-else
                        class="relative rounded-full h-72 w-1/2 overflow-hidden"
                    >
                        <img
                            :src="user.image ? `/images/${user.image}` : avatar"
                            class="absolute w-full h-full object-cover"
                        />
                    </div>
                </div>
                <div class="flex justify-center items-center my-4">
                    <input type="file" @change="onChange" />
                    <span
                        class="text-red-500 text-xs mt-14"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div>
                <div class="flex">
                    <span
                        class="ml-2 text-red-500 text-xs"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                </div>
                <hr class="my-4" />
                <div class="flex px-3 pt-2">
                    <div class="flex inline-block w-full">
                        <label class="text-sm font-medium text-gray-700"
                            >First Name
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.fname"
                            >{{ errors.fname[0] }}</span
                        >
                    </div>
                    <div class="flex inline-block w-full">
                        <label class="text-sm font-medium text-gray-700"
                            >Middle Name
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.mname"
                            >{{ errors.mname[0] }}</span
                        >
                    </div>
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="First name"
                        v-model="user.fname"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Middle Name"
                        v-model="user.mname"
                    />
                </div>
                <div class="flex px-3 pt-2">
                    <div class="flex inline-block w-full">
                        <label class="text-sm font-medium text-gray-700"
                            >Last Name
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.lname"
                            >{{ errors.lname[0] }}</span
                        >
                    </div>
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <input
                        class="w-1/2 focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Last Name"
                        v-model="user.lname"
                    />
                </div>
                <div class="flex px-3 pt-2">
                    <div class="flex inline-block w-full">
                        <label class="text-sm font-medium text-gray-700"
                            >Email <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.email"
                            >{{ errors.email[0] }}</span
                        >
                    </div>
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="email"
                        placeholder="Email"
                        v-model="user.email"
                    />
                </div>
                <hr class="my-4" />
                <div class="flex px-3 pt-2">
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Age
                        <span class="text-gray-500 text-xs"
                            >(optional)</span
                        ></label
                    >
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Birthday
                        <span class="text-gray-500 text-xs"
                            >(optional)</span
                        ></label
                    >
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="number"
                        placeholder="Age"
                        v-model="user.age"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="date"
                        placeholder="Birthday"
                        v-model="user.birth_date"
                    />
                </div>
                <div class="flex px-3 pt-2">
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Contact Number
                        <span class="text-gray-500 text-xs"
                            >(optional)</span
                        ></label
                    >
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Address
                        <span class="text-gray-500 text-xs"
                            >(optional)</span
                        ></label
                    >
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Contact Number"
                        v-model="user.contact_num"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Address"
                        v-model="user.address"
                    />
                </div>
                <div class="flex px-3 pt-2">
                    <label class="w-full text-sm font-medium text-gray-700"
                        >Gender
                        <span class="text-gray-500 text-xs"
                            >(optional)</span
                        ></label
                    >
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <select
                        class="w-1/2 focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        v-model="user.gender"
                    >
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <hr class="my-4" />
                <div class="flex px-3 pt-2">
                    <div class="flex inline-block w-full">
                        <label class="text-sm font-medium text-gray-700"
                            >Password
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.password"
                            >{{ errors.password[0] }}</span
                        >
                    </div>
                    <div class="flex inline-block w-full">
                        <label class="text-sm font-medium text-gray-700"
                            >Confirm Password
                            <span style="color:#ff0000">*</span></label
                        >
                        <span
                            class="ml-2 text-red-500 text-xs"
                            v-if="errors.password_confirmation"
                            >{{ errors.password_confirmation[0] }}</span
                        >
                    </div>
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="password"
                        placeholder="*******"
                        v-model="user.password"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="password"
                        placeholder="*******"
                        v-model="user.password_confirmation"
                    />
                </div>
                <div class="flex px-3 pt-2 space-x-2">
                    <p class="text-sm font-medium text-gray-700">
                        Status:
                    </p>
                </div>
                <div class="flex px-3 pb-2 space-x-2">
                    <select
                        class="w-1/2 focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        v-model="user.status"
                    >
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end mt-4 mb-10">
                    <button
                        @click="updateUser"
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
                    <button
                        @click="$router.go(-1)"
                        class="flex items-center border-2 border-gray-500 px-3 py-2 text-gray-500 rounded font-bold text-md hover:bg-gray-700 hover:text-gray-50 transition duration-300 mt-2 ml-2"
                    >
                        <span>Cancel</span>
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
            loading: false,
            loadingUpload: false,
            preview: false,
            avatar: '/images/Avatar.png',
            image: '',
            user: {},
            errors: []
        };
    },
    beforeMount() {
        this.getAuth();
        this.getUser();
    },
    methods: {
        getAuth() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getUser() {
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                this.user = response.data;
            });
        },
        updateUser() {
            this.loading = true;

            // setTimeout(() => {
            //     this.loading = !true;
            axios
                .put(`/api/users/${this.$route.params.id}`, this.user)
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'User has successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        this.$router.push({ name: 'user-management' });
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
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };

            const config = {
                header: { content_type: 'multipart/form-data' }
            };
            if (this.preview != null) {
                var formData = new FormData();
                formData.append('image', this.image);
                axios
                    .post('/api/users/upload/image', formData, config)
                    .then(response => {
                        this.user.image = response.data;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            } else {
                console.log('hehe');
            }
        }
    }
};
</script>

<style></style>
