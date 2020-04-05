@auth()
    @include('layouts.admin.navbars.navs.auth')
@endauth

@guest()
    @include('layouts.admin.navbars.navs.guest')
@endguest
