<script>

import {defineComponent} from "vue";
import {Link} from "@inertiajs/vue3";
import Dashboard from "@/Pages/Dashboard.vue";

export default defineComponent({
    components: {Dashboard, Link}
})
</script>

<template>
<header class="header p-3.5 bg-amber-300 mb-5 text-3xl">
    Dashboard
</header>
    <section class=" flex p-2" style="min-height: calc(100vh - 100px);">
        <aside class="w-1/4 p-3.5 pt-0 border-amber-200 rounded-lg border-solid border-2 bg-amber-200 sticky top-1.5" style="height: 100%;">
            <nav>
                <Link :href="route('dashboard')" class="block p-2 rounded-lg mb-1.5">Home</Link>
                <Link :href="route('posts.index')" class="block p-2 rounded-lg mb-1.5">Posts</Link>
                <Link :href="route('categories.index')" class="block p-2 rounded-lg mb-1.5">Categories</Link>
                <Link :href="route('tags.index')" class="block p-2 rounded-lg mb-1.5">Tags</Link>
            </nav>
        </aside>
        <article class="w-3/4 p-3.5 pt-0">
            <slot></slot>
        </article>
    </section>
<footer class="footer p-3.5 bg-black text-amber-50 mt-5">
    Footer
</footer>
</template>

<style scoped>
    body{
        padding: 10px;
    }
    .header, aside {
        -webkit-box-shadow: 4px 4px 18px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 4px 4px 18px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 4px 4px 18px 2px rgba(34, 60, 80, 0.2);
    }
    a {
        transition: all 0.3s ease-in-out;
    }
    nav a:hover{
        background: rgb(252,211,77);
    }
</style>
