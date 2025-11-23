@extends('admin.layouts.master')
@section('title', 'Users')
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Users</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Users TABLE</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="all border-bottom-0">#</th>
												<th class="all border-bottom-0">Name</th>
												<th class="all border-bottom-0">Email</th>
												<th class="all border-bottom-0">Role </th>
												<th class="all border-bottom-0">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users as $user)
											<tr>
												<td>{{$user->id}}</td>
												<td>{{$user->name}}</td>
												<td>{{$user->email}}</td>
												<td>{{$user->role}}</td>
												<td>
													<a href="users/{{$user->id}}" class="mr-3"><i class="fa-solid fa-pen-to-square"></i></a>
													<a href="#" class="deleteRow" data-id="{{$user->id}}"><i class="fa-solid fa-trash text-danger"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<!--sweetalert2 js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.deleteRow').on('click', function(e) {
			e.preventDefault();

			var deleted_id = $(this).data('id');

			Swal.fire({
				title: 'Do you want to Delete This Record?',
				showCancelButton: true,
				confirmButtonText: 'Delete',
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							type: "POST",
							url: "{{Url('admin/delete/user')}}",
							data: {"deleted_id": deleted_id},
							success: function(response) {
								if(response.status == 1) {
									Swal.fire('Deleted !', '' , 'success').then((result) => {
										location.reload();
									});
								} else {
									Swal.fire('Something went wrong !', '' , 'error');
								}
							}
						});
					}
				});

		});

	});
</script>
@endsection
