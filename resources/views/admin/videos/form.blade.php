@extends('layouts.master')
@section('title')
	{{isset($video) ? 'Edit video': 'Add video'}}
@endsection

@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">video</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($video) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">

		<!-- video form start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($video) ? Route('videos.update', ['video'=>$video->id]) : Route('videos.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="col-12">
							<label class="text-capitalize" for="link">link</label>
							<input type="text" class="form-control" required name="media_src" id="link" value="{{isset($video) ? $video->media_src : old('link')}}" placeholder="Enter link">
							@if ($errors->has('media_src'))
								<p class="help text-danger">{{$errors->first('media_src')}}</p>
							@endif
						</div>
						<!-- video Upload closed -->


						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($video) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- video form END -->

	</div>
	<!-- row -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
