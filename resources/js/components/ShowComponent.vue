<template>
 
    <div>
        {{ restaurant.id }}
        {{ restaurant.name }}
    </div>

</template>

<script>
    export default {
        data(){
            return {
                id:this.$route.params.id,
                restaurant: ""
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
        axios.get('/api/restaurants/' + this.id)
            .then(response => {
                this.restaurant = response.data;
                console.log(this.restaurant);
            }).catch(error => {
                console.log(error); 
            });
        }
    }
</script>