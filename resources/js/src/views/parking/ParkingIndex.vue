<template>
     <div class="parking-list">
         <div class="parking__header_list">
             <div class="row">
                 <div class="col-11">
                     <h1>Стоянки</h1>
                 </div>
                 <div class="col-1">
                     <router-link :to="{name: 'parkingCreate'}" class="btn btn-primary">Добавить</router-link>
                 </div>
             </div>
         </div>
         <table class="table table-striped">
             <thead>
             <tr>
                 <th scope="col">#</th>
                 <th scope="col">Город</th>
                 <th scope="col">Адрес стоянки</th>
                 <th scope="col"></th>
             </tr>
             </thead>
             <tbody>
             <tr v-for="parking in parkings.data">
                 <th scope="row">{{ parking.id }}</th>
                 <td>{{ parking.city }}</td>
                 <td>{{ parking.address_parking }}</td>
                 <td>
                     <router-link :to="{'name': 'parkingShow', params: {parkingId: parking.id}}">
                         <i class="fas fa-pencil-alt" style="font-size: 15px; cursor: pointer;"></i>
                     </router-link>
                     <button @click="deleteParking(parking.id)" class="button_tash">
                         <i class="fas fa-trash" style="margin-left: 10px; color: red;"></i>
                     </button>
                 </td>
             </tr>
             </tbody>
         </table>

         <!-- Pagination -->
         <pagination :data="parkings" @pagination-change-page="getParkings"/>
         <!-- Pagination End -->
     </div>
</template>

<script>

export default {
    name: "Index",
    data() {
        return {
            parkings: {},
            loading: false,
            error: false,
        }
    },
    mounted() {

        this.getParkings();
    },
    methods: {

        getParkings(page = 1) {

            axios.get('/api/v1/parkings?page=' + page)
                 .then(response => {
                    console.log(response.data);
                    this.parkings = response.data;
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
        deleteParking(id) {

            if(confirm('Вы действительно хотите удалить запись : ' + id + ' ?')) {

                axios.post('/api/v1/parkings/' + id, {
                    _method: 'DELETE'
                })
                .then(response => {
                    this.parkings = [];
                    console.log('запись успешна удалена!')
                    this.getParkings();
                })
            }
        }
    }
}
</script>

<style scoped>

.button_tash {
    border: none;
    text-align: center;
    background-color: transparent;
}

</style>
