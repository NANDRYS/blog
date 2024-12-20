   <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
       <div class="container-fluid">
           <a class="navbar-brand" href="#">Navbar</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                   <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="#">Home</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Features</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Pricing</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                   </li>
               </ul>
               @auth
                   <div class="d-flex ">
                       <span class="text-white">{{ auth()->user()->email }}</span>
                       <a href="{{ route('user.logout') }}" class="btn btn-success">logout</a>
                   </div>
               @else
                   <div class="d-flex ">
                       <a href="{{ route('user.register') }}" class="btn btn-success">register</a>

                       <a href="{{ route('user.login') }}" class="btn btn-primary">login</a>
                   </div>

               @endauth

               {{-- @guest
                   
               @endguest --}}

           </div>
       </div>
   </nav>
