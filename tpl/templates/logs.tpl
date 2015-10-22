		{extends file="main.tpl"}
		{block name="content"}
		<div class="container">
			<h1>Logs</h1>

			{if (!$data)}
			<div class="alert alert-danger" role="alert">
				<strong>Uh-oh!</strong><br />
				We could not find any logs. Are you using the correct database? Check in /inc/config.php
			</div>
			{else}
			<nav>
				<ul class="pager">
					{if $olderpage === false}
				 	<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
				 	{else}
				 	<li class="previous"><a href="?page={$olderpage}"><span aria-hidden="true">&larr;</span> Older</a></li>
				 	{/if}
				 	{if $newerpage === false}
					<li class="next disabled"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
					{else}
					<li class="next"><a href="?page={$newerpage}">Newer <span aria-hidden="true">&rarr;</span></a></li>
					{/if}
				</ul>
			</nav>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Target</th>
						<th>Time</th>
						<th>Nick</th>
						<th>Message</th>
					</tr>
				</thead>
				<tbody>
					{foreach $data as $dat}
					<tr>
						<td>{$dat['id']}</td>
						<td>{$dat['target']}</td>
						<td>{$dat['time']}</td>
						<td>{$dat['nick']}</td>
						<td>{$dat['message']}</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
			{/if}
		</div>
		{/block}