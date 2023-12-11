{{-- <style>
 .headerClass{
  background-color: #28425B;
 } 
</style>
<header class="p-3 headerClass  text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
  
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Clients</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Fulfillment Fees</a></li>          
        </ul>

        @auth
          {{auth()->user()->name}}
          <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        @endauth
  
        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            {{-- <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> 
          </div>
        @endguest
      </div>
    </div>
  </header> --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home.index')}}"><img src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth               
              <li class="nav-item @if(\Request::route()->getName() == 'home.index' || \Request::route()->getName() == 'home.clientInvoices') active  @endif  ">
                  <a class="nav-link" href="{{ route('home.index')}}">Clients</a>
              </li>
              <li class="nav-item  @if(\Request::route()->getName() == 'home.generalFees') active @endif ">
                  <a class="nav-link" href="{{ route('home.generalFees') }}">Fulfillment Fees</a>
              </li>
            @endauth        
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            @guest
            <li class="nav-item ">
              <a href="{{ route('login.perform') }}" class=" nav-link btn btn-outline-light me-2">Login</a>
            </li>
            @endguest
            @auth 
            <li class="nav-item active">
              <a href="{{ route('logout.perform') }}" class="nav-link btn btn-outline-light me-2">Logout</a>
            </li>
            @endauth
        </ul>    
    </div>
  </div>
</nav>
  