<template>
    <div>
        <navbarsearch-component></navbarsearch-component>

        <main id="main_search">

            <section class="banner_search">

            </section>

            <section class="types_search">
                <div class="types_container">
                    <div v-for="(type,index) in types" class="type">
                        <div @click="getType(index)" class="type_btn">   
                            <img :src="type.src" alt="">
                            <p>{{type.name}}</p>
                        </div>
                    </div>
                </div>
            </section>
               
            <section class="restaurant_search">
                <aside>
                    <h1>"Tipo di cucina"</h1>
                </aside>

                <div class="restaurants">
                    <div v-for="(restaurant,index) in restaurants" class="restaurants_container">
                        <div v-for="(typed,index) in restaurant.types" class="restaurant_card">
                            <div v-if="typed.id == type">
                                <div class="img_restaurant">
                                    <!-- Angela -->
                                    <img :src="'http://localhost:8888/progetto%20finale/End_Project/storage/app/public/' + restaurant.cover " alt="">
                                </div>
                                <div class="text_restaurant">
                                    <p class="name_restaurant">{{restaurant.name}}</p>
                                    <p class="address_restaurant">{{restaurant.address}}</p>
                                    <!-- <p>{{typed.id}}</p>  -->
                                    
                                    <!-- 'localhost/cartella/cartellaprogetto/storage/app/public/' + restaurant.cover  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>

        <!-- <footer-component></footer-component> -->
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
                this.type = index+1;
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