<template>
  <div class="flex items-center justify-center overflow-hidden h-screen">
      <slot></slot>
  </div>
</template>

<script>
export default {
    mounted () {
        this.$root.loading = false
    }
}
</script>

<style>

</style>