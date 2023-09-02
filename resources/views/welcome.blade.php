<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @section('css')
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @stop
    </head>
    <body>
       <div class="container">
        <h1>Calculation</h1>
        <div>
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('calculate')}}">
                @csrf
                 <div class="form-group">
                   <label for="budget">Budget</label>
                   <input type="number" id="budget" name="budget" class="form-control" value="" onkeyup="calculate(event)">
                 </div>
               </form>
        </div>
       </div>
    </body>
</html>
