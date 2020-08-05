
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"
           style="border: 1px solid #eee;padding:10px;">
           ShoppingCart
        </a>

        <button class="navbar-toggler"
               type="button" data-toggle="collapse"
               data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent"
               aria-expanded="false"
               aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
               @auth
              @if(\Auth::user()->admin)
            <li class="nav-item active">
              <a class="nav-link btn btn-primary btn-sm"
                 href="{{url('/home')}}">
                  Dashboard
                 </a>
            </li>
           @endif


           @if(!\Auth::user()->admin)
            <li class="nav-item active">
                    <a class="nav-link"
                       href="{{url('/shopping-cart')}}"> Cart
                       @if(session()->has('cart'))
                        <span class="badge"
                              style="color:white;
                                    background:red;border-radius:50%;
                                    font-size:14px">
                         {{session()->has('cart') ? session()->get('cart')->totalQty:''}}
                        </span>
                        @endif
                    </a>
                  </li>
                  @endif

               @if(!\Auth::user()->admin)
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/userpaymenthistory')}}">
                        History
                    </a>
                 </li>
                @endif

                 <li class="nav-item active" style="background-color:red">
                        <a class="nav-link" href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                         Logout
                         </a>
                         <form id="logout-form"
                               action="{{ route('logout') }}"
                               method="POST" style="display: none;">
                               @csrf
                        </form>
                        </li>
            @else
              <li class="nav-item active">
              <a class="nav-link"
                 href="{{route('login')}}">
                  Login
              </a>
              </li>

              @if(Route::has('register'))
              <li class="nav-item active">
              <a class="nav-link"
                 href="{{route('register')}}">
                 Register
              </a>
            </li>
            @endif
            @endauth
          </ul>
        </div>
</div>
</nav>
