<template>

    <div class="container">
        <div>Цвет: {{obj.color}}</div>
        <div>Номер: {{obj.number > 10 ? "больше 10" : "меньше 10" }}</div>
        <div>Статус: {{ obj.isPublished ? 'Опубликовано' : 'Не обпуликовано' }}</div>
    </div>
</template>

<script>
export default {
    name: "SomeComponent",

    data() {
      return {

      }
    },
    props: [
       'obj'
    ],
    mounted() {
        this.$parent.$parent.parentLog()
    },

    methods: {

    }

}

</script>

<style scoped>

</style>
