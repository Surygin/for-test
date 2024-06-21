<template>
    <h3>Create Post:</h3>
    <hr>
    <input type="text" v-model="tag.title" class="block rounded-lg my-3 p-2 w-96" placeholder="title">
    <Link @click.prevent="storeTag" class="inline-block mb-3 p-3 rounded-lg border-solid border-2 border-indigo-600 hover:bg-indigo-600">
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
              tag:{}
          }
        },

    methods: {
            storeTag(){
                axios.post('/tags', this.tag)
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
