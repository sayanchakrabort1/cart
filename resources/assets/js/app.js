
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import VueLaravelData from 'vue-laravel-data';
require('./bootstrap');

window.Vue = require('vue');
// import VueRouter from 'vue-router'
// Vue.use(VueRouter)
// Vue.use(VueLaravelData);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const routes = [

//     { path: '/profile', component: require('./components/profile.vue') },
  
//     { path: '/mainpage', component: require('./components/mainpage.vue') }

//   ]

// import ViewProduct from './components/ViewProduct.vue';


// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/ViewProduct:array',
//             name: 'ViewProduct',
//             component: ViewProduct,
//             props: true
//         },
//     ],
// });
  

Vue.component('welcome',require('./components/welcome.vue').default);
Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('foot', require('./components/foot.vue').default);
Vue.component('register', require('./components/register.vue').default);
Vue.component('loginpage', require('./components/loginpage.vue').default);
Vue.component('navbarlog', require('./components/navbarlog.vue').default);
Vue.component('maincontent', require('./components/maincontent.vue').default);
Vue.component('procontent', require('./components/procontent.vue').default);
Vue.component('addproduct', require('./components/addproduct.vue').default);
Vue.component('showproducts', require('./components/showproducts.vue').default);
Vue.component('manageproducts', require('./components/manageproducts.vue').default);
Vue.component('editproduct', require('./components/editproduct.vue').default);

const app = new Vue({
    el: '#app',
    // router
}).$mount('#app');

