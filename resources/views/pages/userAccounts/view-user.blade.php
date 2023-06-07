<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center justify-center pt-navbar pb-10">
        <div  class="bg-white rounded-xl max-w-[800px] min-h-[600px] drop-shadow-lg mt-12 mx-4">
            <div class="px-6 py-4">
                <h2 class="text-xl"><strong id="userTitle">{{$errors->any() ? 'Edit User Information' : 'User Information'}}</strong></h2>
                @if(session('error'))
                    <p class="text-red text-xs p-1">
                        {{ session('error') }}  
                    </p>
                @endif
            </div>
            
            <form action="{{route('update',['id'=>$viewUser->id])}}" method="POST" id="userForm">
                @csrf
                @method('PUT')
                <div class="lg:grid lg:grid-cols-4 border-y p-10 gap-6 items-center">    
                    <label for="first_name" class="col-span-1 whitespace-nowrap -mb-6">First Name:</label>
                    <input type="text" name="first_name" value="{{$viewUser->first_name}}" {{$errors->any() ? '' : 'disabled'}} class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('first_name'){{$message}} @enderror </p>

                    <label for="first_name" class="col-span-1 whitespace-nowrap -mb-6">Middle Name:</label>
                    <input type="text" name="middle_name" value="{{$viewUser->middle_name}}" {{$errors->any() ? '' : 'disabled'}} class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('middle_name'){{$message}} @enderror </p>

                    <label for="last_name" class="col-span-1 whitespace-nowrap -mb-6">Last Name:</label>
                    <input type="text" name="last_name" value="{{$viewUser->last_name}}" {{$errors->any() ? '' : 'disabled'}} class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('last_name'){{$message}} @enderror </p>

                    <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                    <input type="text" value="{{$viewUser->username}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3" readonly>

                    <label for="role" class="col-span-1 whitespace-nowrap -mb-6">Role:</label>
                    <input type="text" value="{{$viewUser->role}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6" readonly>
                    {{-- <select name="role" value="{{$viewUser->role}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 bg-disabled-bg mb-2 lg:-mb-6" disabled>
                        <option value="" selected hidden>select..</option>
                        <option value="Admin" {{$viewUser->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                        <option value="Doctor" {{$viewUser->role == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                        <option value="BHW" {{$viewUser->role == 'Barangay Health Worker' ? 'selected' : ''}}>Barangay Health Workers (BHW)</option>
                    </select> --}}
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('role'){{$message}} @enderror </p>

                    <label for="specialization" class="col-span-1 whitespace-nowrap -mb-6">Specialization:</label>
                    <input type="text" value="{{$viewUser->specialization}}" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6" readonly>
                    {{-- <select name="specialization" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 bg-disabled-bg mb-2 lg:-mb-6" disabled>
                        <option value="" selected hidden>select..</option>
                        <option value="Admin" {{$viewUser->specialization == 'Admin' ? 'selected' : ''}}>Admin</option>
                        <option value="Doctor" {{$viewUser->specialization == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                        <option value="Barangay Health Worker" {{$viewUser->specialization == 'Barangay Health Worker' ? 'selected' : ''}}>Barangay Health Workers (BHW)</option>
                    </select> --}}
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('position'){{$message}} @enderror </p>

                    <label for="birthday" class="col-span-1 whitespace-nowrap -mb-6">Birthday:</label>
                    <input type="date" value="{{$viewUser->birthday}}" name="birthday" {{$errors->any() ? '' : 'disabled'}} class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6" max="9999-12-31">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('birthday'){{$message}} @enderror </p>

                    <label for="contact" class="col-span-1 whitespace-nowrap -mb-6">Mobile No:</label>
                    <input type="text" value="{{$viewUser->contact}}" name="contact" {{$errors->any() ? '' : 'disabled'}} class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('contact'){{$message}} @enderror </p>

                    <label for="email" class="col-span-1 whitespace-nowrap -mb-6">Email Address:</label>
                    <input type="text" value="{{$viewUser->email}}" name="email" {{$errors->any() ? '' : 'disabled'}} class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 mb-2 lg:-mb-6">
                    <p class="col-start-2 col-span-3 text-sm text-red mb-2 lg:-mb-2"> @error ('email'){{$message}} @enderror </p>
                    
                </div>
                
                <div class="flex gap-3 justify-end p-3">
                    
                    {{-- <a href="{{url('/users')}}" id="closeButton" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Close</a> --}}
                    <button id="closeButton" type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">{{$errors->any() ? 'Cancel' : 'Close'}}</button>
                    <button id="editButton" class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">{{$errors->any() ? 'Save' : 'Edit'}}</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>

@vite('resources/js/form.js')