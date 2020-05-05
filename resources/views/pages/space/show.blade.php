<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
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
        <x-navigation></x-navigation>
        <div class="card">
          <div class="card-header">
            Space - {{ $space->title }}
          </div>
          <div class="card-body">
            <div id="mapContainer" style="height: 500px;"></div>
          </div>
        </div>
        <br>

        <div class="card">
          <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach($space->photos as $key => $jquin)
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                  @endforeach
                </ol>
                <div class="carousel-inner">
                  @foreach($space->photos as $key => $jquin)
                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/'.$jquin->path) }}" class="d-block w-100">
                  </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
        </div>
        <br>
      <div class="card mb-3">
          <div class="card-body">
              <h3>{{ $space->title }}</h3>
              <span>{{ $space->address }}</span>
              <p>{{ $space->description }}</p>
              <p>{{ $space->direction }}</p>
              <div id="summary"></div>
          </div>
      </div>
    </div>

    <!-- Script -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script>
        window.hereApiKey = "{{ env('HERE_API_KEY') }}";
    </script>
    <script src="{{ asset('admin/js/here.js') }}"></script>

    <script>
        window.action = "direction";
    </script>
</body>
</html>