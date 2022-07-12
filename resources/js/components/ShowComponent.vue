<template>

    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : '' ">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td><a @click.prevent="changePersonId(person.id, person.name, person.age, person.job )" class="btn btn-success"
               href="#">Изменить</a></td>
        <td><a @click.prevent="deletePerson(person.id)" class="btn btn-danger" href="#">Удалить</a></td>
    </tr>

</template>

<script>
export default {
    name: "ShowComponent",

    data() {
        return {}
    },
    props: [
        'person'
    ],
    mounted() {
    },


    methods: {

        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.$parent.getPeople()
                })
        },

        changePersonId(id, name, age, job) {
            this.$parent.editPersonId = id

            let fullName = this.$parent.$refs[`edit_${id}`][0];

            fullName.name = name
            fullName.age = age
            fullName.job = job
        },

    }

}

</script>

<style scoped>

</style>
