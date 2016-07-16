<!DOCTYPE html>
<html ng-app="bgts" ng-controller="IndexController as indexCtrl" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="description" content="{{$Data['app_description']}}" />
	<meta name="keywords" content="{{$Data['app_keywords']}}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> 
	<meta name="title" content="{{$Data['app_title']}}" />
	<meta property="og:title" content="{{$Data['app_title']}}" />
	<meta property="og:url" content="{{$Data['app_url']}}" />
	<meta property="og:type" content="{{$Data['app_type']}}" />
	<meta property="og:description" content="{{$Data['app_description']}}" />
	<meta property="og:updated_time" content="{{$Data['app_updated_time']}}" />
	<meta property="og:image" content="{{$Data['app_url']}}{{$Data['app_image']}}" />
	<link rel="canonical" href="{{$Data['app_url']}}" />
	<title>{{$Data['app_title']}}</title>
	<link rel="shortcut icon" href="{{$Data['app_url']}}{{$Data['app_icon']}}" type="image/x-icon"/>
	
	<?php echo htmlspecialchars_decode(implode(' ',$Dependencies['styles']));?>
	<?php echo htmlspecialchars_decode(implode(' ',$AllModules['styles']));?>
	
</head>
<body>
<default-navbar></default-navbar>
<default-sidebar class="col-lg-3 col-md-3"></default-sidebar>
<ui-view class="col-lg-9 col-md-9 col-sm-12"></ui-view>
<default-footer></default-footer>
<?php echo htmlspecialchars_decode(implode(' ',$Dependencies['js']));?>
<?php echo htmlspecialchars_decode(implode(' ',$AllModules['js']));?>
</body>
</html>