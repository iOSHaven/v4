<template lang="html">
  <form class="form-data card" :action="api + action" method="post">
    <slot>
    </slot>
  </form>
</template>

<script>
export default {
  props: ['action'],
  data () {
    return {
      api: process.env.api
    }
  }
}
</script>

<style lang="scss" scoped>
@import "~assets/variables.scss";
input, button {
  display: block;
  width: 100%;
  padding: 1rem;
  font-size: 1.2rem;
  border-radius: 0;
  outline: none;
  margin-top: 0.5rem;
  &:first-of-type {
    margin: 0;
  }
  &:focus, &:valid:not(button) {
    border: 2px solid $green
  }
  &:focus:invalid {
    border: 2px solid $red
  }
}
button {
    border: 2px solid transparent;
    background: $blue;
    color: white;
    &:hover {
      background: $blue-hover;
      cursor: pointer;
    }
}
label {
  margin-bottom: 0.3rem;
  opacity: 0.4;
  display: block;
}
</style>
