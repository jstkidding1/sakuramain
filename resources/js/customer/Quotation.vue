<template>
    <div class="container">
        <div class="relative flex items-center justify-between">
            <h5 class="text-lg text-gray-800 font-bold">My Quotations</h5>
            <input
                class="w-2/6 bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                type="text"
                v-model.trim="search"
                placeholder="Search..."
                @keyup="searchQuotation"
            />
            <svg
                v-if="searchLoading"
                class="absolute right-0 top-0 animate-spin h-6 w-6 rounded-full bg-transparent border-4 border-gray-700 border-gray-500 mr-2 mt-2"
                style="border-right-color: white; border-top-color: white;"
                viewBox="0 0 24 24"
            ></svg>
        </div>
        <table class="w-full mt-4 table-hover">
            <thead class="bg-white">
                <tr
                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                >
                    <!-- <th class="px-4 py-3">#</th> -->
                    <th class="px-4 py-3">Vehicle</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Contact #</th>
                    <th class="px-4 py-3">Purchase in</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody
                v-if="quotations && quotations.data.length > 0"
                class="bg-white"
            >
                <tr
                    v-for="(quotation, index) in quotations.data"
                    :key="index"
                    class="text-gray-700"
                >
                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                    <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                            <div class="w-8 h-8 overflow-hidden">
                                <img
                                    :src="
                                        `/images/${quotation.vehicle.thumbnail}`
                                    "
                                    alt=""
                                    class="w-full h-full mr-3 rounded-full md:block"
                                />
                            </div>
                            <div class="ml-2">
                                <p class="font-semibold text-black">
                                    {{ quotation.vehicle.brand_name }}
                                </p>
                                <p class="text-xs text-gray-600">
                                    {{ quotation.vehicle.model_type }}
                                    {{ quotation.vehicle.year_model }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ quotation.address }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ quotation.contact_num }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ quotation.purchase_in }}
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="quotation.status == 'Pending'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                        >
                            Pending
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="quotation.status == 'Approved'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Approved
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="quotation.status == 'Checked'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                        >
                            Checked
                        </span>
                    </td>
                    <td class="px-4 py-3 border">
                        <div class="flex justify-center space-x-4">
                            <router-link
                                :to="{
                                    name: 'customer-view-quotation',
                                    params: { id: quotation.id }
                                }"
                                style="text-decoration:none;"
                                class="text-ms font-semibold text-gray-500 hover:text-yellow-600 transition duration-300"
                            >
                                View
                            </router-link>
                            <button
                                v-if="quotation.status == 'Pending'"
                                class="text-ms font-semibold text-gray-500 hover:text-red-600 transition duration-300"
                                @click="cancelQuotation(quotation.id)"
                            >
                                Cancel
                            </button>
                        </div>
                    </td>
                    <!-- <td
                        class="px-4 py-3 text-ms font-semibold border"
                        v-if="quotation.status == 'Pending'"
                    >
                        <div class="flex justify-center">
                            <button
                                class="hover:text-red-700"
                                @click="cancelQuotation(quotation.id)"
                            >
                                Cancel
                            </button>
                        </div>
                    </td> -->
                </tr>
            </tbody>
            <tbody v-else class="bg-white">
                <tr>
                    <td
                        colspan="6"
                        align="center"
                        class="text-gray-800 font-bold text-2xl mt-2"
                    >
                        No Inquiries Found.
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination
            class="mt-4 center"
            :data="quotations"
            @pagination-change-page="getResults"
        ></pagination>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            searchLoading: false,
            search: '',
            quotations: {
                data: []
            }
        };
    },
    beforeMount() {
        this.fetchUser();
        this.fetchQuotation();
    },
    methods: {
        fetchUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        fetchQuotation() {
            axios
                .get(`/api/users/${this.user.id}/quotations`)
                .then(response => {
                    this.quotations = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getResults(page = 1) {
            axios
                .get(`/api/users/${this.user.id}/quotations?page=` + page)
                .then(response => {
                    this.quotations = response.data;
                    console.log(response.data);
                });
        },
        searchQuotation: _.debounce(function() {
            this.searchLoading = true;

            axios
                .get(
                    `/api/users/${this.user.id}/quotations?search=` +
                        this.search
                )
                .then(response => {
                    this.quotations = response.data;
                    console.log(response.data);
                })
                .then(() => {
                    this.searchLoading = false;
                });
        }, 2000),
        cancelQuotation(id) {
            this.$swal({
                title: 'Are you sure you want to cancel your appointment?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`/api/quotes/${id}`).then(response => {
                        this.fetchQuotation();
                        console.log('Deleted');
                    });
                    this.$swal(
                        'Cancelled!',
                        'Quotation has been cancelled.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
