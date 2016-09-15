<!DOCTYPE html>
<html lang="en">
  @include('frontend.head')
<body>
 @include('frontend.header')
 <!-- Page Content -->
    <div class="container">

		  
       
      
             @yield('content')
      
			
	
	 </div>
    <!-- /.container -->
	 <!-- jQuery -->
	 @include('frontend.footer')
	 
    
	
</body>

</html>
