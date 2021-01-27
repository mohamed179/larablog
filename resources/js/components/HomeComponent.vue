<template>
    <div class="container intro-container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- Blog Post -->
                <div class="media simple-post"
                     v-for="post in posts"
                     :key="post.id">
                    <img class="mr-3" :src="'/' + post.image" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0"><a href="#">{{ post.title }}</a></h4>
                        {{ post.body }}
                        <ul class="list-inline list-unstyled d-flex post-info">
                            <li>
                                <span><i class="fa fa-user"></i> posted by :
                                    <strong class="text-primary">{{ post.user.name }}</strong>
                                </span>
                            </li>
                            <li>|</li>
                            <li>
                                <span><i class="fa fa-calendar"></i> {{ post.added_at }}</span>
                            </li>
                            <li>|</li>
                            <li>
                                <span><i class="fa fa-comment"></i>
                                    <span v-if="post.comments_count < 2"> {{ post.comments_count }} comment</span>
                                    <span v-else> {{ post.comments_count }} comments</span>
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
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search for..."
                            />
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">
                                    Go!
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design </a>
                                    </li>
                                    <li>
                                        <a href="#">HTML and CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">Laravel tutorial</a>
                                    </li>
                                    <li>
                                        <a href="#">bootstrap</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
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
    methods: {
        getPosts() {
            axios.get("api/posts")
                .then((result) => {
                    this.posts = result.data;
                    console.log(this.posts);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
