<template>
    <div class="col-12 col-md-8 col-lg-9">
        <div class="episodes-listing">
            <template v-if="dataLoaded">
                <home-podcast-item
                    v-for="podcast in podcasts.data"
                    :key="podcast.id"
                    :podcast="podcast"
                ></home-podcast-item>
            </template>
            <ListLoader v-else></ListLoader>
        </div>
    </div>

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

</template>

<script>
import HomePodcastItem from "./HomePodcastItem";
import LaravelVuePagination from 'laravel-vue-pagination';

import {
    ContentLoader,
    BulletListLoader,
    ListLoader,
} from 'vue-content-loader';

export default {
    components: {
        HomePodcastItem,
        LaravelVuePagination,
        ContentLoader,
        BulletListLoader,
        ListLoader,
    },

    data(){
        return {
            form: {
                name: ''
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
            axios.get('/api/home/podcasts?page=' + page)
                .then((response) => {
                    if(response.data.success === true){
                        this.podcasts = response.data.podcasts;
                        this.dataLoaded = true;
                    }else{
                        console.log(response.data.message);
                        this.dataLoaded = true;
                    }
                    console.log(this.podcasts);
                }).catch((error) => {
                    console.log(error);
                });
            this.dataLoaded = true;
        },

        searchPodcasts(page = 1){
            // On submit, make search active, turn on div load and empty current logins array
            this.podcasts = [];
            this.searchActive = true;
            this.dataLoaded = false;
            axios.post('/api/home/podcasts/search?page=' + page, this.form)
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
            this.dataLoaded = true;
        },
    },
    mounted() {
        this.getPodcasts();
    },
}
</script>

<style scoped>

</style>
