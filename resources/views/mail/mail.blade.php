<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script src="{{asset('js/jquery.3.7.1.js')}}"></script>
  <script src="{{asset('js/sweetalert.js')}}"></script>
  <script src="{{asset('js/flowbite.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <style>
    @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
  </style>
</head> 
    <body class="">
        <h3 class="text-green-700 italic">Hello, {{ $data['firstName'] }} {{ $data['lastName'] }}</h3>
        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3 mx-[2rem]">
        
        <p class="font-bold">Here are the details of your booked room</p>
        <div class="grid grid-cols-2">
            <p>Address: {{ $data['fullAddress'] }}   Contact: {{ $data['contact'] }} </p>
            <p>[{{ $data['adultCount'] }}]-ADULTS AND [{{ $data['childCount'] }}]-CHILD</p>
            <p>[{{ $data['checkIn'] }}] CHECK-IN </p>
            <p>[{{ $data['checkOut'] }}] CHECK-OUT </p>
        </div>
    </body>
</html>
