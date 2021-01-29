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
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">
                                    Go!
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <categories></categories>
            </div>
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
import CategoriesComponent from './CategoriesComponent.vue';

export default {
    components: {
        categories: CategoriesComponent,
    }
};
</script>
