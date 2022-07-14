<template>
<div v-if="person">
    <div>
        Name: {{this.person.name}}
    </div>
    <div>
        Age: {{this.person.age}}jjh
    </div>
    <div>
        Job: {{this.person.job}}
        ddd
    </div>
        <router-link class="btn btn-primary" :to="{ name: 'person.edit', params: {id: this.person.id } }">Edit</router-link>
</div>
</template>

<script>
export default {
    name: "Show",
    data() {
        return {
            person: null
        }
    },
    mounted() {
        this.getPerson();
    },

    methods: {
        getPerson() {
            axios.get('/api/people/' + this.$route.params.id)
                .then(res => {
                    this.person = res.data

                })

        },
    }
}
</script>

<style scoped>

</style>
