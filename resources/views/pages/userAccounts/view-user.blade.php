<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center justify-center pt-navbar pb-10">
        <div  class="bg-white rounded-xl max-w-[800px] min-h-[600px] drop-shadow-lg mt-12 mx-4">
            <div class="px-6 py-4">
                <h2 class="text-xl"><strong>View User Account</strong></h2>
                @if(session('error'))
                    <p class="text-red text-xs p-1">
                        {{ session('error') }}  
                    </p>
                @endif
            </div>
            <form action="/user/view/{{$viewUser->id}}" method="POST">
                @csrf
                @method('PUT')             
                <div class="lg:grid lg:grid-cols-4 border-y p-10 gap-6 items-center">    
                
                    <label for="first_name" class="col-span-1 whitespace-nowrap -mb-6">First Name:</label>
                    <input type="text" name="first_name" value="{{$viewUser->first_name}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6" disabled>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('first_name'){{$message}} @enderror </p>

                    <label for="first_name" class="col-span-1 whitespace-nowrap -mb-6">Middle Name:</label>
                    <input type="text" name="middle_name" value="{{$viewUser->middle_name}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6" disabled>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('middle_name'){{$message}} @enderror </p>

                    <label for="last_name" class="col-span-1 whitespace-nowrap -mb-6">Last Name:</label>
                    <input type="text" name="last_name" value="{{$viewUser->last_name}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6" disabled>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('last_name'){{$message}} @enderror </p>

                    {{-- <label for="username" class="col-span-1 whitespace-nowrap -mb-6">Username:</label>
                    <input type="text" name="username" value="{{$viewUser->username}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('username'){{$message}} @enderror </p> --}}

                    {{-- <label for="password" class="col-span-1 whitespace-nowrap -mb-6">Password:</label>
                    <input type="password" name="password" value="{{$viewUser->password}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('password'){{$message}} @enderror </p> --}}

                    {{-- <label for="confirm_password" class="col-span-1 whitespace-nowrap -mb-6">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('confirm_password'){{$message}} @enderror </p> --}}

                    <label for="role" class="col-span-1 whitespace-nowrap -mb-6">Role:</label>
                    <select name="role" value="{{$viewUser->role}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 bg-disabled-bg mb-2 lg:-mb-6" disabled>
                        <option value="" selected hidden>select..</option>
                        <option value="Admin" {{$viewUser->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                        <option value="Doctor" {{$viewUser->role == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                        <option value="BHW" {{$viewUser->role == 'Barangay Health Worker' ? 'selected' : ''}}>Barangay Health Workers (BHW)</option>
                    </select>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('role'){{$message}} @enderror </p>

                    <label for="specialization" class="col-span-1 whitespace-nowrap">Specialization:</label>
                    <select name="specialization" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 bg-disabled-bg mb-2 lg:-mb-6" disabled>
                        <option value="" selected hidden>select..</option>
                        <option value="Admin" {{$viewUser->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                        <option value="Doctor" {{$viewUser->role == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                        <option value="Barangay Health Worker" {{$viewUser->role == 'Barangay Health Worker' ? 'selected' : ''}}>Barangay Health Workers (BHW)</option>
                    </select>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('position'){{$message}} @enderror </p>

                    <label for="birthday" class="col-span-1 whitespace-nowrap -mb-6">Birthday:</label>
                    <input type="date" value="{{$viewUser->birthday}}" name="birthday" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6" max="9999-12-31" disabled>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('birthday'){{$message}} @enderror </p>

                    <label for="contact" class="col-span-1 whitespace-nowrap -mb-6">Mobile No:</label>
                    <input type="text" value="{{$viewUser->contact}}" name="contact" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6" disabled>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('contact'){{$message}} @enderror </p>

                    <label for="email" class="col-span-1 whitespace-nowrap -mb-6">Email Address:</label>
                    <input type="text" value="{{$viewUser->email}}" name="email" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg mb-2 lg:-mb-6" disabled>
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('email'){{$message}} @enderror </p>

                </div>
            
                <div class="flex gap-3 justify-end p-3">
                    <a href="{{url('/users')}}" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Back</a>
                </div>
            </form>
        </div>
    
    </section>
   

</x-layout>
