<div class="body">
	<form action="<?=base_url();?>users/update/<?php echo $model->id; ?>" method="POST">
		<input type="hidden" name="id" value="<?php echo $model->id; ?>">

		<div class="error-message">
			<?php echo validation_errors(); ?>
		</div>

		<table class="table table-hover">
			<tbody>
				<tr>
					<th>ユーザ名</th>
					<td><input type="text" name="name" class="form-control" value="<?php echo $model->name; ?>"></td>					
				</tr>
				<tr>
					<th>email</th>
					<td><input type="email" name="email" class="form-control" value="<?php echo $model->email; ?>"></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input type="password" name="password" class="form-control" value="<?php echo ($model->password ?? ''); ?>"></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><button type="submit" class="btn btn-outline-primary">編集</button></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
