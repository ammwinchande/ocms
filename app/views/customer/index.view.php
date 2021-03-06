<?php

use App\Core\App;

require './app/views/partials/header.php'; ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h2><i class="fa fa-users"></i> | Manage Customers</h2>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right pt-2">
			<p><a href="/customer/create"><i class="fa fa-user-plus"></i> | Add Customer</a></p>
		</div>
	</div>
	<hr>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-12">
			<table class="table table-striped table-bordered table-responsive-md">
				<thead>
					<tr>
					<th scope="col">ID</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Town Name</th>
					<th scope="col">Gender</th>
					<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($customers)): ?>
						<tr>
							<td colspan="6" class="text-center">No Customers Yet</td>
						</tr>
					<?php else: ?>
						<?php foreach ($customers as $customer): ?>
							<tr>
								<th scope="row"><?= $customer->id; ?></th>
								<td class="text-capitalize"><?= $customer->first_name; ?></td>
								<td class="text-capitalize"><?= $customer->last_name; ?></td>
								<td class="text-capitalize"><?= $customer->town_name; ?></td>
								<td class="text-capitalize">
									<?= App::get('database')->selectOne('gender', $customer->gender_id)[0]->gender_name; ?>
								</td>
								<td class="text-center">
									<a href="/customer/show/?id=<?= $customer->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> &nbsp;
									<a href="/customer/edit/?id=<?= $customer->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &nbsp;
									<a href="/customer/delete/?id=<?= $customer->id; ?>"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a> &nbsp;
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>

<?php require './app/views/partials/footer.php';
