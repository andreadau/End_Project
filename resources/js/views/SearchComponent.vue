<template>

    <div>
        <navbarsearch-component></navbarsearch-component>

        <div v-for="(type,index) in types" >
            <div @click="getType(index)">   
                <img :src="type.src" alt="">
                <p>{{type.name}}</p>
            </div>
        </div>

        <div v-for="(restaurant,index) in restaurants">
            <div v-for="(typed,index) in restaurant.types">
                <div v-if="typed.id == type">
                    <p>{{restaurant.name}}</p>
                    <p>{{restaurant.address}}</p>
                    <p>{{typed.id}}</p>     
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        data(){
            return {
                types: "",
                restaurants: "",
                type: "",
            } 
        },
        methods: {
            getType(index){
                this.type = index;
                console.log(this.type);
            }
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
                    let typeu = ""
                    typeu.push(this.restaurants)
                    console.log(total);
                console.log(this.restaurants);
            }).catch(error => {
                console.log(error);
            });
        },
    }
</script>