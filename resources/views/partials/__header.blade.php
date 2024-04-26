<!doctype html>
<html>
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
</head>

<style>
  .nav-link {
    transition: color 0.3s ease-in-out;
  }

  .active-link {
      font-weight: 800;
      color: #ff0000; /* Change color as needed */
  }

  /* CSS code */
  .sticky {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
  }

</style>

<body>
  <div id="home" class="section">
    <header class="backdrop-blur-sm bg-white/30 border-b-2 border-[#197219d0] rounded-b-lg p-5 flex justify-between" id="navbar">
        <nav class="w-full mt-0 min-[1024px]:space-x-24 flex justify-center">
          <h1 class=" text-4xl font-semibold ml-[1rem] w-full whitespace-nowrap cursor-pointer">CLSU</h1>
            <div class="dropdown-menu absolute -top-full lg:static lg:flex-row lg:justify-between max-lg:bg-[#e7f1e79430] flex flex-row gap-6 justify-center text-lg semi-bold">
                <ul class="flex flex-col lg:flex-row items-center gap-8 lg:flex-grow lg:gap-8 lg:space-x-16 cursor-pointer justify-center lg:bg-transparent rounded-xl px-10 " id="navLinks">
                  <li href="#rooms" class="nav-link text-xl font-semibold hover:text-[#197219d0] duration-500">Rooms</li>
                  <li href="#lodgings" class="nav-link text-xl font-semibold hover:text-[#197219d0] duration-500">lodgings</li>
                  <li href="#events" class="nav-link text-xl font-semibold hover:text-[#197219d0] duration-500">Events</li>
                  <li href="#about_us" class="nav-link text-xl font-semibold hover:text-[#197219d0] duration-500 whitespace-nowrap">About Us</li>
                </ul>
              </div>

            <div class="min-[1024px]:hidden mr-[3rem]" id="hamburger">
                <input id="checkbox" type="checkbox" class="toggle-button">
                <label class="toggle" for="checkbox">
                  <div class="bar bar--top"></div>
                  <div class="bar bar--middle"></div>
                  <div class="bar bar--bottom"></div>
                </label>
            </div>
          </div>
        </nav> 
    </header>
  </div>


<script>
    const toggleBtn = document.querySelector(".toggle-button");
    const dropdown = document.querySelector(".dropdown-menu");

    toggleBtn.addEventListener("click", () => {
        dropdown.classList.toggle('top-28');
    });
    
</script>
    
