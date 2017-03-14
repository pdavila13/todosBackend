<template>
    <form method="post" @submit.prevent="submit">
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Your name here" name="name" v-model="name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Your email here" name="email" v-model="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password here" name="password" v-model="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password confirmation here" name="password_confirmation" v-model="password_confirmation"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-1">
                <label>
                    <div class="checkbox_register icheck">
                        <label>
                            <input type="checkbox" name="terms" v-model="terms">
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
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
        </div>
    </form>
</template>

<script>
export default {
  mounted () {
    console.log('Component Register Form mounted.')
  },
  data: function () {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      terms: true,
      error: {}
    }
  },
  methods: {
    submit () {
      axios.post('/register',this.$data)
      .then(response => {
        console.log(response)
      })
      .catch(error => {
        this.errors = error.response.data
      })
    }
  }
}
</script>