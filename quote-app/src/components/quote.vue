<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>{{qt.content}}</h4>
        </div>
        <div class="panel-footer">
            <div v-if="this.editing">
                <input @keyup="content = $event.target.value" type="text" :value="this.qt.content">
                <a href="#" @click="onUpdateClicked">Save</a>
                <a href="#" @click="onCancelClicked">Cancel</a>
            </div>
            <div v-if="!this.editing">
                <a href="#" @click="onEditClicked">Edit</a>
                <a href="#" @click="onDeleteClicked">Delete</a>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios"
export default {
    props:['qt'],
    data(){
        return{
            content:'',
            editing:false,
            editValue:this.qt.content
        }
    },
    methods:{
        onEditClicked(){
            this.editing = true,
            this.editValue = this.qt.content
        },
        onCancelClicked(){
            this.editing = false
        },
        onDeleteClicked(){
            this.$emit('quoteDeleted',this.qt.id)
            axios.delete('http://127.0.0.1:8000/api/quote/'+this.qt.id)
            .then(
                (response) => {alert(response.data.message);
                //this.$emit('quoteDeleted',this.qt.id);
                }
            )
            .catch(
                (error) => console.log(error)
            )
        },
        onUpdateClicked(){
             this.editing = false
            //this.$emit('quoteUpdated',this.qt.id,this.content)
            axios.put('http://127.0.0.1:8000/api/quote/'+this.qt.id,{content:this.content})
    .then(
      (response) => this.quotes = response.data
     
    )
    .catch(
      (error)=> console.error(error)
    );
           
        }
    }
}
</script>