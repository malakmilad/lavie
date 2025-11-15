@extends('layouts.master')
@section('title')
	{{isset($slider) ? 'Edit slider': 'Add slider'}}
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
				<h4 class="content-title mb-0 my-auto">slider</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($slider) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- slider form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($slider) ? Route('sliders.update', ['slider'=>$slider->id]) : Route('sliders.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group col-12">
							<label class="text-capitalize" for="title">title</label>
							<input type="text" class="form-control" name="title" id="title" required value="{{isset($slider) ? $slider->title : old('title')}}" placeholder="Enter title">
							@if ($errors->has('title'))
								<p class="help text-danger">{{$errors->first('title')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="title_en">title english</label>
							<input type="text" class="form-control" name="title_en" id="title_en" required value="{{isset($slider) ? $slider->title_en : old('title_en')}}" placeholder="Enter title english">
							@if ($errors->has('title_en'))
								<p class="help text-danger">{{$errors->first('title_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description">description</label>
							<input type="text" class="form-control" name="description" id="description" required value="{{isset($slider) ? $slider->description : old('description')}}" placeholder="Enter description">
							@if ($errors->has('description'))
								<p class="help text-danger">{{$errors->first('description')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="description_en">description english</label>
							<input type="text" class="form-control" name="description_en" id="description_en" required value="{{isset($slider) ? $slider->description_en : old('description_en')}}" placeholder="Enter description english">
							@if ($errors->has('description_en'))
								<p class="help text-danger">{{$errors->first('description_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="btn_text">button text</label>
							<input type="text" class="form-control" name="btn_text" id="btn_text" required value="{{isset($slider) ? $slider->btn_text : old('btn_text')}}" placeholder="Enter button text">
							@if ($errors->has('btn_text'))
								<p class="help text-danger">{{$errors->first('btn_text')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="btn_text_en">button text english</label>
							<input type="text" class="form-control" name="btn_text_en" id="btn_text_en" required value="{{isset($slider) ? $slider->btn_text_en : old('btn_text_en')}}" placeholder="Enter button text english">
							@if ($errors->has('btn_text_en'))
								<p class="help text-danger">{{$errors->first('btn_text_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="btn_url">button url</label>
							<input type="text" class="form-control" name="btn_url" id="btn_url" required value="{{isset($slider) ? $slider->btn_url : old('btn_url')}}" placeholder="Enter button url">
							@if ($errors->has('btn_url'))
								<p class="help text-danger">{{$errors->first('btn_url')}}</p>
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
													<input type="file" name="img" accept="image/*" class="dropify" data-height="200" />
												</div>
												@if (isset($slider))
												<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
													<img
														src="{{config('app.uploads')}}{{$slider->img}}"
														class="shadow-1-strong rounded mb-4 img-fluid"
														alt="{{$slider->title}}"
														style="max-height: 210px; min-height: 210px;"
													/>
												</div>
												@endif
											</div>
										</div>
										@if ($errors->has('img'))
											<p class="help text-danger">{{$errors->first('img')}}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- img Upload closed -->

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($slider) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- slider form END -->

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
</script>

@endsection