<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>{if isset($page_title)}{$page_title} {else} {/if}</title>
		<link href="tpl/templates/css/bootstrap.min.css" rel="stylesheet">
		<link href="tpl/templates/css/non-responsive.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<a class="navbar-brand" href="#">ZNC Web Log</a>
			

				<div id="navbar" class="collapsae navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
					</ul>
				</div>
			</div>
		</nav>
		{block "content"}{/block}
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	</body>
</html>