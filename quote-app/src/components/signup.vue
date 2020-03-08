<template>
 <div id="container">
     <div class="row">
         <div class="col-3"></div>
         <div class="col-6">
             <form class="form-group">
                 <label for="name">Name</label>
               <input v-model="name" type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
               <!-- <small id="helpId" class="text-muted">Help text</small> -->
                <label for="email">Email</label>
               <input v-model="email" type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <label for="pass">Password</label>
               <input v-model="password" type="text" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <br><button type="submit" class="btn btn-primary" @click.prevent="signup">Submit</button>
             </form>
         </div>
         <div class="col-3"></div>
     </div>
 </div>
 </template>

<script>
import axios from 'axios'

export default{
    data(){
        return {
            name:'',
            email:'',
            password:''
        }
    },
    methods:{
        signup(){
            axios.post('http://127.0.0.1:8000/api/user',
            {
                name:this.name,
                email:this.email,
                password:this.password
            })
            .then(
                (response) => console.log(response)
            )
            .catch(
                (error) => console.log(error)
            )
        }
    }
}
</script>

<style>
#container{
    background-color: wheat;
    text-align: center;
}
</style>
