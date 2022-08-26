<template>
  <div>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <button class="btn btn-primary btn-lg">Démmarez le quiz</button>
            </div>
            <div>
                <div class="form-group mt-2">
                    <select name="" id="" class="custom-select w-100">
                        <option value="">Tous les cours</option>
                        <option value="">Organisation Judiciaire</option>
                        <option value="">Organisation Administrative</option>
                        <option value="">Organisation politique</option>
                        <option value="">Droit des enfants</option>
                    </select>
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

      }
    },
    methods: {

    },
    mounted(){
    //   alert('mounted')
    }
  }
</script>

<style  scoped></style>
