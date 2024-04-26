{{-- create controller and backend of lodging --}}

<div class="section h-screen w-full justify-center items-center mt-[5rem]" id="lodgings">
    <h1 class="text-center text-7xl font-bold my-5 -mb-[0.4rem] text-transparent bg-clip-text bg-gradient-to-t from-[#0f0f0f] to-[#128609]">LODGINGS</h1>
    @foreach($lodgingDatas as $index => $lodgingData)
    @if($index % 2 == 0)
    <form class="max-w-6xl mx-auto w-full grid grid-cols-9 my-20 text-center space-y-10">
     @csrf
        <!-- Stack 1 -->
        <div class="col-span-4 w-full h-full items-center">
            <div class="w-full h-full md:pl-4 bg-green-900 border-2 border-gray-300 rounded-xl relative p-4 transition-transform overflow-visible group hover:border-[#ffef1085] hover:border-spacing-16 hover:shadow-[#00000085] hover:shadow-full shadow-2xl">
                <div class="bg-green-900 w-fit rounded-lg mx-auto">
                    <h1 class="text-2xl font-bold mb-2 -mt-[2.7rem] text-transparent bg-clip-text bg-gradient-to-t from-[#93e27a] to-[#fffb00] py-1 px-2 uppercase">{{$lodgingData->area}}</h1>
                 </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="">
                        <h1 class="text-gray-100 text-xl font-semibold">Total Rooms</h1>
                        <span class="bg-[#ffef10f6] mx-auto mb-6 inline-block h-[0.1rem] w-full rounded"></span>
                        <div class="flex justify-center -mt-[2rem]">
                            <span class="z-10 flex items-center text-5xl text-[#ffef10f6] [text-shadow:_2px_2px_#2d3748,_1px_2px_#2d3748]">{{$lodgingData->total_rooms}}</span>
                        </div>
                    </div>
                    <div class="">
                        <h1 class="text-gray-100 text-xl font-semibold">Available Rooms</h1>
                        <span class="bg-[#ffef10f6] mx-auto mb-6 inline-block h-[0.1rem] w-full rounded"></span>
                        <div class="flex justify-center -mt-[2rem]">
                            <span class="z-10 flex items-center text-5xl text-[#ffef10f6] [text-shadow:_2px_2px_#2d3748,_1px_2px_#2d3748]">{{$lodgingData->total_rooms}}</span>
                        </div>
                    </div>
                </div>
                    <span class="bg-[#ffef10f6] mx-auto my-2 inline-block h-[0.1rem] w-full rounded"></span>
                <p class="text-white text-sm">{{$lodgingData->lodging_info}}</p>

                <a class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-3/5 h-12 rounded-lg bg-[#106e23e7] text-[#ffef10b9] text-lg px-4 py-2 opacity-0 transition-transform ease-out group-hover:translate-y-0 group-hover:opacity-100 text-bold hover:bg-green-950" href="{{ route('lodging.room', ['id' => $lodgingData->lodging_id]) }}">More info</a>
            </div>
        </div>
            <div class="relative col-span-1 w-full h-full flex justify-center items-center">
                <div class="h-full w-1 bg-green-900"></div> 
                <div class="absolute w-10 h-15 rounded-full bg-green-900 z-15 text-[#ffef10b9] text-center font-semibold">{{$lodgingData->lodging_id}}</div>
            </div>
            <div class="col-span-4 w-full h-full"></div>

            <!-- Stack 2 -->
            @else
            <div class="col-span-4 w-full h-full"></div>
            <div class="relative col-span-1 w-full h-full flex justify-center items-center">
                <div class="h-full w-1 bg-green-900"></div>
                <div class="absolute w-10 h-15 rounded-full bg-green-900 z-15 text-[#ffef10b9] text-center font-semibold">{{$lodgingData->lodging_id}}</div>
            </div>
            <div class="col-span-4 w-full h-full items-center">
                <div class="w-full h-full md:pl-4 bg-green-900 border-2 border-gray-300 rounded-xl relative p-4 transition-transform overflow-visible group hover:border-[#ffef1085] hover:border-spacing-16 hover:shadow-[#00000085] hover:shadow-full shadow-2xl">
                    <div class="bg-green-900 w-fit rounded-lg mx-auto">
                        <h1 class="text-2xl font-bold mb-2 -mt-[2.7rem] text-transparent bg-clip-text bg-gradient-to-t from-[#93e27a] to-[#fffb00] py-1 px-2">{{$lodgingData->area}}</h1>
                     </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="">
                            <h1 class="text-gray-100 text-xl font-semibold">Total Rooms</h1>
                            <span class="bg-[#ffef10f6] mx-auto mb-6 inline-block h-[0.1rem] w-full rounded"></span>
                            <div class="flex justify-center -mt-[2rem]">
                                <span class="z-10 flex items-center text-5xl text-[#ffef10f6] [text-shadow:_2px_2px_#2d3748,_1px_2px_#2d3748]">{{$lodgingData->total_rooms}}</span>
                            </div>
                        </div>
                        <div class="">
                            <h1 class="text-gray-100 text-xl font-semibold">Available Rooms</h1>
                            <span class="bg-[#ffef10f6] mx-auto mb-6 inline-block h-[0.1rem] w-full rounded"></span>
                            <div class="flex justify-center -mt-[2rem]">
                                <span class="z-10 flex items-center text-5xl text-[#ffef10f6] [text-shadow:_2px_2px_#2d3748,_1px_2px_#2d3748]">{{$lodgingData->total_rooms}}</span>
                            </div>
                        </div>
                    </div>
                    <span class="bg-[#ffef10f6] mx-auto my-2 inline-block h-[0.1rem] w-full rounded"></span>
                    <p class="text-white text-sm">{{$lodgingData->lodging_info}}</p>
                    <a class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-3/5 h-12 rounded-lg bg-[#106e23e7] text-[#ffef10b9] text-lg px-4 py-2 opacity-0 transition-transform ease-out group-hover:translate-y-0 group-hover:opacity-100 text-bold hover:bg-green-950" href="{{ route('lodging.room', ['id' => $lodgingData->lodging_id]) }}">More info</a>
                </div>
            </div>
        @endif
        @endforeach
        </form>
</div>