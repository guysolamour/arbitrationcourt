<template>
  <div>
    <div class="card">
        <div class="card-body">
            <div class="text-center" v-show="!start">
                <button @click.prevent="start = true" class="btn btn-primary btn-lg">Démmarez le quiz</button>
            </div>
            <div v-show="start">
                <div class="form-group mt-2">
                    <label for="subject">Choisir une matière</label>
                    <select id="subject" class="custom-select w-100" @change="chooseSubject">
                        <option :key="subject.id" :value="subject.id" v-for="subject in subjects" >{{ subject.name }}</option>
                    </select>
                </div>
                <div class="text-center">
                    <button class="btn btn-success">Continuer</button>

                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Quiz',
    props: ['questions'],
    data() {
      return {

        subjects: [
            {
                id: 1,
                name: "Organisation Judiciaire"
            },
            {
                id: 2,
                name: "Organisation Administrative"
            },
            {
                id: 3,
                name: "Organisation Politique"
            },
            {
                id: 4,
                name: "Droit de l'enfant"
            },
        ],

        start: false,
        subject: null,
      }
    },
    methods: {
        chooseSubject(){
            alert('choose subject')
        }
    },
    mounted(){
    //   alert('mounted')
    }
  }
</script>

<style  scoped></style>
