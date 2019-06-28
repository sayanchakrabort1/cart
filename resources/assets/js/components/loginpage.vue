


<template>
    <div>
        <form method="POST" autocomplete="off" v-on:submit="checker" action="/verify">
            <!-- <h1>LOGIN</h1> -->
            <div class="panel-heading" style="background-color:#d9edf7; border-radius: 0px 0px 8px 8px;">
              <h2 style="margin-left:43%;">Login</h2>
            </div> 
            <hr>
            <div class="form-group">
           
            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="email" class="form-control" name="email" placeholder="Enter email" v-model="email" @keydown.space.prevent>
              <small style="color:red;" v-if="emailFlag">Email cannot be empty</small>                                        
            </div>
            </div>
      
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="pass" placeholder="Password" v-model="pass" @keydown.space.prevent>
                <small style="color:red;" v-if="passFlag">Password cannot be empty</small>
            </div>
            

            <input type="hidden" name="_token" :value="csrfToken">
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>
</template>


<script>

    export default {

        mounted() {
            console.log('Component mounted.')
        },

        data() {

            return {
              email: '',
              pass: '',
              conpass: '',
              csrfToken: null,
              emailFlag: 0,
              passFlag: 0,
              conFlag: 0,
              error: 0,
              sameFlag: 0,
            };
        },

        created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
        },

        methods: {

            check(e) {
                axios.post('/register', {
                    email: this.email,
                    pass: this.pass
                })
            },

            checker(event) {
                this.error=0;
               if(this.email == ""){
                 this.emailFlag=1;
                 this.error=1;
               } else {
                 this.emailFlag=0;
               }

               if(this.pass == ""){
                 this.passFlag=1;
                 this.error=1;
               } else {
                 this.passFlag=0;
               }

               if(this.error == 1){
                 event.preventDefault();
               } else {
                 this.error=0;
               }
            }

        }

    }

</script>