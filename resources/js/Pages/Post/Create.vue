<template>
    <div class="w-3/4">
        <h3 class="text-2xl font-bold">Create Post:</h3>
        <hr class="mb-5">
        <input type="file" @change="imageUpload" class="block border-gray-500 border rounded-lg my-3 p-2 w-full">
        <label @click="openSelect" class="block border-gray-500 border rounded-lg my-3 p-2 w-full" for="selectCategory">
            Choise category
        </label>
        <select v-model="post.body.category_id" class="block rounded-lg my-3 p-2 w-full" id="selectCategory">
            <option selected disabled>Category</option>
            <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
        </select>
        <div v-if="errors['body.category_id']" class="text-red-600">
            <p v-for="error in errors['body.category_id']">
                {{ error }}
            </p>
        </div>
        <input type="text" v-model="post.body.title" class="block rounded-lg my-3 p-2 w-full" placeholder="title">
        <div v-if="errors['body.title']" class="text-red-600">
            <p v-for="error in errors['body.title']">
                {{ error }}
            </p>
        </div>
        <input type="text" v-model="post.body.description" class="block rounded-lg my-3 p-2 w-full" placeholder="description">
        <div v-if="errors['body.description']" class="text-red-600">
            <p v-for="error in errors['body.description']">
                {{ error }}
            </p>
        </div>
        <textarea v-model="post.body.content" class="block rounded-lg my-3 p-2 w-full" placeholder="content"></textarea>
        <div v-if="errors['body.content']" class="text-red-600">
            <p v-for="error in errors['body.content']">
                {{ error }}
            </p>
        </div>
        <input type="text" v-model="post.tags" class="block rounded-lg my-3 p-2 w-full" placeholder="#tags">
        <a @click.prevent="storePost" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
            Create
        </a>
        <a @click.prevent="formReset" class="inline-block ml-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
            Reset
        </a>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
        name: "Index",
        components: {
            Link
        },
        props: {
          categories: Array
        },
        layout: AdminLayout,

        data() {
          return{
              post:{
                  body:{},
              },
              errors: {}
          }
        },

    methods: {
            formReset(){
              this.post = {}
            },
            storePost(){
                axios.post('/posts', this.post, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.post = {
                            post: {}
                        }
                    })
                    .catch(error => {
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors
                    })
                    .finally()
            },
            imageUpload(e){
                this.post.body.img = e.target.files[0];
            },

    }
    }
</script>


<style scoped>

</style>
