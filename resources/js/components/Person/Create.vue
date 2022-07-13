<template>
    <div class="w-25">

        <div class="mb-3">
            <input class="form-control" v-model="name" placeholder="name" type="text" name="name">
        </div>
        <div class="mb-3">
            <input class="form-control" v-model="age" placeholder="age" type="text" name="age">
        </div>
        <div class="mb-3">
            <input class="form-control" v-model="job" placeholder="job" type="text" name="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="store" type="submit" class="btn btn-primary" value="Submit">
        </div>

    </div>
</template>

<script>

import router from "../../router";


export default {
    name: "Create",

    data() {
        return {
            name: null,
            job: null,
            age: null
        }
    },
    methods: {
        store() {
            axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                .then( res => {
                router.push({ name: 'person.index'})
            })
        }
    }
}
</script>

<style scoped>

</style>
