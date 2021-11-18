<template>
    <div>
        <div
            class="relative w-full h-96 bg-cover bg-center group rounded-lg overflow-hidden transition duration-300 ease-in-out"
            style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');"
        >
            <div
                class="absolute inset-0 bg-blue-700 bg-opacity-80 transition duration-300 ease-in-out"
            >
                <div
                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center text-justify"
                >
                    <div>
                        <h3
                            class="text-white text-8xl pl-20 leading-10 font-bold text-center"
                        >
                            About Sakura
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-auto mb-52">
            <div class="flex justify-center mt-24">
                <h5 class="font-sans font-bold text-3xl text-gray-700">
                    KNOW OUR STORY
                </h5>
            </div>
            <div class="">
                <div class="flex mt-20 sm:h-full">
                    <div class="w-1/2">
                        <div class="h-96 w-full">
                            <img
                                :src="`/images/fam.jpg`"
                                alt=""
                                class="h-full w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="w-1/2 bg-white sm:h-96 px-20">
                        <div class="flex justify-start mt-20">
                            <p class="text-3xl text-bold text-gray-800">
                                HOW WE STARTED
                            </p>
                        </div>
                        <div class="flex justify-start mt-4">
                            <p class="text-xl text-gray-900 leading-relaxed">
                                Sakura Auto Parts Trading Inc. is An Automotive
                                Wholesaler Company. Direct Importer of Japan
                                Used Trucks & Spare Parts. was formed with craft
                                and talent. Established in the year 2017, a
                                small business engaged in CKD parts as Truck
                                Type vehicles and sells them at affordable
                                price.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 bg-white sm:h-96 px-20">
                        <div class="flex justify-start mt-20">
                            <p class="text-3xl text-gray-800">
                                OUR LOCATION
                            </p>
                        </div>
                        <div class="flex justify-start mt-4">
                            <p class="text-xl text-gray-900 leading-relaxed">
                                We are located in Mandaue City, Cebu,
                                Philippines. You can visit our Showroom at
                                Plaridel St. Cor. C.P. Batiller St. Barangay
                                Umapad Mandaue City, Cebu, Philippines. Feel
                                free to visit us our Office hours is 8 am - 7pm
                                (Monday - Saturday)
                            </p>
                        </div>
                        <div class="flex"></div>
                    </div>
                    <div class="w-1/2">
                        <div class="h-96 w-full">
                            <img
                                :src="`/images/Capture.png`"
                                alt=""
                                class="h-full w-full object-cover"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex  sm:h-full">
                    <div class="w-1/2">
                        <div class="h-96 w-full">
                            <img
                                :src="`/images/Customer5.jpg`"
                                alt=""
                                class="h-full w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="w-1/2 bg-white sm:h-96 px-20">
                        <div class="flex justify-start mt-20">
                            <p class="text-3xl text-gray-800">
                                WE ARE KNOWN AND TRUSTED
                            </p>
                        </div>
                        <div class="flex justify-start mt-4">
                            <p class="text-xl text-gray-900 leading-relaxed">
                                We deal with surplus parts from Japan and
                                refurbish them and assemble the parts and create
                                a brand new vehicle. There were customers
                                already then who expressed satisfaction of the
                                uniqueness of the Sakura Auto Parts Trading
                                Japan Surplus Vehicles.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center sm:px-3">
            <div class="bg-white sm:w-full lg:w-1/2 rounded-lg shadow-md">
                <div class="flex">
                    <div class="w-1/2">
                        <div class="flex px-4 py-2 mt-10">
                            <h1 class="text-xl text-gray-800 font-bold">
                                Contact Us
                            </h1>
                        </div>
                        <div class="flex items-center px-4 py-2 mt-4">
                            <h1 class="text-md text-gray-600">
                                Full Name
                            </h1>
                            <span
                                class="text-xs text-red-500 ml-2"
                                v-if="errors.name"
                                >{{ errors.name[0] }}</span
                            >
                        </div>
                        <div class="flex px-4 py-2 mt-2">
                            <input
                                type="text"
                                placeholder="Juan Ponce Enrile"
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                v-model="form.name"
                            />
                        </div>
                        <div class="flex items-center px-4 py-2 mt-2">
                            <h1 class="text-md text-gray-600">
                                Email Address
                            </h1>
                            <span
                                class="text-xs text-red-500 ml-2"
                                v-if="errors.email"
                                >{{ errors.email[0] }}</span
                            >
                        </div>
                        <div class="flex px-4 py-2 mt-2">
                            <input
                                type="email"
                                placeholder="juanponce@gmail.com"
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                v-model="form.email"
                            />
                        </div>
                        <div class="flex items-center px-4 py-2 mt-2">
                            <h1 class="text-md text-gray-600">Message</h1>
                            <span
                                class="text-xs text-red-500 ml-2"
                                v-if="errors.message"
                                >{{ errors.message[0] }}</span
                            >
                        </div>
                        <div class="flex px-4 py-2 mt-2">
                            <textarea
                                class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                cols="30"
                                rows="5"
                                placeholder="Type comments here"
                                v-model="form.message"
                            ></textarea>
                        </div>
                        <div class="flex px-4 py-2 mt-8">
                            <p class="text-xs text-gray-500">
                                By clicking “Submit”, I agree that Sakura may
                                communicate with me via text, or phone call. For
                                more information on how we handle personal
                                information, please read our
                                <a
                                    href="/terms"
                                    style="text-decoration:none;"
                                    class="text-blue-600 hover:text-blue-800 transition duration-300"
                                >
                                    privacy policy. </a
                                >.
                            </p>
                        </div>
                        <div class="flex px-3 py-2 mt-2">
                            <div class="flex justify-start mb-20">
                                <button
                                    @click="submitContact"
                                    :disabled="loading"
                                    class="flex items-center bg-blue-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-blue-600 transition duration-300"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loading">Please wait..</span>
                                    <span v-else>Send Message</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="aspect-w-9 aspect-h-16">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.0543351512742!2d123.95165421533282!3d10.337536969966466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99989d6e6baeb%3A0x8590a88318160b9!2sSakura%20Auto%20Parts%20Trading%20Inc.!5e0!3m2!1sen!2sph!4v1635070520833!5m2!1sen!2sph"
                                width="600"
                                height="450"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                            ></iframe>
                        </div>
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
            form: {
                name: '',
                email: '',
                message: ''
            },
            errors: [],
            loading: false,
            ken: '/images/Ken.png'
        };
    },
    methods: {
        submitContact(e) {
            this.loading = true;

            setTimeout(() => {
                this.loading = false;
                axios
                    .post('/api/contacts', {
                        name: this.form.name,
                        email: this.form.email,
                        message: this.form.message
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Message Sent Successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(response => {
                            this.$router.push({
                                name: 'home'
                            });
                            console.log(response.data);
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);

            e.preventDefault();
        }
    }
};
</script>

<style></style>
