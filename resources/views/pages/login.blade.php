{{-- login page --}}
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
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')
</head>
<body>
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
                    
                    <div class="max-w-[350px] text-center">    
                        <p class="text-sm text-red"> @error ('reset'){{$message}} @enderror </p>   
                        <p class="text-sm text-red"> @error ('status'){{$message}} @enderror </p>                 
                    </div>
                    
                    <div class="relative mt-3">
                        <label for="username" class="block text-xs font-semibold">Username</label>
                        <input class="form-input" type="text" id="username" name="username" placeholder="Enter your username">
                        <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error('username') {{ $message }} @enderror </p> 
                    </div>

                    <div class="relative mt-5">
                        <label class="block text-xs font-semibold" for="password">Password</label>
                        <div class="flex justify-end items-center relative w-full">
                            <input class="js-password pr-[53px] form-input" type="password" id="password" name="password" placeholder="*****" autocomplete="off">
                            <div class="absolute px-3">
                                <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                                <label class="text-sm text-primary cursor-pointer js-password-label" for="toggle">Show</label>
                            </div>
                        </div>
                    </div>
                    

                    

                    <div class="text-xs text-primary mt-2">
                        <a href="{{url('/validation')}}">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="bg-primary mt-5 rounded-xl text-white text-center py-2 hover:scale-105 duration-300">Login</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

@vite('resources/js/password.js')