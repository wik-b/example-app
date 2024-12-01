<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ route('home.index') }}" class="inline-block">
      <img src="/images/nobackground.png" class="h-14" alt="Logo">
    </a>
  <div class="flex md:order-2 space-x-4 rtl:space-x-reverse">
  <a href="{{ route('posts.create') }}" class="inline-block">
      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Make a Post</button>
    </button>
    </a>

  @guest
    <a href="{{ route('register') }}" class="inline-block">
      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Account</button>
      </button>
    </a>
    <a href="{{ route('login') }}" class="inline-block">
      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log In</button>
      </button>
    </a>
  @endguest

  @auth
  <div class="relative inline-block">
    <button type="button" class="flex items-center rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 p-[5px]" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
      <span class="text-blue-500 dark:text-white">{{ Auth::user()->name }}</span>
      </button>
      <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300" role="menuitem">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300" role="menuitem">Log Out</button>
        </form>
  </div>
</div>
@endauth
  

  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-fixed">
  </div>
  </div>
</nav>

<script>
  function toggleDropdown() {
    var menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
  }
</script>