@extends('admin.layouts.master')
@section('title')
	{{isset($article) ? 'Edit article': 'Add article'}}
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
				<h4 class="content-title mb-0 my-auto">article</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($article) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- article form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($article) ? Route('articles.update', ['article'=>$article->id]) : Route('articles.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group col-12">
							<label class="text-capitalize" for="title">title</label>
							<input type="text" class="form-control" name="title" id="title" required value="{{isset($article) ? $article->title : old('title')}}" placeholder="Enter title">
							@if ($errors->has('title'))
								<p class="help text-danger">{{$errors->first('title')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="title_en">title (English)</label>
							<input type="text" class="form-control" name="title_en" id="title_en" required value="{{isset($article) ? $article->title_en : old('title_en')}}" placeholder="Enter title in English">
							@if ($errors->has('title_en'))
								<p class="help text-danger">{{$errors->first('title_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="overview">overview</label>
							<input type="text" class="form-control" name="overview" id="overview" required value="{{isset($article) ? $article->overview : old('overview')}}" placeholder="Enter overview">
							@if ($errors->has('overview'))
								<p class="help text-danger">{{$errors->first('overview')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="overview_en">overview (English)</label>
							<input type="text" class="form-control" name="overview_en" id="overview_en" required value="{{isset($article) ? $article->overview_en : old('overview_en')}}" placeholder="Enter overview in English">
							@if ($errors->has('overview_en'))
								<p class="help text-danger">{{$errors->first('overview_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description">description</label>
							<textarea name="description" id="editor" rows="10" class="form-control">
								{{ isset($article) ? $article->description : old('description') }}
							</textarea>
							@if ($errors->has('description'))
								<p class="help text-danger">{{$errors->first('description')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description_en">description (English)</label>
							<textarea name="description_en" id="editor_en" rows="10" class="form-control">
								{{ isset($article) ? $article->description_en : old('description_en') }}
							</textarea>
							@if ($errors->has('description_en'))
								<p class="help text-danger">{{$errors->first('description_en')}}</p>
							@endif
						</div>


						<!-- img Upload -->
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">image Upload</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="main_image" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($article))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$article->main_image}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$article->title}}"
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
						<!-- img Upload closed -->

						<!-- banner Upload -->
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">
											<div>
												<h6 class="card-title mb-1">Banner Upload</h6>
											</div>
											<div class="row mb-4">
												<div class="col-sm-12 col-md-4">
													<input type="file" name="banner_image" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($article))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$article->banner_image}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$article->title}}"
														style="max-height: 210px; min-height: 210px;"
													/>
												</div>
												@endif
											</div>
										</div>
										@if ($errors->has('banner_image'))
											<p class="help text-danger">{{$errors->first('banner_image')}}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- banner Upload closed -->

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($article) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- article form END -->

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
