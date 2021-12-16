<template>
    <div class="flex flex-col h-screen">
        <div class="container">
            <div class="flex justify-center">
                <div class="bg-white w-2/5 py-4 shadow-md rounded mt-20">
                    <div class="flex justify-center px-3">
                        <h1 class="text-gray-700 text-lg font-bold">
                            Reset Password
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
                                placeholder="Enter your email"
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 px-3 rounded outline-none focus:border-gray-800 transition duration-150"
                            />
                        </div>
                        <div class="flex px-10 mt-4">
                            <button
                                type="submit"
                                @click.prevent="requestResetPassword"
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
                                <span v-else>Send Password Reset Link</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            has_error: false,
            loading: false,
            errors: []
        };
    },
    methods: {
        requestResetPassword() {
            this.loading = true;

            axios
                .post('api/reset-password', {
                    email: this.email
                })
                .then(response => {
                    this.response = response.data;
                    console.log(response.data);
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Success, Please Check Your Email.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                })
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
