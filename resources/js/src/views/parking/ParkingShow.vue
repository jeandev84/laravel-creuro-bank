<template>
    <div class="parking_show">
        <h1>Редактирование стоянки : {{ id }}</h1>
        <form @submit.prevent="editParking">
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  v-model="parking.city" placeholder="Город ( например: Москва )" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  v-model="parking.address_parking" name="address_parking" placeholder="Адрес стоянки" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Обновить</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "ParkingShow",
    props: [
        'id'
    ],
    data() {

        return {
            parking: {
                city: null,
                address_parking: null
            }
        }
    },
    mounted() {
        this.showParking();
        this.editParking();
    },
    methods: {

        showParking() {
            axios.get('/api/v1/parkings/' + this.id)
                 .then(response => {
                       this.parking = response.data.data;
                 })
                 .catch(error => {

                    // Setting when we have error from server
                    console.log(error)
                 })
                 .finally(() => {

                    // Setting after then (success)
                    setTimeout(() => {
                        this.loading = false
                    }, 300)
                })
        },

        editParking() {

        }
    }
}
</script>

<style scoped>

</style>
