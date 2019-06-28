<template>
    <div class="container">
    
        <div class="well">
            <div class="flex-r">
            <div class="maxWidth">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                <li><a href="#profile" data-toggle="tab">Password</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home">
                    <p v-if="error" class="alert alert-danger">Sorry Old Password doesn't match!</p>
                    <form id="tab" method="POST" class="flex-c" action="/edit" enctype="multipart/form-data">
                        <label class="marg">First Name</label>
                        <input type="text" :value="fname" class="input-xlarge marg" name="fname">
                        <label class="marg">Last Name</label>
                        <input type="text" :value="lname" class="input-xlarge marg" name="lname">
                        <label class="marg">Email</label>
                        <input type="text" :value="email" class="input-xlarge marg" readonly>
                        <label class="marg">City</label>
                        <input type="text" :value="city" class="input-xlarge marg" name="city">
                        <label class="marg">Change DP</label>
                        <input name="image" class="btn dpBtn" type="file">
                        <div>
                            <input type="hidden" name="_token" :value="csrfToken">
                            <button class="btn btn-success marg" type="submit">Update</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile">
                    <form id="tab2" class="flex-c" action="/editpass" method="POST" v-on:submit="checker">
                        <p v-if="error" class="alert alert-danger">Sorry Old Password doesn't match!</p>
                        
                        <label class="marg">Old Password</label>
                        <input type="password" class="input-xlarge marg" name="opass" v-model="opass" @keydown.space.prevent>
                        <small style="color:red;" v-if="opassFlag">Old Password cannot be empty</small>

                        <label class="marg">New Password</label>
                        <input type="password" class="input-xlarge marg" name="pass" v-model="pass" @keydown.space.prevent>
                        <small style="color:red;" v-if="passFlag">Password cannot be empty</small>
                        <div>
                            <input type="hidden" name="_token" :value="csrfToken">
                            <button class="btn btn-success marg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
              <div>
             <img class="img" :src="'images/' + image"/> 
             </div>
        </div>
        
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
              pass: "",
              passFlag: 0,
              error:0,
              opass:"",
              opassFlag:0,
            };
        },

        props: ['email' , 'image' ,'fname','lname' ,'city', 'error'],

        created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        },
  

        methods: {

            checker(event) {
                this.error=0;

               if(this.pass == ""){
                 this.passFlag=1;
                 this.error=1;
               } else {
                 this.passFlag=0;
               }

                if(this.opass == ""){
                 this.opassFlag=1;
                 this.error=1;
               } else {
                 this.opassFlag=0;
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