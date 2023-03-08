@extends('errors.app')
@section('title','503')
@section('content')
	<div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="pd-10">
			<div class="error-page-wrap text-center">
				<h1>503</h1>
				<h3>This Site Is Getting Up In Few Minutes.</h3>
				<p>Please Try After Some Time</p>
				<div class="pt-20 mx-auto max-width-200">
					<a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary btn-block btn-lg">Go To Back</a>
				</div>
			</div>
		</div>
	</div>
@endsection
