@include('layouts.bootstrap_admin3.header')

	<div class="page-content">
    	<div class="row">
    	@include('layouts.bootstrap_admin3.menu')
    	@yield('content')
    	</div>
    </div>



@include('layouts.bootstrap_admin3.footer')