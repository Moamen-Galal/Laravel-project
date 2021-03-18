<!DOCTYPE HTML>
<html>
<head>
    <title>User data</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>


    {{-- fyqos@mailinator.com --}}


    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>welcome {{  auth()->user()->name.' : '. auth()->user()->id }}</h1>
           
           
            <h1>{{ trans('site.ds')  }} </h1>

           
           
            <p>{{   session()->get('message')      }}</p>


        </div>


   <a href="{{url('lang/ar')}}">ع</a>
    ||
   <a href="{{url('lang/en')}}">en</a>
        
    <a href="{{url('/logout')}}">logout</a>

    <br>


    {{trans('site.nti')}}   

        <!-- PHP code to read records will be here -->





        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>{{trans('site.name')}}</th>
                <th>{{trans('site.email')}}</th>
                <th>created_at</th>
                <th>Action</th>
            </tr>

 @foreach ($data as $row)
       
    {{-- {{dd($row['user_post'])}} --}}


<tr>    
           <td>{{$row['id']}}</td>
           <td>{{$row['name']}}</td>
           <td>{{$row['email']}}</td>
           <td>{{$row['created_at']}}</td>
           <td><a href="{{url('/delete/'.$row['id'])}}">delete Item</a> ||
           <a href="{{url('/user/'.$row['id'].'/edit')}}">show</a></td> 
       </tr>   
 @endforeach


      {{-- {{ $data->links() }} --}}    {{-- --}}   <!-- -->

            <!-- table body will be here -->

            <!-- <a href='' class='btn btn-danger m-r-1em'>Delete</a>
            <a href='' class='btn btn-primary m-r-1em'>Edit</a> -->


            <!-- end table -->
        </table>
        {{-- {{ $data->links() }} --}}
    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>


