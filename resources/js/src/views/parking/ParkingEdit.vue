<template>
    <div class="parking_edit">
        <h1>Создание стоянки</h1>
        <form @submit.prevent="editParking">
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
    name: "ParkingEdit",
    data() {

    },
    mounted() {

        this.editParking();
    },
    methods: {

        editParking() {

        }
    }
}
</script>

<style scoped>

</style>
