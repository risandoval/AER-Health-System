<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <title>AER Health System</title>
  <script>
      // const BASE_PATH = '{{ url("/") }}';
  </script>
  @vite('resources/css/app.css')
  @vite('resources/js/main.js')
</head>
{{-- {{dd(auth()->user())}} --}}
  <section class="bg-light bg-cover min-h-screen flex items-center justify-center " style="background-image:url('/images/bg-login.png')">
    <!-- login container -->
    <div class="bg-white flex rounded-lg shadow-lg items-center">
      <!-- form -->
      <div class="px-8 md:px-16 py-5">
        <div class="flex justify-center mb-2">
          <img class="h-[150px]" src="{{url('/images/logo.png')}}" alt="logo">
        </div>
        
        <h2 class="font-bold text-2xl text-black">Log in to SystemName</h2>
        <p class="text-xs mt-1 text-black">Welcome! Please enter your details.</p>
  
        <form action="{{url('/login/process')}}" method="POST" class="flex flex-col mt-3">
          @csrf
          {{-- USERNAME --}}
          <label for="username" class="mt-3 block text-xs font-semibold">Username</label>
          <input class="mt-2 p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="text" id="username" name="username" placeholder="Enter your username">
          <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('username'){{$message}} @enderror </p>
          {{-- PASSWORD --}}
          <label for="password" class="mt-3 block text-xs font-semibold">Password</label>
          <div class="relative mt-2">
            <input class="p-2 rounded-xl border w-full border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="password" id="password" name="password" placeholder="*****">
            <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('password'){{$message}} @enderror </p>
          </div>
          {{-- FORGOT PASSWORD --}}
          <div class="text-xs mt-2 text-primary">
            <a href="{{url('/validation')}}">Forgot password?</a>
          </div>
          {{-- LOGIN BTN --}}
          <button type="submit" class="bg-primary mt-5 rounded-xl text-white text-center py-2 hover:scale-105 duration-300">Login </button>
          {{-- <a href="/dashboard" class="bg-primary mt-5 rounded-xl text-white text-center py-2 hover:scale-105 duration-300">Sign in</a> --}}
        </form>
      </div>
  
      <!-- image -->
      {{-- <div class="md:block hidden w-1/2">
        <img class="rounded-r-lg" src="https://images.unsplash.com/photo-1550831107-1553da8c8464?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80">
      </div> --}}
    </div>
  </section>

  </html>