<template>
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <router-view></router-view>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <search></search>
                <!-- Categories Widget -->
                <categories></categories>
            </div>
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
import CategoriesComponent from './CategoriesComponent.vue';
import SearchComponent from './SearchComponent.vue';

export default {
    components: {
        categories: CategoriesComponent,
        search: SearchComponent,
    }
};
</script>
