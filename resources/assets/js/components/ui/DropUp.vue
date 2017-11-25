<template lang="html">
  <!-- <div class=""> -->

    <div class="DropUp">
      <slot>

      </slot>
      <div class="item" @click="$emit('close')"> <i class="fal fa-times"></i>Close</div>
    </div>
  <!-- </div> -->

</template>

<script>
export default {
  name: 'drop-up'
}
</script>

<style lang="scss" scoped>
.DropUp {
    position: fixed;
    background: rgb(244, 67, 54);
    width: 100%;
    bottom: 0;
    left: 0;
    padding: 1rem;
    z-index: 102;
    color: white;
}

.item {
  padding: 1rem;
  color: inherit;
  font-size: 1.2rem;
  border-bottom: 1px solid;
  text-transform: uppercase;
  display: block;
  width: 250px;
  text-decoration: none;
  text-align: right;
  margin: auto;
  &:last-of-type {
    border: none;
  }
  &:hover, &:focus {
    background: darken(rgb(244, 67, 54), 10%);
    cursor: pointer;
  }
  &.active {
    background: white;
    color: rgb(244, 67, 54);
  }
  i {
    margin-right: 1rem;
    float: left;
  }
}
</style>
