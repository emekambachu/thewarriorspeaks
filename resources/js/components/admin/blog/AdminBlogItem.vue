<template>
    <tr v-if="!deleted">
        <td>
            <strong>Title: </strong>{{ post.title }}<br>
            <strong>Author: </strong>{{ post.author }}<br>
            <strong>Category: </strong>{{ post.category_id }}<br>
        </td>
        <td>
            <img width="70" :src="post.image_path + post.image"/>
        </td>
        <td>
            <span v-if="post.status === 1"
                  class="badge badge-pill badge-soft-success font-size-11">Published</span>
            <span v-else
                  class="badge badge-pill badge-soft-success font-size-11">Pending</span>
        </td>
        <td>
            <router-link :to="{ name: 'AdminBlogEdit', params: {id: post.id}}">
                <button type="button"
                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">Edit</button>
            </router-link>

            <button @click.prevent="deleteItem(post.id)" type="button"
                    class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">
                Delete
            </button>
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        post: Object
    },
    data() {
        return {
            deleted: false,
        }
    },
    methods: {
        deleteItem(id){
            // Install sweetalert2 to use
            Swal.fire({
                title: 'Delete',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    this.formLoading();
                    axios.delete('/api/admin/blog/posts/' + id + '/delete').then((response) => {
                        if(response.data.success === true){
                            this.formSuccess(response);
                            this.deleted = true;
                        }else{
                            this.formError(response)
                        }
                    }).catch((error) => {
                        console.log(error);
                    });
                } else if (result.isDenied) {
                    return false;
                }
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
    },

    mounted() {

    }
}
</script>

<style scoped>

</style>
