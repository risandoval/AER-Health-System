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
    <script> // const BASE_PATH = '{{ url("/") }}'; </script>
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')

</head>
    <section class="bg-light bg-cover min-h-screen flex items-center justify-center " style="background-image:url('/images/bg-login.png')">
        <!-- login container -->
        <div class="bg-white rounded-lg shadow-lg m-4">
            <!-- form -->
            <div class="flex flex-col justify-center px-8 py-8">
                <div class="self-center mb-2">
                    <img class="h-[150px]" src="{{url('/images/logo.png')}}" alt="logo">
                </div>
                
                <div class="text-center text-black">
                    <h2 class="font-bold text-2xl">Log in to Tolosa Health System</h2>
                    <p class="text-xs">Welcome! Please enter your details.</p>
                </div>
                
                <form action="{{url('/login/process')}}" method="POST" class="flex flex-col w-full mt-3">
                    @csrf

          <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('reset'){{$message}} @enderror </p>
          
                    <div class="relative mt-3">
                        <label for="username" class="block text-xs font-semibold">Username</label>
                        <input class="mt-1 p-2 rounded-xl w-full border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="text" id="username" name="username" placeholder="Enter your username">
                        <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('username'){{$message}} @enderror </p>
                    </div>
                    
                    <div class="relative mt-5">
                        <label for="password" class="block text-xs font-semibold">Password</label>
                        <input class="mt-1 p-2 rounded-xl w-full border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="password" id="password" name="password" placeholder="*****">
                        <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('password'){{$message}} @enderror </p>
                    </div>

                    <div class="text-xs text-primary mt-2">
                        <a href="{{url('/validation')}}">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="bg-primary mt-5 rounded-xl text-white text-center py-2 hover:scale-105 duration-300">Login</button>
                </form>
            </div>
        </div>
    </section>

  </html>