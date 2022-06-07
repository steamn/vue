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
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr>
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a @click.prevent="changePersonId(person.id)" class="btn btn-success" href="#">Изменить</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none' ">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><a @click.prevent="changePersonId(null)" class="btn btn-success" href="#">Сохранить</a></td>
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
          editPersonId: null

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
        changePersonId(id) {
            this.editPersonId = id
        },
        isEdit(id) {
            return this.editPersonId === id;
        }
    }

}

</script>

<style scoped>

</style>
