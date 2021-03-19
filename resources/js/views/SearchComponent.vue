<template>

    <div>
        <div>
            <a>
                <router-link :to="{ name: 'header' }">Home</router-link> |
            </a>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>