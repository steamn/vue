<template>

    <div>
        <SinglePostComponent>
        </SinglePostComponent>

        Name: {{name}}

        <button @click="sayHello">Hello</button>
    </div>
</template>

<script>

import SinglePostComponent from "./SinglePostComponent";

export default {
    name: "PostComponent",

    data() {
      return {
          name: 'Boba',
          age: 22,
      }
    },
    methods: {
        sayHello() {
            console.log('Hello')
        }
    },

    components: {
        SinglePostComponent
    },
}
</script>

<style scoped>

</style>
