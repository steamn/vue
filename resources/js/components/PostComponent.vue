<template>

    <div class="container">

        <CreateComponent></CreateComponent>
        <SinglePostComponent>
        </SinglePostComponent>




    </div>
</template>

<script>

import SinglePostComponent from "./SinglePostComponent";

import CreateComponent from "./CreateComponent";
export default {
    name: "PostComponent",

    data() {
      return {
      }
    },

    computed: {

    },

    mounted() {
        // this.getPosts();
    },

    methods: {
        getPosts() {
            axios.get('/posts')
                .then(function (data) {
                    console.log(data.data);
                })
        }
    },

    components: {
        SinglePostComponent,
        CreateComponent

    },
}
</script>

<style scoped>

</style>
