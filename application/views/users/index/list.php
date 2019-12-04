<div class="list">
	<div class="card">
		<div class="card-header">検索結果</div>
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>ユーザ名</th>
						<th>email</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($model_list['data'] as $key =>$model) { ?>
					<tr>
						<td><?php echo $model->id; ?></td>
						<td><a href="./users/edit/<?php echo $model->id; ?>"><?php echo $model->name; ?></a></td>
						<td><?php echo $model->email; ?></td>
						<td>
							<a href="<?=base_url();?>users/edit/<?php echo $model->id; ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
							<a href="<?=base_url();?>users/delete/<?php echo $model->id; ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</table>
		</div>
		<div class="card-footer">
			<div class="pagination">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>