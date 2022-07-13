<template>
    <div>
        <router-link :to="{name: 'person.index'}">People</router-link>
        <router-link :to="{name: 'person.create'}">Add Person</router-link>
        <router-link :to="{name: 'person.edit'}">Edit Person</router-link>
        <router-view></router-view>
    </div>
</template>

<script>

export default {
    name: "Index"
}
</script>

<style scoped>

</style>
