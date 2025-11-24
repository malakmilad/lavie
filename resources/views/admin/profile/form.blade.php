@extends('admin.layouts.master')
@section('title')
	{{isset($profile) ? 'Edit profile': 'Add profile'}}
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
				<h4 class="content-title mb-0 my-auto">profile</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($profile) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- profile form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($profile) ? Route('profile.update', ['id'=>$profile->id]) : Route('profile.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="form-group col-6">
							<label class="text-capitalize" for="name">name</label>
							<input type="text" class="form-control" name="name" id="name" required value="{{isset($profile) ? $profile->name : old('name')}}" placeholder="Enter name">
							@if ($errors->has('name'))
								<p class="help text-danger">{{$errors->first('name')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="name_en">name (English)</label>
							<input type="text" class="form-control" name="name_en" id="name_en" required value="{{isset($profile) ? $profile->name_en : old('name_en')}}" placeholder="Enter name in English">
							@if ($errors->has('name_en'))
								<p class="help text-danger">{{$errors->first('name_en')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="title">title</label>
							<input type="text" class="form-control" name="title" id="title" required value="{{isset($profile) ? $profile->title : old('title')}}" placeholder="Enter title">
							@if ($errors->has('title'))
								<p class="help text-danger">{{$errors->first('title')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="title_en">title (English)</label>
							<input type="text" class="form-control" name="title_en" id="title_en" required value="{{isset($profile) ? $profile->title_en : old('title_en')}}" placeholder="Enter title in English">
							@if ($errors->has('title_en'))
								<p class="help text-danger">{{$errors->first('title_en')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="phone">phone</label>
							<input type="text" class="form-control" name="phone" id="phone" required value="{{isset($profile) ? $profile->phone : old('phone')}}" placeholder="Enter phone">
							@if ($errors->has('phone'))
								<p class="help text-danger">{{$errors->first('phone')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="email">email</label>
							<input type="email" class="form-control" name="email" id="email" required value="{{isset($profile) ? $profile->email : old('email')}}" placeholder="Enter email">
							@if ($errors->has('email'))
								<p class="help text-danger">{{$errors->first('email')}}</p>
							@endif
						</div>


						<div class="form-group col-12">
							<label class="text-capitalize" for="cv">cv</label>
							<textarea name="cv" id="editor" rows="10" class="form-control">
								{{ isset($profile) ? $profile->cv : old('cv') }}
							</textarea>
							@if ($errors->has('cv'))
								<p class="help text-danger">{{$errors->first('cv')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="cv_en">cv (English)</label>
							<textarea name="cv_en" id="editor_en" rows="10" class="form-control">
								{{ isset($profile) ? $profile->cv_en : old('cv_en') }}
							</textarea>
							@if ($errors->has('cv_en'))
								<p class="help text-danger">{{$errors->first('cv_en')}}</p>
							@endif
						</div>


						<!-- img Upload -->
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">Profile Image</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="profile_image" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($profile))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$profile->profile_image}}"
														class="shadow-1-strong mb-4 img-fluid"
														alt="{{$profile->title}}"
														style="max-height: 210px; min-height: 210px; border-radius: 50%; border:2px solid #00acba"
													/>
												</div>
												@endif
											</div>
										</div>
										@if ($errors->has('profile_image'))
											<p class="help text-danger">{{$errors->first('profile_image')}}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- img Upload closed -->

						<!-- banner Upload -->
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">Cover Image</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="cover_image" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($profile))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$profile->cover_image}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$profile->title}}"
														style="max-height: 210px; min-height: 210px;"
													/>
												</div>
												@endif
											</div>
										</div>
										@if ($errors->has('cover_image'))
											<p class="help text-danger">{{$errors->first('cover_image')}}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- banner Upload closed -->

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($profile) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- profile form END -->

	</div>
	<!-- row -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!-- Include the CKEditor library -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<!-- Initialize CKEditor -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            language: 'ar', //Arabic for RTL

        })
        .catch(error => {
            console.error(error);
        });

	ClassicEditor
        .create(document.querySelector('#editor_en'), {
            language: 'en',

        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
