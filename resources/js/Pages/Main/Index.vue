<template>
    <div>
        <Link :href="route('posts.index')">Posts</Link>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {
        Link
    },
}
</script>

<style scoped>

</style>
