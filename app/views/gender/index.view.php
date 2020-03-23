<?php require './app/views/partials/header.php'; ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h2><i class="fa fa-transgender-alt"></i> | Manage Genders</h2>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right pt-2">
			<p><a href="/gender/create"><i class="fa fa-transgender"></i> | Add Gender</a></p>
		</div>
	</div>
	<hr>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-12">
			<table class="table table-striped table-bordered table-responsive-md">
				<thead>
					<tr>
					<th scope="col">ID</th>
					<th scope="col">Gender Name</th>
					<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($genders)): ?>
						<tr>
							<td colspan="6" class="text-center">No Added Genders Yet</td>
						</tr>
					<?php else: ?>
						<?php foreach ($genders as $gender): ?>
							<tr>
								<th scope="row"><?= $gender->id; ?></th>
								<td class="text-uppercase"><?= $gender->gender_name; ?></td>
								<td class="text-center">
									<a href="/gender/show?id=<?= $gender->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> &nbsp;
									<a href="/gender/edit?id=<?= $gender->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &nbsp;
									<a href="/gender/delete?id=<?= $gender->id; ?>" id="remove-item"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a> &nbsp;
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>

<?php require './app/views/partials/footer.php';
