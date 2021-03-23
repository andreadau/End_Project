<template>
 
    <div>
        RISTORANTE
        {{ restaurant.id }}
        {{ restaurant.name }}

        PIATTI
        <div v-for="(dish, index) in restaurant.dishes">
            {{ dish.name }}
            {{ dish.ingredients }}
            {{ dish.price }}
            <button @click="addCart(index)">+</button>
        </div>
        
        CARRELLO 
        <div class="">   
            DIO CANE
        </div>
        <div v-for="(dish, index) in cart">
            {{dish.name}}
            {{dish.price}}
            <button @click="removeCart(index)">-</button>
        </div>
        {{totalPrice}}
    </div>

</template>

<script>
    export default {
        data(){
            return {
                id:this.$route.params.id,
                restaurant: "",
                totalPrice: 0,
                counter: 0,
                cart: []
            }
        },
        methods: {
            addCart(index) {
                let cart = this.cart;
                let counter = 1
                this.restaurant.dishes[index].counter = counter;
                cart.push(this.restaurant.dishes[index]);
                // console.log(cart);
                window.localStorage.setItem('cart', JSON.stringify(this.cart));
            },
            removeCart(index) {
                let cart = this.cart;
                // let dio = JSON.parse(localStorage.getItem("cart"));
                // console.log(dio);
                cart.splice(index, 1);
                window.localStorage.setItem('cart', JSON.stringify(this.cart));
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
            console.log(window.localStorage);
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
        font-size: 10em;
    }
</style>