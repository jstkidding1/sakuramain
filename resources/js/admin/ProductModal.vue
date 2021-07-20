<template>
    <div>
        <div class="fixed inset-0 z-50 flex justify-center items-center">
            <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3
                            class="text-2xl font-semibold"
                            v-html="data.product_name"
                        ></h3>
                        <button class="p-1 leading-none" @click="emitClose">
                            <div class="text-xl font-semibold h-6 w-6">
                                <span>x</span>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex">
                        <div class="w-1/3 mr-2">
                            <label>Product name</label>
                            <input
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="data.product_name"
                            />
                        </div>
                        <div class="w-1/3 mr-2">
                            <label>Product brand</label>
                            <input
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="data.product_brand"
                            />
                        </div>
                        <div class="w-1/3 mr-2">
                            <label>Product model</label>
                            <input
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="data.product_model"
                            />
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="w-1/3 mr-2">
                            <label>Units</label>
                            <input
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="number"
                                v-model="data.units"
                            />
                        </div>
                        <div class="w-1/3 mr-2">
                            <label>Price</label>
                            <input
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="number"
                                v-model="data.price"
                            />
                        </div>
                        <div class="w-1/3 mr-2">
                            <label>Status</label>
                            <input
                                class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                                type="text"
                                v-model="data.status"
                            />
                        </div>
                    </div>
                    <div class="flex mt-4">
                        <textarea
                            class="bg-white border-2 border-gray-400 px-4 py-2 w-full rounded outline-none focus:border-indigo-500"
                            cols="30"
                            rows="10"
                            v-model="data.description"
                        >
                        </textarea>
                    </div>
                    <div class="flex mt-4">
                        <input type="file" @change="attachImage" class="mr-4" />
                        <div class="flex">
                            <img
                                :src="data.image"
                                v-show="data.image != null"
                                class="h-36 w-36"
                            />
                        </div>
                    </div>
                </div>
                <div class="p-5 flex justify-end items-center">
                    <button class="btn-outline mr-4" @click="emitClose">
                        Cancel
                    </button>
                    <button class="btn-ml-2" @click="uploadImage">
                        Submit
                    </button>
                </div>
            </div>
        </div>
        <div class="opacity-25 bg-black fixed inset-0 z-40"></div>
    </div>
</template>

<script>
export default {
    props: ['product'],
    data() {
        return {
            attachment: null
            // errors: []
        };
    },
    computed: {
        data() {
            if (this.product != null) {
                return this.product;
            } else {
                return {
                    product_name: '',
                    product_brand: '',
                    product_model: '',
                    units: '',
                    price: '',
                    status: '',
                    description: '',
                    image: false
                    // errors: []
                };
            }
        }
    },
    methods: {
        attachImage(event) {
            this.attachment = event.target.files[0];

            // let reader = new FileReader();
            // reader.readAsDataURL(this.attachment);
            // reader.onload = e => {
            //     this.attachment = e.target.result;
            // };
        },
        uploadImage(e) {
            e.preventDefault();

            if (this.attachment != null) {
                var formData = new FormData();

                formData.append('image', this.attachment);
                axios
                    .post('/api/upload-file', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        this.product.image = response.data;
                        this.$emit('close', this.product);
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            } else {
                this.$emit('close', this.product);
            }
        },
        emitClose() {
            this.$emit('close', this.product);
        }
    }
};
</script>

<style></style>
