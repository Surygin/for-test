<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Show",
    props: {
        category: Object,
    },
    components: {
        Link
    },
    layout: AdminLayout,

    data() {
        return{
            categoryData: this.category
        }
    }
}
</script>

<template>
    <div class="">
        <div><span class="font-bold">title:</span> {{ categoryData.title }}</div>
        <div class="mb-3 border-b border-gray-400"><span class="font-bold">description:</span> {{ categoryData.description}}</div>
        <Link :href="route('categories.index')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
            Back
        </Link>
    </div>
</template>

<style scoped>

</style>
