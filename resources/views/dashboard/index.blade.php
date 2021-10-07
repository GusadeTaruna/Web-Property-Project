<h1>Welcome, {{ auth()->user()->name }}</h1>
<form action="/logout" method="post">
    @csrf
    <button type="submit" class="">Logout</button>
</form>