<template>
    <div class="container">
        <h1
            class="flex justify-center text-4xl font-extrabold h-full p-12 text-yellow-400"
        >
            INBOX
        </h1>
        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Name
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Message
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Email
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-for="contact in contacts" :key="contact.id">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div
                                            class="text-lg text-black font-bold"
                                        >
                                            {{ contact.name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-for="contact in contacts" :key="contact.id">
                                <div class="text-sm text-gray-500">
                                    {{ contact.message }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-for="contact in contacts" :key="contact.id">
                                <div class="text-base text-black font-bold">
                                    {{ contact.email }}
                                </div>
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-2xl text-gray-500"
                        >
                            <div v-for="contact in contacts" :key="contact.id">
                                <a @click="deleteContact(contact.id)" href="#"
                                    ><i class="fas fa-trash"></i
                                ></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            contact: {
                name: '',
                email: '',
                message: ''
            },
            contacts: []
        };
    },
    created() {
        this.getContacts();
    },
    methods: {
        getContacts() {
            axios.get('/api/contact').then(response => {
                this.contacts = response.data;
            });
        },
        deleteContact(id) {
            axios.delete(`/api/contact/${id}`).then(response => {
                this.getContacts();
            });
        }
    }
};
</script>
