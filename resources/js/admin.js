require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import axios from 'axios';
import bootstrap from 'bootstrap'

import App from './components/App';
import Home from './components/Home';
import Tours from './components/Tours';
import EditTour from './components/EditTour';
import AddTour from './components/AddTour';

Vue.use(VueRouter);

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
        },
        {
            path: '/tours',
            name: 'tours',
            component: Tours
        },
        {
            path: '/tours/add',
            name: 'add_tour',
            component: AddTour
        },
        {
            path: '/tours/:id/edit',
            name: 'edit_tour',
            component: EditTour,
            props: true
        },
    ]
});

// Vue.prototype.DomainOrigin = window.location.origin;

new Vue({
    el: '#app',
    render: h => h(App),
    router
})