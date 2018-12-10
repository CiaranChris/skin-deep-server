<div class="banner" style="background-color: {{ get_theme_mod('header_image_bg_colour') }}">
  <img src="{{ header_image() }}"
       height="{{ get_custom_header()->height }}"
       width="{{ get_custom_header()->width }}"
       alt="" />
</div>
<header id="main-header">
  {{-- Don't bother with a link, it's supplied already --}}
  <nav class="navbar top-level">
    <div class="navigation-grid">
      <div id="logo">
        @if (has_custom_logo())
          @php the_custom_logo() @endphp
        @else
          <a class="navbar-brand" href="{{ home_url('/') }}">
            {{ get_bloginfo('name', 'display') }}
          </a>
        @endif
      </div>
      <div id="toggler">
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target=".collapsable"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div id="top-nav" class="collapse navbar-collapse collapsable">
        {{-- Main menu navigation --}}
        @if (has_nav_menu('primary_navigation'))
          {{-- Standard 'top-level' menu items --}}
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'depth' => 1,
            'menu_class' => 'header-menu']) !!}
        @endif
      </div>
      <div id="sub-nav">
        <div class="overflow-wrapper">
          {{-- Add sub-menu with custom walker for children --}}
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
              'theme_location' => 'primary_navigation',
              'walker' => new SkinDeep\Theme\ChildOnlyNavWalker(),
              'depth' => 0,
              'menu_class' => 'header-menu']) !!}
          @endif
        </div>
      </div>
      <div id="search" class="collapse navbar-collapse collapsable">
        {{-- Search bar --}}
        {!! get_search_form() !!}
      </div>
    </div>
  </nav>
</header>
