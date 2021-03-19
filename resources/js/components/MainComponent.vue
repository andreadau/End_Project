<template>

    <main>
        
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