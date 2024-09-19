<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">

    @include('admin.css')

    <style>

        label {
            display: inline-block;
            width: 200px
        }

        .div_deg {
            padding-top: 30px;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

    </style>

  </head>
  <body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <center>

                    <h1 style="font-size: 30px; font-weight: bold">Send Email to: {{ $data->name }}</h1>

                    <form action="{{ url('mail', $data->id) }}" method="post">

                        @csrf

                        <div class="div_deg">
                            <label for="">Greeting</label>
                            <input type="text" name="greeting">
                        </div>

                        <div class="div_deg">
                            <label for="">Mail Body</label>
                            <textarea name="body" ></textarea>
                        </div>

                        <div class="div_deg">
                            <label for="">Action Text</label>
                            <input type="text" name="action_text">
                        </div>

                        <div class="div_deg">
                            <label for="">Action URL</label>
                            <input type="text" name="action_url">
                        </div>

                        <div class="div_deg">
                            <label for="">End Line</label>
                            <input type="text" name="endline">
                        </div>

                        <div class="div_deg">
                            <label for=""></label>
                            <input type="submit" class="btn btn-primary" value="Send Email">
                        </div>

                    </form>

                </center>

            </div>
        </div>
    </div>

    @include('admin.footer')

  </body>
</html>