<template>
    <div>
        <div class="flex flex-wrap items-center justify-center">
            <div class="bg-white p-10 mt-20 shadow-md rounded w-1/2">
                <div class="flex">
                    <div
                        class="font-sans text-2xl font-bold text-gray-800 mb-2"
                    >
                        Create an account
                    </div>
                </div>
                <div class="flex">
                    <div class="font-sans font-bold text-gray-600 mb-10">
                        Already Registered?
                    </div>
                    <router-link
                        to="/login"
                        class="font-sans font-bold text-indigo-600 ml-2"
                        >Sign in</router-link
                    >
                </div>
                <div class="space-y-3">
                    <div class="flex">
                        <div class="w-1/3 mr-2">
                            <label>First name</label>
                            <span
                                class="w-full ml-2 text-red-500"
                                v-if="errors.fname"
                                >{{ errors.fname[0] }}</span
                            >
                            <input
                                type="text"
                                class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                v-model="form.fname"
                                required
                                autofocus
                            />
                        </div>
                        <div class="w-1/3">
                            <label>Middle name</label>
                            <span
                                class="w-full ml-2 text-red-500"
                                v-if="errors.mname"
                                >{{ errors.mname[0] }}</span
                            >
                            <input
                                type="text"
                                class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                v-model="form.mname"
                                required
                            />
                        </div>
                        <div class="w-1/3 ml-2">
                            <label>Last name</label>
                            <span
                                class="w-full ml-2 text-red-500"
                                v-if="errors.lname"
                                >{{ errors.lname[0] }}</span
                            >
                            <input
                                type="text"
                                class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                v-model="form.lname"
                                required
                            />
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-full">
                            <label>Email</label>
                            <span
                                class="w-full ml-2 text-red-500"
                                v-if="errors.email"
                                >{{ errors.email[0] }}</span
                            >
                            <input
                                type="text"
                                class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                v-model="form.email"
                                required
                            />
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            <label>Password</label>
                            <span
                                class="w-full ml-2 text-red-500"
                                v-if="errors.password"
                                >{{ errors.password[0] }}</span
                            >
                            <input
                                type="password"
                                class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                v-model="form.password"
                                required
                            />
                        </div>
                        <div class="w-1/2 ml-2">
                            <label>Confirm Password</label>
                            <span
                                class="w-full ml-2 text-red-500"
                                v-if="errors.password_confirmation"
                                >{{ errors.password_confirmation[0] }}</span
                            >
                            <input
                                type="password"
                                class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                v-model="form.password_confirmation"
                                required
                            />
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex items-center">
                            <input
                                id="terms"
                                name="terms"
                                type="checkbox"
                                class="mb-1.5"
                                v-model="toggle"
                            />
                            <label
                                for="terms"
                                class="font-sans font-bold ml-2 block text-sm text-gray-900"
                                >I agree to the
                                <router-link
                                    to="#"
                                    class="font-sans text-indigo-600 hover:text-indigo-500 mr-1"
                                    >Terms</router-link
                                >and
                                <router-link
                                    to="#"
                                    class="font-sans text-indigo-600 hover:text-indigo-500"
                                    >Privacy Policy</router-link
                                ></label
                            >
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            @click="handleSubmit"
                            class="inline w-1/3 bg-indigo-600 hover:bg-indigo-500 p-3 rounded text-gray-50 hover:text-white transition duration-300 mt-8"
                        >
                            Sign up
                        </button>
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
            toggle: false,
            form: {
                fname: '',
                mname: '',
                lname: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: []
        };
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();

            if (
                this.form.password === this.form.password_confirmation &&
                this.form.password.length > 0
            ) {
                axios
                    .post('api/register', {
                        fname: this.form.fname,
                        mname: this.form.mname,
                        lname: this.form.lname,
                        email: this.form.email,
                        password: this.form.password,
                        password_confirmation: this.form.password_confirmation
                    })
                    .then(response => {
                        localStorage.setItem(
                            'user',
                            JSON.stringify(response.data.user)
                        );
                        localStorage.setItem('jwt', response.data.token);

                        if (localStorage.getItem('jwt') != null) {
                            this.$emit('loggedIn');
                            if (this.$route.params.nextUrl != null) {
                                this.$router.push(this.$route.params.nextUrl);
                            } else {
                                this.$router.push('/');
                            }
                        }
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Registered Successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            } else {
                this.password = '';
                this.password_confirmation = '';

                return alert('Password do not match');
            }
        }
    }
};
</script>

<style></style>
