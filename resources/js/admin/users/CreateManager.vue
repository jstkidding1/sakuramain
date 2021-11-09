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
                                class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
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
                                to="/create/manager"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-blue-700 transition duration-300"
                                aria-current="page"
                                >Create Manager</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <p class="text-lg text-gray-700 font-bold mb-2">
                        Create Manager
                    </p>
                </div>
                <div class="flex">
                    <p class="text-md text-gray-600 mb-4">
                        Form will be save once you submitted.
                    </p>
                </div>
                <div
                    v-if="preview == false"
                    class="flex items-center justify-center w-full"
                >
                    <label
                        class="flex flex-col rounded-full border-4 border-dashed w-1/2 h-72 p-10 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center rounded-full flex-auto max-h-72 w-2/5 mx-auto -mt-10"
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
                        class="flex flex-col rounded-full border-4 w-1/2 h-72 group text-center"
                    >
                        <div
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center"
                        >
                            <div
                                class="flex justify-center rounded-full flex-auto h-72 w-full mx-auto overflow-hidden border-2"
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
                        v-model="form.fname"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Middle Name"
                        v-model="form.mname"
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
                        v-model="form.lname"
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
                        v-model="form.email"
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
                        v-model="form.age"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="date"
                        placeholder="Birthday"
                        v-model="form.birth_date"
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
                        v-model="form.contact_num"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Address"
                        v-model="form.address"
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
                        v-model="form.gender"
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
                        v-model="form.password"
                    />
                    <input
                        class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="password"
                        placeholder="*******"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div class="flex justify-end mt-4 mb-10">
                    <button
                        @click="createUser"
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
            form: {
                fname: '',
                mname: '',
                lname: '',
                email: '',
                age: '',
                birth_date: '',
                contact_num: '',
                address: '',
                gender: '',
                password: '',
                password_confirmation: '',
                image: ''
            },
            loading: false,
            preview: false,
            errors: []
        };
    },
    beforeMount() {
        this.user = JSON.parse(localStorage.getItem('user'));
        axios.defaults.headers.common['Content-Type'] = 'application/json';
        axios.defaults.headers.common['Authorization'] =
            'Bearer ' + localStorage.getItem('jwt');
    },
    methods: {
        onChange(e) {
            this.form.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.form.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        createUser(e) {
            e.preventDefault();
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                const config = {
                    header: { content_type: 'multipart/form-data' }
                };

                let formData = new FormData();
                formData.append('fname', this.form.fname);
                formData.append('mname', this.form.mname);
                formData.append('lname', this.form.lname);
                formData.append('email', this.form.email);
                formData.append('age', this.form.age);
                formData.append('birth_date', this.form.birth_date);
                formData.append('contact_num', this.form.contact_num);
                formData.append('address', this.form.address);
                formData.append('gender', this.form.gender);
                formData.append('password', this.form.password);
                formData.append(
                    'password_confirmation',
                    this.form.password_confirmation
                );
                formData.append('image', this.form.image);
                axios
                    .post('/api/users/create/manager', formData, config)
                    .then(response => {
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Manager Created Successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'user-management' });
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
