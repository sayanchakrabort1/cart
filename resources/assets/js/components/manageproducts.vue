<template>

<div class="container showTable">
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
            <td>{{ index + n + 1}}</td>
            <td>{{ item.pname }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.sub }}</td>
            <td v-if="item.stock"> <span style="color:green;">{{ item.stock }}</span> </td>
            <td v-else> <span style="color:red;"> NiL </span> </td>
            <td v-if="item.available == 1"> <span style="color:green;">Yes</span> </td>
            <td v-else> <span style="color:red;">NO</span> </td>
            <td><img class="img" :src="'images/' + item.image"></td> 
            <td>
                <form method="POST" action="/prodmanager">
                <input type="hidden" name="value" :value="index + n + 1">
                <input type="hidden" name="_token" :value="csrfToken">
                <button  type="submit" class="btn btn-primary forBtn">Edit</button>
                </form>
            </td> 
        </tr>
          <tr>
              <td><small>
                  <div  class="perPageNo">
                  <button 
                  :disabled="pageNumber === 0" 
                  @click="prevPage" class="btn btn-info">
                  Previous
              </button>
              <span class="pgNmbr">{{ pageNumber+1 }}</span>
              <button class="btn btn-info"
                  :disabled="pageNumber >= pageCount -1" 
                  @click="nextPage">
                  Next
              </button></div>
              </small></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               <td>
                <!-- <div class="perPage"><small>
                <span>Items per page:</span>
                <button @click="size=1" class="btn btn-info">1</button>
                <button @click="size=2" class="btn btn-info">2</button>
                <button @click="size=5" class="btn btn-info">5</button>
                </small>
                </div> -->
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
              size:3,
              n:0
            };
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
    },

    computed:{
        pageCount(){
            let l = this.array.length,
                s = this.size;
            return Math.ceil(l/s);
        },
        paginatedData(){
            const start = this.pageNumber * this.size,
                end = start + this.size;
            return this.array
                    .slice(start, end);
            }
        }
    }

</script>