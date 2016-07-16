<?php

namespace App\Http\Controllers;

use App;
use App\Providers\AssetScannerProvider;

class defaultController extends Controller
{
	protected $APP;
    public function __construct(AssetScannerProvider $assets){
		$this->APP	= $assets->scan();
	}
    public function _index(){
		$data	= $this->APP;
		return view('index',$data);
    }
    public function _default(){
		$data	= $this->APP;
		return view('default',$data);
    }
    public function _navbar(){
		$data	= $this->APP;
		return view('navbar',$data);
    }
    public function _sidebar(){
		$data	= $this->APP;
		return view('sidebar',$data);
    }
    public function _footer(){
		$data	= $this->APP;
		return view('footer',$data);
    }
}
