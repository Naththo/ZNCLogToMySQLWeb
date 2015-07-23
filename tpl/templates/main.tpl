<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>{if isset($page_title)}{$page_title}{else} {/if}</title>
		<link href="tpl/templates/css/bootstrap.min.css" rel="stylesheet">
		<link href="tpl/templates/css/non-responsive.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	</head>

	<body>
		<style type="text/css">
			.dropdown-menu span {
				margin-left:10px;
			}
		</style>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<a class="navbar-brand" href="#">ZNC Web Log</a>
			
				<div id="navbar" class="collapsae navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
					</ul>
					{if isset($username)}
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$username} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-cog"></i><span>Settings</span></a></li>
								<li role="separator" class="divider"></li>
								<li><a href="logout.php"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
					{/if}
				</div>
			</div>
		</nav>
		{block "content"}{/block}
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	</body>
</html>