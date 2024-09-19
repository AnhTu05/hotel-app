<!DOCTYPE html>
<html>
  <head> 

    @include('admin.css')

  </head>
  <body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <center>
                    <h1 style="font-size: 40px; font-weight: bolder; color: white">Gallary</h1>

                    <div class="row">

                        @foreach ($data as $gallary)

                            <div class="col-md-4">

                                <img src="/gallary/{{ $gallary->image }}" style="width: 300px!important; height: 200px!important; margin-top: 30px">

                                <a href="{{ url('delete_gallary', $gallary->id) }}" class="btn btn-danger" style="margin-top: 5px">Delete</a>

                            </div>

                        @endforeach

                    </div>

                    <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div style="padding: 30px;">

                            <label style="color: white; font-weight: bold; font-size: 18px; margin: 10px">Upload Image</label>
                            <input type="file" name="image">
                        
                            <button class="btn btn-primary" type="submit">Add Image</button>
                        </div>

                    </form>
                </center>

            </div>
        </div>
    </div>

    @include('admin.footer')

  </body>
</html>