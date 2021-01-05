<!DOCTYPE html>
<html lang="en">

    @include('layouts.partial.header')



    <body class="">
        <div class="wrapper ">
            @include('layouts.partial.sidebar')
            <div class="main-panel" id="main-panel">
             
                @yield('content')
                @include('layouts.partial.footer')
            </div>
        </div>
        @include('layouts.partial.footerjs')
    </body>

</html>
