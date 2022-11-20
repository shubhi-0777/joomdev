<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\email_template;
use Hash;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    // public function admin_index()
    // {
    //     return view('admin_auth.login');
    // } 
    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('view_template')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }




    // public function postAdminLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
   
    //     $credentials = $request->only('email', 'password');
    //   if (Auth::guard('admin')->attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //                     ->withSuccess('You have Successfully loggedin');
    //     }
  
    //     return redirect("admin_login")->withSuccess('Oppes! You have entered invalid credentials');
    // }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'mobile' => 'required|numeric',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("view_template")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'mobile' => $data['mobile'],
      ])->latest()->paginate(3);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        
  
        return Redirect('/');
    }


    public function saveTemplate(Request $request) {
      
    //dd($request);
        email_template::create([
            'template' => $request['template'],
        
        ]);
        

        return redirect("view_template")->withSuccess('Great! Template Added Successfully');

    }
}