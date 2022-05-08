<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\AdminInterface;

class AdminController extends Controller
{
    private $AdminI;
    public function __construct(AdminInterface $AdminI)
    {
        $this->AdminI = $AdminI;
    }
}
