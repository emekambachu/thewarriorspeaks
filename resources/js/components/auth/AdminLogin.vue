<template>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Admin login</h5>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img :src="'/dashboard/assets/images/profile-img.png'" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="auth-logo">
                        <a href="" class="auth-logo-light">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img :src="'/logo-dark.png'" alt="" class="rounded-circle" height="50">
                                </span>
                            </div>
                        </a>

                        <a href="" class="auth-logo-dark">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img :src="'/logo.png'" alt="" class="rounded-circle" height="50">
                                </span>
                            </div>
                        </a>
                    </div>

                    <div class="p-2">
                        <div v-if="errors">
                            <p v-for="(error, index) in errors" :key="index"
                               class="text-danger text-center">
                                {{ error.toString() }}</p>
                        </div>

                        <form v-if="!loading" class="form-horizontal" @submit.prevent="login">
                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input v-model="form.email" type="email" class="form-control"
                                       id="username" placeholder="Enter username">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input v-model="form.password" type="password" class="form-control"
                                           placeholder="Enter password" aria-label="Password"
                                           aria-describedby="password-addon">
                                    <button class="btn btn-light" type="button" id="password-addon">
                                        <i class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>

                            <div class="form-check">
                                <input v-model="form.remember" class="form-check-input" type="checkbox" id="remember-check">
                                <label class="form-check-label" for="remember-check">
                                    Remember me
                                </label>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                            </div>
                        </form>

                        <div v-else class="spinner-border text-warning m-1 text-center" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>

                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">
                <div>
                    <p>© {{ new Date().getFullYear() }} | Amazon Warriors Podcast</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

export default {
    data(){
        return {
            form: {
                email: '',
                password: '',
                remember: '',
            },
            loading: false,
            errors: []
        }
    },

    methods: {
        login(){
            this.errors = [];
            this.loading = true;
            axios.post('/api/admin/login', this.form)
                .then(response => {
                    console.log(response.data);
                    if(response.data.success === true){
                        window.location.href = '/admin/dashboard';
                    }else{
                        this.errors = response.data.errors;
                        this.loading = false;
                    }
                }).catch(error => {
                console.log(error)
            });
        }
    },

    mounted(){

    }
}
</script>

<style scoped>

</style>
