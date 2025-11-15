@extends('layouts.master')
@section('title')
	{{isset($branch) ? 'Edit branch': 'Add branch'}}
@endsection
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">branch</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($branch) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- branch form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($branch) ? Route('branches.update', ['branch'=>$branch->id]) : Route('branches.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group col-12">
							<label class="text-capitalize" for="name">name</label>
							<input type="text" class="form-control" name="name" id="name" required value="{{isset($branch) ? $branch->name : old('name')}}" placeholder="Enter name">
							@if ($errors->has('name'))
								<p class="help text-danger">{{$errors->first('name')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="name_en">name english</label>
							<input type="text" class="form-control" name="name_en" id="name_en" required value="{{isset($branch) ? $branch->name_en : old('name_en')}}" placeholder="Enter name english">
							@if ($errors->has('name_en'))
								<p class="help text-danger">{{$errors->first('name_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="phone_1">phone_1</label>
							<input type="text" class="form-control" name="phone_1" id="phone_1" required value="{{isset($branch) ? $branch->phone_1 : old('phone_1')}}" placeholder="Enter phone_1">
							@if ($errors->has('phone_1'))
								<p class="help text-danger">{{$errors->first('phone_1')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="phone_2">phone_2</label>
							<input type="text" class="form-control" name="phone_2" id="phone_2" value="{{isset($branch) ? $branch->phone_2 : old('phone_2')}}" placeholder="Enter phone_2">
							@if ($errors->has('phone_2'))
								<p class="help text-danger">{{$errors->first('phone_2')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="email">email</label>
							<input type="email" class="form-control" name="email" id="email" required value="{{isset($branch) ? $branch->email : old('email')}}" placeholder="Enter email">
							@if ($errors->has('email'))
								<p class="help text-danger">{{$errors->first('email')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="address">address</label>
							<input type="text" class="form-control" name="address" id="address" required value="{{isset($branch) ? $branch->address : old('address')}}" placeholder="Enter address">
							@if ($errors->has('address'))
								<p class="help text-danger">{{$errors->first('address')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="address_en">address (English)</label>
							<input type="text" class="form-control" name="address_en" id="address_en" required value="{{isset($branch) ? $branch->address_en : old('address_en')}}" placeholder="Enter Address English">
							@if ($errors->has('address_en'))
								<p class="help text-danger">{{$errors->first('address_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="latitude">latitude</label>
							<input type="text" class="form-control" name="latitude" id="latitude" required value="{{isset($branch) ? $branch->latitude : old('latitude')}}" placeholder="Enter latitude">
							@if ($errors->has('latitude'))
								<p class="help text-danger">{{$errors->first('latitude')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="longitude">longitude</label>
							<input type="text" class="form-control" name="longitude" id="longitude" required value="{{isset($branch) ? $branch->longitude : old('longitude')}}" placeholder="Enter longitude">
							@if ($errors->has('longitude'))
								<p class="help text-danger">{{$errors->first('longitude')}}</p>
							@endif
						</div>
	
						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($branch) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- branch form END -->

	</div>
	<!-- row -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

@endsection