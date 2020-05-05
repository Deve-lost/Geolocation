<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Geolocation</title>
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css">
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <!-- Zoom In Zoom Out -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <!-- Menampilkan Pin -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Geolocation</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="d-flex justify-content-beetwen mb-3">
                    <div id="create-space">
                        <a href="{{ route('create') }}" class="btn btn-primary">Pin!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="view-space" class="float-right">
                    <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fa fa-list"></i></a>
                    <a href="{{ route('browse') }}" class="btn btn-secondary"><i class="fa fa-globe"></i></a>
                </div>
            </div>
        </div>

        <div class="card">
          <div class="card-header">
            List Data
          </div>
          <div class="card-body">

          </div>
        </div>
        <br>

        @foreach($space as $jquin)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $jquin->title }}
                    <a href="{{ route('edit', $jquin->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                    <a href="{{ route('destroy', $jquin->id) }}" onclick="return confirm('Delete Data?');" class="btn btn-sm btn-danger">Delete</a>
                </h5>
                <h6 class="card-subtitle">{{ $jquin->address }}</h6>
                <p class="card-text">{{ $jquin->description }}</p>
                <a href="#" onclick="openDirection({{ $jquin->latitude }}, {{ $jquin->longitude }}, {{ $jquin->id }})" class="card-link">Direction</a>
            </div>
        </div>
        <br>
        @endforeach
    </div>

    <div class="justify-content-center">
        {{ $space->links() }}
    </div>

    <!-- Script -->
    <script scr="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script>
        window.hereApiKey = "{{ env('HERE_API_KEY') }}";
    </script>
    <script src="{{ asset('admin/js/here.js') }}"></script>
</body>
</html>