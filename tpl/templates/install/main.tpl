<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>{if isset($page_title)}{$page_title} {else} {/if}</title>
		<link href="../tpl/templates/css/bootstrap.min.css" rel="stylesheet">
		<link href="../tpl/templates/css/non-responsive.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">
		{if isset($step)}<script type="text/javascript">var step = {$step};</script>{/if}
			{block "content"}{/block}
			<div class="alert alert-danger" style="display:none" id="errbox"><strong id="errtitle"></strong><br /><p id="errmsg"></p><br /><b><a href="#" id="retrystep" class="alert-link">Retry this step</a></b></div>
			<button class="btn btn-success" style="margin-top:10px;display:none;" id="continuebutton">Continue</button>
			{if isset($step) && $step > 0}<div class="progress" style="margin-top:25px;">
				<div class="progress-bar progress-bar-striped active" role="progressbar" style="width:0%" id="progbar">
			</div>{/if}
		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
		<script src="../tpl/templates/install/js/install.js"></script>
	</body>
</html>