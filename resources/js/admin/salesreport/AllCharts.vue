<template>
    <div>
        <div class="flex justify-center pt-4 px-20">
            <div class="w-full flex justify-start">
                <div class="flex inline-block">
                    <button
                        @click="$router.go(-1)"
                        class="text-gray-600 text-xs hover:text-blue-600 transition duration-300"
                    >
                        Return to Previous Page
                    </button>
                </div>
            </div>
        </div>
        <div class="container mt-10 h-full">
            <div class="bg-gray-200 w-full py-2 px-3">
                <h1 class="text-xl text-gray-700 font-bold">
                    Order Performance Report
                </h1>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <div class="flex justify-center">
                            <h1 class="text-xl text-gray-700 mt-10">
                                Weekly Order Report
                            </h1>
                        </div>
                        <div class="flex">
                            <div>
                                <order-weekly-report />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <h1 class="text-xl text-gray-700 mt-10">
                                Monthly Order Report
                            </h1>
                        </div>
                        <div class="flex">
                            <div>
                                <order-monthly-report />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <h1 class="text-xl text-gray-700 mt-10">
                                Annual Order Report
                            </h1>
                        </div>
                        <div class="flex">
                            <div>
                                <order-yearly-report />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 w-full py-2 px-3 mt-10">
                <h1 class="text-xl text-gray-700 font-bold">
                    Reservation Performance Report
                </h1>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <div class="flex justify-center">
                            <h1 class="text-xl text-gray-700 mt-10">
                                Weekly Reservation Report
                            </h1>
                        </div>
                        <div class="flex">
                            <div>
                                <reservation-weekly-report />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <h1 class="text-xl text-gray-700 mt-10">
                                Monthly Reservation Report
                            </h1>
                        </div>
                        <div class="flex">
                            <div>
                                <reservation-monthly-report />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <h1 class="text-xl text-gray-700 mt-10">
                                Annual Reservation Report
                            </h1>
                        </div>
                        <div class="flex">
                            <div>
                                <reservation-yearly-report />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderWeeklyReport from './OrderWeeklyReport.vue';
import OrderMonthlyReport from './OrderMonthlyReport.vue';
import OrderYearlyReport from './OrderYearlyReport.vue';
import ReservationWeeklyReport from './ReservationWeeklyReport.vue';
import ReservationMonthlyReport from './ReservationMonthlyReport.vue';
import ReservationYearlyReport from './ReservationYearlyReport.vue';

export default {
    components: {
        OrderWeeklyReport,
        OrderMonthlyReport,
        OrderYearlyReport,
        ReservationWeeklyReport,
        ReservationMonthlyReport,
        ReservationYearlyReport
    },
    data() {
        return {
            output: null,
            total: []
        };
    },
    methods: {
        print() {
            // window.print('printSales');
            this.$htmlToPaper('printSales');
        },
        printChart() {
            var canvasEle = document.getElementById('printSales');
            var win = window.open('', 'Print', 'height=600,width=800');
            win.document.write(
                "<br><img src='" + canvasEle.toDataURL() + "' />"
            );
            setTimeout(function() {
                //giving it 200 milliseconds time to load
                win.document.close();
                win.focus();
                win.print();
                win.location.reload();
            }, 200);
        },
        getTotalUsers() {
            axios.get('api/graph').then(response => {
                this.total = response.data.total;
                console.log(response.data.total);
                // response.data.total;
            });
        }
    }
};
</script>

<style scoped>
@media print {
    @page {
        size: landscape;
    }
}
</style>
