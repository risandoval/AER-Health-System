<x-noNavbar-layout>
    <x-form>
        <div class="max-w-md">
            <p class="text-xl text-black text-left font-bold mt-1 ">Change Password</p>
            <p class="text-xs text-justify mt-1 text-black text-left mb-4">To make your account secured, please create a new password to replace your default password given by your administrator. You are also required to create a security question. It will help you reset your password in case you forgot it. Make sure to always remember your answer.</p>
        </div>
        
        {{-- FIRST TIME LOGIN FORM --}}
        <form action="{{ url('/validateFirstLogin/' . $id) }}" method="POST" class="flex flex-col mt-3">
            @csrf

            {{-- <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('reset'){{$message}} @enderror </p> --}}
            {{-- <input class="mt-[3px] p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="hidden" id="password" name="id" value={{ session('id')}}> --}}


            <label for="password" class="mt-3 block text-xs font-semibold">New Password</label>
            <input class="mt-[3px] p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="password" id="password" name="password" placeholder="****" required>
            <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('password'){{$message}} @enderror </p>

            <label for="confirm_password" class="mt-6 block text-xs font-semibold">Confirm Password</label>
            <input class="mt-[3px] p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="password" id="confirm_password" name="confirm_password" placeholder="****" required>
            <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('confirm_password'){{$message}} @enderror </p>

            <label for="question" class="mt-6 block text-xs font-semibold">Security Question:</label>
            <select name="question" class="mt-[3px] p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" required>
                <option value="" selected hidden>select your question..</option>
                <option value="What is the street name of the house you grew up in?">What is the street name of the house you grew up in?</option>
                <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                <option value="What was the name of your first school?">What was the name of your first school?</option>
                <option value="What is the first name of your oldest sibling?">What is the first name of your oldest sibling?</option>
                <option value="What is the name of a college you applied to but did not attend?">What is the name of a college you applied to but did not attend?</option>
            </select>
            <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('role'){{$message}} @enderror </p>

            <label for="answer" class="mt-6 block text-xs font-semibold">Answer</label>
            <input class="mt-[3px] p-2 rounded-xl border border-gray-300 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" type="text" id="answer" name="answer" placeholder="Enter your answer" required>
            <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('username'){{$message}} @enderror </p>

            <div class="flex gap-2 justify-end p-3 mt-6">
                <button type="submit" class="bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-primary hover:ring-1">Confirm</button>
            </div>
        </form>
    </x-form>
</x-noNavbar-layout>