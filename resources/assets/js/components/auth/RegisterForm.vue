<template>
    <form method="post" @submit.prevent="submit" @keydown="errors.clear('$event.target.name')">
        <div class="form-group has-feedback has-error">
            <input type="text" class="form-control" placeholder="Your name here" name="name" v-model="name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span class="help-block" v-if="errors.has('name')" v-text="errors.get('name')"></span>
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
                <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="errors.any()">Register</button>
            </div><!-- /.col -->
        </div>
    </form>
</template>

<script>

//import Errors from './Errors.js'

class Errors {
    /**
     *  Constructor
     */
    constructor() {
        this.errors = {}
    }

    /**
     * API
     */
    has(field) {
        return this.errors.hasOwnProperty(field)
    }

    /**
     *  Determine if we hace any errors
     */
    any() {
        return Object.keys(this.errors).length > 0
    }

    /**
     * Retrieve the error message for a field
     *
     * @param field
     * @returns {*}
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0]
        }
    }

    /**
     * Retrieve the error message for a field
     *
     * @param field
     * @returns {*}
     */
    getAllErrors(field) {
        if (this.errors[field]) {
            return this.errors[field]
        }
    }

    /**
     *
     * @param errors
     */
    record(errors) {
        this.errors = errors
    }

    /**
     *
     * @param field
     */
    clear(field) {
        console.log(field)
        if (field) {
            delete this.errors(field)
            return
        }
        this.errors = {}
    }
}

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
      errors: new Errors()
    }
  },
  methods: {
    submit () {
      axios.post('/register',this.$data)
      .then(response => {
        console.log(response)
      })
      .catch(error => {
        this.errors.record(error.response.data)
      })
    }
  }
}
</script>