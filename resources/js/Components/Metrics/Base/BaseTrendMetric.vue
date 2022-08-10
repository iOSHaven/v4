<template>
  <LoadingCard :loading="loading" class="px-6 py-4">
    <div class="h-6 flex items-center mb-4">
      <h3 class="mr-3 leading-tight text-sm font-bold">{{ title }}</h3>

      <HelptextTooltip :text="helpText" :width="helpWidth" />

      <SelectControl
          v-if="ranges.length > 0"
          class="ml-auto w-[6rem] flex-shrink-0"
          size="xxs"
          :options="ranges"
          v-model:selected="selectedRangeKey"
          @change="handleChange"
          :aria-label="'Select Ranges'"
      />
    </div>

    <div class="flex items-center text-4xl mb-4">
      <div class="inline">
        {{ formattedValue }}
        <span v-if="suffix" class="ml-2 text-sm font-bold">{{
          formattedSuffix
        }}</span>
      </div>
    </div>

    <div
        ref="chart"
        class="absolute inset-0 rounded-b-lg ct-chart"
        style="top: 3rem"
    />
  </LoadingCard>
</template>

<script>
import debounce from 'lodash/debounce'
import Chartist from 'chartist'
import 'chartist-plugin-tooltips'
import 'chartist/dist/chartist.min.css'
import { singularOrPlural } from '@/util'
import 'chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css'
import LoadingCard from "@/Components/LoadingCard.vue";
import SelectControl from "@/Components/Controls/SelectControl.vue";
import HelptextTooltip from "@/Components/HelptextTooltip.vue";
import { useForm } from '@inertiajs/inertia-vue3';


export default {
  name: 'BaseTrendMetric',
  components: {HelptextTooltip, SelectControl, LoadingCard},
  emits: ['selected'],

  props: {
    loading: Boolean,
    title: {},
    helpText: {},
    helpWidth: {},
    value: {},
    chartData: {labels:[], series:[[]]},
    maxWidth: {},
    prefix: '',
    suffix: '',
    suffixInflection: { type: Boolean, default: true },
    ranges: { type: Array, default: () => [] },
    selectedRangeKey: [String, Number],
    format: {
      type: String,
      default: '0[.]00a',
    },
    metric: '',
  },

  data: () => ({
    chartist: null,
    resizeObserver: null,
    form: null
  }),

  watch: {
    selectedRangeKey: function (newRange, oldRange) {
      this.renderChart()
    },

    chartData: function (newData, oldData) {
      this.renderChart()
    },
  },

  created() {
    const debouncer = debounce(callback => callback(), 30)

    this.resizeObserver = new ResizeObserver(entries => {
      debouncer(() => {
        this.renderChart()
      })
    })

    // this.form = useForm({
    //   '_method': 'PUT',
    //   'metric': this.metric,
    //   'selectedRangeKey': this.selectedRangeKey
    // })

    // console.log(this.form)
  },

  mounted() {
    const low = Math.min(...this.chartData.series[0].map(x => x.value))
    const high = Math.max(...this.chartData.series[0].map(x => x.value))

    // Use zero as the graph base if the lowest value is greater than or equal to zero.
    // This avoids the awkward situation where the chart doesn't appear filled in.
    const areaBase = low >= 0 ? 0 : low

    this.chartist = new Chartist.Line(this.$refs.chart, this.chartData, {
      lineSmooth: Chartist.Interpolation.monotoneCubic(),
      fullWidth: true,
      showPoint: true,
      showLine: true,
      showArea: true,
      chartPadding: {
        top: 10,
        right: 0,
        bottom: 0,
        left: 0,
      },
      low,
      high,
      areaBase,
      axisX: {
        showGrid: false,
        showLabel: true,
        offset: 0,
      },
      axisY: {
        showGrid: false,
        showLabel: true,
        offset: 0,
      },
      plugins: [
        Chartist.plugins.tooltip({
          anchorToPoint: true,
          transformTooltipTextFnc: value => {
            // let formattedValue = Nova.formatNumber(
            //     String(value),
            //     this.format
            // )

            console.log(value)

            let formattedValue = value;

            if (this.prefix) {
              return `${this.prefix}${formattedValue}`
            }

            if (this.suffix) {
              const suffix = this.suffixInflection
                  ? singularOrPlural(value, this.suffix)
                  : this.suffix

              return `${formattedValue} ${suffix}`
            }

            return `${formattedValue}`
          },
        }),
      ],
    })

    this.resizeObserver.observe(this.$refs.chart)
  },

  beforeUnmount() {
    this.resizeObserver.unobserve(this.$refs.chart)
  },

  methods: {
    renderChart() {
      this.chartist.update(this.chartData)
      // axios.post(route('team.metrics'), this.form.data())
      //     .then(res => {
      //       console.log(res)
      //       let {series, ranges, title} = res.data;
      //       // this.title = title
      //       this.chartist.update({series, ranges})
      //     });
      // console.log(this.form.data())
      // this.form.post(route('team.metrics'), {
      //   errorBag: 'updateTeamMetrics',
      //   preserveScroll: true,
      //   onSuccess: (res) => {
      //     console.log('SUCCESS', res)
      //     this.chartist.update(this.chartData)
      //   },
      // }, function (a,b,c) {
      //   console.log(a,b,c)
      // });
    },

    handleChange(event) {
      const value = event?.target?.value || event

      this.$emit('selected', value)
    },
  },

  computed: {
    isNullValue() {
      return this.value == null
    },

    formattedValue() {
      if (!this.isNullValue) {
        // const value = Nova.formatNumber(new String(this.value), this.format)

        return `${this.prefix || ''}${this.value}`
      }

      return ''
    },

    formattedSuffix() {
      if (this.suffixInflection === false) {
        return this.suffix
      }

      return singularOrPlural(this.value, this.suffix)
    },
  },
}
</script>
