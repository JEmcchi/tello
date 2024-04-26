@include('partials.__header')

<body class="bg-[#d0ebd0] h-screen w-full justify-center items-center">

    {{-- components of basic booking form --}}
    {{-- <x-booking-form.booking-form /> --}}

    {{-- components of Rooms --}}
    <x-room.room :roomData="$roomData" :amenities="$amenities"/>
    
    {{-- components of lodging --}}
    <x-lodging.lodging :lodgingDatas="$lodgingDatas"/>

</body>

@include('partials.__footer')






{{-- <div class="relative flex justify-center">
    <div class="card absolute bottom-0 mr-[20rem]">
        <a class="card-text w-full h-full flex items-center justify-center text-[#324922a6] text-lg font-bold">LODGINGS</a>
    </div>
    <div class="card absolute bottom-0 ml-80">
        <a class="card-text w-full h-full flex items-center justify-center text-[#324922a6] text-lg font-bold">ROOMS</a>
    </div>
    <div class="card absolute bottom-0 ml-[60rem]">
        <a class="card-text w-full h-full flex items-center justify-center text-[#324922a6] text-lg font-bold">DATE AVAILABLE</a>
    </div>
</div> --}}





