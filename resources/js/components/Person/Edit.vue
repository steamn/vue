<template>
    <div>
        <div class="w-25">

            <div class="mb-3">
                <input class="form-control" v-model="name" placeholder="name" type="text" name="name">
            </div>
            <div class="mb-3">
                <input class="form-control" v-model="age" placeholder="age" type="number" name="age">
            </div>
            <div class="mb-3">
                <input class="form-control" v-model="job" placeholder="job" type="text" name="job">
            </div>
            <div class="mb-3">
                <input @click.prevent="update" type="submit" class="btn btn-primary" value="Обновить">
            </div>

        </div>
    </div>
</template>

<script>

export default {
    name: "Edit",


    data() {
        return {
            name: null,
            job: null,
            age: null
        }
    },
    mounted() {
        this.getPerson()
        },
    methods: {
        getPerson() {
            axios.get(` /api/people/${this.$route.params.id} `)
                .then(res => {
                    this.name = res.data.data.name;
                    this.age = res.data.data.age;
                    this.job = res.data.data.job;

                })

        },
        update() {
            axios.patch(`/api/people/${this.$route.params.id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.$router.push({
                        name: 'person.show', params: {id: this.$route.params.id }
                    })
                })
        }
    },



}
</script>

<style scoped>

</style>
