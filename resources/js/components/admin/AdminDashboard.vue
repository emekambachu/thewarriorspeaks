<template>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Admin</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Website Visits</p>
                                        <h4 class="mb-0">1,235</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Podcast Views</p>
                                        <h4 class="mb-0">$35, 723</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Blog Views</p>
                                        <h4 class="mb-0">$16.2</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Recent Blog</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">Post</th>
                                        <th class="align-middle">Image</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <admin-blog-item
                                    v-for="(post, index) in posts"
                                    :key="post.id" :post="post"
                                ></admin-blog-item>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Recent Podcast</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th class="align-middle">title</th>
                                    <th class="align-middle">Image</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <admin-podcast-item
                                    v-for="(podcast, index) in podcasts"
                                    :key="podcast.id"
                                    :podcast="podcast"
                                ></admin-podcast-item>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</template>

<script>
import AdminPodcastItem from "./podcast/AdminPodcastItem";
import AdminBlogItem from "./blog/AdminBlogItem";
export default {
    components: {
        AdminBlogItem,
        AdminPodcastItem
    },
    data(){
        return {
            posts: [],
            total_posts: 0,
            podcasts: [],
            total_podcasts: 0,
        }
    },
    methods: {
        // getStats(){
        //     axios.get('/api/admin/stats')
        //         .then((response) => {
        //             if(response.data.success === true){
        //                 this.total_contestants = response.data.total_contestants;
        //                 this.total_payers = response.data.total_payers;
        //                 this.sum_votes = response.data.sum_votes;
        //                 this.sum_completed_payments = response.data.sum_completed_payments;
        //             }else{
        //                 console.log(response.data.message);
        //             }
        //         }).catch((error) => {
        //             console.log(error);
        //         });
        // },

        recentBlogPosts(limit = 5){
            axios.get('/api/admin/blog/posts/'+limit+'/recent')
                .then((response) => {
                    if(response.data.success === true){
                        this.posts = response.data.posts;
                        this.total_posts = response.data.total;
                    }else{
                        console.log(response.data.message);
                    }
                }).catch((error) => {
                console.log(error);
            });
        },

        recentPodcasts(limit = 5){
            axios.get('/api/admin/podcasts/'+limit+'/recent')
                .then((response) => {
                    if(response.data.success === true){
                        this.podcasts = response.data.podcasts;
                        this.total_podcasts = response.data.total;
                    }else{
                        console.log(response.data.message);
                    }
                }).catch((error) => {
                console.log(error);
            });
        },

        formLoading(){
            // Install sweetalert2 to use
            // Loading
            Swal.fire({
                title: 'Please Wait !',
                html: 'Submitting',// add html attribute if you want or remove
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
        },

        formSuccess(response){
            this.errors = [];
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            Toast.fire({
                icon: 'success',
                title: 'Submitted'
            });
        },

        formError(response){
            Swal.fire({
                icon: 'error',
                title: 'Error Occurred',
                showConfirmButton: false,
                timer: 2500
            });
            this.errors = response.data.errors;
            console.log(this.errors);
            console.log(response.data.message);
        },

        formEmpty(){
            this.form.forEach((item)=>{
                item.title = '';
                item.document = '';
            });
        }

    },
    mounted(){
        this.recentBlogPosts();
        this.recentPodcasts();
    }
}
</script>

<style scoped>

</style>
