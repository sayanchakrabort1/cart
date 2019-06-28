<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\User;
use App\Basic;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Contracts\Validation\Validator;


class RegisterController extends Controller
{
    public function index(){
        $basicModel = new Basic();
            $data=$basicModel->getCount();

        // echo "<pre>";
        // print_r($data);
        // die();

        return view('welcome')->with($data);
    } // Displays the home page

    public function register(Request $request){
        if($request->session()->get('id')){
            return redirect()->route('mainpage');
        } else{
            return view('register');
        } 
    } //Displays the register page

    public function check(request $request){

        $customMessages=[
            'email.required' => 'A email is required',
            'pass.required'  => 'A password is required',
            'conpass.required' => 'A confirm password is required',
            'conpass.same' => 'Password and Confirm Password doesnt match',
            ];
        
             
        $validator= $this->validate($request, [
            'email' => 'required|email|max:255',
            'pass' => 'required',
            'conpass' => 'required|same:pass', 
            
        ] ,
        $customMessages);

        if($validator){
            redirect()->route('register');
  
        } else {
            // echo "<pre>";
            // print_r($request->all());
            // die();
            $basicModel = new Basic();
            $flag=$basicModel->storeInDb($request->all());

            // print_r($flag);
            // die();

            if($flag == 0){
                return redirect()->route('register')->withErrors(['User already exist']);
            } else {
            return redirect()->route('login'); 
            }
        }
    }//Check the registers content

    public function login(Request $request){
        if($request->session()->get('id')){
            return redirect()->route('mainpage');
        } else{
            return view('login');
        } 
    }//Displays the login page

    public function verify(request $request){

        $customMessages=[
            'email.required' => 'A email is required',
            'pass.required'  => 'A password is required',
            'pass.min'  => 'Minimum length of password is 6',
            ];
        
             
        $validator= $this->validate($request, [
            'email' => 'required|email|max:255',
            'pass' => 'required',  //|min:6
        ] ,
        $customMessages);

        if($validator){
            return redirect()->route('login');
        } else {
            
            $basicModel = new Basic();
            $exist =  $basicModel->getFromDb($request);

            if($exist){

                // $basicModel= new Basic();
                $exist =  $basicModel->getId($request);
                $request->session()->put('id',$exist);

                $image = $basicModel->pullImage($exist);
                $request->session()->put('image',$image);

                return redirect()->route('mainpage');
                
            } else {
                return redirect()->route('login')->withErrors(['INVALID USERNAME/PASSWORD']);
            }
        }
    }//Checks the login is valid or not
}
