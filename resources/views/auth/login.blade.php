<x-layout>
  <x-messages />
  <section class="bg-light min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-lg shadow-lg max-w-3xl items-center">
      <!-- form -->
      <div class="md:w-1/2 px-8 md:px-16 py-5" >
        <h2 class="font-bold text-2xl text-black">Log in to SystemName</h2>
        <p class="text-xs mt-1 text-black">Welcome! Please enter your details</p>
  
        <form action="/login/process" method="POST" class="flex flex-col mt-3">
          @csrf
          {{-- USERNAME --}}
          <label class="mt-3 block text-xs font-semibold">Username</label>
          <input class="mt-2 p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="text" name="email" placeholder="Enter your username">
          {{-- PASSWORD --}}
          <label class="mt-3 block text-xs font-semibold">Password</label>
          <div class="relative mt-2">
            <input class="p-2 rounded-xl border w-full border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="password" name="password" placeholder="*****">
          </div>
          {{-- FORGOT PASSWORD --}}
          <div class="text-xs mt-2 text-primary">
            <a href="#">Forgot password?</a>
          </div>
          {{-- LOGIN BTN --}}
          <button type="submit" class="bg-purple-600">Login </button>
          {{-- <a href="/dashboard" class="bg-primary mt-5 rounded-xl text-white text-center py-2 hover:scale-105 duration-300">Sign in</a> --}}
        </form>
  
        {{-- <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
          <hr class="border-gray-400">
          <p class="text-center text-sm">OR</p>
          <hr class="border-gray-400">
        </div> --}}
  
        {{-- <button class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
          <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
          </svg>
          Login with Google
        </button> --}}
  
        {{-- <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
          <p>Don't have an account?</p>
          <button class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</button>
        </div> --}}
      </div>
  
      <!-- image -->
      <div class="md:block hidden w-1/2">
        <img class="rounded-r-lg" src="https://images.unsplash.com/photo-1550831107-1553da8c8464?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80">
      </div>
    </div>
  </section>

</x-layout>