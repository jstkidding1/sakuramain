<template>
    <div class="flex flex-col h-screen">
        <div class="container">
            <div class="flex justify-center">
                <div class="bg-white w-2/5 py-4 shadow-md rounded mt-20">
                    <div class="flex justify-center px-3">
                        <h1 class="text-gray-700 text-lg font-bold">
                            New Password
                        </h1>
                    </div>
                    <form autocomplete="off" method="post" class="mt-4">
                        <div class="flex px-10">
                            <label class="text-md text-gray-500">Email</label>
                            <span
                                class="ml-2 text-red-500"
                                v-if="errors.email"
                                >{{ errors.email[0] }}</span
                            >
                        </div>
                        <div class="flex px-10">
                            <input
                                v-model="email"
                                type="email"
                                placeholder="kendignos@gmail.com"
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 px-3 rounded outline-none focus:border-gray-800 transition duration-150"
                            />
                        </div>
                        <div class="flex px-10 mt-2">
                            <label class="text-md text-gray-500"
                                >Password</label
                            >
                            <span
                                class="ml-2 text-red-500"
                                v-if="errors.password"
                                >{{ errors.password[0] }}</span
                            >
                        </div>
                        <div class="flex px-10">
                            <input
                                v-model="password"
                                type="password"
                                placeholder="Password"
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 px-3 rounded outline-none focus:border-gray-800 transition duration-150"
                            />
                        </div>
                        <div class="flex px-10 mt-2">
                            <label class="text-md text-gray-500"
                                >Confirm Password</label
                            >
                            <span
                                class="ml-2 text-red-500"
                                v-if="errors.password_confirmation"
                                >{{ errors.password_confirmation[0] }}</span
                            >
                        </div>
                        <div class="flex px-10">
                            <input
                                v-model="password_confirmation"
                                type="password"
                                placeholder="Confirm Password"
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 px-3 rounded outline-none focus:border-gray-800 transition duration-150"
                            />
                        </div>
                        <div class="flex px-10 mt-4">
                            <button
                                type="submit"
                                @click.prevent="resetPassword"
                                :disabled="loading"
                                class="flex items-center bg-gray-700 px-8 py-2 text-white rounded font-semibold text-sm hover:bg-gray-800 transition duration-300"
                            >
                                <svg
                                    v-if="loading"
                                    class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                                <span v-if="loading">Please wait..</span>
                                <span v-else>Change Password</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="row justify-content-center">
            <div class="col-6">
                <div class="card card-default">
                    <div class="card-header">New Password</div>
                    <div class="card-body">
                        <form
                            autocomplete="off"
                            @submit.prevent="resetPassword"
                            method="post"
                        >
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input
                                    type="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="user@example.com"
                                    v-model="email"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    placeholder=""
                                    v-model="password"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Confirm Password</label>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    class="form-control"
                                    placeholder=""
                                    v-model="password_confirmation"
                                    required
                                />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            token: null,
            email: null,
            password: null,
            password_confirmation: null,
            has_error: false,
            loading: false,
            errors: []
        };
    },
    methods: {
        resetPassword() {
            this.loading = true;

            axios
                .post('/api/reset/password', {
                    token: this.$route.params.token,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Password Reset Successfully!.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        // console.log(result.data);
                        this.$router.push({ name: 'login' });
                    });
                })
                // .then(result => {
                //     // console.log(result.data);
                //     this.$router.push({ name: 'login' });
                // })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
        }
    }
};
</script>
