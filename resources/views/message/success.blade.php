@if(Session::has('success_message'))
	<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
		<div class="text-white">{{Session::get('success_message')}}</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif