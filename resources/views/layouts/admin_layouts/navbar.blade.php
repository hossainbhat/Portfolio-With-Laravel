<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
      <!-- Logo Start -->
      <div class="logo position-relative">
        <a href="{{route("admin.dashboard")}}">
          <!-- Logo can be added directly -->
      

          <!-- Or added via css to provide different ones for different color themes -->
          <div class="img"></div>
        </a>
      </div>
      <!-- Logo End -->

      <!-- User Menu Start -->
      <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="profile" alt="profile" @if(Auth::user()->image) src="{{asset(Auth::user()->image)}}" @else src="{{asset('backend/img/profile/profile-9.webp')}}" @endif />
          <div class="name">{{Auth::user()->name}}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
          <div class="row mb-3 ms-0 me-0">
            <div class="col-12 ps-1 mb-2">
              <div class="text-extra-small text-primary">ACCOUNT</div>
            </div>
            <div class="col-6 ps-1 pe-1">
              <ul class="list-unstyled">
                <li>
                  <a href="{{route('admin.profile')}}">
                    <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                    <span class="align-middle">User Info</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.logout')}}">
                    <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                    <span class="align-middle">Logout</span>
                  </a>
                </li>
              </ul>
            </div>
            
          </div>
        
         
        </div>
      </div>
      <!-- User Menu End -->

      <!-- Icons Menu Start -->
      <ul class="list-unstyled list-inline text-center menu-icons">
        
        <li class="list-inline-item">
          <a href="#" id="pinButton" class="pin-button">
            <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
            <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
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
                  <img src="{{asset('backend/img/profile/profile-1.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                  <div class="align-self-center">
                    <a href="#">Joisse Kaycee just sent a new comment!</a>
                  </div>
                </li>
                <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                  <img src="{{asset('backend/img/profile/profile-2.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                  <div class="align-self-center">
                    <a href="#">New order received! It is total $147,20.</a>
                  </div>
                </li>
                <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                  <img src="{{asset('backend/img/profile/profile-3.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                  <div class="align-self-center">
                    <a href="#">3 items just added to wish list by a user!</a>
                  </div>
                </li>
                <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                  <img src="{{asset('backend/img/profile/profile-6.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                  <div class="align-self-center">
                    <a href="#">Kirby Peters just sent a new message!</a>
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
            <a href="Blog.html">
              <i data-acorn-icon="file-text" class="icon" data-acorn-size="18"></i>
              <span class="label">Blog</span>
            </a>
          </li>
          <li>
            <a href="Upgrade.html">
              <i data-acorn-icon="trend-up" class="icon" data-acorn-size="18"></i>
              <span class="label">Upgrade</span>
            </a>
          </li>
          <li>
            <a href="Community.html">
              <i data-acorn-icon="messages" class="icon" data-acorn-size="18"></i>
              <span class="label">Community</span>
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