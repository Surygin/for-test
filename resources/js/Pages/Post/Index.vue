<template>
    <div class="flex">
        <div class="w-3/4">
            <div class="nav">
                <Link :href="route('posts.create')" class="inline-block mr-3 mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">Add Post</Link>
                <Link :href="route('dashboard')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
                    Back
                </Link>
            </div>
            <div v-for="post in postsData" class="flex justify-between mb-3 border-b border-gray-400">
                <Link :href="route('posts.show', post.id)" class="hover:text-amber-300">{{ post.title }}</Link>
                <div>
                    <Link @click.prevent="deletePost" class="hover:text-amber-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </Link>
                </div>
            </div>
            <div v-if="postsData.length === 0" class="my-5" >
                <p class="text-2xl m-5"> Posts not found</p>
                <hr>
            </div>
        </div>
        <div class="w-1/4 m-5 mt-0 p-3.5 border-amber-200 rounded-lg border-solid border-2 bg-amber-200 sticky top-1.5" style="height: 100%;">
            <h3 class="text-2xl">Filter:</h3>
            <input type="text" v-model="postsFilter.title" class="block rounded-lg my-3 p-2 w-full" placeholder="title">
            <input type="text" v-model="postsFilter.description" class="block rounded-lg my-3 p-2 w-full" placeholder="description">
            <input type="text" v-model="postsFilter.content" class="block rounded-lg my-3 p-2 w-full" placeholder="content">
            <input type="date" v-model="postsFilter.created_at_from" class="block rounded-lg my-3 p-2 w-full">

            <a href="#" @click.prevent="filterApply" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
                Apply
            </a>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
        name: "Index",
        components: {
            Link
        },
        props: {
            posts: Array
        },
        layout: AdminLayout,

        methods:{
          deletePost(){
              console.log("I'm zagluchko")

          },
          filterApply(){
              axios.get('/posts', {
                params: this.postsFilter
              }).then(res => {
                  this.postsData = res.data;
              })
          }
        },

        data() {
          return{
              postsData: this.posts,
              postsFilter: {}
          }
        },
    }
</script>


<style scoped>

</style>
