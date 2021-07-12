<template>
    <div>
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
                    <router-link to="/user/list" aria-current="page"
                        >User Management</router-link
                    >
                </li>
            </ol>
        </nav>
        <div class="flex flex-wrap items-center justify-center">
            <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
                <div
                    class="font-sans text-2xl font-bold mb-6 text-gray-800 font-semibold"
                >
                    User Management
                </div>
                <div class="pt-16">
                    <div class="flex justify-between">
                        <router-link
                            style="text-decoration:none"
                            to="/create/user"
                            class="bg-green-600 hover:bg-green-500 p-2 rounded-lg text-gray-50 font-semibold hover:text-gray-700 transition duration-300"
                        >
                            <i class="fas fa-user-plus"></i> Create new user
                        </router-link>
                        <input
                            @keyup="searchUser"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="search"
                            placeholder="Search name..."
                        />
                    </div>

                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th style="width:300px;">Action</th>
                            </tr>
                        </thead>

                        <tbody v-if="users && users.data.length > 0">
                            <tr
                                v-for="(user, index) in users.data"
                                :key="index"
                            >
                                <td>
                                    {{ user.fname }} {{ user.mname }}
                                    {{ user.lname }}
                                </td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.role }}</td>
                                <td>
                                    <button
                                        class="font-semibold bg-green-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                    >
                                        <i class="fas fa-eye mr-2"></i>View
                                    </button>
                                    <!-- <router-link
                                        style="text-decoration:none"
                                        :to="{
                                            name: 'edituser',
                                            params: { id: user.id }
                                        }"
                                        class="font-semibold bg-blue-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                        ><i class="fas fa-user-edit mr-2"></i
                                        >Edit</router-link
                                    > -->
                                    <!-- <button
                                        @click="deleteUser(user.id)"
                                        class="font-semibold bg-red-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out"
                                    >
                                        <i class="fas fa-trash-alt mr-2"></i
                                        >Delete
                                    </button> -->
                                </td>
                            </tr>
                        </tbody>

                        <tbody v-else>
                            <tr>
                                <td colspan="6" align="center" class="mt-2">
                                    No Users Found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination
                        class="center"
                        :data="users"
                        @pagination-change-page="getResults"
                    ></pagination>
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
            users: {},
            search: ''
        };
    },
    beforeMount() {
        this.getAdmin();
        this.getUsers();
    },
    methods: {
        getAdmin() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        getUsers() {
            axios.get('api/users').then(response => {
                this.users = response.data;
                console.log(response.data);
            });
        },
        searchUser() {
            axios.get('/api/users?search=' + this.search).then(response => {
                this.users = response.data;
                console.log(response.data);
            });
        },
        getResults(page = 1) {
            axios.get('/api/users?page=' + page).then(response => {
                this.users = response.data;
            });
        }
    }
};
</script>

<style></style>
