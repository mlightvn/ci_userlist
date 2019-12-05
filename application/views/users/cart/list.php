<div class="list">
	<div class="card">
		<div class="card-header">Cart list</div>
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>id</th>
						<th>ユーザ名</th>
						<th>email</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($this->cart->contents() as $key =>$model) { ?>
						<?php echo form_hidden('rowid[' . $key . ']', $model['rowid']); ?>
					<tr>
						<td><?php echo $model['rowid']; ?></td>
						<td><?php echo $model['id']; ?></td>
						<td><?php echo $model['name']; ?></td>
						<td><?php echo $model['email']; ?></td>
						<td>
							<a href="<?=base_url();?>users/cart/remove/<?php echo $model['rowid']; ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</table>
		</div>
		<div class="card-footer">
			<div class="pagination">
			</div>
		</div>
	</div>
</div>