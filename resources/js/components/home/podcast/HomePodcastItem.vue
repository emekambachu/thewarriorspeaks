<template>
    <article class="entry entry-episode has-post-thumbnail">
        <div class="row align-items-lg-center">
            <div class="col-12 col-lg-4">
                <div class="entry-media">
                    <a :href="'/podcast/'+podcast.id+'/post'">
                        <img :src="podcast.image_path+podcast.image"
                             width="480" height="480" alt=""></a>
                    <span class="ribbon">new</span>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <header class="entry-header">
                    <div class="entry-meta">
                        <span class="posted-in">
                            <span class="screen-reader-text">Posted in:</span>
                            <a href="" rel="category tag">Season 1</a></span>
                        <span class="posted-on">
                            <span class="screen-reader-text">Posted on</span>
                                <a rel="bookmark">
                                    <time :datetime="podcast.created_at"
                                          class="entry-date published">September 3, 2018</time>
                                </a>
                            </span>
                    </div>
                    <h2 class="entry-title">
                        <a :href="'/podcast/'+podcast.id+'/post'"
                           rel="bookmark">{{ podcast.title }}</a>
                    </h2>
                </header>
                <div class="entry-audio">
                    <div class="podcast-episode-player"
                         :data-episode-download="podcast.audio_path+podcast.audio" data-episode-download-button="Download Episode (884.3 KB)"
                         data-episode-duration="00:43" data-episode-size="884.3 KB">
                        <audio class="wp-audio-shortcode" preload="none">
                            <source :src="podcast.audio_path+podcast.audio" type="audio/mpeg" />
                            <source :src="podcast.audio_path+podcast.audio" type="audio/ogg" />
                        </audio>
                    </div>
                </div>
                <div class="entry-content">
                    <p v-html="podcast.description"></p>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    props: {
        podcast: Object,
    },
    data() {
        return {

        }
    },
    methods: {

    },

    mounted() {

    }
}
</script>

<style scoped>

</style>
