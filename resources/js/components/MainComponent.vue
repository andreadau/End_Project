<template>

   <main id="main_content_guest">
        <!-- JUMBOTRON -->
        <section class="main_jumbotron">
           <!-- img background -->
            <div class="image_main_left">
                <img src="../../../public/img/download-4_1.svg" alt="">
            </div>
            <!-- title -->
            <div class="text_jumbotron">
                <h1 class="slide-in-top">I piatti che ami, <br> a casa tua.</h1>
                <div class="icons slide-in-top">
                    <span class="icon">
                        <i class="fas fa-pizza-slice fa-lg"></i>
                    </span>
                    <span class="icon">
                        <i class="fas fa-hamburger fa-lg"></i>
                    </span>
                    <span class="icon">
                        <i class="fas fa-beer fa-lg"></i>
                    </span>
                </div>
                <div class="button_main">
                    <span class="search_btn">
                        <router-link :to="{ name: 'search' }">Ordina adesso</router-link>
                    </span>
                </div>
            </div>
            <!-- img background -->
            <div class="image_main_right">
                <img src="../../../public/img/download-3.svg" alt="">
            </div>
        </section>
        <!-- /JUMBOTRON -->
        
        <!-- POST -->
        <section class="posts">
            <div class=" card_posts  d_flex_column center_column col-sm-12 col-md-12 col-lg-4">
                <img src="../../../public/img/download-9.svg" alt="">
                <p>Offri da mangiare a tuoi dipendenti</p>
                <a href="#">Registrati per consegnare</a>
            </div>

            <div class="card_posts d_flex_column center_column col-sm-12 col-md-12 col-lg-4">
                <img src="../../../public/img/download-11.svg" alt="">
                <p>Il tuo ristorante, a domicilio</p>
                <a href="#">Registrati per consegnare</a>
            </div>
            
            <div class="card_posts d_flex_column center_column col-sm-12 col-md-12 col-lg-4">
                <img src="../../../public/img/download-10.svg" alt="">
                <p>Consegna con DeliveBoo</p>
                <a href="#">Registrati per consegnare</a>
            </div>
        </section>
        <!-- /POST -->

        <!-- CHI SIAMO -->
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
        <!-- /CHI SIAMO -->
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