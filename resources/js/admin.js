require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import axios from 'axios';
import bootstrap from 'bootstrap'

import App from './components/App';
import Home from './components/Home';

import Feedback from './components/feedback/Feedback';
import FeedbackBooking from './components/feedback/FeedbackBooking';
import FeedbackSelectionRequest from './components/feedback/FeedbackSelectionRequest';
import FeedbackQuestion from './components/feedback/FeedbackQuestion';

import Tours from './components/tours/Index';
import ToursAdd from './components/tours/add/Index';
import ToursEdit from './components/tours/edit/Index';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: '/admin/',
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
            component: ToursAdd
        },
        {
            path: '/tours/:id/edit',
            name: 'edit_tour',
            component: ToursEdit,
            props: true
        },
        {
            path: '/feedback/',
            name: 'feedback',
            component: Feedback,
            children: [
                {
                    path: 'questions',
                    name: 'feedback.questions',
                    component: FeedbackQuestion
                },
                {
                    path: 'booking',
                    name: 'feedback.booking',
                    component: FeedbackBooking
                },
                {
                    path: 'selection-requests',
                    name: 'feedback.selection-requests',
                    component: FeedbackSelectionRequest
                },
            ]
        },
    ]
});

// Vue.prototype.DomainOrigin = window.location.origin;

new Vue({
    el: '#app',
    render: h => h(App),
    router
})