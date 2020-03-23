<?php

use App\Core\App;

require './app/views/partials/header.php'; ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h2><i class="fa fa-user"></i> Customer Details</h2>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right pt-2">
			<p><a href="/customer"><i class="fa fa-users"></i> | Manage Customers</a></p>
		</div>
	</div>

		<div class="row mt-5">
		<div class="col-lg-12 col-md-12 col-12">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row">ID</th>
						<td><?= $customer->id; ?></td>
					</tr>
					<tr>
						<th scope="row">First Name</th>
						<td class="text-capitalize"><?= $customer->first_name; ?></td>
					</tr>

					<tr>
						<th scope="row">Last Name</th>
						<td class="text-capitalize"><?= $customer->last_name; ?></td>
					</tr>

					<tr>
						<th scope="row">Town Name</th>
						<td class="text-capitalize"><?= $customer->town_name; ?></td>
					</tr>

					<tr>
						<th scope="row">Gender</th>
						<td class="text-capitalize">
							<?= App::get('database')->selectOne('gender', $customer->gender_id)[0]->gender_name; ?>
						</td>
					</tr>
					<tr>
						<th scope="row">Created At</th>
						<td class="text-capitalize"><?= $customer->created_at; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>



<?php require './app/views/partials/footer.php';
