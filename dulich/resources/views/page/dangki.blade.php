<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>sign in</title>
        </head>

        <body>
            <div>
                <h1>SIGN IN</h1>
                <form action="{{route('dangki')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if($errors->any())
                        <div style="color: red" class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('thanhcong'))
                        <div>{{Session::get('thanhcong')}} </div>
                    @endif
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><p>Full name:</p></td>
                            <td><p><input type="text" name="name"></p></td>
                        </tr>

                        <tr>
                            <td><p>Address:</p></td>
                            <td><p><input type="text" name="address"></p></td>
                        </tr>

                        <tr>
                            <td><p>Email:</p></td>
                            <td><p><input type="text" name="email"></p></td>
                        </tr>

                        <tr>
                            <td><p>Password:</p></td>
                            <td><p><input type="password" name="password"></p></td>
                        </tr>   

                        <tr>
                            <td><p>Re-Password:</p></td>
                            <td><p><input type="password" name="re_pass"></p></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <center>
                                    <input type="submit" value="Sign in" name="signin">
                                    <input type="reset" value="Reset" name="reset">
                                </center>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </body>
    </html>
