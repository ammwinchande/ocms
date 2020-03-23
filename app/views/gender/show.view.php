<?php require './app/views/partials/header.php'; ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h2><i class="fa fa-transgender"></i> | Gender Details</h2>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right pt-2">
			<p><a href="/gender"><i class="fa fa-transgender-alt"></i> | Manage Genders</a></p>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-lg-12 col-md-12 col-12">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row">ID</th>
						<td><?= $gender->id; ?></td>
					</tr>
					<tr>
						<th scope="row">Gender Name</th>
						<td class="text-capitalize"><?= $gender->gender_name; ?></td>
					</tr>
					<tr>
						<th scope="row">Created At</th>
						<td class="text-capitalize"><?= $gender->created_at; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

<?php require './app/views/partials/footer.php';
