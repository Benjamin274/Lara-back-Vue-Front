<template>
  <form id="form" @submit.prevent="onSubmitted">
  <div class="form-group">
    <label for="content">Quote</label>
    <textarea class="form-control" id="content" cols="20" rows="5" v-model="quoteContent"></textarea>
  </div>
  <button class="btn btn-secondary" type="submit">Publish</button>
  </form>
</template>

<script>
import axios from 'axios'
export default {
  name: 'new-quote',
  data () {
    return {
      quoteContent:''
    }
  },
  methods:{
    onSubmitted(){
      console.log("Form Submited")
      axios.post('http://127.0.0.1:8000/api/quote',
      {
        content:this.quoteContent
      }
      ).then(
        (response)=>alert(response.data.content)
      )
      .catch(
        (error)=>console.log(error)
      )
    }
  }
}
</script>

<style>
#form {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin: 60px;
  background-color: cadetblue;
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
