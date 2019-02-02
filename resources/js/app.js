// instantiate the window.Vue before the ./bootstrap
// the ./bootstrap uses the window.vue

window.Vue = require('vue');

Vue.prototype.authorize = function(handler) {
    let user = window.App.user;

    return user ? handler(user) : false;
};

require('./bootstrap');

// vue pages
import Thread from './pages/Thread.vue';

// vue components
import Flash from './components/Flash.vue';
import Paginator from './components/Paginator.vue';
import UserNotifications from './components/UserNotifications.vue';

Vue.component('thread-view', Thread);
Vue.component('flash', Flash);
Vue.component('paginator', Paginator);
Vue.component('user-notifications', UserNotifications);

// the Vue instance...
let app = new Vue({
    el: '#app'
});
