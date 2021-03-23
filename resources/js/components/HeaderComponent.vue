<template>
    <div>
        
        <header id="site_header_guest">
            <navbar-component></navbar-component>
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