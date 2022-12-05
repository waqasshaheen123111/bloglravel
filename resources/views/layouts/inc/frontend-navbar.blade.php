
<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
          @php
              $setting=App\Models\Setting::find(1);
          @endphp
            @if ($setting)
                
            
            <div class="col-md-3">
                <img src="{{asset('uploads/setting/'.$setting->logo)}}"   class="w-50" alt="img">
            </div>
            @endif
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertisment Here</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-light bg-green">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
              </li>
             
                @php
                    $category=App\Models\Category::where('status','0')->where('navbar_status','0')->get();
                @endphp
                @foreach ($category as $cat)
                
                <li class="nav-item">
                  <a class="nav-link" href="{{url('tutorial/'.$cat->slug)}}">{{$cat->name}}</a>
                </li>

                @endforeach
                @if (Auth::check())
                    
               
                <li class="nav-item">
                  <a class="nav-link bg-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  
                  <form action="{{url('logout')}}" id="logout-form" class="d-none" method="POST">
                      @csrf
                  </form>
  
              </li>
              @else
                  
                <li class="nav-item">
                  <a class="nav-link bg-success " href="{{url('login')}}">Login</a>
  
  
              </li>  
              @endif
            
            </ul>
            
          </div>
        </div>
      </nav>

      </div>