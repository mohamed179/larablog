<template>
    <div>
        <h1 class="my-4">
            Larablog
            <small>This week posts</small>
        </h1>
        <div class="mb-2" v-if="posts.last_page && posts.total > 0">
            <span v-if="$route.query.page">Page {{ $route.query.page }} of {{ posts.last_page }}</span>
            <span v-else-if="posts.last_page">Page 1 of {{ posts.last_page }}</span>
        </div>
        <hr v-if="posts.last_page && posts.total > 0">
        <!-- Blog Post -->
        <div class="media simple-post" v-for="post in posts.data" :key="post.id">
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
        <pagination :data="posts" @pagination-change-page="changePage">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: {},
        };
    },
    mounted() {
        if (this.$route.query.page) {
            this.getPosts(this.$route.query.page);
        } else {
            this.getPosts();
        }
    },
    beforeRouteUpdate (to, from, next) {
        this.category = {};
        this.posts = {};
        next();
        this.getPosts();
    },
    methods: {
        changePage(page = 1) {
            if (page != this.$route.query.page) {
                this.$router.push({
                    query: {
                        page,
                    }
                });
            }
        },
        getPosts() {
            axios.get("/api/posts?page=" + this.$route.query.page)
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
