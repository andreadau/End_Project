<template>
    <div>
        <header id="header_search">
            <navbarsearch-component></navbarsearch-component>
        </header>
        
        <main id="main_search">

            <section class="banner_search">
                <div class="overlay_img">
                    <div>
                        <h1 class="select_type">Seleziona una o più tipologie di cucina</h1>
                    </div>
                </div>
                <!-- <form @submit.prevent="getSearch()">
                    <input type="search" v-model="search" @keyup.enter="getSearch()" placeholder="Cerca una città">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form> -->
            </section>

            <section class="types_search">
                <div class="types_container">
                    <!-- <div v-for="(type,index) in types" :key="type.id"  class="type">
                        <div @click="getType(index) == 'type' "  class="type_btn">   
                            <img :src="type.src" alt="">
                            <p>{{type.name}}</p>
                        </div>
                    </div> -->

                    <div class="type"  v-for="type in types" :key="type.id" >
                        <div class="type_btn">
                            <label>
                                <input hidden type="checkbox" :id="'type' + type.id" :value="type.id" v-model="types_ids" >
                                <img :src="type.src" alt="immagini categorie" :class="{'active' : type.selected}" @click="$set(type, 'selected', !type.selected)">
                            </label>
                            <p>{{type.name}}</p>
                        </div>
                    </div>
                </div>
            </section>
               
            <section class="restaurant_search">
                
                <div class="no_restaurant col-sm-12 col-md-12 col-lg-12" v-if="noRestaurants">
                    <div>
                        <h3>Nessun ristorante ha tutte le tipologie selezionate</h3>
                        <p>Prova a deselezionare una o più tipologie</p>
                    </div>
                </div>
                
                <div class="restaurants">
                    <div v-for="restaurant in restaurants" :key="restaurant.id" class="restaurants_container col-sm-12 col-md-6 col-lg-4">
                        <div class="restaurant_card">
                            <div class="img_restaurant">
                                <img :src="'http://localhost:8888/storage/app/public/' + restaurant.cover " alt="">
                                <!-- PIER -->
                                <!-- <img :src="'http://localhost/End_Project/storage/app/public/' + restaurant.cover " alt=""> -->
                            </div>
                            <div class="text_restaurant">
                                <p class="name_restaurant">{{restaurant.name}}</p>
                                <p class="address_restaurant">{{restaurant.address}}</p>
                                <router-link v-bind:to="'/search/' + restaurant.id">Ordina qui</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer-component></footer-component>
    </div>

</template>
<script>
    export default {
        data(){
            return {
                types: "",
                type: "",
                search: "",
                restaurants: [],
                types_ids: [],
                selected: undefined,
            } 
        },
        watch :{
            types_ids: {
                handler(){
                    this.loadRestaurants();
                }
            }
        },
        computed: {
            noRestaurants() {
                return this.restaurants.length == 0;
            }
        },
        methods: {
            getType(index){
                this.type = index+1;
                console.log(this.type);
            },
            getSearch(index){
                this.search = index;
                console.log(this.search);
            },
            showRestaurant(){
                axios.get('api/restaurants/');
            },
            loadRestaurants() {
                axios.get('api/restaurants', { params: { types_ids: this.types_ids} }).then(response => {
                    this.restaurants = response.data.data
                }).catch(error => console.log(error))
            },
        },
        mounted() {
            // Article Api Call
            axios.get('api/types').then(response => {
                this.types = response.data.data;
                // console.log(this.types);
            }).catch(error => {
                console.log(error);
            });

            // axios.get('api/restaurants',).then(response => {
            //     this.restaurants = response.data.data;
            //     // console.log(this.restaurants);
            // }).catch(error => {
            //     console.log(error); 
            // });
            this.loadRestaurants();
        },
    }
</script>