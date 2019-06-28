<template>
<div class="container">
    <div class="former">

        <span style="display:none;" v-once>{{ pname=array.pname }}
        {{ pdes=array.des }}
        {{ category=array.category }}</span>

        <form autocomplete="off" method="POST" action="/editchecker" v-on:submit="checker" enctype="multipart/form-data">
      <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" placeholder="Product Name" name="pname" v-model="array.pname" >
        <small style="color:red;" v-if="pnameFlag">Product name cannot be empty</small>
      </div>
      <div class="form-group">
        <label>Product Description</label>
         <textarea rows="5" cols="12" class="form-control" style="resize: none;" placeholder="Product Description" name="pdes" v-model="array.pdes" > </textarea>
         <small style="color:red;" v-if="pdesFlag">Product description cannot be empty</small> 
      </div>

        <div class="form-group">
          <label>Category</label>
          <input type="text" class="form-control" placeholder="Category" name="category" v-model="array.category" >
          <small style="color:red;" v-if="categoryFlag">Product Category cannot be empty</small> 
        </div>

        <label>Sub Category</label>
        <span style="display:none;" v-once>{{ temp=array.sub.split('/') }}</span>
            <div class="form-group" v-for="(t,k) in temp.slice(1)" :key="k+10" v-once>
                <span style="display:none;" v-once>{{ inputs[k]=t }}</span>
            </div >

        <div class="form-group" v-for="(input,k) in inputs" :key="k+20">
            <input type="text" :name="k" class="form-control" v-model="inputs[k]" >
            <span>
                <span class="glyphicon glyphicon-remove spacer btn" v-on:click="remove(k)" v-show="k || ( !k && inputs.length > 1)" >Remove</span>
                <span class="glyphicon glyphicon glyphicon-ok spacer btn" v-on:click="add(k)"  v-show="k == inputs.length-1" >Add</span>
            </span>
        </div>

        <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" placeholder="Amount of stock present." name="stock" v-model="array.stock" >
        </div>

        <div class="form-group">
        <div v-if="array.available == 1">
            <label>Available</label>
        <input type="checkbox" name="available" checked>
        </div>
        <div v-else>
            <label>Available</label>
        <input type="checkbox" name="available" unchecked>
        </div>

        </div>


         <div class="form-group">
        <label class="marg">Product Picture</label>
        <input name="image" class="btn dpBtn" type="file" >
        </div>

        <input type="hidden" name="_token" :value="csrfToken">
        <input type="submit" name="submit"  class="btn btn-success bot-margin" value="Submit">

         <input type="submit" name="delete"  class="btn btn-danger bot-margin" style="margin-left:80%;" value="Delete">
    </form>
    </div>
</div>
</template>

<script>

    export default {

        mounted() {
            console.log('Component mounted.');
        },

        data() {

            return {
              csrfToken: null,
              inputs: [
              ],

            pnameFlag:0,
            pdesFlag:0,
            categoryFlag:0,
            pname:"",
            pdes:"",
            category:"",
            error:0,
            buffer:0
            };

        },

        props: ['array'],

         created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
        },

        methods: {
        add(index) {
            this.inputs.push('');
        },
        remove(index) {
            // this.inputs[index]='';
            // console.log(this.inputs[index]);
            this.inputs.splice(index,1);
        },

        checker(event) {
               this.error=0;

                
               if(this.pname == ""){
                 this.pnameFlag=1;
                 this.error=1;
               } else {
                 this.pnameFlag=0;
               }

               if(this.pdes == ""){
                 this.pdesFlag=1;
                 this.error=1;
               } else {
                 this.pdesFlag=0;
               }

               if(this.category == ""){
                 this.categoryFlag=1;
                 this.error=1;
               } else {
                  this.categoryFlag=0;
               }

            
              if(this.error == 1){
                 event.preventDefault();
               } else {
                 this.error=0;
               }
                
        },
    }
    }

</script>

