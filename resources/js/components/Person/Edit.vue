<template>
    <div>
        <div class="w-25" v-if="person">

            <div class="mb-3">
                <input class="form-control" v-model="person.name" placeholder="name" type="text" name="name">
            </div>
            <div class="mb-3">
                <input class="form-control" v-model="person.age" placeholder="age" type="number" name="age">
            </div>
            <div class="mb-3">
                <input class="form-control" v-model="person.job" placeholder="job" type="text" name="job">
            </div>
            <div class="mb-3">
                <input :disabled="!isDisabled" @click.prevent="$store.dispatch('update', {id: person.id, name: person.name, age: person.age, job: person.job})" type="submit" class="btn btn-primary" value="Обновить">
            </div>

        </div>
    </div>
</template>

<script>

export default {
    name: "Edit",


    mounted() {
        this.$store.dispatch('getPerson', this.$route.params.id)
        },
    methods: {

    },
    computed: {
        isDisabled() {
            return this.person.name && this.person.age && this.person.job
        },
        person() {
            return this.$store.getters.person
        }
    }



}
</script>

<style scoped>

</style>
