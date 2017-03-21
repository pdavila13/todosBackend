<template>
    <form method="post" @submit.prevent="submit" @keydown="form.errors.clear('$event.target.name')">
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Your name here" name="name" v-model="form.name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Your email here" name="email" v-model="form.email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('email')"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password here" name="password" v-model="form.password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('password')"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password confirmation here" name="password_confirmation" v-model="form.password_confirmation"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-1">
                <label>
                    <div class="checkbox_register icheck">
                        <label>
                            <input type="checkbox" name="terms" v-model="form.terms">
                        </label>
                    </div>
                </label>
            </div><!-- /.col -->
            <div class="col-xs-6">
                <div class="form-group">
                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">I agree to the terms</button>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4 col-xs-push-1">
                <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="form.errors.any()">Register</button>
            </div><!-- /.col -->
        </div>
        <i class="fa fa-refresh fa-spin"></i>
    </form>
</template>

<script>

import Form from '../../forms/Form.js'

export default {
  mounted () {
    console.log('Component Register Form mounted.')
    //let form = new FromData(document.querySelector("form"))
    //console.log(form)
    //console.log(form.fields)
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
  methods: {
    submit () {
      this.form.submit('post','/register')
        .then(response => {
          console.log(response)
            //TODO Redirect to home
        })
        .catch(error => {
          console.log(error.response.data)
        })
    }
  }
}
</script>