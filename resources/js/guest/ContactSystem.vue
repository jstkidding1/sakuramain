<template>
    <div>
        <div class="relative w-full">
            <button
                @click="showFilter = !showFilter"
                class="block bg-indigo-600 p-2 text-white rounded hover:bg-indigo-800"
            >
                Filter <i class="fas fa-filter"></i>
            </button>
            <div
                v-show="showFilter"
                @click="showFilter = false"
                class="fixed inset-0 h-full w-full"
            ></div>
            <div
                v-show="showFilter"
                class="absolute right-0 w-full text-gray-700 flex flex-wrap justify-center bg-white rounded-xl py-2 shadow-lg z-50 mt-2"
            >
                <div class="w-48">
                    <div>Name</div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                </div>
                <div class="w-48">
                    <div>Brand</div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                </div>
                <div class="w-48">
                    <div>Price</div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                    <div class="my-3 block">
                        <input type="checkbox" />
                        <label for="">Battery</label>
                    </div>
                </div>
                <input
                    type="number"
                    name="units"
                    :min="1"
                    step="1"
                    class="w-1/3 focus:bg-white border-2 border-gray-600 p-2 rounded outline-none focus:border-gray-800 transition duration-300"
                    v-on:keypress="isNumber(event)"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showFilter: false
        };
    },
    methods: {
        isNumber(e) {
            e = e ? e : window.event;
            var charCode = e.which ? e.which : e.keyCode;
            if (
                charCode > 31 &&
                (charCode < 48 || charCode > 57) &&
                charCode == 46
            ) {
                e.preventDefault();
            } else {
                return true;
            }
        }
    }
};
</script>

<style></style>
