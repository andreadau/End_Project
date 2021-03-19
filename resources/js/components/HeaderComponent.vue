<template>

    <div>
        <header id="site_header">
 
            <navbar-component></navbar-component>
            
            <div class="header_jumbotron">
                <div class="image_header_left">
                    <img src="../../../public/img/download-4_1.svg" alt="">
                </div>

                <div class="text_header">
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
                        <div class="button_header">
                            <span class="search_btn">
                                <router-link :to="{ name: 'search' }">Ordina adesso</router-link>
                            </span>
                        </div>
                    </div>
                    
                </div>

                <div class="image_header_right">
                    <img src="../../../public/img/download-3.svg" alt="">
                </div>
            </div>
        </header>

        <main-component></main-component>
        <footer-component></footer-component>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>