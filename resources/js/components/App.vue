<template lang="">
    <div class="container">
        <h1>ESSE é o APP </h1>
        <router-view>
            
            
        </router-view>
    </div>
</template>

<script>
export default {
    mounted(){
        console.log("Component mounted");   
    }
}
</script>