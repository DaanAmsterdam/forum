// instantiate the window.Vue before the ./bootstrap
// the ./bootstrap uses the window.vue

window.Vue = require('vue');

Vue.prototype.authorize = function(handler) {
    let user = window.App.user;

    return user ? handler(user) : false;
};

require('./bootstrap');

// all the components
import FlashComponent from './components/Flash.vue';
import ThreadPage from './pages/Thread.vue';

Vue.component('flash', FlashComponent);
Vue.component('thread-view', ThreadPage);

// the Vue instance...
let app = new Vue({
    el: '#app'
});
