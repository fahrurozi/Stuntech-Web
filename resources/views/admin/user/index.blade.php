<h1>User</h1>
<table border="1">
    <thead>
        <td>name</td>
        <td>email</td>
    </thead>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
    </tr>
    @endforeach
</table>