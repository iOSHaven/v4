<template>
  <div v-if="text" class="absolute right-0 bottom-0 p-2 z-20">
    <span class="sr-only" v-html="text" />
    <Tooltip :triggers="['click']" placement="top-start">
<!--      <Icon-->
<!--          :solid="true"-->
<!--          type="question-mark-circle"-->
<!--          class="cursor-pointer text-gray-400 dark:text-gray-500"-->
<!--      />-->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>

      <template #content>
        <TooltipContent v-html="text" :max-width="width" />
      </template>
    </Tooltip>
  </div>
</template>

<script>
import Tooltip from "@/Components/Tooltip.vue";
import TooltipContent from "@/Components/TooltipContent.vue";

export default {
  components: {TooltipContent, Tooltip},
  props: ['text', 'width'],
}
</script>
