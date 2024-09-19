<!DOCTYPE html>
<html lang="en">
   <head>

    <base href="/public">      
    @include('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
      label {
        display: inline-block;
        width: 200px;
        margin-top: 10px;
        margin-bottom: 0;
      }

      input {
        width: 100%;
      }
    </style>

   </head>

   <body class="main-layout">

      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>

      <header>
         @include('home.header')
      </header>

      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
       
           <div class="row">

                <div class="col-md-8">
                   <div id="serv_hover"  class="room">
                      <div class="room_img" style="display:flex; justify-content: center; padding: 10px">
                        <img style="height: 300px; width: 800px;" 
                        src="/room/{{ $room->image }}" alt="#"/>
                      </div>
                      <div class="bed_room">
                        <h3>{{ $room->room_title }}</h3>

                        <p style="padding: 12px">{{ $room->description }}</p>

                        <h4 style="padding: 12px"> Free Wifi: {{ $room->wifi }}</h4>

                        <h4 style="padding: 12px"> Room Type: {{ $room->room_type }}</h4>

                        <h3 style="padding: 12px"> Price: {{ $room->price }}$</h3>

                      </div>
                   </div>
                </div>

                <div class="col-md-4">

                  <h1 style="font-size: 40px!important">Book Room</h1>

                  @if (Session::has('success'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">X</button>

                        <p style="color: green">{{ Session::get('success') }}</p>
                     </div>
                  @endif

                  @if (Session::has('error'))
                     <div class="alert alert-danger">
                        <button type="button" class="close" data-bs-dismiss="alert">X</button>

                        <p style="color: red">{{ Session::get('error') }}</p>
                     </div>
                  @endif

                  @if ($errors)
                     @foreach ($errors->all() as $error)
                        <p style="color: red">{{ $error }}</p>
                     @endforeach
                  @endif

                  <form action="{{ url('add_booking', $room->id) }}" method="POST">

                     @csrf

                     <div>
                        <label for="">Name</label>
                        <input type="text" name="name" 
                        @if (Auth::id())
                           value="{{ Auth::user()->name }}"                          
                        @endif>
                     </div>

                     <div>
                        <label for="">Email</label>
                        <input type="email" name="email"
                        @if (Auth::id())
                           value="{{ Auth::user()->email }}"                          
                        @endif>
                     </div>

                     <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone"
                        @if (Auth::id())
                           value="{{ Auth::user()->phone }}"                          
                        @endif>
                     </div>

                     <div>
                        <label for="">Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                     </div>

                     <div>
                        <label for="">End Date</label>
                        <input type="date" name="endDate" id="endDate">
                     </div>

                     <div style="padding-top: 20px">
                        <input type="submit" class="btn btn-primary" value="Book Room">
                     </div>

                  </form>

                </div>

           </div>
    
        </div>
     </div>

      @include('home.footer')

     <script>

         var dtDate = new Date();

         var month = dtDate.getMonth() + 1;

         var day = dtDate.getDate();

         var year = dtDate.getFullYear();

         if(month < 10)
            month = '0' + month.toString();

         if(day < 10)
            day = '0' + day.toString();

         var currentDate = year + '-' + month + '-' + day;

         $('#startDate').attr('min', currentDate);
         $('#endDate').attr('min', currentDate);

     </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
   integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

   </body>
</html>