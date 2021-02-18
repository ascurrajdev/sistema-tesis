require('./bootstrap');
import Vue from 'vue';
import VCalendar from 'v-calendar';
Vue.use(VCalendar,{
    componentPrefix: 'vc',
})
Vue.component('agendamiento-listado-calendario',require('./components/Agendamientos/ListadoCalendario').default);
Vue.component('agendamiento-formulario-crear',require('./components/Agendamientos/FormularioCrear').default);
Vue.component('input-phone',require('./components/InputPhone').default);
Vue.component('input-monto',require('./components/Formularios/InputMonto').default)
Vue.component('input-drag-and-drop',require('./components/Formularios/InputDragAndDrop.vue').default)
new Vue({
    el:'#app',
})