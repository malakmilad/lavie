@extends('admin.layouts.master')
@section('title', 'ContactRequests')

@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ContactRequests</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')

		<div class="loader-container hidden">
			<div class="spinner-border"></div>
		</div>

		<!-- row opened -->
		<div class="row row-sm">

			<div class="col-xl-12">
				<div class="card">
					<div class="card-header pb-0">
						<div class="d-flex justify-content-between">
							<h4 class="card-title mg-b-0">ContactRequests TABLE</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
					</div>
					<div class="card-body">

						<!-- Start Table -->
						<div class="table-responsive">
							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>
										<th class="all border-bottom-0">#</th>
										<th class="all border-bottom-0">fullname</th>
										<th class="all border-bottom-0">phone</th>
										<th class="all border-bottom-0">status</th>
										<th class="all border-bottom-0">date</th>
										<th class="all border-bottom-0">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($contactRequests as $contactRequest)
									<tr>
										<td>{{$contactRequest->id}}</td>
										<td>{{$contactRequest->fullname}}</td>
										<td>{{$contactRequest->phone}}</td>
										<td>
											@if($contactRequest->status)
												<span class="badge bg-success text-white">Seen</span>
											@else
												<span class="badge bg-danger text-white">Unread</span>
											@endif
										</td>
										<td>{{date('d M Y', strtotime($contactRequest->created_at))}}</td>
										<td>
											<a href="contactRequests/{{$contactRequest->id}}" class="mx-1">
												<i class="fa-solid fa-eye"></i>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- End Table -->



						<!-- Start Pagination -->
						@if (count($contactRequests) > 0)

						<div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Page {{$page}}–{{$num_of_pages}}</div>
						<nav aria-label="Page navigation" id="pagiantionNav">
							<ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2">

								<li class="page-item {{$page==1 ? 'disabled' : ''}}">
									<a class="page-link bg-none  rounded-0 text-dark" href="#" data-page="1" aria-label="Previous" title="Start">
										<i class="fa-solid fa-angles-left"></i>
									</a>
								</li>
								<li class="page-item {{$page==1 ? 'disabled' : ''}}">
									<a class="page-link bg-none  rounded-0 text-dark" href="#" data-page="{{$page-1}}" aria-label="Previous">
										<i class="fa-solid fa-angle-left" title="Previous"></i>
									</a>
								</li>

								<?php
									if($page < 11) {
										$pagination_start = 1;
									} else {
										$pagination_start = ((int) ($page / 10)) * 10;
									}
								?>

								@for ($page_count = $pagination_start, $i=1; $page_count <= $num_of_pages; $page_count++, $i++)

								<?php if ($i>10) { break;} ?>

								<li class="page-item {{$page==$page_count ? 'active disabled-link' : ''}}">
									<a class="page-link font-size-14 text-dark {{$page==$page_count ? 'text-white' : ''}}" href="#" data-page="{{$page_count}}">{{$page_count}}</a>
								</li>

								@endfor

								<li class="page-item {{$page==$num_of_pages ? 'disabled' : ''}}">
									<a class="page-link bg-none  rounded-0 text-dark" href="#" data-page="{{$page+1}}" aria-label="Next">
										<i class="fa-solid fa-angle-right" title="Next"></i>
									</a>
								</li>
								<li class="page-item {{$page==$num_of_pages ? 'disabled' : ''}}">
									<a class="page-link bg-none  rounded-0 text-dark" href="#" data-page="{{$num_of_pages}}" aria-label="Next" title="End">
										<i class="fa-solid fa-angles-right"></i>
									</a>
								</li>

							</ul>
						</nav>

						@endif
						<!-- End Pagination -->


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

<script>

	function pagination($this) {
		var page = $this.data('page');

		var params = new URLSearchParams(location.search);
		params.set('page', page);
		window.location.search = params.toString();

	}


	$(document).ready(function() {

		// *** Pagination
		$('#pagiantionNav .page-link').on('click', function(e) {
			e.preventDefault();
			pagination($(this));
		});

	});



</script>
@endsection
