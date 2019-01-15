// instantiate the window.Vue before the ./bootstrap
// the ./bootstrap uses the window.vue
window.Vue = require('vue');

require('./bootstrap');

// all the components
import FlashComponent from './components/Flash.vue';

Vue.component('flash', FlashComponent);

// the Vue instance...
let app = new Vue({
    el: '#app'
});
