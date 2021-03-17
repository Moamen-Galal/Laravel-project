<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

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

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>user data</h1>

        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>name</th>
                <th>email</th>
                <th>age</th>
            </tr>

        <tr>
        <td>{{ $name }}</td>
        <td>{{ $email }}</td>
        <td>{{ $age }}</td>
        </tr>


            <!-- table body will be here -->

            <!-- <a href='' class='btn btn-danger m-r-1em'>Delete</a>
            <a href='' class='btn btn-primary m-r-1em'>Edit</a> -->


            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->






    {{-- {!! 'Hi'.'<br>'.'ahmed' !!}      >>    {!! !!} --}}

    {{--  $x; --}}


    {{-- @if()
    @else()
    @endif()       --}}


    <?php 
    
    /*if(){
        
    }*/



    ?>



{{-- @foreach ( as )
    
@endforeach --}}



{{-- 
@empty()
@endempty --}}


{{-- @for ( = ;  < ; ++)
    
@endfor --}}