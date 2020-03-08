import Vue from 'vue'
import vueRouter from 'vue-router'
import App from './App'
import Quotes from './components/quotes.vue'
import NewQuote from './components/new-quote'
import SignUp from './components/signup'

Vue.use(vueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Quotes
  },
  {
    path: '/quoteList',
    component: NewQuote
  },
  {
    path: '/signup',
    component: SignUp
  }
   
  
];

const router = new vueRouter({
  mode: 'history',
  routes: routes
})
new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
})
