<template>
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        <li v-for="category in categories" :key="category.id">
                            <router-link :to="{name: 'category-posts-page', params: {slug: category.slug}}">
                                {{ category.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('/api/categories')
                .then((result) => {
                    this.categories = result.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }
};
</script>
