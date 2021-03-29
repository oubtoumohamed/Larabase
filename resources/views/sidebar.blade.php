
<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="{{ route('home') }}" style="background: rgba(0, 0, 0, 0.2);">
      <span class="align-middle">{{ config('app.name') }}</span>
    </a>
                
    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <li class="sidebar-item home">
        <a class="sidebar-link" href="{{ route('home') }}">
          <i class="align-middle" data-feather="sliders"></i> 
          <span class="align-middle">{{ __('global.dashboard') }}</span>
        </a>
      </li>

      @if( isGranted('ADMIN') )
      <li class="sidebar-item groupe">
        <a class="sidebar-link" href="{{ route('groupe') }}">
          <i class="align-middle" data-feather="settings"></i> 
          <span class="align-middle">{{ __('groupe.module_name') }}</span>
        </a>
      </li>
      @endif

      @if( isGranted('ADMIN') )
      <li class="sidebar-item user">
        <a class="sidebar-link" href="{{ route('user') }}">
          <i class="align-middle" data-feather="users"></i>
          <span class="align-middle">{{ __('user.module_name') }}</span>
        </a>
      </li>
      @endif




      <!--li class="sidebar-item">
        <a class="sidebar-link" href="pages-settings.html">
          <i class="align-middle" data-feather="settings"></i> 
          <span class="align-middle">Settings</span>
        </a>
      </li>


      <li class="sidebar-item">
        <a class="sidebar-link" href="pages-blank.html">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
        </a>
        <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
          <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
        </ul>
      </li>

      <li class="sidebar-header">
        Tools & Components
      </li>
      <li class="sidebar-item">
        <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">UI Elements</span>
        </a>
        <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
          <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
        </ul>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="icons-feather.html">
          <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="forms-basic-inputs.html">
          <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Forms</span>
        </a>
      </li>

      <li class="sidebar-header">
        Plugins & Addons
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="charts-chartjs.html">
          <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="maps-google.html">
          <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
        </a>
      </li-->
    </ul>

  </div>
</nav>

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidebar-item.{{ explode('_',\Request::route()->getName())[0] }}').addClass('active');
  })
</script>