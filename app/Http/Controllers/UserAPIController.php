<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class UserAPIController extends Controller
{
    public function login(Request $req){
        $client = Client::where('email',$req->email)->where('password',$req->password)->first();
        if($client){
            return 'Success';
        }
        else{
            return 'Wrong email or password';
        }
    }

    public function register(Request $request){
        //Image upload
        if($request->hasFile('image')){
            try {
            $image = base64_encode(file_get_contents($request->file('image')));
            echo $image;
            echo base64_decode($image);
            }catch (FileNotFoundException $e) {
                echo "catch";
            }
        }
        $client = new Client();
        $client->first_name = $request->firstName;
        $client->last_name = $request->lastName;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = $request->password;
        
        $request->password;
        $client->save();
        return 'Registered';
    }
}
