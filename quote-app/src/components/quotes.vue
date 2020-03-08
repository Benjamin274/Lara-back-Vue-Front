<template>
 <div class="container">
   <div class="row">
     <div class="col-4"></div>
     <div class="col-4">
    <button class="btn btn-primary" @click="onListAll">List Quotes</button>
     </div> <div class="col-4"></div>
     <div class="row">
       <div class="col-12">
         <app-quote v-for="quote in this.quotes" v-bind:qt="quote" @quoteUpdated ="onQuoteUpdated" @quoteDeleted="onQuoteDeleted($event)"></app-quote>
       </div>
     </div>
   </div>
 </div>
 </template>

<script>
import Quote from './quote'
import axios from 'axios'
export default {
  data(){
    return{
      quotes:[]
    }
  },
  methods:{
onListAll(){
    axios.get('http://127.0.0.1:8000/api/quotes')
    .then(
      (response) => this.quotes = response.data
     
    )
    .catch(
      (error)=> console.error(error)
    );
},
onQuoteDeleted(id){
  const position = this.quotes.findIndex((element)=>{
    return element.id = id
  })
this.quotes.splice(position,1)  
},
onQuoteUpdated(id,content){
   let p = this.quotes.findIndex((element)=>{
    return element.id = id
  });
  this.quotes= []
  this.onListAll()
}
  },
  components:{
    'app-quote':Quote
  }

}
</script>

<style>
  .container{
  background-color: bisque;
  padding: 10px;
  }
</style>
