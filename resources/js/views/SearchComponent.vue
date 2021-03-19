<template>

    <div>
            <navbarsearch-component></navbarsearch-component>
            <div v-for="(type,index) in types" >
                <img :src="type.src" alt="">
                <p>{{type.name}}</p>
            </div>
            <!-- <div v-for="(restaurant,index) in restaurants">
                <p>{{restaurant.name}}</p>
                <p>{{restaurant.address}}</p>
            </div> -->
    </div>

</template>

<script>
    export default {
        data(){
            return {
                types: "",
                restaurants: ""
            } 
        },
        methods: {
        },
        mounted() {
            // Article Api Call
            axios.get('api/types').then(response => {
                this.types = response.data.data;
                console.log(this.types);
            }).catch(error => {
                console.log(error);
            });
            axios.get('api/restaurants').then(response => {
                this.restaurants = response.data.data;
                console.log(this.restaurants);
            }).catch(error => {
                console.log(error);
            });
        },
    }
</script>