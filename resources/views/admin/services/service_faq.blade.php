@extends('admin.layouts.master')
@section('title')
Edit Service faq
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
				<h4 class="content-title mb-0 my-auto">Service faq</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($service_faq) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- faq form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{Route('updateServiceFaq')}}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{$service_faq->id}}">
						<h3>Edit Service Faq</h3>
						<div class="form-group col-12">
							<label class="text-capitalize" for="question">question</label>
							<input type="text" class="form-control" name="question" id="question" required value="{{isset($service_faq) ? $service_faq->question : old('question')}}" placeholder="Enter question">
							@if ($errors->has('question'))
								<p class="help text-danger">{{$errors->first('question')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="question_en">question english</label>
							<input type="text" class="form-control" name="question_en" id="question_en" required value="{{isset($service_faq) ? $service_faq->question_en : old('question_en')}}" placeholder="Enter question english">
							@if ($errors->has('question_en'))
								<p class="help text-danger">{{$errors->first('question_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="answer">answer</label>
							<textarea name="answer" id="editor" rows="10" class="form-control">
								{{ isset($service_faq) ? $service_faq->answer : old('answer') }}
							</textarea>
							@if ($errors->has('answer'))
								<p class="help text-danger">{{$errors->first('answer')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="answer_en">answer english</label>
							<textarea name="answer_en" id="editor_en" rows="10" class="form-control">
								{{ isset($service_faq) ? $service_faq->answer_en : old('answer_en') }}
							</textarea>
							@if ($errors->has('answer_en'))
								<p class="help text-danger">{{$errors->first('answer_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="link">link (optional)</label>
							<input type="text" class="form-control" name="link" id="link" value="{{isset($service_faq) ? $service_faq->link : old('link')}}" placeholder="Enter link (optional)">
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
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- faq form END -->

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

<script>
	ClassicEditor
        .create(document.querySelector('#editor'), {
            language: 'ar',

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
