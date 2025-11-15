@extends('layouts.master')
@section('title')
ContactRequest Details
@endsection
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm mt-3">

		<!-- ContactRequest start -->
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body">

					<table class="table">
						<thead class="bg-primary py-3">
						  <tr>
							<th class="text-white py-3" scope="col">#</th>
							<th class="text-white py-3" scope="col">{{$contactRequest->id}}</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<th scope="row">fullname</th>
							<td>{{$contactRequest->fullname}}</td>
						  </tr>
						  <tr>
							<th scope="row">phone</th>
							<td>{{$contactRequest->phone}}</td>
						  </tr>
						  <tr>
							<th scope="row">email</th>
							<td>{{$contactRequest->email}}</td>
						  </tr>
						  <tr>
							<th scope="row">message</th>
							<td>{{$contactRequest->message}}</td>
						  </tr>
						  <tr>
							<th scope="row">date</th>
							<td>{{date('d M Y', strtotime($contactRequest->created_at))}}</td>
						  </tr>
						  
						</tbody>
					</table>
	
				</div>
			</div>
		</div>
		<!-- ContactRequest END -->


	</div>
	<!-- row -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
