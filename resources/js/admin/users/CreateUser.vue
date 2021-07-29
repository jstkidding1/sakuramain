<template>
    <div>
        <!-- <div class="flex mt-4">
            <router-link
                to="/create/user"
                class="bg-indigo-700 p-2 rounded text-white font-sans font-semibold"
            >
                <i class="fas fa-user-plus"></i> Create new user
            </router-link>
        </div> -->
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
                    <router-link to="/user/list">User Management</router-link>
                    <svg
                        class="fill-current w-3 h-3 mx-3"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512"
                    >
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                        />
                    </svg>
                    <router-link to="/create/user" aria-current="page"
                        >Create User</router-link
                    >
                </li>
            </ol>
        </nav>
        <div class="bg-white p-16 rounded shadow-lg w-full">
            <form class="rounded mx-auto space-y-6">
                <div>
                    <h1 class="text-4xl font-bold">Create user</h1>
                    <p class="text-gray-600">
                        User will be save once you submit
                    </p>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label>First Name</label>
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.fname"
                            >{{ errors.fname[0] }}</span
                        >
                        <input
                            class="bg-gray-100 focus:bg-white border-2 border-gray-200 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            type="text"
                            placeholder="Ken"
                            v-model="form.fname"
                        />
                    </div>
                    <div class="w-1/2">
                        <label>Middle Name</label>
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.mname"
                            >{{ errors.mname[0] }}</span
                        >
                        <input
                            class="bg-gray-100 focus:bg-white border-2 border-gray-200 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            type="text"
                            placeholder="Digizdigiz"
                            v-model="form.mname"
                        />
                    </div>
                    <div class="w-1/2">
                        <label>Last Name</label>
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.lname"
                            >{{ errors.lname[0] }}</span
                        >
                        <input
                            class="bg-gray-100 focus:bg-white border-2 border-gray-200 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            type="text"
                            placeholder="Dignos"
                            v-model="form.lname"
                        />
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-2/3">
                        <label>Email</label>
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.email"
                            >{{ errors.email[0] }}</span
                        >
                        <input
                            class="bg-gray-100 focus:bg-white border-2 border-gray-200 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            type="email"
                            placeholder="kendigs@gmail.com"
                            v-model="form.email"
                        />
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/3">
                        <label>Password</label>
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.password"
                            >{{ errors.password[0] }}</span
                        >
                        <input
                            class="bg-gray-100 focus:bg-white border-2 border-gray-200 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            type="password"
                            v-model="form.password"
                        />
                    </div>
                    <div class="w-1/3">
                        <label>Confirm Password</label>
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.password_confirmation"
                            >{{ errors.password_confirmation[0] }}</span
                        >
                        <input
                            class="bg-gray-100 focus:bg-white border-2 border-gray-200 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            type="password"
                            v-model="form.password_confirmation"
                        />
                    </div>
                </div>
                <div class="flex space-x-4 justify-end">
                    <button
                        @click="createUser"
                        class="bg-green-600 hover:bg-green-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-gray-700 transition duration-300"
                    >
                        Create
                    </button>
                </div>
            </form>
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
                password: '',
                password_confirmation: ''
            },
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
        createUser(e) {
            e.preventDefault();

            axios.post('api/users', {
                fname: this.form.fname,
                mname: this.form.mname,
                lname: this.form.lname,
                email: this.form.email,
                password: this.form.passowrd,
                password_confirmation: this.form.password_confirmation
            });
            // .then(response => {
            //     localStorage.setItem(
            //         'user',
            //         JSON.stringify(response.data.user)
            //     );
            //     localStorage.setItem('jwt', response.data.token);
            // });
        }
    }
};
</script>

<style></style>
