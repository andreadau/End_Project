<template>

    <footer class="bg_dark">
        <div class="container_footer">
            <!-- logo_app -->
            <div class="logo_app_footer col-sm-12 col-md-12 col-lg-5">
                <div class="logo">
                    <img src="../../../public/img/giphy.gif" alt="logo"> 
                    <h2>Delive<span>Boo</span></h2>
                </div>

                <div class="apps_container">
                    <h4>Porta DeliveBoo con te</h4>
                    <div class="apps">
                        <div class="app">
                            <a href="#"> <img src="../../../public/img/app_store.png" alt=""> </a>
                        </div>
                        <div class="app">
                            <a href="#"> <img src="../../../public/img/google_play.svg" alt=""> </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /logo_app -->
            <!-- info -->
            <div class="info_footer col-sm-12 col-md-12 col-lg-7">
                <div class="col_card col-sm-6 col-md-6 col-lg-4">
                    <div class="card_footer">
                        <h4>Scopri DeliveBoo</h4>
                        <ul>
                            <li> <a href="#">Investitori</a> </li>
                            <li> <a href="#">Pressroom</a> </li>
                            <li> <a href="#">Il nostro blog</a> </li>
                            <li> <a href="#">Programmazione</a> </li>
                            <li> <a href="#">Design</a> </li>
                            <li> <a href="#">Lavora con noi</a> </li>
                            <li> <a href="#">Diventa nostro partner</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col_card col-sm-6 col-md-6 col-lg-3">
                    <div class="card_footer">
                        <h4>Note legali</h4>
                        <ul>
                            <li> <a href="#">Termini & COndizioni</a> </li>
                            <li> <a href="#">Informativa sulla privacy</a> </li>
                            <li> <a href="#">Cookies</a> </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="col_card col-sm-6 col-md-6 col-lg-3">
                    <div class="card_footer">
                        <h4>Aiuto</h4>
                        <ul>
                            <li> <a href="#">Contatti</a> </li>
                            <li> <a href="#">FAQ</a> </li>
                            <li> <a href="#">Tipi di cucina</a> </li>
                            <li> <a href="#">Mappa del sito</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /info -->
        </div>

        <!-- copiryght -->
        <div class="bottom_footer d_flex space_between">
            <div class="d_flex">
                <ul><a href="#"><i class="fab fa-facebook"></i></a></ul>
                <ul><a href="#"><i class="fab fa-twitter"></i></a></ul>
                <ul><a href="#"><i class="fab fa-instagram"></i></a></ul>
            </div>
            <div class="copyright">
                @ 2021 DeliveBoo
            </div>
        </div>
    </footer>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>