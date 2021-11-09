<template>
    <div class="grid min-h-screen place-items-center">
        <div class="flex justify-center">
            <img src="/images/sakuralogo.png" alt="" class="h-52 w-full" />
        </div>
        <div
            class="w-11/12 p-12 bg-white shadow-md sm:w-8/12 md:w-1/2 lg:w-5/12 mb-56"
        >
            <div class="flex">
                <h1 class="text-xl font-semibold">
                    Hello there 👋,
                    <span class="font-normal"
                        >please fill in your information to register.</span
                    >
                    <span
                        class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black"
                    >
                        Already registered?
                    </span>
                </h1>
            </div>

            <form class="mt-6">
                <div class="flex justify-between gap-3">
                    <span class="w-1/2">
                        <div class="flex inline-block">
                            <label
                                for="firstname"
                                class="text-xs font-semibold text-gray-600 uppercase"
                                >First name</label
                            >
                            <span
                                class="ml-2 text-xs text-red-500"
                                v-if="errors.fname"
                                >{{ errors.fname[0] }}</span
                            >
                        </div>
                        <div class="relative w-full">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="First name"
                                v-model="form.fname"
                                required
                                autofocus
                            />
                        </div>
                    </span>
                    <span class="w-1/2">
                        <div class="flex inline-block">
                            <label
                                for="middlename"
                                class="text-xs font-semibold text-gray-600 uppercase"
                                >Middle name</label
                            >
                            <span
                                class="ml-2 text-xs text-red-500"
                                v-if="errors.mname"
                                >{{ errors.mname[0] }}</span
                            >
                        </div>
                        <div class="relative w-full">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="Middle name"
                                v-model="form.mname"
                            />
                        </div>
                    </span>
                    <span class="w-1/2">
                        <div class="flex items-center">
                            <div class="flex inline-block">
                                <label
                                    for="lastname"
                                    class="text-xs font-semibold text-gray-600 uppercase"
                                    >Last name</label
                                >
                                <span
                                    class="ml-2 text-xs text-red-500"
                                    v-if="errors.lname"
                                    >{{ errors.lname[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="relative w-full">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="Last name"
                                v-model="form.lname"
                            />
                        </div>
                    </span>
                </div>
                <div class="flex justify-between gap-3 mt-2">
                    <span class="w-1/2">
                        <div class="flex inline-block">
                            <label
                                for="email"
                                class="text-xs font-semibold text-gray-600 uppercase"
                                >Email</label
                            >
                            <span
                                class="ml-2 text-xs text-red-500"
                                v-if="errors.email"
                                >{{ errors.email[0] }}</span
                            >
                        </div>
                        <div class="relative w-full">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                    />
                                    <path
                                        d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                    />
                                </svg>
                            </span>
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="email"
                                placeholder="example@gmail.com"
                                v-model="form.email"
                            />
                        </div>
                    </span>
                    <span class="w-1/2">
                        <div class="flex inline-block">
                            <label
                                for="contactnum"
                                class="text-xs font-semibold text-gray-600 uppercase"
                                >Contact Number</label
                            >
                            <span
                                class="ml-2 text-xs text-red-500"
                                v-if="errors.contact_num"
                                >{{ errors.contact_num[0] }}</span
                            >
                        </div>
                        <div class="relative w-full">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                            >
                                +63
                            </span>
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="Contact Number"
                                v-model="form.contact_num"
                            />
                        </div>
                    </span>
                </div>

                <div class="w-full mt-2">
                    <div class="flex inline-block">
                        <label
                            for="address"
                            class="text-xs font-semibold text-gray-600 uppercase"
                            >Address</label
                        >
                        <span
                            class="ml-2 text-xs text-red-500"
                            v-if="errors.address"
                            >{{ errors.address[0] }}</span
                        >
                    </div>
                    <div class="relative w-full">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                        <input
                            class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                            type="text"
                            placeholder="Address"
                            v-model="form.address"
                        />
                    </div>
                </div>

                <div class="flex inline-block mt-2">
                    <label
                        for="password"
                        class="text-xs font-semibold text-gray-600 uppercase"
                        >password</label
                    >
                    <span
                        class="ml-2 text-xs text-red-500"
                        v-if="errors.password"
                        >{{ errors.password[0] }}</span
                    >
                </div>
                <div class="relative w-full">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </span>
                    <input
                        class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="password"
                        placeholder="Password"
                        v-model="form.password_confirmation"
                        required
                    />
                </div>
                <div class="flex inline-block mt-2">
                    <label
                        for="confirmpass"
                        class="text-xs font-semibold text-gray-600 uppercase"
                        >Confirm Password</label
                    >
                    <span
                        class="ml-2 text-xs text-red-500"
                        v-if="errors.password_confirmation"
                        >{{ errors.password_confirmation[0] }}</span
                    >
                </div>
                <div class="relative w-full">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </span>
                    <input
                        class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="password"
                        placeholder="Confirm Password"
                        v-model="form.password"
                        required
                    />
                </div>
                <div class="flex mt-4 justify-end">
                    <button
                        @click="handleSubmit"
                        :disabled="loading"
                        type="submit"
                        class="flex items-center bg-gray-900 px-12 py-2 text-white rounded font-bold text-lg hover:bg-gray-500 transition duration-300"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                            style="border-right-color: white; border-top-color: white;"
                            viewBox="0 0 24 24"
                        ></svg>
                        <span v-if="loading">Please wait..</span>
                        <span v-else>Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="container">
            <div v-if="!isLogged">
                <div class="flex flex-wrap justify-center">
                    <div
                        class="bg-white rounded shadow-md p-8 h-auto sm:w-full lg:w-1/3 mt-10"
                    >
                        <div class="flex justify-center">
                            <div
                                class="font-sans text-2xl font-bold text-gray-800 mb-2"
                            >
                                Create an account
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div
                                class="font-sans font-bold text-gray-600 mb-10"
                            >
                                Already Registered?
                            </div>
                            <router-link
                                to="/login"
                                style="text-decoration:none;"
                                class="font-sans font-bold text-blue-600 hover:text-blue-800 ml-2 transition duration-300"
                                >Sign in</router-link
                            >
                        </div>
                        <form class="px-5">
                            <div class="flex">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >First name</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.fname"
                                    >{{ errors.fname[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="First name"
                                    v-model="form.fname"
                                    required
                                    autofocus
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Middle name</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.mname"
                                    >{{ errors.mname[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Middle name"
                                    v-model="form.mname"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Last name</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.lname"
                                    >{{ errors.lname[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Last name"
                                    v-model="form.lname"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Email</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.email"
                                    >{{ errors.email[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="example@gmail.com"
                                    v-model="form.email"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Password</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.password"
                                    >{{ errors.password[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="password"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Password"
                                    v-model="form.password"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Confirm Password</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.password_confirmation"
                                    >{{ errors.password_confirmation[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="password"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Confirm password"
                                    v-model="form.password_confirmation"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <p class="text-xs text-gray-400 text-justify">
                                    By clicking “Submit”, I agree that Sakura
                                    may communicate with me via text, or phone
                                    call. For more information on how we handle
                                    personal information, please read our
                                    <a
                                        href="/terms"
                                        style="text-decoration:none;"
                                        class="text-blue-600 hover:text-blue-800 transition duration-300"
                                    >
                                        privacy policy.
                                    </a>
                                </p>
                            </div>
                            <div class="flex mt-4 justify-end">
                                <button
                                    @click="handleSubmit"
                                    :disabled="loading"
                                    type="submit"
                                    class="flex items-center bg-gray-900 px-3 py-3 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loading">Please wait..</span>
                                    <span v-else>Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isLogged">
            <Notfound />
        </div> -->
</template>

<script>
import Notfound from '../components/Notfound.vue';
export default {
    props: ['nextUrl'],
    components: { Notfound },
    data() {
        return {
            form: {
                fname: '',
                mname: '',
                lname: '',
                contact_num: '',
                address: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            termsState: false,
            validated: false,
            loading: false,
            isLogged: null,
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    computed: {
        termsError() {
            return this.validated && !this.termsState;
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .post('api/register', {
                        fname: this.form.fname,
                        mname: this.form.mname,
                        lname: this.form.lname,
                        contact_num: this.form.contact_num,
                        address: this.form.address,
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
                            this.$emit('isLogged');
                            if (this.$route.params.nextUrl != null) {
                                this.$router.push(this.$route.params.nextUrl);
                            } else {
                                this.$router.push('/');
                            }
                        }
                        console.log(response.data);
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
                    });
            }, 2000);
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
