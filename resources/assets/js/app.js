import './bootstrap';

import Vue from 'vue';
import App from './components/App.vue';

window.Vue = Vue;

// Vue.config.devtools = true;

const app = new Vue({
    el: '#app',
    render: h => h(App)
});
