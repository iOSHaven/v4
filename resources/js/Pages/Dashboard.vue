<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import Card from "@/Components/Card.vue";
import LoadingCard from "@/Components/LoadingCard.vue";
import BaseTrendMetric from "@/Components/Metrics/Base/BaseTrendMetric.vue";
import TrendMetric from "@/Components/Metrics/TrendMetric.vue";
import {ref, reactive} from 'vue'
import {useForm} from "@inertiajs/inertia-vue3";

// let data = reactive({
//   chartData: {labels:[], series: [[]]},
//   ranges: [{"label":"7 Days","value":7},{"label":"30 Days","value":30},{"label":"60 Days","value":60},{"label":"90 Days","value":90}],
// })


// const handleSelection = (selection) => {
//   let labels = [];
//   let series = [[],[],[]]
//   for (let i = 0; i < selection; i++) {
//     let d = new Date();
//     d.setDate(d.getDate()-i);
//     labels.push(d.toLocaleDateString())
//     series.forEach(s => {
//       s.push({
//         meta: d.toLocaleDateString(),
//         value: Math.floor(Math.random() * 100)
//       })
//     })
//   }
//   console.log(selection)
//   data.chartData = {labels, series}
// }

// handleSelection(7)

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-3 grid-cols-3">
<!--                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">-->
<!--                    <Welcome />-->
              <TrendMetric metric="App\Metrics\AppDownloadsMetric"/>
              <TrendMetric metric="App\Metrics\AppInstallsMetric"/>
              <TrendMetric metric="App\Metrics\AppViewsMetric"/>

<!--              <BaseTrendMetric-->
<!--                  :chart-data="data.chartData"-->
<!--                  title="Box Engagements Per Day"-->
<!--                  :ranges="data.ranges"-->
<!--                  :help-width="250"-->
<!--                  :loading="false"-->
<!--                  :selected-range-key="7"-->
<!--                  :suffix-inflection="true"-->
<!--                  :value="338"-->
<!--                  @selected="handleSelection"-->
<!--                  class="col-span-1"-->
<!--                  metric="App\Metrics\AppDownloadsMetric"-->
<!--              />-->

<!--              <BaseTrendMetric-->
<!--                  :chart-data="data.chartData"-->
<!--                  title="Box Engagements Per Day"-->
<!--                  :ranges="data.ranges"-->
<!--                  :help-width="250"-->
<!--                  :loading="false"-->
<!--                  :selected-range-key="7"-->
<!--                  :suffix-inflection="true"-->
<!--                  :value="338"-->
<!--                  @selected="handleSelection"-->
<!--                  class="col-span-1"-->
<!--                  metric="App\Metrics\AppDownloadsMetric"-->
<!--              />-->
<!--                </div>-->
            </div>
        </div>
    </AppLayout>
</template>
