<template>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Возраст</th>
                <th scope="col">Работа</th>
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <ShowComponent  :person="person" :ref="`show_${person.id}`"></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"> </EditComponent>
            </template>

            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent";
import ShowComponent from "./ShowComponent";
export default {
    name: "IndexComponent",
    components: {ShowComponent, EditComponent},
    data() {
      return {
          people: null,
          editPersonId: null,
          name: null,
          age: null,
          job: null

      }
    },
    mounted() {
        this.getPeople();

    },


    methods: {
        getPeople() {
            axios.get('/api/people')
                .then(res => {
                    this.people = res.data;
                })
        },
        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.getPeople()
                })
        },
        updatePerson(id) {
            this.editPersonId = null
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.getPeople()
                })
        },
        changePersonId(id, name, age, job) {
            this.editPersonId = id

            let fullName = this.$refs[`edit_${id}`][0];

            fullName.name = name
            fullName.age = age
            fullName.job = job
        },
        isEdit(id) {
            return this.editPersonId === id;
        },
        indexLog(){
            console.log('Это компонент индекс лог');
        }
    }

}

</script>

<style scoped>

</style>
