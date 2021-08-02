<template>
    <div>
        <div class="container">
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
                        <router-link to="/vehicles"
                            >Vehicle Management</router-link
                        >
                    </li>
                </ol>
            </nav>
            <div class="flex flex-wrap items-center justify-center">
                <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
                    <div
                        class="font-sans text-2xl font-bold mb-6 text-gray-800 font-semibold"
                    >
                        Vehicle Management
                    </div>

                    <div class="flex justify-between pt-16">
                        <router-link
                            style="text-decoration:none"
                            to="/vehicles/create"
                            class="bg-indigo-900 hover:bg-indigo-600 p-2 rounded-lg text-gray-50 font-semibold hover:text-gray-50 transition duration-300"
                        >
                            <i class="fas fa-car mr-2"></i> Create new vehicle
                        </router-link>
                        <input
                            @keyup="searchVehicle"
                            class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                            type="text"
                            v-model="search"
                            placeholder="Search..."
                        />
                    </div>

                    <!-- <div class="pt-16"> -->
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vehicle</th>
                                <th>Year Model</th>
                                <th>Mileage</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th style="width:300px;">Action</th>
                            </tr>
                        </thead>

                        <tbody v-if="vehicles && vehicles.data.length > 0">
                            <tr
                                v-for="(vehicle, index) in vehicles.data"
                                :key="index"
                            >
                                <td style="width:50px;">{{ index + 1 }}</td>
                                <td style="width:300px;">
                                    {{ vehicle.brand_name }}
                                    {{ vehicle.model_type }}
                                </td>
                                <td>
                                    {{ vehicle.year_model }}
                                </td>
                                <td>{{ vehicle.mileage }}</td>
                                <td>
                                    ₱
                                    {{ vehicle.price.toLocaleString() }}
                                </td>
                                <td>{{ vehicle.status }}</td>
                                <td class="flex justify-center">
                                    <button
                                        class="font-semibold bg-green-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                    >
                                        <i class="fas fa-eye mr-2"></i>View
                                    </button>
                                    <router-link
                                        style="text-decoration:none;"
                                        :to="{
                                            name: 'edit-vehicle',
                                            params: { id: vehicle.id }
                                        }"
                                        class="font-semibold bg-indigo-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                    >
                                        <i class="far fa-edit mr-2"></i>Edit
                                    </router-link>
                                    <button
                                        @click="deleteVehicle(vehicle.id)"
                                        class="font-semibold bg-red-600 p-2 rounded-lg text-white opacity-25 hover:opacity-100 transition duration-300 ease-in-out mr-2"
                                    >
                                        <i class="far fa-trash-alt mr-2"></i
                                        >Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="7" align="center" class="mt-2">
                                    No Vehicle Found.
                                </td>
                            </tr>
                        </tbody>
                        <pagination
                            class="center"
                            :data="vehicles"
                            @pagination-change-page="getResults"
                        ></pagination>
                    </table>
                    <!-- </div> -->
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
            vehicles: {},
            search: ''
        };
    },
    beforeMount() {
        this.getVehicles();
        this.getUser();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        getVehicles() {
            axios
                .get('api/vehicle')
                .then(response => {
                    this.vehicles = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchVehicle() {
            axios.get('/api/vehicle?search=' + this.search).then(response => {
                this.vehicles = response.data;
                console.log(response.data);
            });
        },
        getResults(page = 1) {
            axios.get('/api/vehicle?page=' + page).then(response => {
                this.vehicles = response.data;
            });
        },
        deleteVehicle(id) {
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`api/vehicle/${id}`).then(response => {
                        this.getVehicles();
                    });
                    this.$swal(
                        'Deleted!',
                        'Vehilce has been deleted.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
