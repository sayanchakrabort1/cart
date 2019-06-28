<template>

<div class="container showTable" :style="'margin-top: ' + 12/size + '%;'">
    <table class="table table-bordered table-hover buffer">
        <thead>
            <tr>
                <th scope="col">Sr no.</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Sub-Category</th>
                <th scope="col">Stock</th>
                <th scope="col">Availablity</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
    <tbody>
        <tr v-for="(item,index) in paginatedData" v-bind:key="index" >
            <td>{{ Number(index) + Number(n) + Number(1)}}</td>
            <td>{{ item.pname }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.sub }}</td>
            <td v-if="item.stock"> <span style="color:green;">{{ item.stock }}</span> </td>
            <td v-else> <span style="color:red;"> NiL </span> </td>
            <td v-if="item.available == 1"> <span style="color:green;">Yes</span> </td>
            <td v-else> <span style="color:red;">NO</span> </td>
            <td><img class="img" :src="'images/' + item.image"></td> 
        </tr>
                <tr><td><button class="btn btn-info"
                  :disabled="pageNumber === 0" 
                  @click="prevPage">
                  Previous
              </button>
              <span class="pgNmbr">{{ pageNumber+1 }}</span>
              <button class="btn btn-info"
                  :disabled="pageNumber >= pageCount -1" 
                  @click="nextPage">
                  Next
              </button></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               <td>
                <div class="perPage"><small>
                <span>Items per page:</span>
                <button @click="viewPerPage(1)" class="btn btn-info">1</button>
                <button @click="viewPerPage(2)" class="btn btn-info">2</button>
                <button @click="viewPerPage(5)" class="btn btn-info">5</button>
                <br>
                <div style="margin-top:2%;">
                <span>Enter your own: </span>
                <input class="" v-model="test" style="max-width:50px;"> <span><button @click="custom">Go</button></span>
                </div>
                </small>
                </div>
                </td>
              </tr>
        </tbody>
    </table>
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
              count: "",
              pageNumber: 0,
              size:2,
              n:0,
              test:"",
            };
        },

        computed: {
            bufferMethod() {
                return Math.ceil(50/this.size);    
            }
        },

        props: ['array'],

        created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        },

        methods: {
             nextPage(){
         this.pageNumber++;
         this.n=this.n + this.size;
      },
      prevPage(){
        this.pageNumber--;
        this.n=this.n - this.size;
        },

        viewPerPage(v){

            this.size=v;
            this.pageNumber=0;
            this.n=0;

        },

        custom(){
            if(this.test == 0){
                this.test=1;
            }
            this.size=Number(this.test);
            this.pageNumber=0;
            this.n=0;
        }
    },

    computed:{
        pageCount(){
            let l = this.array.length;
            let s = this.size;

            console.log(this.array.length);
            console.log(this.size);
             console.log(Math.floor(l/s));
            return Math.ceil(l/s);
        },
        paginatedData(){
            const start = this.pageNumber * this.size,
                end = start + this.size;
            return this.array.slice(start, end);
                   
            }
        }
    }

</script>