<?php

namespace App\Http\Controllers\Admin;

//uuse App\User;
use App\Http\Repositories\BaseinfoRepository;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $baseinfo;
    
    public function __construct(BaseinfoRepository $baseinfo)
    {
        $this->baseinfo = $baseinfo->get();        
    }
    
    public function index(){
        //return "<br />test page 123"; 
        
        return view('admin/index', $this->baseinfo );
    }

    public function welcome()
    {
        return view('admin/welcome');
    }
}