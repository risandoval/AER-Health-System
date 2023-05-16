<nav class="fixed top-0 z-10 w-full p-5 bg-primary shadow md:flex md:items-center md:justify-between text-light">
    <div class="flex justify-between items-center">
      <span class="text-2xl">
        <a href="/dashboard">
          <img class="h-10 inline" src="{{url('/images/logo.png')}}" alt="logo">
          SystemName
        </a>
      </span>
      <span class="text-3xl cursor-pointer mx-2 md:hidden block ">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-primary text-light w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-400">
      <li class="mx-4 my-6 md:my-0">
        <a href="/dashboard" class="text-xl hover:border-b-2 hover:pb-1 duration-400">Home</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="{{url('/users')}}" class="text-xl hover:border-b-2 hover:pb-1 duration-400">User Accounts</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:border-b-2 hover:pb-1 duration-400">1st Encounter</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:border-b-2 hover:pb-1 duration-400">2nd Encounter</a>
      </li>
      {{-- <li class="mx-4 my-6 md:my-0">
        <a href="/profile" class="text-xl hover:border-b-2 hover:pb-1 duration-400">Profile</a>
      </li> --}}

      <form action="/logout" method="POST">
      @csrf
        <button class="bg-secondary text-light duration-400 px-6 py-2 mx-4 hover:bg-light hover:text-primary rounded">
          {{-- <a href="/" class="text-xl duration-400">Logout</a> --}}
          Logout
        </button>
      </form>
    </ul>
</nav>

@vite('resources/js/navbar.js')