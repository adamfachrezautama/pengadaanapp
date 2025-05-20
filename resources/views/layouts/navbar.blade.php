 <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>

           @if(session()->has('token'))
           <li><a href="#">pengajuan</a></li>
           <a class="btn-getstarted" href="/logout">logout</a>
          @else
          <a href="/login" class="btn-getstarted">Login</a>
          @endif

        </ul>
</nav>
