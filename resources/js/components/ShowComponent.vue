<template>
 
    <div>
        <header id="header_show">
            <navbarsearch-component></navbarsearch-component>
        </header>

        <main id="main_show">

            <section class="banner_show">
                <div class="show_img_restaurant">
                    <img :src="'http://localhost:8888/storage/app/public/' + restaurant.cover " alt="">
                    <div class="title_show">
                        <h1>{{ restaurant.name }}</h1>
                    </div>
                </div>
            </section>

            <section class="show_restaurant">
                <!-- info ristorante -->
                <div class="info_restaurant">
                    <div class="types_restaurant">
                        <span  v-for="type in  restaurant.types" class="name"> {{ type.name }} <span class="divisore">&bull;</span> </span>
                    </div>
                    <div class="address_restaurant">
                        <span> {{ restaurant.address }} </span> <span> {{ restaurant.city }} </span>
                    </div>
                </div>
                <!-- /info ristorante -->
                
                <div class="dishes_carello">
                    <!-- piatti -->
                    <div class="dishes col-lg-10">
                        <div class="dish_container col-lg-4" v-for="(dish, index) in restaurant.dishes">
                            <div class="dish">
                                <div class="info_add_dish">
                                    <div class="info_dish">
                                        <div class="name">{{ dish.name }}</div>
                                        <div>{{ dish.ingredients }}</div>
                                        <div>{{ dish.price }} &euro;</div>
                                    </div>
                                    <div class="dish_quantity">
                                        <div class="quantity">
                                            <!-- <button @click="removeCart(index)">-</button>
                                            <div>{{ dish.quantity }}</div>
                                            <button @click="addCart(index)">+</button> -->

                                            <button @click="addCart(index)">add</button>

                                        </div>
                                        <!-- <button @click="addCart(index)">add</button> -->
                                    </div>
                                
                                </div>
                                <div class="img_dish">
                                    <img :src="'http://localhost:8888/storage/app/public/' + dish.cover " alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /piatti -->
                    <!-- carrello -->
                    <aside class="col-lg-2">
                        <div id="carrello_container">
                            <div class="carello">
                                <div class="carello_order" v-for="(dish, index) in cart">
                                    <div class="dishes_order">
                                        <div class="dish_name"> {{dish.name}} <span>({{dish.quantity}})</span></div>
                                        <div class="dish_price"> {{dish.price}} &euro;</div>
                                    </div>
                                    <div class="btn_remouve">
                                        <button @click="removeCart(index)">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="total_order">
                                <div  v-if="totalPrice > 0" >
                                    <div class="total">TOTALE : {{totalPrice}} &euro;</div>
                                    <button>Pagamento</button>
                                </div>
                                <div v-else>Il carrello è vuoto</div>
                            </div>
                        </div>
                    </aside>
                    <!-- /carrello -->
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
                id:this.$route.params.id,
                restaurant: "",
                totalPrice: 0,
                cart: [],
            }
        },
        methods: {
            addCart(index) {
                let counter = 1;
                for (let i = 0; i < this.cart.length; i++) {
                    
                    if(this.restaurant.dishes[index].id == this.cart[i].id){
                        counter++
                    } 
                    this.restaurant.dishes[index].quantity = counter;
                }
                this.cart.push({
                    id : this.restaurant.dishes[index].id,
                    name: this.restaurant.dishes[index].name,
                    ingredients: this.restaurant.dishes[index].ingredients,
                    price: this.restaurant.dishes[index].price,
                    quantity: counter
                });
                localStorage.setItem('cart', JSON.stringify(this.cart));
            },
            removeCart(index) {
                let cart = this.cart;
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(this.cart));
                console.log(cart);
            }
        },
        updated() {
            let cart = this.cart;
            let totalPrice = 0;
            cart.forEach(element => {
                totalPrice += element.price;
            });
            this.totalPrice = totalPrice;
            // console.log(this.totalPrice);
        },
        mounted() {
            console.log('Component mounted.');
            this.cart = JSON.parse(localStorage.getItem("cart")) || [];
            console.log(localStorage);
        },
        created(){
            axios.get('/api/restaurants/' + this.id)
            .then(response => {
                this.restaurant = response.data;
                console.log(this.restaurant);
            }).catch(error => {
                console.log(error); 
            });
        },
        
    }
</script>

<style>
    .visible {
        visibility: 1;
    }
    .notvisible {
        visibility: 0;
    }
    .font{
        font-size: 5em;
    }
</style>