<template lang="html">
  <div class="action">
    <div class="action-content">
      <i :class="icon" v-if="icon"></i>
      <div class="label" v-if="label">{{label}}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['label', 'icon']
}
</script>

<style lang="scss" scoped>
.action {
  font-size: 1.5rem;
  padding: 1.5rem;
  margin-left: 0.3rem;
  text-align: center;
  position: relative;
  &:first-of-type {
    margin: 0;
  }
}
.label {
    font-size: 0.7rem;
    text-align: center;
    text-transform: lowercase;
}
.action-content {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
}
</style>
