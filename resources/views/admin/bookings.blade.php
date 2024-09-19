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
                        <th class="th_deg">Room ID</th>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Customer Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Arrival Date</th>
                        <th class="th_deg">Leaving Date</th>
                        <th class="th_deg">Status</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Status Update</th>
                    </tr>
    
                        @foreach($data as $booking)
                        <tr>
                            <td>{{ $booking->room_id }}</td>
                            <td>{{ $booking->room->room_title }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>
                                
                                @if($booking->status == 'Waiting')
                                    <span style="color: yellow">Waiting</span>
                                @elseif($booking->status == "Approved")
                                    <span style="color: green">Approved</span>
                                @else
                                    <span style="color: red">Rejected</span>
                                @endif

                            </td>
                            <td>{{ $booking->room->price }}$</td>
                            <td><img src="{{ url('/room/'.$booking->room->image) }}" style="width: 200px!important;"></td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete this booking?');" class="btn btn-danger" href="{{ url('delete_booking', $booking->id) }}">Delete</a>
                            </td>
                            <td>
                                <span style="padding-bottom: 10px">

                                    <a class="btn btn-success" href="{{ url('approve_book', $booking->id) }}">Approve</a>

                                </span>
                                <a class="btn btn-warning" href="{{ url('reject_book', $booking->id) }}">Reject</a>
                            </td>
                        </tr>
                        @endforeach
                            
                    </tr>
    
                </table>

            </div>
        </div>
    </div>

    @include('admin.footer')

  </body>
</html>