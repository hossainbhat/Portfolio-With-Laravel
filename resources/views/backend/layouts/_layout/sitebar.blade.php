<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
      <!-- Logo Start -->
      <div class="logo position-relative">
        <a href="Dashboard.html">
          <!-- Logo can be added directly -->
          <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

          <!-- Or added via css to provide different ones for different color themes -->
          <div class="img"></div>
        </a>
      </div>
      <!-- Logo End -->

      <!-- User Menu Start -->
      <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="profile" alt="profile" src="{{asset('assets/backend/img/profile/profile-1.webp')}}" />
          <div class="name">{{ucwords(auth()->user()->name)}}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide d-none">
         
        </div>
      </div>
      <!-- User Menu End -->

      <!-- Icons Menu Start -->
      <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
          <a target="_blank" href="{{route('index')}}">
            <i class="fa-solid fa-globe"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" id="colorButton">
            <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
            <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
            <div class="position-relative d-inline-flex">
              <i data-acorn-icon="bell" data-acorn-size="18"></i>
              <span class="position-absolute notification-dot rounded-xl"></span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
            <div class="scroll">
              <ul class="list-unstyled border-last-none">

                <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                  <img src="{{asset('assets/backend/img/profile/profile-1.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                  <div class="align-self-center">
                    <a href="#">Joisse Kaycee just sent a new comment!</a>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </li>
      </ul>
      <!-- Icons Menu End -->

      <!-- Menu Start -->
      <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
          <li>
            <a href="{{route('admin.dashboard')}}">
              <i class="fa-solid fa-gauge"></i>
              <span class="label">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.dashboard')}}">
              <i class="fa-solid fa-user"></i>
              <span class="label">Profile</span>
            </a>
          </li>
          <li>
            <a href="{{route('skill.index')}}" class="{{ (url()->current()== route('skill.index')) ? 'active' : '' }}">
              <i class="fa-solid fa-user-gear"></i>
              <span class="label">Skills</span>
            </a>
          </li>
          <li>
            <a href="{{route('experience.index')}}" class="{{ (url()->current()== route('experience.index')) ? 'active' : '' }}">
              <i class="fa-solid fa-bars-progress"></i>
              <span class="label">Experiences</span>
            </a>
          </li>
          <li>
            <a href="{{route('education.index')}}" class="{{ (url()->current()== route('education.index')) ? 'active' : '' }}">
              <i class="fa-solid fa-graduation-cap"></i>
              <span class="label">Educations</span>
            </a>
          </li>
          <li>
            <a href="{{route('portfolio.index')}}" class="{{ (url()->current()== route('portfolio.index')) ? 'active' : '' }}">
              <i class="fa-solid fa-diagram-project"></i>
              <span class="label">Protfolios</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.dashboard')}}">
              <i class="fa-solid fa-envelope"></i>
              <span class="label">Mails</span>
            </a>
          </li>
          <li>
            <a href="{{route('blog.index')}}" class="{{ (url()->current()== route('blog.index')) ? 'active' : '' }}">
              <i class="fa-solid fa-blog"></i>
              <span class="label">Blogs</span>
            </a>
          </li>
          
          <li>
            <a href="{{route('admin.logout')}}">
              <i class="fa-solid fa-power-off"></i>
              <span class="label">Logout</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- Menu End -->

      <!-- Mobile Buttons Start -->
      <div class="mobile-buttons-container">
        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
          <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
      </div>
      <!-- Mobile Buttons End -->
    </div>
    <div class="nav-shadow"></div>
  </div>