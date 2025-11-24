@extends('admin.layouts.master')
@section('title')
	{{isset($review) ? 'Edit review': 'Add review'}}
@endsection
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">review</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($review) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- review form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($review) ? Route('reviews.update', ['review'=>$review->id]) : Route('reviews.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="form-group col-6">
							<input type="radio" name="media_type" id="image" value="image" data-target="#image-container" required {{isset($review) && $review->media_type == 'image' ? 'checked' : ''}}>
							<label class="text-capitalize" for="image">Image</label>

							<input type="radio" class="ml-2" name="media_type" id="video" value="video" data-target="#video-container" required {{isset($review) && $review->media_type == 'video' ? 'checked' : ''}}>
							<label class="text-capitalize" for="video">Video</label>

							@if ($errors->has('media_type'))
								<p class="help text-danger">{{$errors->first('media_type')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							@if ($errors->has('image'))
								<p class="help text-danger">{{$errors->first('image')}}</p>
							@endif
							@if ($errors->has('video'))
								<p class="help text-danger">{{$errors->first('video')}}</p>
							@endif
						</div>

						<!-- img Upload -->
						<div class="col-12 d-none media-container" id="image-container">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">img Upload</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="image" class="dropify" data-height="200" />
												</div>
												@if (isset($review))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$review->media_src}}"
														class="w-100 shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$review->title}}"
														style="max-height: 210px; min-height: 210px;"
													/>
												</div>
												@endif
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- img Upload closed -->

						<!-- video Upload -->
						{{-- <div class="col-12 media-container d-none" id="video-container">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">Video Upload</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="video" accept="video/*" class="dropify" data-height="200" />
												</div>
												@if (isset($review))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<video src="{{config('app.uploads')}}{{$review->media_src}}" height="300"></video>
												</div>
												@endif
											</div>
										</div>

									</div>
								</div>
							</div>
						</div> --}}
						<div class="col-12 media-container d-none" id="video-container">
							<label class="text-capitalize" for="link">link</label>
							<input type="text" class="form-control" required name="link" id="link" value="{{isset($review) ? $review->media_src : old('link')}}" placeholder="Enter link">
							@if ($errors->has('link'))
								<p class="help text-danger">{{$errors->first('link')}}</p>
							@endif
						</div>
						<!-- video Upload closed -->


						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($review) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- review form END -->

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

<script>
	$(document).ready(function() {

		// Initial check on page load to show the checked input's target
		$('input[name="media_type"]').each(function() {
			if ($(this).is(':checked')) {
				$(".media-container").addClass("d-none");
				$($(this).data('target')).removeClass("d-none");
			}
		});

		$('input[name="media_type"]').change(function() {
			$(".media-container").addClass("d-none");
			$($(this).data('target')).removeClass("d-none");
		});
	});
</script>

@endsection
