<div class="body">
	<?= form_open(base_url('/users/login'))?>

		<div class="error-message">
			<?php echo validation_errors(); ?>
			<?php if(isset($error_msg)){ ?>
			<p><?php echo $error_msg; ?></p>
			<?php } ?>
		</div>

		<table class="table">
			<tr>
				<th width="150">email</th>
				<td>
					<?php
					$data = array(
						'type'  => 'text',
						'name'  => 'email',
						'id'    => 'email',
						'value' => ($_REQUEST['email'] ?? ''),
						'class' => 'form-control'
					);
					echo form_input($data);
					?>
				</td>
			</tr>
			<tr>
				<th>Password</th>
				<td>
					<?php
					$data = array(
						'type'  => 'password',
						'name'  => 'password',
						'id'    => 'password',
						'class' => 'form-control'
					);
					echo form_input($data);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<?php
					$data = array(
						'value'    => 'Reset',
						'class' => 'btn btn-outline-secondary'
					);
					echo form_reset($data);
					?>

					<?php
					$data = array(
						'value'    => 'Login',
						'class' => 'btn btn-outline-primary'
					);
					echo form_submit($data);
					?>
				</td>
			</tr>
		</table>
	</form>
</div>
