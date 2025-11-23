@extends('admin.layouts.master')
@section('title')
	{{isset($faq) ? 'Edit faq': 'Add faq'}}
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
				<h4 class="content-title mb-0 my-auto">faq</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($faq) ? 'Edit': 'Create'}}</span>
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
					<form class="form-horizontal row" method="POST" action="{{isset($faq) ? Route('faqs.update', ['faq'=>$faq->id]) : Route('faqs.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="form-group col-12">
							<label class="text-capitalize" for="question">question</label>
							<input type="text" class="form-control" name="question" id="question" required value="{{isset($faq) ? $faq->question : old('question')}}" placeholder="Enter question">
							@if ($errors->has('question'))
								<p class="help text-danger">{{$errors->first('question')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="question_en">question (English)</label>
							<input type="text" class="form-control" name="question_en" id="question_en" required value="{{isset($faq) ? $faq->question_en : old('question_en')}}" placeholder="Enter question in English">
							@if ($errors->has('question_en'))
								<p class="help text-danger">{{$errors->first('question_en')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="answer">answer</label>
							<textarea name="answer" id="editor" rows="10" class="form-control">
								{{ isset($faq) ? $faq->answer : old('answer') }}
							</textarea>
							@if ($errors->has('answer'))
								<p class="help text-danger">{{$errors->first('answer')}}</p>
							@endif
						</div>

						<div class="form-group col-12">
							<label class="text-capitalize" for="answer_en">answer (English)</label>
							<textarea name="answer_en" id="editor_en" rows="10" class="form-control">
								{{ isset($faq) ? $faq->answer_en : old('answer_en') }}
							</textarea>
							@if ($errors->has('answer_en'))
								<p class="help text-danger">{{$errors->first('answer_en')}}</p>
							@endif
						</div>


						<div class="form-group col-12">
							<label class="text-capitalize" for="sort_order">sort order</label>
							<input type="number" class="form-control" name="sort_order" id="sort_order" required value="{{isset($faq) ? $faq->sort_order : old('sort_order')}}" placeholder="Enter sort_order">
							@if ($errors->has('sort_order'))
								<p class="help text-danger">{{$errors->first('sort_order')}}</p>
							@endif
						</div>

						<div class="form-group col-12 mt-2 mb-4">
							<div class="checkbox">
								<div class="custom-checkbox custom-control">
									<?php isset($faq) ? $featured = $faq->featured : $featured = 0; ?>
									<input type="checkbox" data-checkboxes="mygroup" name="featured" value="1" {{$featured ? 'checked' : ''}} class="custom-control-input" id="featured">
									<label for="featured" class="custom-control-label mt-1"> Is featured?</label>
								</div>
							</div>
						</div>

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($faq) ? 'Update': 'Create'}}</button>
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
