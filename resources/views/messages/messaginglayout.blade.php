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
        	
            <ul class="sidebar-nav" >
            	<div style="height:50px"></div>
                <li class="sidebar-brand">
                    <a href='{{url("catalogue")}}'> Catalogue </a>
                </li>
                <li>
                    <form action='{{url("searchitems")}}' method='POST'>
                        {{ csrf_field() }}
                        <div class="container-fluid">
                            <div class="row">
                                
                                <input class="col-lg-8 offset-lg-1 col-md-8 offset-md-1" type="search" placeholder="Search.." name="search">
                                
                                <div>
                                    <button type="submit" style="position: relative; left: -35%;"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
                <li>
                    <hr>
                </li>
                <li>
                    <a href='{{url("messages")}}'> Read Message </a>
                </li>
                <li>
                    <a href='{{url("messages/create")}}'> Create Message </a>
                </li>
                 @if (Auth::user()->role == 'admin')
                    <li>
                        <a href="/messages/show/deletedmessages">
                        Deleted Messages
                        </a>
                    </li>
                    <li>
                        <a href="/messages/show/spammedmessages">
                        Spammed Messages
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->


    
    <!-- /#wrapper -->

    <!-- The things need to be inserted -->

	<div>
		<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="position: -webkit-sticky; position: sticky; top: 0; opacity: 0.8; z-index: 3;"><i class="fa fa-th-large"></i></a>

        

		@yield("main_content")
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