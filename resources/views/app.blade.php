<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="antialiased">
    <div class="layout-page">
        <div class="layout-wrapper layout-content-navbar  ">
            <div class="layout-container">
                @include('includes.aside')
                <div class="layout-page main-page">
                    @include('includes.navbar')
                    @yield('content')
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
    @include('includes.scripts')
</body>

</html>
