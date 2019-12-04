<div class="body">
	<div class="card">
		<div class="card-header">
			<?php echo $title; ?>
		</div>
		<div class="card-body">
			<table class="table table-hover">
				<tbody>
					<tr>
						<th>ユーザ名</th>
						<td><?php echo ($model->name ?? ''); ?></td>
					</tr>
					<tr>
						<th>email</th>
						<td><?php echo ($model->email ?? ''); ?></td>
					</tr>
					<tr>
						<th>Password</th>
						<td><?php echo ($model->password ?? ''); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
