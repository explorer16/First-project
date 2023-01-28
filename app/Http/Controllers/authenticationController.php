<?php

namespace App\Http\Controllers;

class authenticationController extends Controller
{
    private $data=[];
    private function takeData():void
    {
        if(isset($_POST)){
            var_dump($_POST);
            //$this->data=$_POST
        }
    }
    public function show():void
    {
        $this->takeData();
    }
}
