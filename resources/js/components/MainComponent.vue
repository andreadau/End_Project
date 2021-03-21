<template>

   <main id="main_content">
       <div class="posts d_flex space_around">
            <div class="card_posts d_flex_column center_column">
                <img src="../../../public/img/download-9.svg" alt="">
                <p>Offri da mangiare a tuoi dipendenti</p>
                <a href="#">Registrati per consegnare</a>
            </div>

            <div class="card_posts d_flex_column center_column">
                <img src="../../../public/img/download-11.svg" alt="">
                <p>Il tuo ristorante, a domicilio</p>
                <a href="#">Registrati per consegnare</a>
            </div>
            
            <div class="card_posts d_flex_column center_column">
                <img src="../../../public/img/download-10.svg" alt="">
                <p>Consegna con DeliveBoo</p>
                <a href="#">Registrati per consegnare</a>
            </div>
        </div>
        <!-- <div class="chi_siamo d_flex_column center_column space_between">

            <h1>CHI SIAMO</h1>

            <div class="d_flex space_between">
                <div class="card_author d_flex_column center_column">
                    <div class="img_author">
                        <img src="../../../public/img/giphy.gif" alt="">
                    </div>
                    <h3>Nome</h3>
                </div>
                <div class="card_author d_flex_column center_column">
                    <h3>Nome</h3>
                    <div class="img_author">
                        <img src="../../../public/img/giphy.gif" alt="">
                    </div>
                </div>
                <div class="card_author d_flex_column center_column">
                    <div class="img_author">
                        <img src="../../../public/img/giphy.gif" alt="">
                    </div>
                    <h3>Nome</h3>
                </div>
                <div class="card_author d_flex_column center_column">
                    <h3>Nome</h3>
                    <div class="img_author">
                        <img src="../../../public/img/giphy.gif" alt="">
                    </div>
                </div>
                <div class="card_author d_flex_column center_column">
                    <div class="img_author">
                        <img src="../../../public/img/giphy.gif" alt="">
                    </div>
                    <h3>Nome</h3>
                </div>
            </div>

        </div> -->
    </main>

</template>

<script>
   export default {
        data(){
            return {
                restaurant: { type: Object, default: () => ({}) }
            } 
        },
        mounted() {
            // Article Api Call
            axios.get('api/restaurants').then(response => {
                this.restaurants = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        }
        
    }
</script>