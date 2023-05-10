<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center justify-center pt-navbar pb-10">
        <div  class="bg-white rounded-xl w-[800px] min-h-[600px] drop-shadow-lg mt-12">
            <div class="px-6 py-4">
                <h2 class="text-xl"><strong>Add User Account</strong></h2>
            </div>

            <div class="grid grid-cols-4 border-y p-10 gap-6 items-center">                  
                <label for="first_name" class="col-span-1 whitespace-nowrap">First Name:</label>
                <input type="text" name="first_name" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="last_name" class="col-span-1 whitespace-nowrap">Last Name:</label>
                <input type="text" name="last_name" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                <input type="text" name="username" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="password" class="col-span-1 whitespace-nowrap">Password:</label>
                <input type="password" name="password" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="confirm_password" class="col-span-1 whitespace-nowrap">Confirm Password:</label>
                <input type="password" name="confirm_password" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="role" class="col-span-1 whitespace-nowrap">Role:</label>
                <input type="text" name="role" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="position" class="col-span-1 whitespace-nowrap">Position:</label>
                <select name="position" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">
                    <option value="Admin">Admin</option>
                    <option value="Admin">Doctor</option>
                    <option value="Admin">Barangay Health Workers (BHW)</option>
                </select>

                <label for="birthdate" class="col-span-1 whitespace-nowrap">Birthdate:</label>
                <input type="date" name="birthdate" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3" max="9999-12-31">

                <label for="contact" class="col-span-1 whitespace-nowrap">Contact No:</label>
                <input type="text" name="contact" class="rounded-xl border outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="email" class="col-span-1 whitespace-nowrap">Email Address:</label>
                <input type="text" name="email" class="rounded-xl border outline-[0.5px] outline-secondary w-full focus:ring-0 border-gray-300 col-span-3">
            </div>
            
            <div class="flex gap-3 justify-end p-3">
                <a href="{{url('/users')}}" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 font-bold">Cancel</a>
                <button type="button" class="bg-secondary text-white text-sm rounded-full px-5 py-2 font-bold">Add User</button>
            </div>
        </div>
    </section>

</x-layout>