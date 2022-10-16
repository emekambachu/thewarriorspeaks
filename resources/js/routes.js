import { createWebHistory, createRouter } from "vue-router";
import NotFound from './components/NotFound';
import AdminDashboard from './components/admin/AdminDashboard';
import AdminBlog from "./components/admin/blog/AdminBlog";
import AdminBlogForm from "./components/admin/blog/AdminBlogForm";
import AdminPodcast from "./components/admin/podcast/AdminPodcast";
import AdminPodcastForm from "./components/admin/podcast/AdminPodcastForm";
import AdminAuthor from "./components/admin/author/AdminAuthor";
import AdminAuthorForm from "./components/admin/author/AdminAuthorForm";


const routes = [
    {
        // for urls that don't exist
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: NotFound,
        meta: {
            requiresAuth: false
        }
    },

    {
        path: '/admin/dashboard',
        name: "AdminDashboard",
        component: AdminDashboard,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/podcast',
        name: "AdminPodcast",
        component: AdminPodcast,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/podcast/create',
        name: "AdminPodcastCreate",
        component: AdminPodcastForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/podcast/:id/edit',
        name: "AdminPodcastEdit",
        component: AdminPodcastForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/blog',
        name: "AdminBlog",
        component: AdminBlog,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/blog/create',
        name: "AdminBlogCreate",
        component: AdminBlogForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/blog/:id/edit',
        name: "AdminBlogEdit",
        component: AdminBlogForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/author',
        name: "AdminAuthor",
        component: AdminAuthor,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/author/edit',
        name: "AdminAuthorEdit",
        component: AdminAuthorForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/logout',
        name: "AdminLogout",
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/logout').then(() => {
                window.location.href = '/login';
            });
        }
    },

];

const router = createRouter({
    linkExactActiveClass: 'router-link-active text-light font-weight-bold waves-effect',
    history: createWebHistory(),
    routes,
});

export default router;
