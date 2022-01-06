
{{--<li class="nav-item dropdown">--}}
{{--    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Categories <span class="caret"></span></span></a>--}}
{{--    <ul class="dropdown-menu">--}}
{{--        <li><a href="about.html">About</a></li>--}}
{{--        <li><a href="testimonial.html">Testimonial</a></li>--}}
{{--    </ul>--}}
{{--</li>--}}
<li class="nav-item active">
    <a class="nav-link" href="{{route('home')}}">Products</a>
</li>
@if(Auth::check())
<li class="nav-item">
    <a class="nav-link" href="{{route('admin')}}">Admin</a>
</li>
<li class="nav-item">
    <form action="/logout" method="post">
        @csrf
        <button class="btn btn-danger">logout</button>
    </form>
{{--    <a class="nav-link" href="/logout">Logout</a>--}}
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="/login">Login</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/register">Register</a>
</li>
@endif
