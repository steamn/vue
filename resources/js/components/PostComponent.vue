<template>

    <div class="container">


        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
<!--        <table class="table">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th scope="col">#</th>-->
<!--                <th scope="col">Name</th>-->
<!--                <th scope="col">Age</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <tr v-for="person in persons">-->
<!--                <th scope="row">{{person.id}}</th>-->
<!--                <td>{{person.name}}</td>-->
<!--                <td>{{person.age}}</td>-->
<!--            </tr>-->
<!--            </tbody>-->
<!--        </table>-->


    </div>
</template>

<script>
import IndexComponent from "./IndexComponent";
import CreateComponent from "./CreateComponent";
export default {


    name: "PostComponent",

    data() {
      return {
          persons:  null
      }
    },


    computed: {

    },

    mounted() {
        // this.getPersons();
    },

    methods: {
        getPersons() {
           axios.get('/persons')
               .then(res => {
                   this.persons = res.data
               })
               .catch(error => {
                   console.log(error);
               })
               .finally(  {

               })
        },
        parentLog(){
            console.log('Это родительский компонент');
        }
    },

    components: {
        IndexComponent,
        CreateComponent

    },
}
</script>

<style scoped>

</style>
