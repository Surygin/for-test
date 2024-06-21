<template>
    <p class="inline-block p-10 m-3 rounded-lg border-solid border-2 border-amber-200 bg-amber-200 text-center drop-shadow-xl"><b class="block">Posts:</b> <span class="text-5xl">{{ postsCount }}</span></p>
    <p class="inline-block p-10 m-3 rounded-lg border-solid border-2 border-amber-200 bg-amber-200 text-center drop-shadow-xl"><b class="block">Comments:</b> <span class="text-5xl">{{ commentsCount }}</span></p>
    <p class="inline-block p-10 m-3 rounded-lg border-solid border-2 border-amber-200 bg-amber-200 text-center drop-shadow-xl"><b class="block">Tags:</b> <span class="text-5xl">{{ tagsCount }}</span></p>
    <p class="inline-block p-10 m-3 rounded-lg border-solid border-2 border-amber-200 bg-amber-200 text-center drop-shadow-xl"><b class="block">Users:</b> <span class="text-5xl">{{ userCount }}</span></p>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Index",
    components: {
        Link
    },
    props:{
      postsCount: Number,
      commentsCount: Number,
        tagsCount: Number,
        userCount: Number,
    },
    layout: AdminLayout,
}
</script>

<style scoped>

</style>
