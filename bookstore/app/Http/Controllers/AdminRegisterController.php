<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Requests\ValidateAdminRegister;

class AdminRegisterController extends Controller
{
    protected $adminService;

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
        //auth()->guard()->login($admin)
        return redirect()->back()->with('message', 'Data added to database!');
        
    }
}
