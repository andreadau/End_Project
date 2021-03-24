<template>
 
    <div>
        RISTORANTE
        <br>
        {{ restaurant.name }}
        <br>
        <br>

        PIATTI
        <div v-for="(dish, index) in restaurant.dishes">
            {{ dish.name }}
            {{ dish.ingredients }}
            {{ dish.price }}
            <button @click="addCart(index)">+</button>
        </div>
        <br>
        <br>
        CARRELLO 
        <div v-for="(dish, index) in cart">
            {{dish.name}}
            {{dish.price}}
            <button @click="removeCart(index)">-</button>
        </div>
        <br>
        <div>
            TOTALE : 
            {{totalPrice}}
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                id:this.$route.params.id,
                restaurant: "",
                totalPrice: 0,
                cart: []
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
                this.cart.push(this.restaurant.dishes[index]);
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
                // console.log(this.restaurant);
            }).catch(error => {
                console.log(error); 
            });
        }
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