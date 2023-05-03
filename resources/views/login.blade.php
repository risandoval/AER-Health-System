<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-light py-10">
  
    <!-- Login component -->
    <div class="flex shadow-md">
      <!-- Login form -->
      <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
        <div class="w-72">
          <!-- Heading -->
          <h1 class="text-xl font-semibold text-center">Log in to SystemName</h1>
          {{-- <small class="text-gray-400 text-center">Hello! Please enter your details</small> --}}
  
          <!-- Form -->
          <form class="mt-4">
            <div class="mb-3">
              <label class="mb-2 block text-xs font-semibold">Username</label>
              <input type="text" placeholder="Enter your username" class="block w-full rounded-md border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary py-1 px-1.5 text-gray-500" />
            </div>
  
            <div class="mb-3">
              <label class="mb-2 block text-xs font-semibold">Password</label>
              <input type="password" placeholder="*****" class="block w-full rounded-md border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary py-1 px-1.5 text-gray-500" />
            </div>
  
            <div class="mb-3 flex flex-wrap content-center">
              {{-- <input id="remember" type="checkbox" class="mr-1 checked:bg-blue-700" /> <label for="remember" class="mr-auto text-xs font-semibold">Remember for 30 days</label> --}}
              <a href="#" class="text-xs font-semibold text-primary">Forgot password?</a>
            </div>
  
            <div class="mb-3">
              <button class="mb-1.5 block w-full text-center text-white bg-primary hover:bg-secondary px-2 py-1.5 rounded-md">Sign in</button>
            </div>
          </form>
  
          <!-- Footer -->
          {{-- <div class="text-center">
            <span class="text-xs text-gray-400 font-semibold">Don't have account?</span>
            <a href="#" class="text-xs font-semibold text-blue-700">Sign up</a>
          </div> --}}
        </div>
      </div>
  
      <!-- Login banner -->
      <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
        <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="https://images.pexels.com/photos/15409298/pexels-photo-15409298.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Health System">
      </div>
  
    </div>
  
    <!-- Credit -->
    <div class="mt-3 w-full">
        <p class="text-center">Copyright © Health System 2023 </p>
    </div>
  </div>
    
</body>
</html>