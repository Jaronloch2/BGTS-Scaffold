<?php

namespace App\Providers;
use Config;

class AssetScannerProvider{
	public function scan($moduleName = "default"){
		$APP				= Config::get('ApplicationData.APP');
		$public				= $this->defineassets();
		$defaultModule		= $public['assets'][$moduleName];
		$defaultModContents	= $this->getModContents($defaultModule);
		$APP				= $this->dependencyMgr($APP,$defaultModContents, $moduleName);
		$APP				= $this->injectCustomassets($public['assets'], $APP, $moduleName);
		return $APP;
	}
	public function injectCustomassets($moduledir, $APP, $modulename){
		foreach($moduledir as $key=>$val){
			$moddir		= $val;
			$scanned	= scandir($val);
			foreach($scanned as $scan){
				if($scan=='js'){
					$jsdir	= realpath($moddir . DIRECTORY_SEPARATOR . $scan);
					foreach(scandir($jsdir) as $js){
						if($js!='.' && $js!='..'){
							if(is_file($jsdir. DIRECTORY_SEPARATOR .$js)){
								$filepath	= $APP['Data']['app_url']."/assets/$key/js/$js";
								$APP['Allassets']['js'][]	= "<script type='text/javascript' src='$filepath'></script>";
							}
						}
					}
				}
				if($scan=='styles'){
					$cssdir	= realpath($moddir . DIRECTORY_SEPARATOR . $scan);
					foreach(scandir($cssdir) as $css){
						if($css!='.' && $css!='..'){
							if(is_file($cssdir. DIRECTORY_SEPARATOR .$css)){
								$filepath	= $APP['Data']['app_url']."/assets/$key/styles/$css";
								$APP['Allassets']['styles'][]	= "<link rel='stylesheet' href='$filepath'>";
							}
						}
					}
				}
			}
		}
		return $APP;
	}
	public function defineassets(){
		$public	= array('assets'=>array());
		$moduledir	= (__DIR__ . '../../../public/assets/');
		$assets	= scandir($moduledir);
		foreach($assets as $key=>$value){
			if($value != "." && $value != ".."){
				$public['assets'][$value]	= realpath($moduledir.DIRECTORY_SEPARATOR.$value);
			}
		}
		return $public;
	}
	public function getModContents($dir, &$results = array()){
		$files = scandir($dir);
		foreach($files as $key => $value){
			$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
			if(!is_dir($path)) {
				$results[] = $value;
			} else if($value != "." && $value != "..") {
				$this->getModContents($path, $results);
			}
		}
		return $results;
	}
	public function dependencyMgr($APP, $MODDIR, $MODNAME){	
		$moduledir	= __DIR__ . '/../../public/assets';
		foreach($MODDIR as $d){
			$ext	= explode('.',$d);
			$ext	= $ext[count($ext)-1];
			if(!in_array($d,$APP['Dependencies']['ignore']) && $ext=='js'){
				if(!in_array($d,$APP['Dependencies']['js'])){
					$filepath	= "$moduledir/$MODNAME/dependencies/js/$d";
					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/assets/$MODNAME/dependencies/js/$d";
						$APP['Dependencies']['js'][]	= "<script type='text/javascript' src='$filepath'></script>";
					}
				}else{
					$index	= array_search($d, $APP['Dependencies']['js'], TRUE);
					$filepath	= "$moduledir/$MODNAME/dependencies/js/$d";					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/assets/$MODNAME/dependencies/js/$d";
						$APP['Dependencies']['js'][$index]	= "<script type='text/javascript' src='$filepath'></script>";
					}
				}
			}
			if(!in_array($d,$APP['Dependencies']['ignore']) && $ext=='css'){
				if(!in_array($d,$APP['Dependencies']['styles'])){
					$filepath	= "$moduledir/$MODNAME/dependencies/styles/$d";
					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/assets/$MODNAME/dependencies/styles/$d";
						$APP['Dependencies']['styles'][]	= "<link rel='stylesheet' href='$filepath'>";
					}
				}else{
					$index	= array_search($d, $APP['Dependencies']['styles'], TRUE);
					$filepath	= "$moduledir/$MODNAME/dependencies/styles/$d";
					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/assets/$MODNAME/dependencies/styles/$d";
						$APP['Dependencies']['styles'][$index]	= "<link rel='stylesheet' href='$filepath'>";
					}
				}
			}
		}
		return $APP;
	}
}