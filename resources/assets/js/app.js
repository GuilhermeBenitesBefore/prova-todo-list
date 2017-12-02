import './bootstrap';

import Vue from 'vue';
import store from './store';
import App from './components/App.vue';

Vue.config.devtools = process.env.NODE_ENV === 'development';

new Vue({
    store,
    el: '#app',
    render: h => h(App)
});
