<template>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <router-link
                                    class="waves-effect"
                                    exact
                                    :to="{ name: 'AdminDashboard'}">
                                    Dashboard
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">Podcast</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <router-link
                    class="waves-effect"
                    exact
                    :to="{ name: 'AdminPodcastCreate'}">
                    <button type="button"
                            class="btn btn-primary waves-effect waves-light mb-2">Add Podcast</button>
                </router-link>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Recent Podcast</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th class="align-middle">Podcast</th>
                                    <th class="align-middle">Image</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <template v-if="dataLoaded">
                                    <admin-podcast-item
                                        v-for="podcast in podcasts.data"
                                        :key="podcast.id"
                                        :podcast="podcast"
                                    ></admin-podcast-item>
                                </template>

                                <tr v-else>
                                    <td colspan="4">
                                        <content-loader
                                            :animate="true"
                                            :speed="2"
                                            width={1500}
                                            height={400}
                                            viewBox="0 0 1500 400"
                                            backgroundColor="#f3f3f3"
                                            foregroundColor="#ecebeb"
                                        >
                                            <rect x="27" y="139" rx="4" ry="4" width="20" height="20" />
                                            <rect x="67" y="140" rx="10" ry="10" width="85" height="19" />
                                            <rect x="188" y="141" rx="10" ry="10" width="169" height="19" />
                                            <rect x="402" y="140" rx="10" ry="10" width="85" height="19" />
                                            <rect x="523" y="141" rx="10" ry="10" width="169" height="19" />
                                            <rect x="731" y="139" rx="10" ry="10" width="85" height="19" />
                                            <rect x="852" y="138" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1424" y="137" rx="10" ry="10" width="68" height="19" />
                                            <rect x="26" y="196" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="197" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="198" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="197" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="198" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="196" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="195" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="203" r="12" />
                                            <rect x="26" y="258" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="259" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="260" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="259" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="260" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="258" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="257" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="265" r="12" />
                                            <rect x="26" y="316" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="317" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="318" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="317" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="318" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="316" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="315" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="323" r="12" />
                                            <rect x="26" y="379" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="380" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="381" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="380" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="381" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="379" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="378" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="386" r="12" />
                                            <rect x="978" y="138" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="195" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="257" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="315" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="378" rx="10" ry="10" width="169" height="19" />
                                            <rect x="1183" y="139" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="196" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="258" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="316" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="379" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1305" y="137" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="194" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="256" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="314" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="377" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="37" cy="97" r="11" />
                                            <rect x="26" y="23" rx="5" ry="5" width="153" height="30" />
                                            <circle cx="1316" cy="88" r="11" />
                                            <rect x="1337" y="94" rx="0" ry="0" width="134" height="3" />
                                            <circle cx="77" cy="96" r="11" />
                                        </content-loader>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <laravel-vue-pagination v-if="!searchActive"
                                class="justify-content-center"
                                :limit="3"
                                :data="podcasts"
                                @pagination-change-page="getPodcasts"
        >
            <template #prev-nav>
                <span>&lt; Previous</span>
            </template>
            <template #next-nav>
                <span>Next &gt;</span>
            </template>
        </laravel-vue-pagination>

        <laravel-vue-pagination v-if="searchActive"
                                class="justify-content-center"
                                :limit="3"
                                :data="podcasts"
                                @pagination-change-page="searchPodcasts"
        >
            <template #prev-nav>
                <span>&lt; Previous</span>
            </template>
            <template #next-nav>
                <span>Next &gt;</span>
            </template>
        </laravel-vue-pagination>

    </div>
</template>

<script>
import AdminPodcastItem from "./AdminPodcastItem";
import LaravelVuePagination from 'laravel-vue-pagination';
import {
    ContentLoader,
    BulletListLoader,
    ListLoader,
} from 'vue-content-loader';
export default {
    components: {
        AdminPodcastItem,
        LaravelVuePagination,
        ContentLoader,
        BulletListLoader,
        ListLoader,
    },
    data(){
        return {
            form: {
                term: '',
            },
            podcasts: [],
            total: 0,
            dataLoaded: false,
            searchActive: false,
            search_values: []
        }
    },
    methods: {
        getPodcasts(page = 1){
            this.searchActive = false;
            this.dataLoaded = false;
            axios.get('/api/admin/podcasts?page=' + page)
                .then((response) => {
                    if(response.data.success === true){
                        this.podcasts = response.data.podcasts;
                        this.total = response.data.total;
                        this.dataLoaded = true;
                    }else{
                        console.log(response.data.message);
                        this.dataLoaded = true;
                    }
                    console.log(this.posts);
                }).catch((error) => {
                console.log(error);
            });
        },

        searchPodcasts(page = 1){
            // On submit, make search active, turn on div load and empty current logins array
            this.podcasts = [];
            this.searchActive = true;
            this.dataLoaded = false;
            axios.post('/api/admin/podcasts/search?page=' + page, this.form)
                .then((response) => {
                    console.log(this.form);
                    if(response.data.success === true){
                        this.podcasts = response.data.podcasts;
                        this.total = response.data.total;
                        this.search_values = response.data.search_values;
                    }else{
                        console.log(response.data.message);
                    }
                    this.dataLoaded = true;
                    console.log(this.podcasts);
                }).catch((error) => {
                console.log(error);
            });
        },
    },

    mounted(){
        this.getPodcasts();
    }
}
</script>

<style scoped>

</style>
