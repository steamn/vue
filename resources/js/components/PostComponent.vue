<template>

    <div class="container">
        <SinglePostComponent>
        </SinglePostComponent>


        <button @click="sayHello">Hello</button>



        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="person in personMore20">
                    <th scope="row">{{person.id}}</th>
                    <td>{{person.name}}</td>
                    <td>{{person.age}}</td>
            </tr>
            </tbody>
        </table>


    </div>
</template>

<script>

import SinglePostComponent from "./SinglePostComponent";

export default {
    name: "PostComponent",

    data() {
      return {
          persons: [
              {
                  id: 1,
                  name: 'Boba',
                  age: 22,
              },
              {
                  id:2,
                  name: 'Goga',
                  age: 16,
              },
              {
                  id: 3,
                  name: 'Coca',
                  age: 18,
              },

          ],


      }
    },

    computed: {

        personMore20() {
            return this.persons.filter(function (person){
                return person.age > 20
            })
        }

    },

    methods: {
        sayHello() {
            console.log('Hello')
        }
    },

    components: {
        SinglePostComponent
    },
}
</script>

<style scoped>

</style>
