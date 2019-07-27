<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Requests\ValidateAdminRegister;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminRegisterController extends Controller
{
    use AuthenticatesUsers;

    protected $adminService;
    protected $redirectTo = '/dashboard';

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    //Return admin register view
    public function show()
    {
        return view('admin.register');
    }

    public function register(Request $request, ValidateAdminRegister $validateRequest)
    {
        $data = [
            'firstname' => request('fname'),
            'lastname' => request('lname'),
            'email' => request('email'),
            'password' => request('password')
        ];

        $admin = $this->adminService->createAdmin($data);
        // auth()->guard()->login($admin);
        // return redirect()->back()->with('message', 'Data added to database!');

        $this->guard()->login($admin);
        
        if(auth()->guard('admins')->check()) {
            $this->guard('admins')->logout();
            echo 'logged out';
        }
        
    }

    protected function guard() 
    {
        return auth()->guard('admins');
    }

    public function redirectTo() 
    {
        return '/dashboard';
    }
}
