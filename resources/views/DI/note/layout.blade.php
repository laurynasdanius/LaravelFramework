<!DOCTYPE html>
<html>
<head>
   @include('DI.includes.head')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="">
    <div class="container mt-3 shadow-lg p-3 mb-5 bg-body rounded">
        
        @include('DI.includes.hero')
        @include('DI.includes.header')
        <div id="main" class="container">
            @yield('content')
        </div>
        <!-- footer -->
    </div>
   @include('DI.includes.footer')
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>