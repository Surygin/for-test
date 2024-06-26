<template>
    <div class="w-3/4">
        <h3 class="text-2xl font-bold">Create Post:</h3>
        <hr class="mb-5">
        <div class="" style="width: 200px">
            <img :src="postData.img" :alt="postData.title">
        </div>
        <input type="file" @change="imageUpload" class="block border-gray-500 border rounded-lg my-3 p-2 w-full">
        <select v-model="postData.category_id" class="block rounded-lg my-3 p-2 w-full" id="selectCategory">
            <option v-for="category in category_id" :value="category.id">{{ category.title }}</option>
        </select>
        <div v-if="errors['body.category_id']" class="text-red-600">
            <p v-for="error in errors['body.category_id']">
                {{ error }}
            </p>
        </div>
        <input type="text" v-model="postData.title" class="block rounded-lg my-3 p-2 w-full" placeholder="title">
        <div v-if="errors['body.title']" class="text-red-600">
            <p v-for="error in errors['body.title']">
                {{ error }}
            </p>
        </div>
        <input type="text" v-model="postData.description" class="block rounded-lg my-3 p-2 w-full" placeholder="description">
        <div v-if="errors['body.description']" class="text-red-600">
            <p v-for="error in errors['body.description']">
                {{ error }}
            </p>
        </div>
        <textarea v-model="postData.content" class="block rounded-lg my-3 p-2 w-full" placeholder="content"></textarea>
        <div v-if="errors['body.content']" class="text-red-600">
            <p v-for="error in errors['body.content']">
                {{ error }}
            </p>
        </div>
        <input type="text" v-model="postData.tags" class="block rounded-lg my-3 p-2 w-full" placeholder="#tags">
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
        name: "Edit",
        components: {
            Link
        },
        props: {
            post: Object
        },
        layout: AdminLayout,

        data() {
          return{
              postData: this.post,
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
                this.post.img = e.target.files[0];
            },

    },
    mounted() {
        console.log(this.postData.category_id);
      //   const categoryPost = document.getElementById('selectCategory');
      // const newOption = new Option("Choise category", "", true, true);
      // newOption.disabled = true;
      // categoryPost.append(newOption);

    }
}
</script>


<style scoped>

</style>
