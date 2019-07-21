<?php

namespace App\Services;
use App\Repositories\AdminRepository;

class AdminService
{
  protected $adminRepository;

  public function __construct(AdminRepository $adminRepository)
  {
    $this->adminRepository = $adminRepository;
  }

  //Collect admin data from controller and pass to admin repository class
  public function createAdmin($adminData)
  {
    $admin = $this->adminRepository->insertAdmin($adminData);
    return $admin;
  }

}