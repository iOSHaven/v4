<template lang="html">
  <div class="">
    <div class="signedin" v-if="$store.getters.auth.username">
      <form-data action="users/logout" v-if="form == 'signup'" ref="$form">
        <input type="hidden" name="redirect" :value="redirect">
        <div class="field">
          <h2>Logout?</h2>
        </div>
        <div class="field">
          <button type="submit">Logout</button>
        </div>
      </form-data>
    </div>
    <div class="forms" v-else>
      <div class="buttons">
        <div :class="{button: true, selected: form == 'login'}"
            @click="changeForm('login')">login</div>
        <div :class="{button: true, selected: form == 'signup'}"
            @click="changeForm('signup')">signup</div>
      </div>
      <form-data action="users/create" v-if="form == 'signup'" ref="$form">
        <div class="field">
          <input type="hidden" name="redirect" :value="redirect">
          <input type="text" name="username" placeholder="username" required pattern="[a-zA-Z]{3,}" title="Must contain 3 or more characters. Can only contain letters.">
          <input type="text" name="email" placeholder="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must contain a valid email address">
          <input type="password" name="password" placeholder="password" required pattern=".{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" @keyup="isValid" ref="password">
          <input type="password" name="passwordConfirm" placeholder="confirm password" required ref="passwordConfirm" @keyup="isValid">
        </div>
        <div class="field">
          <button @click="submitForm">Signup</button>
        </div>
      </form-data>

      <form-data action="users/login" v-if="form == 'login'" ref="$form">
        <div class="field">
          <input type="hidden" name="redirect" :value="redirect">
          <input type="text" name="usernameOrEmail" placeholder="username/email" required>
          <input type="password" name="password" placeholder="password" required>
        </div>
        <div class="field">
          <button type="submit">Login</button>
        </div>
      </form-data>
    </div>
  </div>


</template>

<script>
import FormData from '~/components/FormData.vue'
// import axios from 'axios'
export default {
  components: {
    FormData
  },
  data () {
    return {
      redirect: process.env.redirect,
      form: 'signup',
      forminput: {}
    }
  },
  methods: {
    changeForm (type) {
      this.$refs.$form.$el.reset()
      this.form = type
    },
    isValid () {
      console.log('checkValidity')
      if (this.$refs.password.value !== this.$refs.passwordConfirm.value) {
        this.$refs.password.setCustomValidity('passwords do not match')
      } else {
        this.$refs.password.setCustomValidity('')
      }
      // this.$refs.password.$el.setCustomValidity('passwords do not match')
      return this.$refs.$form.$el.checkValidity()
    },
    submitForm (e) {
      // if (this.isValid()) {
      // e.preventDefault()
      // console.log(this.$parent)
      //   if (this.form === 'signup') {
      //     axios.post(process.env.api + 'users/create', this.forminput).then(doc => {
      //       console.log(doc)
      //     })
      //   }
      // }
    }
  }
}
</script>

<style lang="scss" scoped>
@import "~assets/variables.scss";
.buttons {
    max-width: 100%;
    margin: 0 auto 1rem;
}
.button {
    width: 50%;
    display: inline-block;
    text-align: center;
    padding: 1rem;
    border: 1px solid #ccc;
    cursor: pointer;
    &.selected {
      background: $blue;
      color: white;
      border-color: $blue-hover
    }
    &:last-of-type {
      border-left: 0;
    }

}
</style>
