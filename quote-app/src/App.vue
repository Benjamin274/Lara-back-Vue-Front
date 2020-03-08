<template>
 <div class="container">
   <div class="row">
     <div class="col-12">
       <router-link to="/">Quotes</router-link> |
       <router-link to="/quoteList">New Quote</router-link> |
       <router-link to="/signup">Sign Up</router-link> 
     </div>
     <div class="col-12">
      <router-view></router-view>
     </div>
   </div>
 </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {}
  }
  
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  padding: 100,auto;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
