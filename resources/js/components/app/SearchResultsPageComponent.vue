<template>
    <div>
        <h1 class="my-4">
            Searching for '{{ $route.query.query }}':
            <small>There are <strong class="badge badge-info p-1">{{ posts.length }}</strong> results</small>
        </h1>
        <!-- Blog Post -->
        <div class="media simple-post" v-for="post in posts" :key="post.id">
            <img class="mr-3"
                 :src="'/' + post.image"
                 :alt="post.title">
            <div class="media-body">
                <h4 class="mt-0">
                    <router-link :to="{name: 'post-page', params: {slug: post.slug}}">{{ post.title }}</router-link>
                </h4>
                <div v-html="post.body"></div>
                <ul class="list-inline list-unstyled d-flex post-info">
                    <li>
                        <span>
                            <i class="fa fa-user"></i> posted by :
                            <strong class="text-primary">{{ post.user.name }}</strong>
                        </span>
                    </li>
                    <li>|</li>
                    <li>
                        <span>
                            <i class="fa fa-calendar"></i>
                            {{ post.added_at }}
                        </span>
                    </li>
                    <li>|</li>
                    <li>
                        <span>
                            <i class="fa fa-comment"></i>
                            <span v-if="post.comments_count < 2">
                                {{ post.comments_count }} comment
                            </span>
                            <span v-else>
                                {{ post.comments_count }} comments
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="...">
            <ul class="pagination float-right">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
        };
    },
    mounted() {
        this.getPosts();
    },
    beforeRouteUpdate (to, from, next) {
        this.posts = [];
        next();
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get("/api/posts/search?query=" + this.$route.query.query)
                .then((result) => {
                    this.posts = result.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
