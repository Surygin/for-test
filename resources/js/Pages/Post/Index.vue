<template>
    <div class="w-1/2 mx-auto mb-3 accent-green-600">
        <div v-for="post in postsData" class="mb-3 border-b border-gray-400">
            <Link :href="route('posts.show', post.id)">{{ post.title }}</Link>
        </div>
        <Link :href="route('home')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600">
            Back
        </Link>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
        name: "Index",
        components: {
            Link
        },
        props: {
            posts: Array
        },

        data() {
          return{
              postsData: this.posts
          }
        },
    }
</script>


<style scoped>

</style>
