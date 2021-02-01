<template>
    <div class="card my-4">
        <form @submit.prevent="toSearchPage">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <div class="alert alert-danger" role="alert" v-if="error">
                    Please, enter a search query
                </div>
                <div class="input-group">
                    <input type="text"
                        class="form-control"
                        placeholder="Search for..."
                        v-model="query">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            error: false,
            query: this.$route.query.query,
        };
    },
    watch: {
        $route(to, from) {
            this.query = this.$route.query.query;
        }
    },
    methods: {
        toSearchPage() {
            if (this.query) {
                this.error = false;
                this.$router.push({
                    name: 'search-results-page',
                    query: {
                        query: this.query,
                    }
                });
            } else {
                this.error = true;
            }
        },
    },
};
</script>
