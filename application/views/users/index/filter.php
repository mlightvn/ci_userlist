<div class="filter">
	<?= form_open(base_url('/users'), ["method"=>"GET"])?>
	<div class="card">
		<div class="card-header">検索条件</div>
		<div class="card-body">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<td>
						<?php
						$data = array(
							'type'  => 'number',
							'name'  => 'id',
							'id'    => 'id',
							'value' => ($_GET['id'] ?? ''),
							'class' => 'form-control'
						);
						echo form_input($data);
						?>
					</td>
				</tr>
				<tr>
					<th>ユーザ名</th>
					<td>
						<?php
						$data = array(
							'type'  => 'text',
							'name'  => 'name',
							'id'    => 'name',
							'value' => ($_GET['name'] ?? ''),
							'class' => 'form-control'
						);
						echo form_input($data);
						?>
					</td>
				</tr>
				<tr>
					<th>email</th>
					<td>
						<?php
						$data = array(
							'type'  => 'text',
							'name'  => 'email',
							'id'    => 'email',
							'value' => ($_GET['email'] ?? ''),
							'class' => 'form-control'
						);
						echo form_input($data);
						?>
					</td>
				</tr>
				<tr>
					<th>Captcha</th>
					<td><?php echo $captcha['image']; ?> : <?php echo $captcha['word']; ?></td>
				</tr>
				<tr>
					<th>Calendar</th>
					<td>
						<?php
						$data = array(
							'type'  => 'text',
							'name'  => 'datepicker',
							'readonly'    => true,
							'value' => ($_GET['datepicker'] ?? ''),
							'class' => 'form-control datepicker'
						);
						echo form_input($data);
						?>
					</td>
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

<script>
$( function() {
	$( ".datepicker" ).datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		showButtonPanel: true,
		dateFormat: "yy/mm/dd"
	});
});
</script>
