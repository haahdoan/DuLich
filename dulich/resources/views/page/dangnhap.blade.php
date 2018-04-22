<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>login</title>
        </head>

        <body>
            <div>
                <h1>LOGIN</h1>
                <form action="{{route('dangnhap')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            <p style="color: red">{{$err}}</p>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('loi'))
                        <div style="color: red">{{Session::get('loi')}} </div>
                    @endif
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><p>Email:</p></td>
                            <td><p><input type="text" name="email" placeholder="Email" value="{{old('email')}}"></p></td>
                        </tr>

                        <tr>
                            <td><p>Password:</p></td>
                            <td><p><input type="password" name="password" placeholder="Password"></p></td>
                        </tr>   
                        
                        <tr>
                            <td></td>
                            <td>
                                    <input type="submit" value="Login" name="login">
                                    <input type="reset" value="Reset" name="reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </body>
    </html>
