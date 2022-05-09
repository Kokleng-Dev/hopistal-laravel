<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/fontawesome6/css/all.min.css')}}">
    @yield('style')
</head>
<body>
    <section id="side-bar">
        <div class="navigation">
          <div class="company">
            <div class="iconCompany">
              <img class="img" src="{{url('assets/images/petsomdach.jpeg')}}" alt="" />
            </div>
            <div class="companyName">
              <p class="pb-3">
                <small>សមាគមគ្រូពេទ្យស្ម័គ្រចិត្ត យុវជនសម្ដេចតេជោ</small>
              </p>
            </div>
          </div>
          <ul class="firstUl">
            <li id="home" class="list" style="--clr: #0fc70f">
              <a href="{{route('dashboard')}}">
                <span class="icon"><i class="fa-solid fa-users"></i></span>
                <span class="text">បញ្ជីឈ្មោះសមាជិក</span>
              </a>
            </li>
            <li id="add" style="--clr: #2196f3">
              <a href="{{route('employee.add')}}">
                <span class="icon"><i class="fa-solid fa-circle-plus"></i></span>
                <span class="text">បញ្ចូលសមាជិកថ្មី</span>
              </a>
            </li>
            <li id="user" class="list" style="--clr: #b145e9">
              <a href="{{route('user')}}">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <span class="text">ព័ត៌មានផ្ទាល់ខ្លួន</span>
              </a>
            </li>
            <li id="login_P" class="list" style="--clr: #ffa117">
              <a href="{{route('user.password')}}">
                <span class="icon"><i class="fa-solid fa-key"></i></span>
                <span class="text">ប្ដូរលេខសម្ងាត់</span>
              </a>
            </li>
            <li id="logout" class="list" style="--clr:#f44336">
              <a href="#" data-bs-toggle="modal" data-bs-target="#logout_modal">
                <span class="icon"><i class="fa-solid fa-sign-out"></i></span>
                <span class="text">ចាកចេញ</span>
              </a>
            </li>
          </ul> 
        </div>
    </section>
    <section id="content">
        <div class="content">
          <div class="top">
            <div class="menuToggle"></div>
            <nav class="navbar navbar-expand navbar-light bg-white" style="border-radius: 15px !important;">
                <div class="container">
                  <ul class="navbar-nav ms-auto">
                    <li class="logout dropdown border rounded">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                ចាកចេញ
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                  </ul>
         
                </div>
            </nav>
          </div>
          <div class="info">
              @yield('top-content')
          </div>
          <div class="middle">
            <div class="middle-content">
                <!-- contetn here -->
                @yield('content')
            </div>
          </div>
        </div>
    </section>
    @include('modals.logout_modal')
    @yield('script')
    <script>
      document.querySelector('#logout').addEventListener("click", () => {
        document.querySelector('#logout').classList.toggle("active");
      });
      document.querySelector('#btnLogout').addEventListener("click", () => {
        document.querySelector('#logout').classList.toggle("active");
      });
      document.querySelector('#btnQuite').addEventListener("click", () => {
        document.querySelector('#logout').classList.toggle("active");
      });
    </script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
