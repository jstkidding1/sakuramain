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
    }
};
</script>

<style></style>
