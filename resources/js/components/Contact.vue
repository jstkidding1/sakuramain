<template>
    <div class="container flex justify-center p-8">
        <div class="bg-white w-3/5 h-3/4 shadow-2xl">
            <h1 class="text-lg font-semibold p-8">Contact us</h1>
            <div class="float-right w-1/2 p-8 mt-0">
                <div>
                    <label>
                        <gmap-autocomplete
                            @place_changed="initMarker"
                        ></gmap-autocomplete>
                    </label>
                    <br />
                </div>
                <br />
                <gmap-map
                    :zoom="14"
                    :center="center"
                    style="width:100%;  height: 600px;"
                >
                    <gmap-marker
                        :key="index"
                        v-for="(m, index) in locationMarkers"
                        :position="m.position"
                        @click="center = m.position"
                    ></gmap-marker>
                </gmap-map>
            </div>
            <form class="grid grid-flow-row gap-2 p-4 mx-2">
                <div>
                    <label class="font-semibold">
                        Full Name
                    </label>
                </div>
                <div>
                    <input
                        v-model="form.name"
                        class="h-12 border-b-2 border-black rounded-sm"
                        placeholder="Your Name"
                    />
                </div>
                <div>
                    <label class="font-semibold">
                        Email Address
                    </label>
                </div>
                <div>
                    <input
                        v-model="form.email"
                        class="h-12 border-b-2 border-black rounded-sm"
                        placeholder="Your Email"
                    />
                </div>
                <div>
                    <label class="font-semibold">
                        Message
                    </label>
                </div>
                <div>
                    <textarea
                        v-model="form.message"
                        class="h-12 w-80 border-b-2 border-black rounded-sm"
                        placeholder="Your Message For Us"
                    ></textarea>
                </div>

                <button
                    @click.prevent="createContact"
                    class="bg-yellow-500 hover:bg-yellow-300 text-white font-bold py-2 px-4 rounded-full w-28 mb-2"
                >
                    Submit
                </button>
            </form>
            <p class="text-xs font-semibold px-4">
                By clicking "Submit" you agree for Sakura AutoPart Trading Corp.
                to contact you regarding products and services. You can also
                reah us thru our Facebook page
                <a
                    class="text-yellow-500"
                    href="https://www.facebook.com/pages/category/Automotive-Parts-Store/Sakura-Auto-Parts-Trading-1412649018771591/"
                    >here</a
                >.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AddGoogleMap',
    data() {
        return {
            form: {
                name: '',
                email: '',
                message: ''
            },
            center: {
                lat: 39.7837304,
                lng: -100.4458825
            },
            locationMarkers: [],
            locPlaces: [],
            existingPlace: null,
            contacts: []
        };
    },

    mounted() {
        this.locateGeoLocation();
    },

    methods: {
        createContact() {
            axios
                .post('/api/contact', this.form)
                .then(response => {
                    this.form = response.data;
                    console.log('saved!');
                })
                .then(() => {
                    this.$router.go({ name: 'contact' });
                });
        },
        initMarker(loc) {
            this.existingPlace = loc;
        },
        addLocationMarker() {
            if (this.existingPlace) {
                const marker = {
                    lat: this.existingPlace.geometry.location.lat(),
                    lng: this.existingPlace.geometry.location.lng()
                };
                this.locationMarkers.push({ position: marker });
                this.locPlaces.push(this.existingPlace);
                this.center = marker;
                this.existingPlace = null;
            }
        },
        locateGeoLocation: function() {
            navigator.geolocation.getCurrentPosition(res => {
                this.center = {
                    lat: res.coords.latitude,
                    lng: res.coords.longitude
                };
            });
        }
    }
};
</script>
