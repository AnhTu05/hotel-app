<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .table_deg {
            border: 2px solid gray;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }

        .th_deg {
            background-color: rgb(255, 255, 255);
            padding: 8px;
        }

        tr {
            border: 3px solid gray;
        }

        td {
            padding: 10px;
        }

    </style>

  </head>
  <body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Message</th>
                        <th class="th_deg">Send Email</th>
                    </tr>

                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{!! Str::limit($data->message, 100) !!}</td>
                            <td>
                                <a href="{{ url('send_mail', $data->id) }}" class="btn btn-success">Send Email</a>
                            </td>
                        </tr>
                    @endforeach
    
                </table>
            
            </div>
        </div>
    </div>

    @include('admin.footer')

  </body>
</html>