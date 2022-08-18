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
             <tr v-for="parking in parkings">
                 <th scope="row">{{ parking.id }}</th>
                 <td>{{ parking.city }}</td>
                 <td>{{ parking.address_parking }}</td>
                 <td>
                     <router-link to="">
                         <i class="fas fa-pencil-alt" style="font-size: 15px; cursor: pointer;"></i>
                     </router-link>
                     <router-link to="">
                         <i class="fas fa-trash" style="margin-left: 10px;"></i>
                     </router-link>
                 </td>
             </tr>
             </tbody>
         </table>
     </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            parkings: [],
            loading: false,
            error: false,
        }
    },
    mounted() {

        this.getParkings();
    },
    methods: {

        getParkings() {

            axios.get('/api/v1/parkings')
                .then(response => {
                    // console.log(response.data.data);
                    this.parkings = response.data.data;
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
        }
    }
}
</script>

<style scoped>

</style>
