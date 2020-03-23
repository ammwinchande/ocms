<?php require './app/views/partials/header.php'; ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h2><i class="fa fa-transgender"></i> | Update Gender</h2>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right pt-2">
			<p><a href="/gender"><i class="fa fa-transgender-alt"></i> | Manage Genders</a></p>
		</div>
	</div>
	<hr>
	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12 col-12 text-danger">
			<p><b>*</b> All fields are required!</p>
		</div>
		<div class="col-lg-12 col-md-12 col-12">
			<form id="form" name="form" method="POST" action="/gender/edit">
				<input type="hidden" class="form-control" name="id" value="<?= $gender->id; ?>">
				<div class="form-group">
					<label for="genderName">Gender Name</label>
					<input type="text" class="form-control" id="genderName" name="gender_name" value="<?= $gender->gender_name; ?>" required  minlength="3" maxlength="25">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Update Gender</button>
			</form>
		</div>
	</div>

<?php require './app/views/partials/footer.php';
