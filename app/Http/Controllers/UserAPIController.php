<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;
use Response;

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
        $client = new Client();
        //Image upload
            try {
                if ($request->base64) {
    
                    $originalExtension = str_ireplace("image/", "", $request->type);
    
                    $folder_path       = 'uploads/images/profile/';
    
                    $image_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $originalExtension;
                    $decodedBase64 = $request->base64;
                }
                $photoPath = $folder_path . $image_new_name;
    
    
                file_put_contents($photoPath, base64_decode($decodedBase64, true));
                $client->image = $photoPath;
    
                response()->json([
                    "message" => "uploaded successfully",
                    "status" => "200",
                    "path" => $photoPath
                ]);
            } catch (\Exception $exception) {
                response()->json([
                    "message" => "Image field required, invalid image !",
                    "error" => $exception->getMessage(),
                    "status" => "0",
                ]);
            }
        $client->first_name = $request->firstName;
        $client->last_name = $request->lastName;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = $request->password;
        $client->save();
        return 'Registered';
    }

    public function getUserImage(Request $request){
        $client = Client::where('email',$request->email)->first();
        $path = public_path(). '/' .$client->image;
        return Response::download($path); 

    }
}
