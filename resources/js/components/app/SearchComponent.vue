<template>
    <div class="card my-4">
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
                    <button class="btn btn-secondary"
                            type="button"
                            @click="toSearchPage">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            error: false,
            query: "",
        };
    },
    methods: {
        toSearchPage() {console.log('doSearch');
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
