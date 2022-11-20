<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\email_template;
use App\Mail\sendingEmail;
use Illuminate\Support\Facades\Mail;
class TemplateController extends Controller
{


    public function sendemail(Request $request) {

        $this->validate($request, [
           // 'name' => 'required',
            'email' => 'required|email',
            'template_id' => 'required'
            ]);
    

        $q = $request->get( 'template_id' );
        $r = $request->get( 'email' );


        $email_template = email_template::where('id','LIKE','%'.$q.'%')->first();
     
     $message = $email_template['template'];
    
        


        
            $data = array(
                'name' => $request->name,
                //'message' => $request->message
                'message' => $message
            );
    
            Mail::to($r)->send(new sendingEmail($data));

           // return back()->with('success', 'Thanks for contacting us!');
   


    }
}
