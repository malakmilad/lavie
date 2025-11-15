@extends('layouts.master')
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="left-content">
		<div>
			<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
			<p class="mg-b-0">Dashboard stats</p>
		</div>
	</div>
</div>
<!-- /breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row row-sm">
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="px-3 py-4">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">TOTAL SERVICES</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$servicesCount}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="px-3 py-4">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">TOTAL ARTICLES</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$articlesCount}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="px-3 py-4">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">TOTAL FAQ</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$faqCount}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="px-3 py-4">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">TOTAL MESSAGES</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$contactsCount}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="px-3 py-4">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">TOTAL CONSULTATIONS</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$consultationsCount}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- row closed -->


	

</div>
<!-- Container closed -->
@endsection

