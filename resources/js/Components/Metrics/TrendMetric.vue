<template>
  <BaseTrendMetric
      :chart-data="chartData"
      :title="title"
      :ranges="ranges"
      :help-width="250"
      :loading="loading"
      :selected-range-key="selectedRangeKey"
      :suffix-inflection="true"
      :value="value"
      @selected="handleSelection"
      class="col-span-1"
      :metric="metric"
  />
</template>

<script>

import {useForm} from "@inertiajs/inertia-vue3";
import BaseTrendMetric from "@/Components/Metrics/Base/BaseTrendMetric.vue";


export default {
  name: "TrendMetric.vue",
  components: {BaseTrendMetric},
  props: {
    metric: String
  },
  data () {
    return {
      loading: true,
      chartData: {labels:[], series:[[]]},
      title: '',
      ranges: [],
      selectedRangeKey: 7,
      value: 0,
      form: null
    }
  },
  created() {
    this.form = useForm({
      '_method': 'PUT',
      'metric': this.metric,
      'selectedRangeKey': this.selectedRangeKey
    })
    this.handleSelection(this.selectedRangeKey)
  },
  methods: {
    handleSelection(selection) {
      axios.post(route('team.metrics'), {
        ...this.form.data(),
        selectedRangeKey: selection
      })
          .then(res => {
            console.log(res)
            let {series, labels, title, ranges, value} = res.data;
            this.title = title
            this.chartData = {series, labels}
            this.loading = false
            this.ranges = ranges
            this.value = value
            this.selectedRangeKey = selection
          });
    }
  },
}
</script>

<style scoped>

</style>