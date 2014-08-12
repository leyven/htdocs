<html>
    <body>
        <h1>Laravel Quickstart</h1>

        @yield('content')
    </body>
</html>
<?php
$users = DB::table('articulos')->get();

foreach ($users as $user)
{
    var_dump($user->Titulo);

}