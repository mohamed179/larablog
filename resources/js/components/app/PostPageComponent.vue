<template>
    <div>
        <!-- Title -->
        <h1 class="mt-4">{{ post.title }}</h1>

        <!-- Author -->
        <p class="lead" v-if="post.user">
            by <a href="#">{{ post.user.name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>
            Posted on
            <strong class="badge badge-primary p-1">{{ post.added_at }}</strong>
            <span class="float-right">
                <strong class="badge badge-info p-1">{{ post.comments_count }}</strong> comments
            </span>
        </p>

        <hr>

        <!-- Preview Image -->
        <img class="mr-3 img-fluid"
             :src="'/' + post.image"
             :alt="post.title">

        <hr>

        <!-- Post Content -->
        <div v-html="post.body"></div>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>

        <!-- Comments -->
        <div class="media mb-4" v-for="comment in post.comments" :key="comment.id">
            <img class="d-flex mr-3 rounded-circle comment-user-image"
                 :src="'/' + comment.user.profile_img"
                 :alt="comment.user.name">
            <div class="media-body">
                <h5 class="mt-0">{{ comment.user.name }}</h5>
                <p>{{ comment.body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            post: {},
        };
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost() {
            axios.get("/api/posts/" + this.$route.params.slug)
                .then((result) => {
                    this.post = result.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
