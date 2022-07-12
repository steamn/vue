<template>

    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none' ">
        <th scope="row">{{ person.id }}</th>
        <td><input v-model="name" type="text" class="form-control"></td>
        <td><input v-model="age" type="number" class="form-control"></td>
        <td><input v-model="job" type="text" class="form-control"></td>
        <td><a @click.prevent="updatePerson(person.id)" class="btn btn-success" href="#">Сохранить</a></td>
    </tr>

</template>

<script>
export default {
    name: "EditComponent",

    props: [
        'person'
    ],

    data() {
      return {

          name: null,
          age: null,
          job: null

      }
    },
    mounted() {

    },

    methods: {

        updatePerson(id) {
            this.$parent.editPersonId = null
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.$parent.getPeople()
                })
        },
    }

}

</script>

<style scoped>

</style>
