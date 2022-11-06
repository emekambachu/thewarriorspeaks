<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <router-link
                    class="waves-effect"
                    exact
                    :to="{ name: 'AdminPodcast'}">
                    <button type="button" class="btn btn-primary waves-effect waves-light mb-2">Podcasts</button>
                </router-link>
            </div>
            <div class="col-12 text-danger text-center">
                <span class="" v-for="(error, index) in errors" :key="index">
                    {{ error.toString() }}<br>
                </span>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 v-if="!$route.params.id" class="card-title mb-4">Add new podcast</h4>
                        <h4 v-else class="card-title mb-4">Update podcast</h4>

                        <form enctype="multipart/form-data">
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input v-model="form.title" type="text"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <input v-model="form.author" type="text"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Categories</label>
                                <div class="col-sm-9">
                                    <select v-model="form.category_id" class="form-select">
                                        <option selected="" value="">Choose...</option>
                                        <option v-for="category in categories"
                                                :key="category.id"
                                                :value="category.id">
                                            {{ category.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" @change="uploadImage" class="form-control" required>
                                    <div v-if="!$route.params.id && form.image !== null">
                                        <img :src="imagePreview" width="100"/>
                                        <span @click="form.image = null"
                                              class="pl-1 fa fa-times text-danger"
                                              title="Remove image"></span>
                                    </div>
                                    <img v-else-if="$route.params.id && form.image !== null"
                                         :src="form.image_path+form.image" width="100"/>
                                    <p v-if="imageErrorMessage !== ''" class="text-center text-danger">
                                        {{ imageErrorMessage }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Audio</label>
                                <div class="col-sm-9">
                                    <input type="file" @change="uploadAudio" class="form-control" required>
                                    <div v-if="!$route.params.id && audioErrorMessage === ''">
                                        <i>{{ form.audio }}</i>
                                        <span @click="form.audio = null"
                                              class="pl-1 fa fa-times text-danger"
                                              title="Remove image"></span>
                                    </div>
                                    <div v-else-if="$route.params.id && form.audio !== null">
                                        <i>{{ form.audio }}</i>
                                        <span @click="form.audio = null"
                                              class="pl-1 fa fa-times text-danger"
                                              title="Remove image"></span>
                                    </div>
                                    <p v-if="audioErrorMessage !== ''" class="text-center text-danger">
                                        {{ audioErrorMessage }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <ckeditor class="form-control" :editor="editor"
                                              v-model="form.description"
                                              :config="editorConfig"></ckeditor>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input"
                                       class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select v-model="form.status" class="form-select">
                                        <option selected="" value="">Choose...</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-auto">
                                    <div>
                                        <button @click.prevent="submitPodcast"
                                                v-if="!$route.params.id" type="submit"
                                                class="btn btn-primary w-md">Submit</button>
                                        <button @click.prevent="updatePodcast" v-else type="submit"
                                                class="btn btn-primary w-md">Update</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    components: {
        // Use the <ckeditor> component in this view.
        ckeditor: CKEditor.component
    },
    props: {
        podcast: [Object, null],
    },
    data(){
        return {
            editor: ClassicEditor,
            editorConfig: {
                // The configuration of the editor.
            },
            form: {
                title: '',
                author: '',
                category_id: '',
                image: null,
                image_path: '',
                audio: null,
                audio_path: '',
                description: '',
                status: '',
            },
            categories: [],
            imagePreview: null,
            audioPreview: null,
            validationAlert: '',
            imageErrorMessage: '',
            audioErrorMessage: '',
            errors: [],
        }
    },

    methods: {
        uploadImage: function (event){
            this.validateImage(event);
            //Assign image and path to this variable
            this.form.image = event.target.files[0];
            // create base64 version display of image
            if(this.imageErrorMessage === ''){
                this.imagePreview = URL.createObjectURL(event.target.files[0]);
            }

        },

        validateImage(event){
            // Validate Image
            let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if(!allowedExtensions.exec(event.target.files[0].name)){
                this.imageErrorMessage = 'Incorrect image format';
                this.form.image = null;
                return false;
            }else{
                this.imageErrorMessage = '';
            }

            if(event.target.files[0].size > 5000000){
                this.imageErrorMessage = 'File too large, 5mb max.';
                this.form.image = null;
                return false;
            }
        },

        uploadAudio: function (event){
            this.validateAudio(event);
            //Assign image and path to this variable
            this.form.audio = event.target.files[0];
            // create base64 version display of image
            if(this.audioErrorMessage === ''){
                this.audioPreview = event.target.files[0].name;
            }
        },

        validateAudio(event){
            // Validate Image
            let allowedExtensions = /(\.mp3|\.m4a|\.wave)$/i;
            if(!allowedExtensions.exec(event.target.files[0].name)){
                this.audioErrorMessage = 'Incorrect format';
                this.form.audio = null;
                return false;
            }else{
                this.audioErrorMessage = '';
            }

            if(event.target.files[0].size > 30000000){
                this.audioErrorMessage = 'File too large, 30mb max.';
                this.form.audio = null;
                return false;
            }
        },

        submitPodcast(){
            this.errors = [];
            this.formLoading();

            let formData = new FormData();
            // iterate form object
            let self = this; //you need this because *this* will refer to Object.keys below`
            //Iterate through each object field, key is name of the object field`
            Object.keys(this.form).forEach(function(key) {
                console.log(key); // key
                console.log(self.form[key]); // value
                formData.append(key, self.form[key]);
            });
            // check entries
            console.log(...formData.entries());
            let config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            axios.post('/api/admin/podcasts/create', formData)
                .then((response) => {
                    console.log(response.data);
                    if(response.data.success === true){
                        this.formSuccess();
                        this.formEmpty();
                    }else{
                        this.formError(response);
                    }
                }).catch((error) => {
                    console.log(error);
                });
        },

        populatePodcast(){
            axios.get('/api/admin/podcasts/'+this.$route.params.id+'/show')
                .then((response) => {
                    if(response.data.success === true){
                        let self = this; //you need this because *this* will refer to Object.keys below`
                        //Iterate through each object field, key is name of the object field`
                        Object.keys(response.data.podcast).forEach(function(key){
                            console.log(key); // key
                            console.log(response.data.podcast[key]); // value
                            self.form[key] = response.data.podcast[key];
                        });
                    }
                });
        },

        updatePodcast(){
            this.errors = [];
            this.formLoading();
            let formData = new FormData();
            // iterate form object
            let self = this; //you need this because *this* will refer to Object.keys below`
            //Iterate through each object field, key is name of the object field`
            Object.keys(this.form).forEach(function(key){
                console.log(key); // key
                console.log(self.form[key]); // value
                if(self.form[key] !== null){
                    formData.append(key, self.form[key]);
                }
            });

            console.log(this.form);
            let config = {
                headers: {'content-type': 'multipart/form-data'}
            }

            axios.post('/api/admin/podcasts/'+this.$route.params.id+'/update', formData)
                .then((response) => {
                    if(response.data.success === true){
                        this.formSuccess(response);
                    }else{
                        this.formError(response);
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

        formSuccess(){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000,
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
            let self = this; //you need this because *this* will refer to Object.keys below`
            //Iterate through each object field, key is name of the object field`
            Object.keys(this.form).forEach(function(value) {
                if(['image', 'audio'].includes(value)){
                    self.form[value] = null;
                }else{
                    self.form[value] = '';
                }
            });
        },

        getCategories(){
            axios.get('/api/categories')
                .then((response) => {
                    if(response.data.success === true){
                        this.categories = response.data.categories;
                    }else{
                        console.log(response.data.message);
                    }
                }).catch((error) => {
                console.log(error);
            });
        },

    },

    mounted(){
        this.getCategories();
        if(this.$route.params.id){
            this.populatePodcast();
        }
    }
}
</script>

<style scoped>

</style>
