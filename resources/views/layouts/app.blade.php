<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.header')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    @include('layouts.menu')
                </div>
                <div class="col-md-10">
                    @section('main-content')
                    @show
                </div>
            </div>
        </div>


    </div>
    @include('layouts.partials.scripts')
</body>

</html>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>