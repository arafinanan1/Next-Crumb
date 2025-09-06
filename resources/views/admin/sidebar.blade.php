<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('assets/imgs/anan.JPG') }}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"> Arafin Anan</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{ url('/') }}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{ url('home') }}"> <i class="icon-home"></i>Admin Home </a></li>
               

                
                <li><a href="#menuFoods" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Foods </a>
                  <ul id="menuFoods" class="collapse list-unstyled ">
                    <li><a href="{{ url('add_food') }}">Add Food</a></li>
                    
                    <li><a href="{{ url('view_food') }}">View Food</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('orders') }}"> <i class="icon-logout"></i>Orders </a></li>


        
                
                <li><a href="#menuEvents" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Events </a>
                  <ul id="menuEvents"  class="collapse list-unstyled ">
                    <li><a href="{{ url('add_event') }}">Add Event</a></li>
                    
                    <li><a href="{{ url('view_event') }}">View Event</a></li>
                  </ul>
                </li>
        
       
      </nav>
      <!-- Sidebar Navigation end-->
