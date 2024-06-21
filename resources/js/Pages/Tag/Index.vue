<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: 'Index',
    components:{
        Link
    },
    props: {
        tags: Array
    },
    layout: AdminLayout,
    data() {
        return{
            tagsData: this.tags
        }
    }
}
</script>

<template>
    <Link :href="route('tags.create')" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">Add Tag</Link>
    <div class="">
        <div v-for="tag in tagsData" class="mb-3 border-b border-gray-400">
<!--            <Link :href="route('tags.show', tag.id)" class="hover:text-amber-300">{{ tag.title }}</Link>-->
            {{ tag.title }}
        </div>
        <Link :href="route('dashboard')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
            Back
        </Link>
    </div>
</template>

<style scoped>

</style>
