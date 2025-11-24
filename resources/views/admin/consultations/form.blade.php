@extends('admin.layouts.master')
@section('title')
consultation Details
@endsection
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm mt-3">

		<!-- consultation start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body">

					<table class="table">
						<thead class="bg-primary py-3">
						  <tr>
							<th class="text-white py-3" scope="col">#</th>
							<th class="text-white py-3" scope="col">{{$consultation->id}}</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<th scope="row">fullname</th>
							<td>{{$consultation->fullname}}</td>
						  </tr>
						  <tr>
							<th scope="row">phone</th>
							<td>{{$consultation->phone}}</td>
						  </tr>
						  <tr>
							<th scope="row">service</th>
							<td>{{$consultation->service}}</td>
						  </tr>
						  <tr>
							<th scope="row">message</th>
							<td>{{$consultation->message}}</td>
						  </tr>
						  <tr>
							<th scope="row">date</th>
							<td>{{date('d M Y', strtotime($consultation->created_at))}}</td>
						  </tr>

						</tbody>
					</table>

				</div>
			</div>
		</div>
		<!-- consultation END -->


	</div>
	<!-- row -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
