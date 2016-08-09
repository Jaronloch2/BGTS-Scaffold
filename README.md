# BGTS-Scaffold
* A Modular Laravel x AngularJS x Bootstrap Scaffold with dynamic JS/CSS dependency injector. *

## Info here:
[https://github.com/caffeinated/modules] (https://github.com/caffeinated/modules)

[https://github.com/Jaronloch2/BGTS-Scaffold/] (https://github.com/Jaronloch2/BGTS-Scaffold/)

[http://bgtsworks.blogspot.com/2016/07/make-laravel-5-modular-part-1.html] (http://bgtsworks.blogspot.com/2016/07/make-laravel-5-modular-part-1.html)


## Application Data
_config\ApplicationData.php_
> These values are used to fill up the HEAD tag of your web page/site. Modify the properties to your liking. Facebook uses OG property for crawling that is why I included them in the scanner. For more info about facebook's open graph, you may visit their [Open Graph Reference](https://developers.facebook.com/docs/reference/opengraph/) :)

<dl>
	<dt>app_title</dt>
	<dd>Title of the app/site for the title tag and og:title property</dd>  
	<dt>app_type</dt>
	<dd>Used for og:type property. ie: website, article... etc</dd>
	<dt>app_updated_time</dt>
	<dd>You may change this, but the default is always 30 days ago.</dd>
	<dt>app_image</dt>
	<dd>The image used for og:image for facebook</dd>
	<dt>app_icon</dt>
	<dd>Your favicon</dd>
	<dt>app_url</dt>
	<dd>The canonical URL with port number by default</dd>
</dl>
<dl>
	<dt>Dependencies</dt>
	<dd>(reference directory is Modules\default\dependencies\) - These are the files who are always called first before anything else, thus they are dependencies, you may also ignore some files you don't want to be included in the HEAD tag</dd>
	<dt>AllModules</dt>
	<dd>(reference directory is Modules\*) If you need to put something on top of any of your module, you may include their name in this array.</dd>
</dl>

## Freebies
> I have included basic Angular JS files in the public\Modules\default it can do SPA using angular ui-router. Play around with it. Maybe someday I'll document the thing.
> You may also play around with the layouts in resources\views\



























