<template>
     <div class="parking_create">
         <h1>Создание стоянки</h1>
         <form @submit.prevent="addNewParking">
             <div class="row mb-3">
                 <div class="col-6">
                     <div class="form-group">
                         <input type="text" v-model="parking.city" placeholder="Город ( например: Москва )" class="form-control">
                     </div>
                 </div>
                 <div class="col-6">
                     <div class="form-group">
                         <input type="text" v-model="parking.address_parking" name="address_parking" placeholder="Адрес стоянки" class="form-control">
                     </div>
                 </div>
             </div>
             <button type="submit" class="btn btn-success">Создать</button>
         </form>
     </div>
</template>

<script>
export default {
    name: "ParkingCreate",
    data() {
        return {
            parking: {
                city: null,
                address_parking: null
            },
            loading: false,
            error: null
        }
    },
    mounted() {
        this.addNewParking()
    },
    methods: {

        addNewParking() {

             axios.post('/api/v1/parkings', this.parking)
             .then(response => {
                 if (response.data.success) {
                      console.log('Стоянка успешна добавлена.')
                 }
             })
             .catch(error => {

                 console.log(error)
             })
             .finally(() => {

                 setTimeout(() => {
                     this.loading = false
                 }, 300)
             })
        }
    }
}
</script>

<style scoped>

</style>
