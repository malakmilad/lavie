@extends('layouts.master')
@section('title')
	{{isset($user) ? 'Edit user': 'Add user'}}
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">user</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{isset($user) ? 'Edit': 'Create'}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">
		<div class="col-sm-12">
			<div class="card pt-4 box-shadow-0">
				<div class="card-body pt-0">
					<form class="form-horizontal row" method="POST" action="{{isset($user) ? Route('users.update', ['user' => $user->id]) : Route('users.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="form-group col-6">
							<label class="text-capitalize" for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" required value="{{isset($user) ? $user->name : old('name')}}" placeholder="Enter name">
							@if ($errors->has('name'))
								<p class="help text-danger">{{$errors->first('name')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="role">role</label>
							<select name="role" class="form-control" required>
								<?php isset($user) ? $user_role = $user->role : $user_role = ''; ?>
								<option value="" selected disabled>Select Role</option>
								<option value="usher" {{$user_role == 'usher' ? 'selected' : ''}}>Usher</option>
								<option value="admin" {{$user_role == 'admin' ? 'selected' : ''}}>Admin</option>
							</select>
							@if ($errors->has('role'))
								<p class="help text-danger">{{$errors->first('role')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="email">email</label>
							<input type="email" class="form-control" name="email" id="email" required value="{{isset($user) ? $user->email : old('email')}}" placeholder="Enter email">
							@if ($errors->has('email'))
								<p class="help text-danger">{{$errors->first('email')}}</p>
							@endif
						</div>

						<div class="form-group col-6">
							<label class="text-capitalize" for="password">password</label>
							<input type="password" class="form-control" name="password" id="password" autocomplete="new-password" placeholder="{{isset($user) ? "*********" : "Enter password"}}">
							@if ($errors->has('password'))
								<p class="help text-danger">{{$errors->first('password')}}</p>
							@endif
						</div>

						<div class="form-group col-12 mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">{{isset($user) ? 'Update': 'Create'}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
