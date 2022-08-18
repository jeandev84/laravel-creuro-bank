<template>
    <div class="parking_show">
        <h1>Редактирование стоянки : {{ parkingId }}</h1>
        <form @submit.prevent="saveParking(parkingId)">
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
        'parkingId'
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
        this.saveParking();
    },
    methods: {

        showParking() {
            axios.get('/api/v1/parkings/' + this.parkingId)
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

        saveParking(id) {

            axios.post('/api/v1/parkings/' + id, {
                _method: 'PUT',
                city: this.parking.city,
                address_parking: this.parking.address_parking
            })
            .then(response => {
                console.log('запись успешна (' + id + ') обновлена!');
            })
            .catch(error => {
                console.log(error)
                this.errored = true
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
