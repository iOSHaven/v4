<template>
    <div :class="['card', 'alert', type]" ref="alert" v-if="isVisible">
      {{ message }}
      <i class="fas fa-times closeAlert" @click="hide"></i>
    </div>
</template>

<script>
export default {
  name: "Alert",
  props: ['message', 'type'],
  data () {
    return {
      isVisible: true
    }
  },
  methods: {
    hide () {
      this.isVisible = false
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables.scss";
.alert{
    position: fixed;
    width: 100%;
    max-width: 400px;
    bottom: 0;
    text-align: center;
    padding: 1.5rem;
    cursor: pointer;
    animation-duration: 1s;
    animation-name: slideup;
    .closeAlert {
      position: absolute;
      right: 0.7rem;
      top: 0.7rem;
      opacity: 0.4;
    }
}
.error {
  background: $red;
  color: white;
  border-color: $red-hover;
  transform: translateY(0%) !important;
}

@keyframes slideup {
  from {
    opacity: 0;
    transform: translateY(100%);
  }

  to {
    opacity: 1;
    transform: translateY(0%);
  }
}
</style>
