require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('product-manager', require('./components/ProductManager.vue').default);
Vue.component('news-manager', require('./components/NewsManager.vue').default);

const app = new Vue({
    el: '#app',
});
