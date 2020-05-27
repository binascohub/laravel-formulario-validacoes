<html>
    <head>
        <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}" />
    </head>
    <body>
        <div class="row">
            <div class="container">
                <h1>Laravel Formulários e Validação</h1>

                @if(Session::has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Atenção!</strong> {{Session::get('message')}}
                </div>
                @endif

                @yield('content')
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
    </body>
</html>
