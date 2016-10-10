<nav class="navbar navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	  <span class="sr-only">Toggle navigation</span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" ui-sref="root"><img ng-src="/assets/default/images/app_icon.png" height="30px"></a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav navbar-left">
		<li><a ui-sref="root">Home</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li>
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-off"></span> <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li class="dropdown-header"></li>
				<li>Some link here</li>
			</ul>
		</li>
	</ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>