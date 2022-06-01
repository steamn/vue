<template>

    <div class="container">
        <SinglePostComponent>
        </SinglePostComponent>




    </div>
</template>

<script>

import SinglePostComponent from "./SinglePostComponent";

export default {
    name: "PostComponent",

    data() {
      return {
      }
    },

    computed: {
    },
    mounted() {
        this.getPosts();
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
        SinglePostComponent
    },
}
</script>

<style scoped>

</style>
