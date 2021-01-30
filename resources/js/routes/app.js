import Vue from 'vue';
import VueRouter from 'vue-router';

import HomePageComponent from '../components/app/HomePageComponent.vue';
import PostPageComponent from '../components/app/PostPageComponent.vue';
import CategoryPostsPageComponent from '../components/app/CategoryPostsPageComponent.vue';
import SearchResultsPageComponent from '../components/app/SearchResultsPageComponent.vue';

Vue.use(VueRouter);

const routes = [
    {path: '/', component: HomePageComponent, name: 'home-page'},
    {path: '/posts/:slug', component: PostPageComponent, name: 'post-page'},
    {path: '/categories/:slug/posts', component: CategoryPostsPageComponent, name: 'category-posts-page'},
    {path: '/search', component: SearchResultsPageComponent, name: 'search-results-page'}
];

export default new VueRouter({
    routes,
    mode: 'history'
});
