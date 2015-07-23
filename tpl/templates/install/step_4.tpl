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
				<p id="currentpr">Complete the form below and create your user... </p>
				<form class="form-horizontal" method="post" id="createuser">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="username">Username</label>
							<div class="controls">
								<input id="username" name="username" type="text" placeholder="Username" class="form-control" required>
								<p class="help-block">The username for your login</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<input id="password" name="password" type="password" placeholder="Password" class="form-control" required>
								<p class="help-block">The password for your login</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="confirmpassword">Password</label>
							<div class="controls">
								<input id="confirmpassword" name="confirmpassword" type="password" placeholder="Password" class="form-control" required>
								<p class="help-block">The password for your login</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="email">Prepended Text</label>
							<div class="controls">
								<div class="input-group">
									<span class="input-group-addon" id="email">@</span>
									<input type="email" class="form-control" placeholder="something@example.com" aria-describedby="email" id="emailaddr">
								</div>
								<p class="help-block">Your email address</p>
							</div>
						</div>
					</fieldset>
					<button class="btn btn-primary" style="margin-top:10px;" id="testconnection">Create user</button>
				</form>
			</div>
			{/block}