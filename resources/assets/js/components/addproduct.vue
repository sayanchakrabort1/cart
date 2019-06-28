<template>
<div class="container">
    <h3 class="common">In this section, you can add your product to be listed at our site.</h3>

    <h5 class="common">Few simple steps and you will be done.</h5>

    <div class="former">
        <form autocomplete="off" method="POST" action="/addprod" v-on:submit="checker" enctype="multipart/form-data">
      <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" placeholder="Product Name" name="pname" v-model="pname" >
        <small style="color:red;" v-if="pnameFlag">Product name cannot be empty</small>
      </div>
      <div class="form-group">
        <label>Product Description</label>
         <textarea rows="5" cols="12" class="form-control" style="resize: none;" placeholder="Product Description" name="pdes" v-model="pdes" > </textarea>
         <small style="color:red;" v-if="pdesFlag">Product description cannot be empty</small> 
      </div>

        <div class="form-group">
          <label>Category</label>
          <input type="text" class="form-control" placeholder="Category" name="category" v-model="category" >
          <small style="color:red;" v-if="categoryFlag">Product Category cannot be empty</small> 
        </div>

        <label>Sub Category</label>
        <div class="form-group" v-for="(input,k) in inputs" :key="k">
            <input type="text" :name="k" class="form-control" v-model="input.name" >
            <span>
              <span class="glyphicon glyphicon glyphicon-ok spacer btn " @click="add(k)" v-show="k == inputs.length-1">Add</span>
              <span class="glyphicon glyphicon-remove spacer btn " @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">Remove</span>  
            </span>
        </div>

         <div class="form-group">
        <label class="marg">Product Picture</label>
        <input name="image" class="btn btn-primary dpBtn" type="file" >
        </div>

        <input type="hidden" name="_token" :value="csrfToken">
      <button type="submit"  class="btn btn-success bot-margin">Submit</button>
    </form>
    </div>
</div>
</template>

<script>

    export default {

        mounted() {
            console.log('Component mounted.')
        },

        data() {

            return {
              csrfToken: null,
              inputs: [
            {
                name: ''
            }
            ],

            pnameFlag:0,
            pdesFlag:0,
            categoryFlag:0,
            pname:"",
            pdes:"",
            category:"",
            error:0,
            };

        },

         created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
        },

        methods: {
        add(index) {
            this.inputs.push({ name: '' });
        },
        remove(index) {
            this.inputs.splice(index, 1);
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

<!-- {{ temp=array.sub.split('/') }}
        {{ temp[1] }}
        <div class="form-group" v-for="(input,k) in inputs" :key="k">
             <div class="form-group" v-for="(i,v) in temp" :key="v">
                {{ input.name= temp[v+1] }}
            </div>
        </div> -->