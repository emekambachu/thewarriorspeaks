/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Default
require('./bootstrap');
import {
    createApp
} from 'vue';
import router from './routes';
import axios from 'axios';

// Sweet Alert
import Swal from 'sweetalert2';
window.Swal = Swal;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Home


// Home Admin Login
import AdminLogin from "./components/auth/AdminLogin";

// Admin Dashboard
import NotFound from './components/NotFound';
import AdminDashboard from './components/admin/AdminDashboard';
import AdminPodcast from './components/admin/podcast/AdminPodcast';
import AdminPodcastForm from './components/admin/podcast/AdminPodcastForm';
import AdminBlog from './components/admin/blog/AdminBlog';
import AdminBlogForm from './components/admin/blog/AdminBlogForm';
import AdminAuthor from './components/admin/author/AdminAuthor';
import AdminAuthorForm from './components/admin/author/AdminAuthorForm';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

createApp({
    components: {
        AdminLogin,

        NotFound,

        AdminDashboard,
        AdminPodcast,
        AdminPodcastForm,
        AdminBlog,
        AdminBlogForm,
        AdminAuthor,
        AdminAuthorForm,
    }
}).use(router, axios).mount('#app');
