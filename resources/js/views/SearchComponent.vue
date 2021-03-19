<template>

    <div>
        <div>
                <navbarsearch-component></navbarsearch-component>
            <div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                restaurants: { type: Object, default: () => ({}) }
            } 
        },
        methods: {
        },
        mounted() {
            // Article Api Call
            axios.get('api/restaurants').then(response => {
                this.restaurants = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        },
    }
</script>