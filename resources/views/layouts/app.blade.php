<!DOCTYPE html>
<html lang="en">
  @include('layouts.head')
<body>



    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           @include('layouts.header')
           @include('layouts.sidebar')
        </nav>
		
		

        <div id="page-wrapper">
		<div class="main-content-inner">
		
             @yield('content')
           
        </div>
        </div>

    </div>
  	@include('layouts.footer')
</body>

</html>
