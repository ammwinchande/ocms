<?php

require './app/views/partials/header.php'; ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h2><i class="fa fa-user-plus"></i> | Update Customer</h2>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right pt-2">
			<p><a href="/customer"><i class="fa fa-users"></i> | Manage Customers</a></p>
		</div>
	</div>
	<hr>
	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12 col-12 text-danger">
			<p><b>*</b> All fields are required!</p>
		</div>
		<div class="col-lg-12 col-md-12 col-12">
			<form id="form" name="form" method="POST" action="/customer/edit">
				<input type="hidden" class="form-control" name="id" value="<?= $customer->id; ?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="firstName">First Name</label>
						<input type="text" class="form-control" id="firstName" name="first_name" value="<?= $customer->first_name; ?>" required  minlength="3" maxlength="25">
					</div>
					<div class="form-group col-md-6">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" id="lastName" name="last_name" value="<?= $customer->last_name; ?>" required  minlength="3" maxlength="25">
					</div>
				</div>
				<div class="form-group">
					<label for="townName">Town Name</label>
					<input type="text" class="form-control" id="townName" name="town_name" value="<?= $customer->town_name; ?>" placeholder="Chumbageni" required  minlength="3" maxlength="25">
				</div>
				<div class="form-group">
					<label for="genderName">Gender</label>
					<select class="form-control" id="genderName" name="gender_id" required>
						<?php if (empty($genders)): ?>
							<option value="">--Please Add Gender First--</option>
						<?php else: ?>
							<option class="text-danger" value="">--Please choose your gender--</option>
							<?php foreach ($genders as $gender): ?>
								<option value="<?= $gender->id; ?>" <?= $customer->gender_id == $gender
                                ->id ? 'selected' : '' ?>><?= ucwords($gender->gender_name); ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Update Customer</button>
			</form>
		</div>
	</div>

<?php require './app/views/partials/footer.php';
