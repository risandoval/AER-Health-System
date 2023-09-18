{{-- second page of forgot pass --}}
<x-noNavbar-layout>
    <x-form class="max-w-sm">
        <div class="max-w-md text-center mt-1 mb-4">
            <p class="text-md text-black text-center font-bold mt-1 ">Follow the three steps to recover your account.</p>
            <p class="text-xs mt-1 text-black text-center">Answer your security question to change your password. <span class="text-red">You only have <strong class="font-extrabold text-md text-red">{{ $remainingAttempts }}</strong> attempt(s).</span> In case you used up all your attempts, we will automatically request a password reset from your admin.</p>
        </div>
        
        {{-- STEPPER --}}
        <div class="mt-4 mb-4">
            <div class="overflow-hidden rounded-full bg-gray-200">
                <div class="h-2 w-1/2 rounded-full bg-primary"></div>
            </div>
        
            <ol class="mt-4 grid grid-cols-3 text-sm font-medium text-gray-500">
                <li class="flex items-center justify-start text-primary sm:gap-1.5">
                    <svg class="h-6 w-6 sm:h-5 sm:w-5" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11095)"> 
                            <path d="M12.5 17V7L10.5 9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></circle> 
                        </g> <defs> <clipPath id="clip0_429_11095"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g>
                    </svg>
                    <span class="hidden sm:inline"> Verification </span>
                </li>
        
                <li class="flex items-center justify-center text-primary sm:gap-1.5">
                    <svg class="h-6 w-6 sm:h-5 sm:w-5" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_10992)"> 
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></circle> 
                            <path d="M9.5 9.5C9.5 8.8602 9.74408 8.2204 10.2322 7.73224C11.2085 6.75593 12.7915 6.75593 13.7678 7.73224C14.7441 8.70856 14.7441 10.2915 13.7678 11.2678L9.93934 15.0962C9.65804 15.3775 9.5 15.759 9.5 16.1569L9.5 17H14.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                        </g> <defs> <clipPath id="clip0_429_10992"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g>
                    </svg>
                    <span class="hidden sm:inline"> Security Question </span>
                </li>
        
                <li class="flex items-center justify-end sm:gap-1.5">
                    <svg class="h-6 w-6 sm:h-5 sm:w-5" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_10991)"> 
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></circle> 
                            <path d="M10 16.2361C10.5308 16.7111 11.2316 17 12 17C13.6569 17 15 15.6569 15 14C15 12.3431 13.6569 11 12 11L15 7H10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                        </g> <defs> <clipPath id="clip0_429_10991"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g>
                    </svg>
                    <span class="hidden sm:inline"> Password </span>
                </li>
            </ol>
        </div>
      
        {{-- STEP FORM --}}
        <form action="{{ url('/validateStepTwo/' . $userId) }}" method="POST" class="flex flex-col mt-3">
            @csrf
        
            <div class="relative mt-3">
                <label for="question" class="block text-sm font-semibold">{{ $security_question }}</label>
                <input class="mt-1 p-2 rounded-xl w-full border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="text" id="answer" name="answer" placeholder="Enter your answer" required>
                <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2">
                    @error('answer') {{ $message }} @enderror
                </p>
            </div>
        
            <div class="flex gap-2 justify-end p-3 mt-6">
                <a href="/validation" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Previous</a>
                <button type="submit" class="bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-primary hover:ring-1">Next</button>
            </div>
        </form>
        
    </x-form>
</x-noNavbar-layout>