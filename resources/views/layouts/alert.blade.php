@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session('success') }} <span class="close" data-dismiss="alert">x</span>
	</div>
@endif
@if(session()->has('error'))
	<div class="alert alert-danger">
		{{ session('error') }} <span class="close" data-dismiss="alert">x</span>
	</div>
@endif
@if(session()->has('errors'))
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $err)
				<li>
					{{ $err }}
				</li>
			@endforeach
		</ul>
		 <span class="close" data-dismiss="alert">x</span>
	</div>
@endif