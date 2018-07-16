@if (Session::has('success'))
    <span class="alert alert-success alert-dismissable col-md-12 mt-4"> <strong>{{ Session::get('success') }}</strong>
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">
				×
			</button></span>
@endif
@if (Session::has('error'))
    <span class="alert alert-danger alert-dismissable col-md-12 mt-4 "> <strong>{{ Session::get('error') }}</strong>
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">
				×
			</button></span>
@endif