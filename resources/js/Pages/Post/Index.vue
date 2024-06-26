<template>
    <div class="flex">
        <div class="w-3/4">
            <div class="nav">
                <Link :href="route('posts.create')" class="inline-block mr-3 mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">Add Post</Link>
                <Link :href="route('dashboard')" class="inline-block p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
                    Back
                </Link>
            </div>
            <div v-for="post in postsData.data" class="flex justify-between mb-3 border-b border-gray-400">
                <Link :href="route('posts.show', post.id)" class="hover:text-amber-300">{{ post.title }}</Link>
                <div class="flex">
                    <a :href="route('posts.edit', post.id)" class="m-1 hover:text-amber-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                    <a @click.prevent="deletePost(post.id)" class="m-1 hover:text-amber-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div v-if="postsData.data.length === 0" class="my-5" >
                <p class="text-2xl m-5"> Posts not found</p>
                <hr>
            </div>
            <div class="text-center">
                <template v-for="link in postsData.meta.links" >
                    <a
                       class="inline-block mx-1 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600"
                       v-html="link.label"
                       v-if="link.url"
                       @click.prevent="setPage(link.label)"
                    >
                    </a>
                </template>
            </div>
        </div>
        <!--Filter-->
        <div class="w-1/4 m-5 mt-0 p-3.5 border-amber-200 rounded-lg border-solid border-2 bg-amber-200 sticky top-1.5" style="height: 100%;">
            <h3 class="text-2xl">Filter:</h3>
            <select name="" @change="filterApply" v-model="postsFilter.category_id" id="categoryForFilter" class="block rounded-lg my-3 p-2 w-full">
                <option v-for="el in categories" :value="el.id">{{ el.title}}</option>
            </select>
            <input type="text" @input="filterApply" v-model="postsFilter.title" class="block rounded-lg my-3 p-2 w-full" placeholder="title">
            <input type="text" @input="filterApply" v-model="postsFilter.description" class="block rounded-lg my-3 p-2 w-full" placeholder="description">
            <input type="text" @input="filterApply" v-model="postsFilter.content" class="block rounded-lg my-3 p-2 w-full" placeholder="content">
            <input type="date" @change="filterApply" v-model="postsFilter.created_at_from" class="block rounded-lg my-3 p-2 w-full">

<!--            <a href="#" @click.prevent="filterApply" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">-->
<!--                Apply-->
<!--            </a>-->
            <div class="text-center">
                <a href="#" @click.prevent="formReset" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
                    Reset
                </a>
            </div>


        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import axios from "axios";

export default {
        name: "Index",
        components: {
            Link
        },
        props: {
            posts: Array,
            categories: Array
        },
        layout: AdminLayout,

        methods:{
          deletePost(id){
              if(confirm('Are you shure?')){
                  console.log(id);
                  axios.delete(`/posts/${id}`);
                  this.postsFilter.page = this.page;
                  this.filterApply();
              }
          },
            setPage(page){
                if (parseInt(page)){
                    this.postsFilter.page = page;
                    this.page = Number(page);
                    this.filterApply();
                }
                if (page.includes("Previous")){
                    this.page =  this.page - 1;
                    this.postsFilter.page = this.page;
                    this.filterApply();
                }
                if (page.includes("Next")){
                    this.page =  this.page + 1;
                    this.postsFilter.page = this.page;
                    this.filterApply();
                }
            },
          filterApply(){
              // console.log(this.postsFilter);
              axios.get(`/posts`, {
                params: this.postsFilter
              }).then(res => {
                  this.postsData = res.data;
              })
          },
            formReset(){
              this.postsFilter = {};
              this.filterApply()
            }
        },

        data() {
          return{
              postsData: this.posts,
              postsFilter: {},
              page: 1,
          }
        },
        mounted() {
            const categoryFilter = document.getElementById('categoryForFilter');
            const newOption = new Option("Choise category", "", true, true);
            // newOption.disabled = true;
            categoryFilter.append(newOption);

            console.log(this.postsData.meta.links);
        }
}
</script>


<style scoped>

</style>
