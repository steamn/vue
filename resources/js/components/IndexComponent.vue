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
                <tr :class="isEdit(person.id) ? 'd-none' : '' ">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a @click.prevent="changePersonId(person.id, person.name, person.age, person.job )" class="btn btn-success" href="#">Изменить</a></td>
                    <td><a @click.prevent="deletePerson(person.id)" class="btn btn-danger" href="#">Удалить</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none' ">
                    <th scope="row">{{ person.id }}</th>
                    <td><input v-model="name" type="text" class="form-control"></td>
                    <td><input v-model="age" type="number" class="form-control"></td>
                    <td><input v-model="job" type="text" class="form-control"></td>
                    <td><a @click.prevent="updatePerson(person.id)" class="btn btn-success" href="#">Сохранить</a></td>
                </tr>
            </template>


            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",

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
            this.name = name
            this.age = age
            this.job = job
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
