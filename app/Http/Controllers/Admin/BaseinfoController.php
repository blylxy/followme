<?php

namespace App\Http\Controllers\Admin;

//uuse App\User;
use App\Http\Repositories\BaseinfoRepository;
use App\Http\Controllers\Controller;

class BaseinfoController extends Controller
{
    protected $baseinfo;
    
    public function __construct(BaseinfoRepository $baseinfo)
    {
        $this->baseinfo = $baseinfo->get()；
    }
    
    public function index(){
        //return "<br />test page 123"; 
        
        return view('admin/baseinfo', $this->baseinfo );
    }

    
}