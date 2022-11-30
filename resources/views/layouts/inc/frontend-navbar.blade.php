
<div class="global-navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('assets/images/logoo.png')}}"   class="w-100" alt="img">
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertisment Here</h5>
                </div>
            </div>
        </div>
    </div>
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
              {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
                @php
                    $category=App\Models\Category::where('status','0')->where('navbar_status','0')->get();
                @endphp
                @foreach ($category as $cat)
                
                <li class="nav-item">
                  <a class="nav-link" href="{{url('tutorial/'.$cat->slug)}}">{{$cat->name}}</a>
                </li>

                @endforeach
            
            </ul>
            
          </div>
        </div>
      </nav>
</div>