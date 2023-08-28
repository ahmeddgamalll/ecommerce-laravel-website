<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    @include('partials.nav')

    <div class="container">

        <table>
            <tr>
                <th>user Type</th>
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>operations</th>
            </tr>

            @foreach($users as $user)
            <tr>
                <td> {{ $user->type }} </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->password }} </td>
                <td>
                    <form action="{{ route('Admin.deleteUser' , $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="delete" name="delete" class='but'>
                    </form>
                    <form action="{{ route('Admin.updateUser.index', $user->id) }}" method="get">
                        @csrf
                        <input type="submit" value="edit" name='edit' class='but'>
                    </form>
                </td>
            </tr>

            @endforeach

        </table>

    </div>
</body>

</html>
