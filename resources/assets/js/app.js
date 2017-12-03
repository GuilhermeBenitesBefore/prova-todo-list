import './bootstrap'

import Vue from 'vue'
import store from './store/index'
import App from './components/App.vue'

Vue.config.devtools = process.env.NODE_ENV === 'development'

/* eslint-disable no-new */
new Vue({
  store,
  el: '#app',
  render: h => h(App)
})
