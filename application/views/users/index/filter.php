<div class="filter">
	<form action="<?=base_url('users')?>" method="GET">
	<div class="card">
		<div class="card-header">検索条件</div>
		<div class="card-body">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<td><input type="number" name="id" value="<?= $_GET['id'] ?? ''; ?>" class="form-control"></td>
				</tr>
				<tr>
					<th>ユーザ名</th>
					<td><input type="text" name="name" value="<?= $_GET['name'] ?? ''; ?>" class="form-control"></td>
				</tr>
				<tr>
					<th>email</th>
					<td><input type="email" name="email" value="<?= $_GET['email'] ?? ''; ?>" class="form-control"></td>
				</tr>

			</table>
		
		</div>
		<div class="card-footer text-right">
			<a href="<?php base_url(); ?>users" class="btn btn-sm btn-secondary">リセット</a>
			<button type="submit" class="btn btn-sm btn-primary">検索</button>
		</div>
	</div>
	</form>
</div>
