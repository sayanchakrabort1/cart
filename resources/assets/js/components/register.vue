<template>
  <div>
  <form autocomplete="off" method="POST" v-on:submit="checker" action="/check" >
      <div class="panel-heading" style="background-color:#d9edf7; border-radius: 0px 0px 8px 8px;">
        <h2 style="margin-left:41%;">Sign up</h2>
      </div> 
      <hr>

      <div style="margin-bottom: 3%;" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="email" class="form-control" placeholder="Enter email" name="email" v-model="email" @keydown.space.prevent>
        <small style="color:red;" v-if="emailFlag">Email cannot be empty</small>                                        
      </div>

      <div class="input-group " style="margin-bottom: 3%;">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Password" name="pass" v-model="pass" @keydown.space.prevent>
        <small style="color:red;" v-if="passFlag">Password cannot be empty</small>
        <small style="color:red;" v-if="sameFlag">Passwords doesn't match!</small>
      </div>

      <div class="input-group" style="margin-bottom: 3%;">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control" placeholder="Confirm Password" name="conpass" v-model="conpass" @keydown.space.prevent>
          <small style="color:red;" v-if="conFlag">Confirm Password cannot be empty</small>
          <small style="color:red;" v-if="sameFlag">Passwords doesn't match!</small>
        </div>
        <input type="hidden" name="_token" :value="csrfToken">
      <button type="submit"  class="btn btn-success bot-margin">Submit</button>
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
                    name: this.name,
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

               if(this.conpass == ""){
                 this.conFlag=1;
                 this.error=1;
               } else {
                  this.conFlag=0;
               }

               if(this.pass != this.conpass && this.pass != "" && this.conpass != ""){
                 this.sameFlag=1;
                 this.error=1;
               } else {
                 this.sameFlag=0;
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