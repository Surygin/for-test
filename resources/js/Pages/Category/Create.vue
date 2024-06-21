<template>
    <h3>Create Post:</h3>
    <hr>
    <input type="text" v-model="category.title" class="block rounded-lg my-3 p-2 w-96" placeholder="title">
    <textarea v-model="category.description" class="block rounded-lg my-3 p-2 w-96" placeholder="content"></textarea>
    <Link @click.prevent="storeCategory" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
        Create
    </Link>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
        name: "Index",
        components: {
            Link
        },
        layout: AdminLayout,

        data() {
          return{
              category:{
                  category_id: 1,
              }
          }
        },

    methods: {
            storeCategory(){
                axios.post('/categories', this.category)
                    .then(res => {
                        console.log(res)
                    })
                    .catch()
                    .finally()
            }
    }
    }
</script>


<style scoped>

</style>
