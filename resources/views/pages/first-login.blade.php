{{-- displays if the user logs in for the first time --}}
<x-noNavbar-layout>
    <form class="absolute left-0 top-0 w-full h-16 bg-primary" action="/logout" method="POST">
        @csrf
        <button class="absolute right-5 top-4 bg-secondary text-white text-lg rounded-full px-6 py-1 hover:bg-white hover:text-secondary">
            Logout
        </button>
    </form>

    <x-form class="max-w-sm">
        <div class="max-w-md">
            <p class="text-xl text-black text-left font-bold mt-1 ">Change Password</p>
            <p class="text-xs text-justify mt-1 text-black mb-2">To make your account secured, please create a new password to replace your default password given by your administrator. You are also required to create a security question. It will help you reset your password in case you forgot it. Make sure to always remember your answer.</p>
        </div>
        
        {{-- FIRST TIME LOGIN FORM --}}
        <form action="{{ url('/validateFirstLogin/' . $id) }}" method="POST" class="flex flex-col w-full mt-2">
            @csrf

            <div class="relative mt-4">
                <label class="block text-xs font-semibold" for="password">New Password</label>
                <div class="flex justify-end items-center relative w-full">
                    <input class="js-password pr-[53px] form-input" type="password" id="password" name="password" placeholder="*****" autocomplete="off" required>
                    <div class="absolute px-3">
                        <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                        <label class="text-sm text-primary cursor-pointer js-password-label" for="toggle">Show</label>
                    </div>
                </div>
                @error ('password') <p class="text-sm text-red"> {{$message}} </p> @enderror
            </div>

            {{-- wag alisin to --}}
            <div class="hidden items-center grid grid-cols-8 mt-3">
                <label for="new_password" class="col-span-8 sm:col-span-3" >New Password:</label>
                <div class="col-span-8 sm:col-span-5 flex justify-end items-center relative w-full">
                    <input type="password" id="new_password" name="new_password" placeholder="*****" autocomplete="off" class="pr-[53px] form-input">
                    <div class="absolute px-3">
                        <input class="hidden" id="new_password_toggle" type="checkbox" />
                        <label id="new_password_label" class="text-sm text-primary cursor-pointer" for="new_password_toggle">Show</label>
                    </div>
                </div>
                @error ('new_password') <p class="col-span-8 sm:col-start-4 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
            </div>

            <div class="relative mt-3">
                <label for="confirm_password" class="block text-xs font-semibold" >Confirm Password:</label>
                <div class="flex justify-end items-center relative w-full">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="*****" autocomplete="off" class="pr-[53px] form-input" required>
                    <div class="absolute px-3">
                        <input class="hidden" id="confirm_password_toggle" type="checkbox" />
                        <label id="confirm_password_label" class="text-sm text-primary cursor-pointer" for="confirm_password_toggle">Show</label>
                    </div>
                </div>
                @error ('confirm_password') <p class="text-sm text-red"> {{$message}} </p> @enderror
            </div>

            <div class="relative mt-6">
                <label for="question" class="block text-xs font-semibold">Security Question</label>
                <select name="question" class="form-input" required>
                    <option value="" selected hidden>select your question..</option>
                    <option value="What is the street name of the house you grew up in?">What is the street name of the house you grew up in?</option>
                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                    <option value="What was the name of your first school?">What was the name of your first school?</option>
                    <option value="What is the first name of your oldest sibling?">What is the first name of your oldest sibling?</option>
                    <option value="What is the name of a college you applied to but did not attend?">What is the name of a college you applied to but did not attend?</option>
                </select>
                <p class="text-sm text-red -mb-2"> @error('question') {{ $message }} @enderror </p> 
            </div>

            <div class="relative mt-5">
                <label for="answer" class="block text-xs font-semibold">Answer</label>
                <input class="form-input" type="text" id="answer" name="answer" placeholder="Enter your answer" required>
                <p class="text-sm text-red -mb-2"> @error('username') {{ $message }} @enderror </p> 
            </div>

            <div class="flex gap-2 justify-end py-3 mt-6">
                <button type="submit" class="bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-primary hover:ring-1">Confirm</button>
            </div>
        </form>
    </x-form>
</x-noNavbar-layout>

@vite('resources/js/password.js')