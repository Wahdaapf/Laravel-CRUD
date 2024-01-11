<div class="navbar bg-base-100 p-6">
    <div class="flex-1">
        <a href="/" class="btn btn-ghost text-xl">WahdaBerita</a>
    </div>
    @if(Auth::check())
    <div class="flex-none gap-2">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                <li><a href="{{url('beritaku')}}">Berita</a></li>
                <li>
                    <form action="{{Route('logout')}}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @else
    <div class="navbar-end">
        <a href="{{Route('login')}}" class="btn">Login</a>
    </div>
    @endif
</div>