@extends('admin.layouts.master')
@section('title')
	{{isset($service) ? 'Edit service': 'Add service'}}
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
				<h4 class="content-title mb-0 my-auto">service</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($service) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- service form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($service) ? Route('services.update', ['service'=>$service->id]) : Route('services.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group col-12">
							<label class="text-capitalize" for="title">title</label>
							<input type="text" class="form-control" name="title" id="title" required value="{{isset($service) ? $service->title : old('title')}}" placeholder="Enter title">
							@if ($errors->has('title'))
								<p class="help text-danger">{{$errors->first('title')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="title_en">title english</label>
							<input type="text" class="form-control" name="title_en" id="title_en" required value="{{isset($service) ? $service->title_en : old('title_en')}}" placeholder="Enter title english">
							@if ($errors->has('title_en'))
								<p class="help text-danger">{{$errors->first('title_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="overview">overview</label>
							<input type="text" class="form-control" name="overview" id="overview" required value="{{isset($service) ? $service->overview : old('overview')}}" placeholder="Enter overview">
							@if ($errors->has('overview'))
								<p class="help text-danger">{{$errors->first('overview')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="overview_en">overview english</label>
							<input type="text" class="form-control" name="overview_en" id="overview_en" required value="{{isset($service) ? $service->overview_en : old('overview_en')}}" placeholder="Enter overview english">
							@if ($errors->has('overview_en'))
								<p class="help text-danger">{{$errors->first('overview_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description">description</label>
							<textarea name="description" id="editor" rows="10" class="form-control">
								{{ isset($service) ? $service->description : old('description') }}
							</textarea>
							@if ($errors->has('description'))
								<p class="help text-danger">{{$errors->first('description')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description_en">description english</label>
							<textarea name="description_en" id="editor_en" rows="10" class="form-control">
								{{ isset($service) ? $service->description_en : old('description_en') }}
							</textarea>
							@if ($errors->has('description_en'))
								<p class="help text-danger">{{$errors->first('description_en')}}</p>
							@endif
						</div>

						<!-- icon Upload -->
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">icon Upload</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="main_image" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($service))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$service->main_image}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$service->title}}"
														style="max-height: 210px; min-height: 210px;"
													/>
												</div>
												@endif
											</div>
										</div>
										@if ($errors->has('main_image'))
											<p class="help text-danger">{{$errors->first('main_image')}}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- icon Upload closed -->

						<!-- images Upload -->
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">images Upload</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="imgs[]" multiple="true" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($service->imgs))
												@foreach(explode(', ', $service->imgs) as $img)
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$img}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$service->title}}"
														style="max-height: 210px; min-height: 210px;"
													/>
												</div>
												@endforeach
												@endif
											</div>
										</div>
										@if ($errors->has('imgs'))
											<p class="help text-danger">{{$errors->first('imgs')}}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- images Upload closed -->



						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($service) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- service form END -->

		@isset($service)

		<!-- video Upload -->
		<div class="col-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card">

						<div class="card-body">
							<form class="form-horizontal row" method="POST" action="{{Route('insertServiceVideo')}}" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="service_id" value="{{$service->id}}">
								<div>
									<h3>Add Video</h3>
								</div>
								<div class="col-sm-12">
									<input type="text" name="youtube_url" class="form-control" placeholder="Youtube Url" />
								</div>
								{{-- <div class="col-sm-12">
									<input type="file" name="video" accept="video/*" class="dropify" data-height="200" />
								</div> --}}

								<div class="form-group col-12 mb-0 mt-3 justify-content-end">
									<div>
										<button type="submit" class="btn btn-primary">Add</button>
									</div>
								</div>
							</form>
						</div>
						@if ($errors->has('video'))
							<p class="help text-danger">{{$errors->first('video')}}</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- video Upload closed -->

		<!-- service videos end -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mg-b-0">Service videos TABLE</h4>
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
									<th class="all border-bottom-0">video</th>
									<th class="all border-bottom-0">Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i=1; @endphp
								@foreach (explode(", ", $service->youtube_urls) as $s_video)
								@if ($s_video)
								<tr>
									<td>{{$i}}</td>
									<td>
										<a href="{{$s_video}}" target="_blank"><i class="fa fa-play"></i> Preview</a>
									</td>
									<td>
										<a href="#" class="deleteRow mx-1" data-src="{{$s_video}}" data-route="{{ route('deleteServiceVideo')}}"><i class="fa-solid fa-trash text-danger"></i></a>
									</td>
								</tr>
								@php $i++; @endphp
								@endif
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- End Table -->

				</div>
			</div>
		</div>
		<!-- /service videos end -->

		<!-- reviews form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{Route('insertServiceReview')}}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="service_id" value="{{$service->id}}">

						<h3>Add review</h3>

						<div class="col-sm-12 col-md-12">
							<input type="file" name="img" accept="image/*" class="dropify" data-height="200" />
						</div>
						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- reviews form END -->

		<!-- reviews table end -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mg-b-0">Service reviews TABLE</h4>
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
									<th class="all border-bottom-0">img</th>
									<th class="all border-bottom-0">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($service_reviews as $service_review)
								<tr>
									<td>{{$service_review->id}}</td>
									<td>
										<img
											src="{{config('app.uploads')}}{{$service_review->img}}"
											class="shadow-1-strong rounded mb-4 img-fluid"
											alt="{{$service->title}}"
											style="height: 90px;"
										/>
									</td>
									<td>
										<a href="#" class="deleteRow mx-1" data-id="{{$service_review->id}}" data-route="{{ route('deleteServiceReview') }}"><i class="fa-solid fa-trash text-danger"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- End Table -->

				</div>
			</div>
		</div>
		<!-- /reviews table end -->

		@endisset

		@isset($service)
		<!-- faq form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{Route('insertServiceFaq')}}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="service_id" value="{{$service->id}}">
						<h3>Add Faq</h3>
						<div class="form-group col-12">
							<label class="text-capitalize" for="question">question</label>
							<input type="text" class="form-control" name="question" id="question" required value="{{isset($faq) ? $faq->question : old('question')}}" placeholder="Enter question">
							@if ($errors->has('question'))
								<p class="help text-danger">{{$errors->first('question')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="question_en">question english</label>
							<input type="text" class="form-control" name="question_en" id="question_en" required value="{{isset($faq) ? $faq->question_en : old('question_en')}}" placeholder="Enter question english">
							@if ($errors->has('question_en'))
								<p class="help text-danger">{{$errors->first('question_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="answer">answer</label>
							<input type="text" class="form-control" name="answer" id="answer" required value="{{isset($faq) ? $faq->answer : old('answer')}}" placeholder="Enter answer">
							@if ($errors->has('answer'))
								<p class="help text-danger">{{$errors->first('answer')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="answer_en">answer english</label>
							<input type="text" class="form-control" name="answer_en" id="answer_en" required value="{{isset($faq) ? $faq->answer_en : old('answer_en')}}" placeholder="Enter answer english">
							@if ($errors->has('answer_en'))
								<p class="help text-danger">{{$errors->first('answer_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="link">link (optional)</label>
							<input type="text" class="form-control" name="link" id="link" value="{{isset($faq) ? $faq->link : old('link')}}" placeholder="Enter link (optional)">
							@if ($errors->has('link'))
								<p class="help text-danger">{{$errors->first('link')}}</p>
							@endif
						</div>

						<div class="col-sm-12 col-md-4">
							<label class="text-capitalize" for="video">video (optional)</label>
							<input type="file" name="video" accept="video/*" class="dropify" data-height="200" />
						</div>

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">Create</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- faq form END -->

		<!-- faqs table end -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mg-b-0">Service faqs TABLE</h4>
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
									<th class="all border-bottom-0">question</th>
									<th class="all border-bottom-0">video ?</th>
									<th class="all border-bottom-0">link ?</th>
									<th class="all border-bottom-0">date</th>
									<th class="all border-bottom-0">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($service_faqs as $faq)
								<tr>
									<td>{{$faq->id}}</td>
									<td>{{$faq->question}}</td>
									<td>
										@if ($faq->video)
										<a href="{{config('app.uploads')}}{{$faq->video}}" target="_blank"><i class="fa fa-play"></i> Preview</a>
										@endif
									</td>
									<td>
										@php
											$link = $faq->link;
											if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
												$link = "https://" . $link;
											}
										@endphp
										<a href="{{ $link }}" target="_blank">{{ $faq->link }}</a>
									</td>
									<td>{{date('d M Y', strtotime($faq->created_at))}}</td>
									<td>
										<a href="{{ url('admin/servicefaq') }}/{{$faq->id}}" class="mx-1"><i class="fa-solid fa-pen-to-square"></i></a>
										<a href="#" class="deleteRow mx-1" data-id="{{$faq->id}}" data-route="{{ route('deleteServiceFaq') }}"><i class="fa-solid fa-trash text-danger"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- End Table -->

				</div>
			</div>
		</div>
		<!-- /faqs table end -->
		@endisset

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


	function deleteRecord(record_id, src , route) {

		var ajaxPromise = ajaxRequest('POST', route, {record_id: record_id, src: src});

		ajaxPromise.done(function(response) {
			swalAlert(response.message, '' ,response.status);
		});

		ajaxPromise.fail(function(xhr, status, error) {
			swalAlert('Request failed', '' ,0);
			console.log('Request failed:', error);
		});

	}



	function confirmDeleteRecord(record_id, src, route) {
		return function() {
			deleteRecord(record_id, src, route);
		};
	}


	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		// Delete record
		$('.deleteRow').on('click', function(e) {
			e.preventDefault();
			var record_id = $(this).data('id');
			var route = $(this).data('route');
			var src = $(this).data('src');
			swalWithConfirm(confirmDeleteRecord(record_id, src, route));
		});

		// *** Pagination
		$('#pagiantionNav .page-link').on('click', function(e) {
			e.preventDefault();
			pagination($(this));
		});

	});
</script>

@endsection
