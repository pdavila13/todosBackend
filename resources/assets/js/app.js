
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('todos', require('./components/Todos.vue'));
Vue.component('register-form', require('./components/auth/RegisterForm.vue'));
Vue.component('login-form', require('./components/auth/LoginForm.vue'));
Vue.component('email-reset-password-form', require('./components/auth/EmailResetPasswordForm.vue'));
Vue.component('reset-password-form', require('./components/auth/ResetPasswordForm.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
  'msg-messages',
  require('./components/Messages/MsgMessages.vue')
);

Vue.component(
  'msg-form',
  require('./components/Messages/MsgForm.vue')
);

//Vm: view model
const app = new Vue({
  el: '#app',
  data: {
    messages: []
  },
  created() {
    this.fetchMessages();
    Echo.channel('msg').listen('MessageSent', (e) => {
      this.messages.push({
        message: e.message.message,
        user: e.user
      });
    });
  },
  methods: {
    fetchMessages() {
      axios.get('/messages').then(response => {
        this.messages = response.data;
      });
    },
    addMessage(message) {
      this.messages.push(message);
      axios.post('/msg', message).then(response => {
        console.log(response.data);
      });
    }
  }
});