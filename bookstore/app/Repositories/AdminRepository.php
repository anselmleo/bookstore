<?php

namespace App\Repositories;

use App\Admin;

class AdminRepository 
{
  protected $adminModel;

  public function __construct(Admin $adminModel)
  {
    $this->adminModel = $adminModel;
  }


  //Collect data from createAdminService and save to db
  public function insertAdmin($adminData)
  {
    $admin = $this->adminModel->create($adminData);
    return $admin;
  }
}