@extends('layouts.master')
@section('title')
	{{isset($about) ? 'Edit about': 'Add about'}}
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
				<h4 class="content-title mb-0 my-auto">about</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($about) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- about form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($about) ? Route('abouts.update', ['about'=>$about->id]) : Route('abouts.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group col-12">
							<label class="text-capitalize" for="title">title</label>
							<input type="text" class="form-control" name="title" id="title" required value="{{isset($about) ? $about->title : old('title')}}" placeholder="Enter title">
							@if ($errors->has('title'))
								<p class="help text-danger">{{$errors->first('title')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="title_en">title english</label>
							<input type="text" class="form-control" name="title_en" id="title_en" required value="{{isset($about) ? $about->title_en : old('title_en')}}" placeholder="Enter title english">
							@if ($errors->has('title_en'))
								<p class="help text-danger">{{$errors->first('title_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="sort_order">sort_order</label>
							<input type="number" min="0" class="form-control" name="sort_order" id="sort_order" required value="{{isset($about) ? $about->sort_order : old('sort_order')}}" placeholder="Enter sort_order">
							@if ($errors->has('sort_order'))
								<p class="help text-danger">{{$errors->first('sort_order')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description">description</label>
							<textarea name="description" id="editor" rows="10" class="form-control">
								{{ isset($about) ? $about->description : old('description') }}
							</textarea>
							@if ($errors->has('description'))
								<p class="help text-danger">{{$errors->first('description')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description_en">description english</label>
							<textarea name="description_en" id="editor_en" rows="10" class="form-control">
								{{ isset($about) ? $about->description_en : old('description_en') }}
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
												@if (isset($about))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$about->main_image}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$about->title}}"
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

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($about) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- about form END -->

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