<x-layout class="bg-light">
    <section class="flex justify-center items-center w-full pt-navbar pb-10">
        {{-- success/fail message --}}
        <x-messages class="absolute w-[410px] top-[85px]">
        </x-messages>

        <div  class="flex flex-col bg-white min-w-[400px] md:w-[570px] rounded-xl drop-shadow-lg mt-12 mx-4">
            <div class="px-6 py-4">
                <h2 class="text-xl"><strong>Add User Account</strong></h2>
            </div>
            <form action="{{url('users/store')}}" method="POST">
                @csrf
                <div id="main-container" class="flex flex-wrap border-y gap-5 px-6 py-8">    
                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="first_name" class="md:col-span-2 whitespace-nowrap">First Name: <span class="text-red">*</span></label>
                        <input type="text" name="first_name" class="form-input md:col-start-4 md:col-span-10" placeholder="ex. Juan">
                        @error ('first_name') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="middle_name" class="md:col-span-2 whitespace-nowrap">Middle Name:</label>
                        <input type="text" name="middle_name" class="form-input md:col-start-4 md:col-span-10" placeholder="ex. Malakas">
                        @error ('middle_name') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="last_name" class="md:col-span-2 whitespace-nowrap">Last Name: <span class="text-red">*</span></label>
                        <input type="text" name="last_name" class="form-input md:col-start-4 md:col-span-10" placeholder="ex. de la Cruz">
                        @error ('last_name') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>
            
                    <div id="role-field" class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="role" class="md:col-span-2 whitespace-nowrap">Role: <span class="text-red">*</span></label>
                        <select id="role-input" name="role" class="form-input md:col-start-4 md:col-span-10" required=true>
                            <option value="" selected hidden>Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Barangay Health Worker">Barangay Health Workers (BHW)</option>
                        </select>
                        @error ('role') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>
                    
                    <div id="birthday-field" class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="birthday" class="md:col-span-2 whitespace-nowrap">Birthday: <span class="text-red">*</span></label>
                        <input type="date" name="birthday" class="form-input md:col-start-4 md:col-span-10" max="9999-12-31">
                        @error ('birthday') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="contact" class="md:col-span-2 whitespace-nowrap">Mobile No: <span class="text-red">*</span></label>
                        <input type="text" name="contact" class="form-input md:col-start-4 md:col-span-10" placeholder="ex. 09123456789">
                        @error ('contact') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="email" class="md:col-span-2 whitespace-nowrap">Email Address:</label>
                        <input type="text" name="email" class="form-input md:col-start-4 md:col-span-10" placeholder="ex. juandelacruz@example.com">
                        @error ('email') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                </div>
                
                <div class="flex gap-2 justify-end p-3">
                    <a href="{{url('/users')}}" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Cancel</a>
                    <button type="submit" class="bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-primary hover:ring-1">Add User</button>
                </div>
            </form>
        </div>
    
    </section>
   
</x-layout>

@vite('resources/js/roleToggle.js')