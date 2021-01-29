import Vue from 'vue';
import VueRouter from 'vue-router';

import HomePageComponent from '../components/app/HomePageComponent.vue';
import PostPageComponent from '../components/app/PostPageComponent.vue';

Vue.use(VueRouter);

const routes = [
    {path: '/', component: HomePageComponent, name: 'home-page'},
    {path: '/posts/:slug', component: PostPageComponent, name: 'post-page'},
];

export default new VueRouter({
    routes,
    mode: 'history'
});
