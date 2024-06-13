<template>
    <div class="w-1/2 mx-auto mb-3 accent-green-600">
        <div class="mb-3">
            {{ postData.title }}
        </div>
        <div class="mb-3 border-b border-gray-400">
            {{ postData.description }}
        </div>
        <Link :href="route('posts.index')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600">
            Back
        </Link>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
        name: "Show",
        components: {
            Link
        },
        props: {
            post: Object
        },

        data() {
          return{
              postData: this.post
          }
        },
    }
</script>


<style scoped>

</style>
