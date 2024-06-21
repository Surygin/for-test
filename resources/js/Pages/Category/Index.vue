<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Index",
    props: {
        categories: Array,
    },
    components: {
        Link
    },
    layout: AdminLayout,

    data() {
        return{
            categoriesData: this.categories
        }
    }
}
</script>

<template>
    <Link :href="route('categories.create')" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">Add Category</Link>
    <div class="">
        <div v-for="category in categoriesData" class="mb-3 border-b border-gray-400">
            <Link :href="route('categories.show', category.id)" class="hover:text-amber-300">{{ category.title }}</Link>
        </div>
        <Link :href="route('dashboard')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
            Back
        </Link>
    </div>
</template>

<style scoped>

</style>
