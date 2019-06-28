<?php

namespace App\Http\Controllers;
use App\User;
use App\Basic;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        } //SESSION valid or not

        $id=$request->session()->get('id');
        $basicModel = new Basic(); 
        $data=$basicModel->getAllData($id);
        $count=$basicModel->getProdCount($id);
        unset($data['pass']);
        $data["count"]=$count;
        // $array=$basicModel->getProdName($id);
        // $data["array"]= $array;
        return view('mainpage')->with($data);
    } //returns the mainpage/dashboard

    public function logout(request $request){

        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        } //SESSION valid or not

        $request->session()->forget('id');
        $request->session()->flush();

        return redirect('login')->with(Auth::logout());
    } //Logout

    public function profile(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        } //SESSION valid or not

        $id=$request->session()->get('id');
        $basicModel = new Basic(); 
        $data=$basicModel->getAllData($id);
        unset($data['pass']);        
        return view('profile')->with($data);
    } //Display profile

    public function edit(request $request){

        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        // print_r("HELLO");
        // print_r($request->hasFile('image'));
        // die();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            
        $id=$request->session()->get('id');
        $basicModel = new Basic();              
        $basicModel->pushImage($name , $id);
        }

        $id=$request->session()->get('id');
        $basicModel = new Basic();              
        $basicModel->pushProfData($request->all() , $id);
        return redirect()->route('profile');
    } // Edits Profile 

    public function editpass(request $request){

        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }
        $id=$request->session()->get('id');
        $customMessages=[
            'pass.required'  => 'A password is required',
            ];
        
             
        $validator= $this->validate($request, [
            'pass' => 'required',
        ] ,
        $customMessages);

        if($validator){
            redirect()->route('profile');
  
        } else {

            // echo "<pre>";
            // print_r($request->all());
            // die();

        $basicModel = new Basic();              
        $exist=$basicModel->editPass($request->all() , $id);
        
        if($exist){
            return redirect()->route('profile'); 
        }
        else{
            return redirect()->route('profile')->withErrors(['1']);
        }
            
        }
    } //Edit Password

    public function addproduct(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }
        return view('addproduct');
    } //Add product

    public function addprod(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'prod'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        } else {
            $name="product.jpg";
        }
        
        $id=$request->session()->get('id');
        $basicModel = new Basic();              
        $basicModel->addProduct($request->all() , $id , $name);
        return redirect()->back()->with('success', 'Your product has been added!'); 
    } //Add product Handler

    public function showproducts(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        $id=$request->session()->get('id');
        $basicModel = new Basic(); 
        $array=$basicModel->getProdName($id);
        // echo "<pre>";
        // print_r($array);
        // die();
        return view('showproducts')->with($array);

    } // Display Product

    public function manageproduct(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        $id=$request->session()->get('id');
        $basicModel = new Basic(); 
        $array=$basicModel->getProdName($id);

        return view('manageproduct')->with($array);

    } // Display the Manage Product

    public function prodmanager(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        echo "<pre>";
        $requestId=$request["value"];
        
        $requestId= $requestId - 1;

        $id=$request->session()->get('id');
        $basicModel = new Basic(); 
        $array=$basicModel->prodAllData($id);
        $array=$array["$requestId"];

        $request->session()->put('array' , $array);
        // print_r($request->session()->get('array'));
        // die();

        return redirect()->route('editproduct');
        // return view('manageproduct')->with($array);
    } //Manage product Handler

    public function editproduct(request $request){

        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        $array= $request->session()->get('array');
        $data["array"]=$array;
        return view('editproduct')->with($data);
    } //Dislay the edit product page
    
    public function editchecker(request $request){
        if($request->session()->get('id')){
            
        } else{
            return redirect()->route('login');
        }

        if (array_key_exists("submit", $request->all())){
            unset($request["submit"]);

            // echo "<pre>";
            // print_r($request->all());
            // die();

            $temp=$request->session()->get('array');
            $id=$temp['id'];  //holds the p-key
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = 'prod'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            } else {
                $basicModel = new Basic();              
                $name=$basicModel->productPic($id);
            }
            
            // $id=$request->session()->get('id'); -- not needed
            $basicModel = new Basic();              
            $basicModel->editProductValues($request->all() , $id , $name);
            return redirect()->route('manageproduct')->with('success', 'Your product has been updated!');

        } else {
            unset($request["delete"]);

            $temp=$request->session()->get('array');
            $id=$temp['id'];

            $basicModel = new Basic();              
            $basicModel->deleteProduct($id);
            return redirect()->route('manageproduct')->with('success', 'Your product has been removed!');
            
        }
    } //Edit product handler
}
