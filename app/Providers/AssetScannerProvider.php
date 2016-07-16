<?php

namespace App\Providers;
use Config;

class AssetScannerProvider{
	public function scan($moduleName = "default"){
		$APP				= Config::get('ApplicationData.APP');
		$public				= $this->defineModules();
		$defaultModule		= $public['modules'][$moduleName];
		$defaultModContents	= $this->getModContents($defaultModule);
		$APP				= $this->dependencyMgr($APP,$defaultModContents, $moduleName);
		$APP				= $this->injectCustomModules($public['modules'], $APP, $moduleName);
		return $APP;
	}
	public function injectCustomModules($moduledir, $APP, $modulename){
		foreach($moduledir as $key=>$val){
			$moddir		= $val;
			$scanned	= scandir($val);
			foreach($scanned as $scan){
				if($scan=='js'){
					$jsdir	= realpath($moddir . DIRECTORY_SEPARATOR . $scan);
					foreach(scandir($jsdir) as $js){
						if($js!='.' && $js!='..'){
							if(is_file($jsdir. DIRECTORY_SEPARATOR .$js)){
								$filepath	= $APP['Data']['app_url']."/Modules/$key/js/$js";
								$APP['AllModules']['js'][]	= "<script type='text/javascript' src='$filepath'></script>";
							}
						}
					}
				}
				if($scan=='styles'){
					$cssdir	= realpath($moddir . DIRECTORY_SEPARATOR . $scan);
					foreach(scandir($cssdir) as $css){
						if($css!='.' && $css!='..'){
							if(is_file($cssdir. DIRECTORY_SEPARATOR .$css)){
								$filepath	= $APP['Data']['app_url']."/Modules/$key/styles/$css";
								$APP['AllModules']['styles'][]	= "<link rel='stylesheet' href='$filepath'>";
							}
						}
					}
				}
			}
		}
		return $APP;
	}
	public function defineModules(){
		$public	= array('modules'=>array());
		$moduledir	= (__DIR__ . '../../../public/Modules/');
		$modules	= scandir($moduledir);
		foreach($modules as $key=>$value){
			if($value != "." && $value != ".."){
				$public['modules'][$value]	= realpath($moduledir.DIRECTORY_SEPARATOR.$value);
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
		$moduledir	= __DIR__ . '/../../public/Modules';
		foreach($MODDIR as $d){
			$ext	= explode('.',$d);
			$ext	= $ext[count($ext)-1];
			if(!in_array($d,$APP['Dependencies']['ignore']) && $ext=='js'){
				if(!in_array($d,$APP['Dependencies']['js'])){
					$filepath	= "$moduledir/$MODNAME/dependencies/js/$d";
					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/Modules/$MODNAME/dependencies/js/$d";
						$APP['Dependencies']['js'][]	= "<script type='text/javascript' src='$filepath'></script>";
					}
				}else{
					$index	= array_search($d, $APP['Dependencies']['js'], TRUE);
					$filepath	= "$moduledir/$MODNAME/dependencies/js/$d";					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/Modules/$MODNAME/dependencies/js/$d";
						$APP['Dependencies']['js'][$index]	= "<script type='text/javascript' src='$filepath'></script>";
					}
				}
			}
			if(!in_array($d,$APP['Dependencies']['ignore']) && $ext=='css'){
				if(!in_array($d,$APP['Dependencies']['styles'])){
					$filepath	= "$moduledir/$MODNAME/dependencies/styles/$d";
					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/Modules/$MODNAME/dependencies/styles/$d";
						$APP['Dependencies']['styles'][]	= "<link rel='stylesheet' href='$filepath'>";
					}
				}else{
					$index	= array_search($d, $APP['Dependencies']['styles'], TRUE);
					$filepath	= "$moduledir/$MODNAME/dependencies/styles/$d";
					if(is_file($filepath)){
						$filepath	= $APP['Data']['app_url']."/Modules/$MODNAME/dependencies/styles/$d";
						$APP['Dependencies']['styles'][$index]	= "<link rel='stylesheet' href='$filepath'>";
					}
				}
			}
		}
		return $APP;
	}
}