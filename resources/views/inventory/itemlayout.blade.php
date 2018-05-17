<!DOCTYPE html>  
<html>
<head>
	<title>Sample Template</title>
	 <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/design.css') }}" > -->

	<!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrapsidebar/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
</head>
<body>
	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="top: 0px; z-index: 3;">

        	<form action='{{url("catalogue")}}' method="Post">

            {{ csrf_field() }}
                <ul class="sidebar-nav">
                	<div style="height:50px"></div>
                    <li class="sidebar-brand" style="border-bottom: 1px solid white">
                        
                        <h1>    <strong> Category </strong> </h1>
                        
                    </li>
                        <input type="hidden" name='category[]' value="0" checked="checked">
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="New Arrival"> <strong> New Arrival </strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Pre-Loved"><strong> Pre-Loved</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Summer Collection"><strong> Summer Collection</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Fall Collection"><strong> Fall Collection</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Winter Collection"><strong> Winter Collection</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Spring Collection"><strong> Spring Collection</strong>
                    </li>
                    <li style="padding-top: 10px;">
                        <input type="submit" value="FIND BY CATEGORY" class="btn">
                    </li>
                </ul>
            </form>
        </div>
        <!-- /#sidebar-wrapper -->

    
    <!-- /#wrapper -->

    <!-- The things need to be inserted -->

	<div>
		<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="position: -webkit-sticky; position: sticky; top: 0; opacity: 0.8; z-index: 3;"><i class="fa fa-th-large"></i></a>

		@yield("item_content")
		@extends('layouts.footer')
	</div>

	<!-- end of those things inserted -->


	</div>


	<div>

	<!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquerysidebar/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrapsidebar/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

	
	</div>

	

</body>
</html>