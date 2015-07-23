		{extends file="install/main.tpl"}
		{block name="content"}
		<style type="text/css">
			{literal}body{padding-top:70px;padding-bottom:30px}body,.navbar-fixed-top,.navbar-fixed-bottom{min-width:970px}.lead{font-size:16px}.page-header{margin-bottom:30px}.page-header .lead{margin-bottom:10px}{/literal}
		</style>
			<div class="page-header">
				<h1>Installation</h1>
				<p class="lead">Installation for LogToMySQLWeb. This is to be used in conjunction with <a href="http://github.com/Naththo/LogToMySQL">LogToMySQL</a>
			</div>

			<div class="maincontent">
				{if isset($errors)}
					<div class="alert alert-danger">
						{foreach $errors as $error}
						{$error} is not writable. Please CHMOD.<br />
						{/foreach}
					</div>
				{/if}
				<h3>The process</h3>
				<p>
					<ul>
						<li>
							Check if the following directories exist (if not, create them) and are writable:
							<ul>
								<li>/inc/</li>
								<li>/tpl/templates_compiled/</li>
								<li>/install</li>
							</ul>
						</li>
						<li>Check database connectivity & create configuration file</li>
						<li>Create necessary tables</li>
						<li>Set up user</li>
					</ul>
				</p>
				<hr>
				<h3>Are you ready?</h3>
				<p>
					If you believe you have everything set as it should be, let's go!<br />
					<button class="btn btn-primary" style="margin-top:10px;" id="startbutton">Start</button>
				</p>
			</div>

		{/block}