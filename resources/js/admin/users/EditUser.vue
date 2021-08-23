<template>
    <div>
        <div class="container">
            <div class="flex justify-center">
                <div v-if="preview">
                    <img
                        :src="preview"
                        class="w-full h-64 object-cover shadow-lg mt-4"
                    />
                </div>
                <div v-else>
                    <img
                        :src="user.image"
                        v-show="user.image != null"
                        class="w-full h-64 object-cover shadow-lg mt-4"
                    />
                </div>
                <div class="flex">
                    <input type="file" @change="onChange" class="w-full mt-4" />
                    <span
                        class="fixed w-full text-red-500 text-xs mt-14"
                        v-if="errors.image"
                        >{{ errors.image[0] }}</span
                    >
                    <button @click="uploadImage">Upload</button>
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label>First name</label>
                    <span
                        class="fixed w-full ml-2 text-red-500 text-xs"
                        v-if="errors.fname"
                        >{{ errors.fname[0] }}</span
                    >
                    <input
                        type="text"
                        class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        v-model="user.fname"
                    />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label>Middle name</label>
                    <span
                        class="fixed w-full ml-2 text-red-500 text-xs"
                        v-if="errors.mname"
                        >{{ errors.mname[0] }}</span
                    >
                    <input
                        type="text"
                        class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        v-model="user.mname"
                    />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label>Last name</label>
                    <span
                        class="fixed w-full ml-2 text-red-500 text-xs"
                        v-if="errors.lname"
                        >{{ errors.lname[0] }}</span
                    >
                    <input
                        type="text"
                        class="focus:bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                        v-model="user.lname"
                    />
                </div>
            </div>

            <div class="flex space-x-4 justify-end">
                <button
                    @click="updateUser"
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
</template>

<script>
export default {
    data() {
        return {
            user: null,
            loading: false,
            preview: false,
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
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
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
                    });
            }, 2000);
        },
        uploadImage() {
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
