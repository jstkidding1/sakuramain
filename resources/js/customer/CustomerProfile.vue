<template>
    <div>
        <div class="container">
            <div class="flex">
                <h5>Customer Profile</h5>
                <!-- {{ user.fname }} {{ user.mname }} {{ user.lname }} -->
                {{ customer.fname }}
            </div>
            <div class="flex items-center justify-center">
                <div v-if="preview === false">
                    <img :src="avatar" alt="" class="rounded-full h-32 w-32" />
                </div>
                <div v-else>
                    <img :src="preview" class="rounded-full h-32 w-32" />
                </div>
            </div>
            <div class="flex items-center justify-center mt-4 px-4">
                <span
                    class="fixed w-full text-red-500 text-xs mt-14"
                    v-if="errors.image"
                    >{{ errors.image[0] }}</span
                >
                <div class="flex items-center justify-between">
                    <input type="file" @change="onChange" class="w-full mt-4" />
                    <button
                        @click.prevent="uploadImage"
                        class="flex items-center bg-indigo-500 px-3 py-2 text-white rounded font-bold text-md hover:bg-indigo-600 mt-2"
                    >
                        <svg
                            v-if="loadingImage"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loadingImage">Change</span>
                        <span v-else>Change</span>
                    </button>
                </div>
            </div>
            <div class="flex space-x-4 justify-end mt-4">
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
                    <span v-if="loading">Submit</span>
                    <span v-else>Submit</span>
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
            customer: {},
            loading: false,
            loadingImage: false,
            preview: false,
            image: '',
            avatar: '/images/Avatar.png',
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
        getCustomer() {
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                this.customer = response.data;
                console.log(response.data);
            });
        },
        onChange(e) {
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.preview = e.target.result;
            };
        },
        uploadImage() {
            this.loadingImage = !false;
            const config = {
                header: { content_type: 'multipart/form-data' }
            };

            let formData = new FormData();
            formData.append('image', this.image);
            setTimeout(() => {
                this.loadingImage = !true;
                axios
                    .post('/api/users/upload/image', formData, config)
                    .then(response => {
                        this.customer.image = response.data;
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Image successfully added.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        },
        updateUser() {
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .put(`/api/users/${this.$route.params.id}`, this.customer)
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'User has successfully updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'customer-dashboard' });
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
