<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit - Geolocation</title>
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
            Create Data
          </div>
          <div class="card-body">
            <form action="{{ route('update', $space->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $space->title }}" class="form-control" id="title" required="">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" rows="3" required="">{{ $space->address }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" required="">{{ $space->description }}</textarea>
                </div>

                <div id="here-maps">
                    <label for="">Pin Location</label>
                    <div id="mapContainer" style="height: 500px;">
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" value="{{ $space->latitude }}" class="form-control" id="lat" required="">
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" class="form-control" value="{{ $space->longitude }}" id="lng" required="">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
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
        window.action = "submit";
    </script>
</body>
</html>