<template>
    <div>
        <header id="header_search">
            <navbarsearch-component></navbarsearch-component>
        </header>
        
        <main id="main_search">

            <section class="banner_search">
                <!-- <form @submit.prevent="getSearch()">
                    <input type="search" v-model="search" @keyup.enter="getSearch()" placeholder="Cerca una città">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form> -->
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
                    <div v-for="(restaurant) in restaurants" class="restaurants_container">
                        <div v-for="(typed) in restaurant.types" class="restaurant_card">
                            <div v-if="typed.id === type">
                                <div class="img_restaurant">
                                    <!-- MAMP -->
                                    <!-- 'localhost/cartella/cartellaprogetto/storage/app/public/' + restaurant.cover  -->
                                    <img :src="'http://localhost:8888/storage/app/public/' + restaurant.cover " alt="">
                                </div>
                                <div class="text_restaurant">
                                    <p class="name_restaurant">{{restaurant.name}}</p>
                                    <p class="address_restaurant">{{restaurant.address}}</p>
                                    <router-link v-bind:to="'/search/' + restaurant.id">AAAA</router-link>
                                    <!-- <p>{{typed.id}}</p>  -->
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
                search: "",
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
            axios.get('api/restaurants',).then(response => {
                this.restaurants = response.data.data;
                console.log(this.restaurants);
            }).catch(error => {
                console.log(error); 
            });
        },
    }
</script>