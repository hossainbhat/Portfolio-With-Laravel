<div class="col-auto d-none d-lg-flex">
    <ul class="sw-25 side-menu mb-0 primary" id="menuSide">
      <a href="#" data-bs-target="#services">
        <i data-acorn-icon="grid-1" class="icon"></i>
        <span class="label">Dashboard</span>
      </a>
      @if(Session::get('page') == 'dashboard')
        <?php $active = "active"; ?>
      @else
        <?php $active = ""; ?>
      @endif
      <li>
        <a href="{{route('admin.dashboard')}}" class="{{$active}}">
          <i class="fa-brands fa-windows"></i>
          <span class="label">Dashboard</span>
        </a>
      </li>
        <a href="#" data-bs-target="#services">
          <i data-acorn-icon="grid-1" class="icon"></i>
          <span class="label">Services</span>
        </a>
        <ul>
          @if(Session::get('page') == 'skill' || Session::get('page') == 'addSkill' || Session::get('page') == 'editSkill')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li>
            <a href="{{route('admin.skill')}}" class="{{$active}}">
              <i class="fa-solid fa-tag"></i>
              <span class="label">Skill</span>
            </a>
          </li>
          @if(Session::get('page') == 'service' || Session::get('page') == 'addService' || Session::get('page') == 'editService')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
        <li>
          <li>
            <a href="{{route('admin.services')}}" class="{{$active}}">
              <i class="fa-brands fa-servicestack"></i>
              <span class="label">Service</span>
            </a>
          </li>
          @if(Session::get('page') == 'portfolio' || Session::get('page') == 'addPortfolio' || Session::get('page') == 'editPortfolio')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li>
            <a href="{{route('admin.portfolios')}}" class="{{$active}}">
              <i class="fa-solid fa-layer-group"></i>
              <span class="label">Porfolio</span>
            </a>
          </li>
          @if(Session::get('page') == 'testimonial' || Session::get('page') == 'addTestimonial' || Session::get('page') == 'editTestimonial')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li>
            <a href="{{route('admin.testmonials')}}" class="{{$active}}">
              <i class="fa-solid fa-comment"></i>
              <span class="label">Testimonial</span>
            </a>
          </li>
          @if(Session::get('page') == 'logo' || Session::get('page') == 'addLogo' || Session::get('page') == 'editLogo')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li>
            <a href="{{route('admin.logos')}}" class="{{$active}}">
              <i class="fa-brands fa-creative-commons-share"></i>
              <span class="label">Logo</span>
            </a>
          </li>
          @if(Session::get('page') == 'contact')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li>
            <a href="{{route('admin.contacts')}}" class="{{$active}}">
              <i class="fa-solid fa-envelope"></i>
              <span class="label">Email</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.logout')}}">
              <i class="fa-solid fa-power-off"></i>
              <span class="label">Logout</span>
            </a>
          </li>
          
        </ul>
      </li>
    </ul>
  </div>