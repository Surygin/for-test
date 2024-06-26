<template>
    <div class="">
        <div class="mb-3 text-2xl">
            <h3>{{ postData.title }}</h3>
        </div>
        <div>
            <img :src="postData.img" :alt="postData.title" class="w-1/4 rounded-2xl">
        </div>
        <p>Category:</p>
        <div class="mb-3 border-b border-gray-400">
            {{ postData.category_id.title }}
        </div>
        <p>Description:</p>
        <div class="mb-3 border-b border-gray-400">
            {{ postData.description }}
        </div>
        <p>Content:</p>
        <div class="mb-3 border-b border-gray-400">
            {{ postData.content }}
        </div>
        <p>Views:</p>
        <div class="mb-3 border-b border-gray-400">
            {{ postData.views }}
        </div>
        <p>Tags:</p>
        <div class="mb-3 border-b border-gray-400">
            <ul class="flex">
                <li v-for="tag in postData.tags" class="tag__item m-1">
                    {{ tag.title }}
                </li>
            </ul>
        </div>
        <Link :href="route('posts.index')" class="mb-3 inline-block p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
            Back
        </Link>
        <hr>
        <h4><b>Comments:</b></h4>
        <div v-for="comment in postData.comments" class="mt-3">
            <h3 class="text-2xl">{{ comment.profile_id }}</h3>
            {{ comment.content }}
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
        name: "Show",
        components: {
            Link
        },
        props: {
            post: Object,
        },
        layout: AdminLayout,
        data() {
          return{
              postData: this.post
          }
        },
    }
</script>


<style scoped>
    .tag__item:before{
        content: '#';
        color: #6b7280;
    }
</style>
