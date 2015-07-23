		{extends file="install/main.tpl"}
		{block name="content"}
		<style type="text/css">
			{literal}body{padding-top:10px;padding-bottom:30px}body,.navbar-fixed-top,.navbar-fixed-bottom{min-width:970px}.lead{font-size:16px}.page-header{margin-bottom:30px}.page-header .lead{margin-bottom:10px}{/literal}
		</style>
			<div class="page-header">
				<h1>Installation</h1>
				<p class="lead">Installation for LogToMySQLWeb. This is to be used in conjunction with <a href="http://github.com/Naththo/LogToMySQL">LogToMySQL</a>
			</div>

			<div class="maincontent">
				<p id="currentpr">Complete the form below and test your connectivity and create a configuration file... </p>
				<form class="form-horizontal" method="post" id="dbinfo">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="serverhost">Server host</label>
							<div class="controls">
								<input id="serverhost" name="serverhost" type="text" placeholder="127.0.0.1" class="form-control" value="127.0.0.1" required>
								<p class="help-block">For example 127.0.0.1</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="username">Username</label>
							<div class="controls">
								<input id="username" name="username" type="text" placeholder="Username" class="form-control" value="root" required>
								<p class="help-block">The username for your MySQL database</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<input id="password" name="password" type="password" placeholder="Password" class="form-control" value="lol123" required>
								<p class="help-block">The password for your MySQL database</p>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="dbname">Database name</label>
							<div class="controls">
								<input id="dbname" name="dbname" type="text" placeholder="Database name" class="form-control" value="znc" required>
								<p class="help-block">The database name</p>
							</div>
						</div>
					</fieldset>
					<button class="btn btn-primary" style="margin-top:10px;" id="testconnection">Test database</button>
				</form>

				<form class="form-horizontal" name="settingform" style="display:none" id="settingform">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="logamount">Amount of logs to display</label>
							<div class="controls">
								<input id="logamount" name="logamount" type="text" placeholder="50" class="form-control" required>
								<p class="help-block">Amount of logs to display on each page</p>
							</div>
						</div>
					</fieldset>
					<button class="btn btn-primary" style="margin-top:10px;" id="settingbutton">Proceed</button>
				</form>

				<br />
			</div>
			<script src="../tpl/templates/install/js/spin.min.js"></script>
		{/block}