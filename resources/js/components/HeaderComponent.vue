<template>

    <div>

        <navbar-component></navbar-component>

        <header>
            <div>
                <div class="container_header d_flex center">
                    <h1 class="slide-in-top">I piatti che ami, a domicilio.</h1>
                    <span class="">
                        <i class="fas fa-pizza-slice slide-in-top"></i>
                        <i class="fas fa-hamburger slide-in-top"></i>
                        <i class="fas fa-beer slide-in-top"></i>
                        <a>
                            <router-link :to="{ name: 'header' }">Home</router-link> |
                        </a>
                        <a>
                            <router-link :to="{ name: 'search' }">Hello World</router-link>
                        </a>
                    </span>
                </div>  
            </div>
        </header>

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