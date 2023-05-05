<template>
  
  <!-- <img alt="Vue jamb" src="./assets/jamb.jpg"> -->
  <naveview></naveview>
  <homeview></homeview>
  <aboutview></aboutview>
  <contactview></contactview>
  
</template>

<script>
import naveview from './components/naveview.vue'
import homeview from './components/homeview.vue'
import aboutview from './components/aboutview.vue'
import contactview from './components/contactview.vue'
export default {
   name: 'App',
  components: {
    naveview,
    homeview,
    aboutview,
    contactview
  }
}

</script>

<style>
    firstcomponent,
    classcomponent {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
