@include('partials.__header')

    {{-- <h2 class="text-5xl font-bold text-gray-900 text-center mb-20">BOOKING</h2> --}}
    <div class="bg-gray-800 rounded-lg shadow-md p-5 w-11/12 mx-auto">
      <form class="grid grid-cols-4 gap-1">
        <div class="col-span-2"> 
          <label for="lastName" class="block text-gray-300 font-medium">Last Name </label>
          <input
            type="text"
            class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
            placeholder="Enter Last Name"
          />
      </div>
      <div class="col-span-2"> 
        <label for="lastName" class="block text-gray-300 font-medium">First Name</label>
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
          placeholder="Enter First Name"
        />
      </div>
      <div class="col-span-2"> 
        <label for="email" class="block text-gray-300 font-medium">Email</label>
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
          placeholder="Enter Email"
        />
    </div>
    <div class="col-span-2"> 
      <label for="contact" class="block text-gray-300 font-medium">Contact Number</label>
      <input
        type="text"
        class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
        placeholder="Enter Phone Number"
      />
    </div>
      <div class=" col-span-2"> 
        <label for="checkIn" class="block text-gray-300 font-medium">Check-In</label>
        <input
          type="date"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
          placeholder="Date of Check-In"
          onchange="changeTextColorCenter(this)"
        />
      </div>
      <div class="col-span-2"> 
        <label for="checkOut" class="block text-gray-300 font-medium">Check-Out</label>
        <input
          type="date"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
          placeholder="Date of Check-Out"
          onchange="changeTextColorCenter(this)"
        />
      </div>
      <div class="col-span-4"> 
        <label for="fullName" class="block text-gray-300 font-medium">Full Address</label>
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
          placeholder="Full Address"
          onchange="changeTextColor(this)"
        />
      </div>
      <div class="col-span-4 grid grid-cols-2 gap-2 items-center">
        <div class="">
          <label for="rooms" class="block text-gray-300 font-medium">Type of Room </label>
            <select id="underline_select" class="bg-gray-700 p-2 w-full rounded-lg font-medium text-gray-400 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer" onchange="changeTextColorCenter(this)">
                <option selected disabled class="text-gray-500 text-md">Select Rooms</option>
                <option value="single" class="text-green-400 font-medium text-center">Single</option>
                <option value="double" class="text-green-400 font-medium text-center">Double</option>
                <option value="delux"  class="text-green-400 font-medium text-center">Delux</option>
                <option value="premium" class="text-green-400 font-medium text-center">Premium</option>
            </select>
        </div>
        <div class="col-span-2 ml-[3rem]">
          <label for="roomsNum" class="block text-gray-300 font-medium whitespace-nowrap">Number Of Rooms          
            <input
            type="number"
            class="bg-gray-700 block p-2 w-8/12 text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer"
            placeholder="Room No."
            onchange="changeTextColorCenter(this)"
          />
        </div>
        <div class="col-span-4 grid grid-cols-3 gap-10">
          <div>
            <label for="adultsNum" class="block text-gray-300 font-medium  whitespace-nowrap">Number Of Adults          
              <input
              type="number"
              class="bg-gray-700 block p-2 w-full text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer"
              placeholder="Adult No."
              onchange="changeTextColorCenter(this)"
            />
          </div>
          <div>
            <label for="childNum" class="block text-gray-300 font-medium whitespace-nowrap">Number Of Children          
              <input
              type="number"
              class="bg-gray-700 block p-2 w-full text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer"
              placeholder="Child No."
              onchange="changeTextColorCenter(this)"
            />
          </div>
          <div class="">
            <label for="childNum" class="block text-gray-300 font-medium text-center whitespace-nowrap">No. of Night          
              <input
              type="number"
              class="bg-gray-700 block p-2 w-full text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer"
              placeholder="Night No."
              onchange="changeTextColorCenter(this)"
            />
          </div>
        </div>
      </div>
      <div class="col-span-4 mt-2">
        <textarea
          name="message"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 text-base focus:bg-gray-md:focus:outline-none:focus:ring-green-md:focus:border-transparent transition ease-in-out duration-fastest w-full"
          placeholder="Other Concerns"
        ></textarea>
      </div>

      <div class="col-span-2 flex justify-end">
        <button
          type="submit"
          class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md mt-4 hover:from-yellow-800 to-gray-500 transition ease-in-out duration-150 items-center flex-nowrap justify-center"
        >
          Back
        </button>
      </div>
      <div class="col-span-2 ">
        <button
          type="submit"
          class="bg-gradient-to-l from-green-800  text-white font-bold py-2 px-4 rounded-md mt-4 hover:from-green-900 to-gray-500 transition ease-in-out duration-150 items-center flex-nowrap justify-center"
        >
          Submit
        </button>
      </div>
        
      </form>
  </div>
  
  <script>
    function changeTextColorCenter(input) {
    if (input.value !== '') {
        input.classList.remove('text-black');
        input.classList.add('text-green-100', 'text-center');
    } else {
        input.classList.remove('text-green-100', 'text-center');
        input.classList.add('text-black');
    }
}
function changeTextColor(input) {
    if (input.value !== '') {
        input.classList.remove('text-black');
        input.classList.add('text-green-100');
    } else {
        input.classList.remove('text-green-100');
        input.classList.add('text-black');
    }
}
</script>



          {{-- <input
          type="email"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full md:w-[48%] ml-[2%]"
          placeholder="Email"
        />
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full md:w-[48%] mr-[2%]"
          placeholder="Phone Number"
        />
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full md:w-[48%] ml-[2%]"
          placeholder="Full Address"
        /> --}}