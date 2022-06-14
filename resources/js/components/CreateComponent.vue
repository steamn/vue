<template>

    <div class="c ntainer">
        <div class="w-25">
            <div class="mb-3">
                <input type="text" v-model="name" class="form-control" id="name" placeholder="name">
            </div>
            <div class="mb-3">
                <input type="number" v-model="age" class="form-control" id="age" placeholder="age">
            </div>
            <div class="mb-3">
                <input type="text" v-model="job" class="form-control" id="job" placeholder="job">
            </div>
            <div class="mb-3">
                <input @click.prevent="addPerson" type="submit" class="btn btn-primary" value="Добавить">
            </div>
        </div>

        <SomeComponent :obj="obj" ></SomeComponent>

    </div>
</template>

<script>

import SomeComponent from "./SomeComponent";

export default {

    name: "CreateComponent",

    components: {
        SomeComponent,

    },
    data() {
        return {
            name: null,
            age: null,
            job: null,
            obj: {
                color: 'blue',
                number: 32,
                isPublished: false,
            }
        }
    },

    methods: {
        addPerson() {
            axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.name = null
                    this.age = null
                    this.job = null
                    this.$parent.$refs.index.getPeople()
                })
        },

    },


}

</script>

<style scoped>

</style>
