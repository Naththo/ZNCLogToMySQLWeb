		{extends file="main.tpl"}
		{block name="content"}
		<div class="container">
			<h1>Logs</h1>

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
						<th>Nick</th>
						<th>Message</th>
					</tr>
				</thead>
				<tbody>
					{foreach $data as $dat}
					<tr>
						<td>{$dat['id']}</td>
						<td>{$dat['target']}</td>
						<td>{$dat['nick']}</td>
						<td>{$dat['message']}</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
		{/block}