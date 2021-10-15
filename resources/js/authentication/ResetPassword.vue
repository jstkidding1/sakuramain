<template>
    <div class="container">
        <div class="flex flex-col h-screen">
            <div class="flex justify-center">
                <div class="bg-white shadow-md rounded-xl w-1/3 mt-10">
                    <div class="flex justify-center px-3 pt-10 pb-3">
                        <h1 class="text-2xl text-gray-700">
                            Forgot your password?
                        </h1>
                    </div>
                    <div class="flex justify-center px-20 py-2 mt-4">
                        <p class="text-md text-center text-gray-600">
                            Enter your email addess and we will send you
                            instructions on how to reset your password.
                        </p>
                    </div>
                    <div class="flex px-10 py-2">
                        <input
                            class="w-full focus:bg-white border-2 border-gray-200 py-2 px-3 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="email"
                            placeholder="Enter your email addess"
                            v-model="email"
                            autofocus
                        />
                    </div>
                    <div class="flex justify-center px-3 py-2">
                        <button
                            class="flex items-center bg-yellow-700 px-8 py-3 text-white font-bold text-lg hover:bg-yellow-800 transition duration-300"
                        >
                            Reset Your Password
                        </button>
                    </div>
                    <div class="flex justify-center px-10 py-2 mt-4">
                        <p class="text-xs text-center text-gray-500">
                            If you did not request a password reset, you can
                            safely ignore this email. Only a person with access
                            to your email can reset your account password.
                        </p>
                    </div>
                    <div class="flex justify-center px-3 py-2 mt-2">
                        <router-link
                            class="text-xs text-gray-800 hover:text-yellow-600 transition duration-300"
                            style="text-decoration:none;"
                            to="/register"
                            >Register an account</router-link
                        >
                    </div>
                    <div class="flex justify-center px-3 mb-20">
                        <router-link
                            class="text-xs text-gray-800 hover:text-yellow-600 transition duration-300"
                            style="text-decoration:none;"
                            to="/login"
                            >Login</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: ''
        };
    }
};
</script>

<style></style>
