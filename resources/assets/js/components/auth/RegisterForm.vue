<template>
    <form method="post" @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)">
        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('name') }">
            <input type="text" class="form-control" placeholder="Your name here" name="name" value="" v-model="form.name" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <transition name="flash"
                        enter-active-class="animated bounceIn"
                        leade-active-class="animated bounceOut">
                <span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
            </transition>
        </div>

        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('email') }">
            <input type="email" class="form-control" placeholder="Your email here" name="email" value="" v-model="form.email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="help-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
        </div>

        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('password') }">
            <input type="password" class="form-control" placeholder="Password here" name="password" v-model="form.password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password here" name="password_confirmation" v-model="form.password_confirmation"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-7">
                <label>
                    <div class="checkbox_register icheck">
                        <label data-toggle="modal" data-target="#termsModal">
                            <input type="checkbox" name="terms" v-model="form.terms" class="has-error">
                            <a href="#" :class="{ 'text-danger': form.errors.has('terms') }">Terms and conditions</a>
                        </label>
                    </div>
                </label>
            </div>

            <div class="col-xs-4 col-xs-push-1">
                <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="form.errors.any()"><i v-if="form.submitting" class="fa fa-refresh fa-spin"></i> Register</button>
            </div>
        </div>

        <div v-if="form.errors.has('terms')" class="form-group has-feedback" :class="{ 'has-error': form.errors.has('terms') }">
            <span class="help-block" v-if="form.errors.has('terms')" v-text="form.errors.get('terms')"></span>
        </div>
    </form>
</template>

<style>
    .fade-enter-active, .fade-leave-active{
        transition: opacity 1.5s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>

<script>

import Form from 'pdavila-forms'

export default {
  mounted () {
    console.log('Component Register Form mounted.')
    let form = new FormData(document.querySelector("form"))
    console.log(form)
    console.log(form.fields)

    this.initialitzeICheck()
  },
  data: function () {
    return {
      form: new Form({
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          terms: true
      })
    }
  },
  watch: {
    'form.terms': function (value) {
      if(value) {
        $('input').iCheck('check')
      } else {
        $('input').iCheck('uncheck')
      }
    }
  },
  methods: {
    initialitzeICheck() {
      var component = this
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%',
        inheritClass: true
      }).on('ifChecked', function(event){
        component.form.set('terms',true)
        component.form.errors.clear('terms')
      }).on('ifUnchecked', function(event){
        component.form.set('terms','')
      });
    },
    submit () {
      this.form.post('/register').then(response => {
        console.log('Register... OK!')
        console.log(response.redirect)
        console.log(response.status)
        console.log(response.data)

        this.redirect(response)
      })
      .catch(error => {
        console.log(error.response.data)
      })
    },
    redirect(response) {
      window.location.reload()
    }
  }
}
</script>