require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios').default;



let AppLayout = require('./components/Projeto/Projeto.vue');

const ListaProjeto = require('./components/Projeto/ListaDeProjetos.vue');  
const EditarProjeto = require('./components/Projeto/EditarProjeto.vue');  
const MembroShow = require('./components/Membros.vue');

//registrando  modulos
Vue.use(VueAxios, VueRouter, Axios);

const router = new VueRouter({mode: 'history', routes: routes});

new Vue(
    Vue.util.extend(
        {router}, 
        AppLayout
    ) 
).$amout('#app');

Vue.component(
    'example-component',
    require('./components/ExampleComponent.vue')
);