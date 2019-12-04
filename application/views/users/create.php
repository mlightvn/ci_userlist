<div class="body">
	<form action="<?=base_url();?>users/store" method="POST">
		<table class="table table-hover">
			<tbody>
				<tr>
					<th>ユーザ名</th>
					<td><input type="text" name="name" class="form-control" value=""></td>
				</tr>
				<tr>
					<th>email</th>
					<td><input type="email" name="email" class="form-control" value=""></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><button type="submit" class="btn btn-outline-primary">作成</button></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
