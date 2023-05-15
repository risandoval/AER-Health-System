<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center justify-center pt-navbar pb-10">
        <div  class="bg-white rounded-xl w-[800px] min-h-[600px] drop-shadow-lg mt-12">
            <div class="px-6 py-4">
                <h2 class="text-xl"><strong>Add User Account</strong></h2>
            </div>
            
            <form action="/users/add" method="POST">
                <div class="grid grid-cols-4 border-y p-10 gap-6 items-center">    
                    @csrf              
                    <label for="first_name" class="col-span-1 whitespace-nowrap -mb-6">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('first_name'){{$message}} @enderror </p>                    

                    <label for="first_name" class="col-span-1 whitespace-nowrap -mb-6">Middle Name:</label>
                    <input type="text" name="middle_name" id="middle_name" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('middle_name'){{$message}} @enderror </p>  

                    <label for="last_name" class="col-span-1 whitespace-nowrap -mb-6">Last Name:</label>
                    <input type="text" name="last_name" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('last_name'){{$message}} @enderror </p>  

                    <label for="username" class="col-span-1 whitespace-nowrap -mb-6">Username:</label>
                    <input type="text" name="username" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('username'){{$message}} @enderror </p>  

                    <label for="role" class="col-span-1 whitespace-nowrap -mb-6">Role:</label>
                    <select name="role" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                        <option value="" selected hidden>select..</option>
                        <option value="Admin">Admin</option>
                        <option value="Doctor">Doctor</option>
                        <option value="BHW">Barangay Health Workers (BHW)</option>
                    </select>
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('role'){{$message}} @enderror </p> 

                    <label for="specialization" class="col-span-1 whitespace-nowrap -mb-6">Specialization:</label>
                    <select name="specialization" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                        <option value="" selected hidden>select..</option>
                        <option value="Admin">Admin</option>
                        <option value="Doctor">Doctor</option>
                        <option value="BHW">Barangay Health Workers (BHW)</option>
                    </select>
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('specialization'){{$message}} @enderror </p> 

                    <label for="birthdate" class="col-span-1 whitespace-nowrap -mb-6">Birthdate:</label>
                    <input type="date" name="birthdate" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6" max="9999-12-31" >
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('birthdate'){{$message}} @enderror </p> 

                    <label for="contact" class="col-span-1 whitespace-nowrap -mb-6">Mobile No:</label>
                    <input type="text" name="contact" id="contact" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6" placeholder="Enter 11 digit number">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('contact'){{$message}} @enderror </p>

                    <label for="email" class="col-span-1 whitespace-nowrap -mb-6">Email Address:</label>
                    <input type="text" name="email" class="rounded-xl border outline-[0.5px] outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('email'){{$message}} @enderror </p>

                    <label for="password" class="col-span-1 whitespace-nowrap -mb-6">Password:</label>
                    <input type="password" name="password" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('password'){{$message}} @enderror </p>

                    <label for="confirm_password" class="col-span-1 whitespace-nowrap -mb-6">Confirm Password:</label>
                    <input type="password" name="confirm_password"class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3 -mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red -mb-2"> @error ('confirm_password'){{$message}} @enderror </p>
                </div>
            
                <div class="flex gap-3 justify-end p-3">
                    <a href="{{url('/users')}}" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 font-bold">Cancel</a>
                    <button type="submit" class="bg-secondary text-white text-sm rounded-full px-5 py-2 font-bold">Add User</button>
                </div>
            </form>
        </div>
    </section>

</x-layout>
