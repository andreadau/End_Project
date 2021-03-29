<template>
 
    <div>
        <header id="header_show">
            <navbarsearch-component></navbarsearch-component>
        </header>

        <main id="main_show">
            <!-- BANNER COVER RESTAURANT -->
            <section class="banner_show">
                <div class="show_img_restaurant">
                    <img :src="'http://localhost:8888/storage/app/public/' + restaurant.cover " alt="">
                    <div class="title_show">
                        <h1>{{ restaurant.name }}</h1>
                    </div>
                </div>
            </section>
            <!-- INFO RESTAURANT -->
            <section class="show_restaurant col-lg-12">
                <!-- info_restaurant -->
                <div class="info_restaurant">
                    <div class="types_restaurant">
                        <span  v-for="type in  restaurant.types" class="name"> {{ type.name }} <span class="divisore">&bull;</span> </span>
                    </div>
                    <div class="address_restaurant">
                        <span> {{ restaurant.address }} </span> <span> {{ restaurant.city }} </span>
                    </div>
                </div>
                <!-- /info_restaurant -->
                <!-- dishes_carello -->
                <div class="dishes_carello" v-if="active == true">
                    <!-- piatti -->
                    <div class="dishes col-sm-12 col-md-9 col-lg-9">
                        <div class="dish_container col-sm-12 col-md-12 col-lg-6" v-for="(dish, index) in restaurant.dishes">
                            <div class="dish" @click="addCart(index)" >
                                <div class="info_add_dish" >
                                    <div class="info_dish">
                                        <div class="name">{{ dish.name }}</div>
                                        <div>{{ dish.ingredients }}</div>
                                        <div>{{ dish.price }} &euro;</div>
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
                    <aside class="col-sm-12 col-md-3 col-lg-3">
                        <div id="carrello_container">
                            <div class="carello">
                                <div class="carello_order" v-for="(dish, index) in cart">
                                    <div class="dishes_order">
                                        <div class="dish_name"> {{dish.name}}</div>
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
                                    <button @click="active = false">Pagamento</button>
                                </div>
                                <div v-else>Il carrello è vuoto</div>
                            </div>
                        </div>
                    </aside>
                    <!-- /carrello -->
                </div>
                <!-- /dishes_carello -->
            </section>
            <!-- ORDER -->
            <section class="order"  v-if="active == false">
                <!-- bottone_indietro  -->
                <div class="col-sm-12 col-md-12 col-lg-12 bottone_indietro">
                    <button @click="active = true">Torna Indietro</button>
                </div>
                <!-- /bottone_indietro  -->
                <!-- form -->
                <div class="col-sm-12 col-md-6 col-lg-5">
                    <div class="form">
                        <form @submit.prevent="orderCreate()" action="/payment" method="post" target="_blank">
                            <!-- <div class="row_order_price">
                                <div id="totla_price_order">Price: </div>
                                <div name="total_price">{{totalPrice}}&euro;</div>
                            </div> -->
    
                            <div class="row_order">
                                <label for="">Name*</label>
                                <input required  type="text" name="customer_name" v-model="customer_name">
                            </div>
    
                            <div class="row_order"> 
                                <label for="">Surname*</label>
                                <input required  type="text" name="customer_surname" v-model="customer_surname">
                            </div>

                            <div class="row_order"> 
                                <label for="">Email*</label>
                                <input required  type="email" name="customer_email" v-model="customer_email">
                            </div>
                            
                            <div class="row_order">
                                <label for="">Phone*</label>
                                <input required  type="text" name="customer_phone" v-model="customer_phone">
                            </div>
    
                            <div class="row_order">
                                <label for="">City*</label>
                                <input required  type="text" name="customer_city" v-model="customer_city">
                            </div>
    
                            <div class="row_order">
                                <label for="">Address*</label>
                                <input required  type="text" name="customer_address" v-model="customer_address">
                            </div>
    
                            <div class="row_order">
                                <label for="">CAP*</label>
                                <input required  type="text" name="customer_CAP" v-model="customer_CAP">
                            </div>
            
                            <button type="submit" value="Submit">Vai al pagamento</button>
                        </form>
                    </div>
                </div>
                <!-- /form -->
                <!-- riepilogo_carrello -->
                <div class="riepilogo_carrello col-sm-12 col-md-6 col-lg-7">
                    <div id="riepilogo">
                        <div class="riepilogo_container"> 
                            <div v-for="(dish, index) in cart" class="riepilogo_ordine">
                                <img class="dish_img" :src="'http://localhost:8888/storage/app/public/' + dish.cover " alt="">
                                <div class="dish_name">
                                    <h5>{{dish.name}}</h5>
                                    <p>{{dish.ingredients}}</p>
                                </div>
                                <div class="dish_price"> {{dish.price}} &euro;</div>
                            </div>
                            <div class="totale_ordine">
                                <div class="total">TOTALE </div>
                                <div class="total_price">{{totalPrice}} &euro;</div>
                            </div>
                        </div>
                    </div>
                    <!-- /riepilogo_carrello -->

                    <!-- <div id="button_payment">
                        <button type="submit">Vai al pagamento</button>
                    </div> -->
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
                price: "",
                customer_name: "",
                customer_surname: "",
                customer_phone: "",
                customer_city: "",
                customer_address: "",
                customer_CAP: "",
                active: true,
                customer_email: "" 
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
                    cover: this.restaurant.dishes[index].cover,
                    ingredients: this.restaurant.dishes[index].ingredients,
                    price: this.restaurant.dishes[index].price,
                    quantity: counter
                });
                localStorage.setItem('cart', JSON.stringify(this.cart));
            },      
            removeCart(index) {
                this.cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(this.cart));
            },
            orderCreate(){
                axios.post('/api/orders',{
                    total_price: this.totalPrice,
                    customer_name: this.customer_name,
                    customer_surname: this.customer_surname,
                    customer_phone: this.customer_phone,
                    customer_city: this.customer_city,
                    customer_address: this.customer_address,
                    customer_CAP: this.customer_CAP,
                    customer_email: this.customer_email
                })
                .then(response => {
                    console.log('Form inviato correttamente');
                    location.replace("http://127.0.0.1:8000/payment");
                }).catch(error => {
                    console.log(error); 
                });
            },
        },
        updated() {
            let totalPrice = 0;
            this.cart.forEach(element => {
            totalPrice += element.price;
            });
            this.totalPrice = totalPrice;
            localStorage.setItem('totalPrice', JSON.stringify(this.totalPrice));
            function setCookie(name,value,days) {
            var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            }
            setCookie('cart', JSON.stringify(this.cart), 7);
            setCookie('totalPrice', this.totalPrice, 7);
            setCookie('email', this.customer_email, 7);
            setCookie('name', this.customer_name, 7);
        },
        mounted() {
            this.cart = JSON.parse(localStorage.getItem("cart")) || [];
            console.log(localStorage);
        },
        beforeDestroy () {
            localStorage.removeItem('cart');
            localStorage.removeItem('totalPrice');
        },
        created(){
            axios.get('/api/restaurants/' + this.id)
            .then(response => {
                this.restaurant = response.data;
                // console.log(this.restaurant);
            }).catch(error => {
                console.log(error); 
            });
            function setCookie(name,value,days) {
            var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            }
        },
    }
</script>
