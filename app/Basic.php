<?php

namespace App;

namespace App;
Use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Basic extends Model
{
    public function storeInDb($request){
        $request['pass'] = Hash::make($request['pass']);

        $count= DB::table('registered_user')->where( 'email', $request['email'] )->get();
        // print_r($count);
        // die();

        $count= count($count);
        // print_r($count);
        // die();

        if($count > 0){
            return 0;
        }
        else {
            DB::table('registered_user')->insert(
                array(
                    'email'     =>   $request['email'], 
                    'pass'   =>   $request['pass'],
                )
        );
        return 1;
            }

    } // Stores the Data in Database 

    public function getFromDb($request){
        // echo "<pre>";
        // // print_r($request);
        // die($request);
        $user= DB::table('registered_user')->where('email' , $request['email'])->get(); 
                                       

        $res=$user->isEmpty();

        if($res == ""){
            $user = json_decode(json_encode($user), True);
            $user=$user[0];
            // print_r($user['pass']."<br>");
            $val=Hash::check($request['pass'], $user['pass']);

            // print_r($val);

            // die();
            
            if($val){
                return true;
            } else {
                return false;
            }
            
        } else {
            return false;
        }
        
    } // Obtains the values from Database

    public function getId($request){
        $user= DB::table('registered_user')->where('email' , $request['email'])->get();
        $user = json_decode(json_encode($user), True);
        $user=$user[0];

        return $user['id'];
    } //Gets the logged in User ID

    public function pullImage($id){
        $user= DB::table('registered_user')->where('id' , $id)->get();
        $user = json_decode(json_encode($user), True);
        $user=$user[0];

        return $user['image'];
    } //Obtains the DP of Logged in User

    public function getAllData($request){


        $user= DB::table('registered_user')->where('id' , $request)->get();
        $user = json_decode(json_encode($user), True);
        // print_r($user);
        // die();
        
        $user=$user[0];
        // print_r($user);
        // die();
        return $user;
    } // Pulls up all the data for display

    public function pushImage($name , $id ){

        
        DB::table('registered_user')
                ->where('id', $id)
                ->update(array(
                'image'     =>   $name,
                )); 
    } //Set the dp

    public function pushProfData($request , $id){
        // print_r($request);
        // die();
        DB::table('registered_user')
        ->where('id', $id)
        ->update(array(
        'fname'     =>   $request['fname'], 
        'lname'   =>   $request['lname'],
        'city'   =>   $request['city'],
        ));
        return true;
    } //Set the profile details 

    public function editPass($request , $id ){

        // echo "<pre>";
        // print_r($request);
        // die();
        
        $user= DB::table('registered_user')->where('id' , $id)->get();
        $user = json_decode(json_encode($user), True);
        $user=$user[0];
        // print_r($user['pass']."<br>");
        $val=Hash::check($request['opass'], $user['pass']);

        if($val){
            $pass = Hash::make($request["pass"]);
             DB::table('registered_user')
                ->where('id', $id)
                ->update(array(
                'pass'     =>   $pass,
                )); 

            return true;
        } else {
            return false;
        }

        
    } //Edit he profile password

    public function addProduct($request, $id , $name){

        $pname=$request["pname"];
        $pdes=$request["pdes"];
        $category=$request["category"];

        unset($request["pname"]);
        unset($request["pdes"]);
        unset($request["category"]);
        unset($request["_token"]);
        unset($request["image"]);
        $string = '';

        

        foreach($request as $a)
        {   
            if($a != ""){
            $string=$string."/".$a;}
        }

        DB::table('product')->insert(
            array(
                'pname'     =>   $pname, 
                'pdes'   =>   $pdes,
                'category' =>  $category,
                'sub' => $string,
                'parent' => $id,
                'image'     =>   $name,
            )
        );

    } //Add the products in the database

    public function getProdCount($id){

        $count= DB::table('product')->where( 'parent', $id )->get();
        $count= count($count);

        return $count;

    } // Gets the product count of a particular user

    public function getProdName($id){

       
        $count= DB::table('product')->where( 'parent', $id )->get();
        $count = json_decode(json_encode($count), True);

        $data["array"]=$count;
        //  echo "<pre>";


        // print_r($data);

        // die();

        return $data;

    } //obtains the Product Name only

    public function prodAllData($id){
        $count= DB::table('product')->where( 'parent', $id )->get();
        $count = json_decode(json_encode($count), True);
        return $count;
    } //obtains all the data of the product 

    public function editProductValues($request, $id , $name){

        $pname=$request["pname"];
        $pdes=$request["pdes"];
        $category=$request["category"];
        $stock=$request["stock"];

        //  echo "<pre>";
        // print_r($request);
        // die();

        if (array_key_exists("available",$request))
        {
              $available=1;
        } else {
            $available=0;
        }

        // echo "<pre>";
        // print_r($stock);
        // die();



        unset($request["pname"]);
        unset($request["pdes"]);
        unset($request["category"]);
        unset($request["_token"]);
        unset($request["stock"]);
        unset($request["available"]);
        unset($request["image"]);

        

        // echo "<pre>";
        // print_r($request);
        // die();
        $string = '';

        foreach($request as $a)
        {   
            if($a != ""){
            $string=$string."/".$a;}
        }

        DB::table('product')
            ->where('id', $id)
            ->update(
            array(
                'pname'     =>   $pname, 
                'pdes'   =>   $pdes,
                'category' =>  $category,
                'sub' => $string,
                'image'     =>   $name,
                'stock' => $stock,
                'available' => $available,
            )
        );

    } //Edits the Product Values

    public function productPic($id){
        $count= DB::table('product')->where( 'id', $id )->get();
        $count = json_decode(json_encode($count), True);
        // echo "<pre>";
        // print_r($count[0]);
        // die();
        return $count[0]['image'];
    } //Sets the product pic 

    public function getCount(){
        $pcount= DB::table('product')->get();
        $pcount=count($pcount);

        $count= DB::table('registered_user')->get();
        $count=count($count);

        $data=array(
            'prod' => $pcount,
            'user' => $count,
        );

        // echo "<pre>";
        // print_r($data);
        // die();

        return $data;
        
    } //Obtains count of all the product in database

    public function deleteProduct($id){

        DB::table('product')->where('id', $id)->delete();

    } // Delete a particular product 
}
