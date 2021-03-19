<template>

    <div>
        <header id="site_header">
            <nav>
                <div class="container_nav">
                    <div class="logo">
                        <img src="../../../public/img/giphy.gif" alt="logo"> 
                        <h2>Delive<span>Boo</span></h2>
                    </div>
                        
                    <div class="nav_link">
                        <a href="/login"> Ristoranti </a>
                        <a href="/register"> Registrati </a>
                    </div>
                </div>
            </nav>

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