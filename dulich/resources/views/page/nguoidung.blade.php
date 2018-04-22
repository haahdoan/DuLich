<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>user information</title>
        </head>

        <body>
            <div>
                <h1>USER INFORMATION</h1>
                <form action="nguoidung" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if($errors->any())
                        <div style="color: red" class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('thongbao'))
                        <div style="color: red">{{Session::get('thongbao')}} </div>
                    @endif
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><p>Full name:</p></td>
                            <td><p><input type="text" name="name" value="{{$nguoidung->name}}"></p></td>
                        </tr>

                        <tr>
                            <td><p>Address:</p></td>
                            <td><p><input type="text" name="address" value="{{$nguoidung->address}}"></p></td>
                        </tr>

                        <tr>
                            <td><p>Email:</p></td>
                            <td><p><input type="text" name="email" readonly value="{{$nguoidung->email}}"></p></td>
                        </tr>

                        <tr style="color: red">
                            <td colspan="2">
                            <h3><input id="changePassword" type="checkbox" name="checkPass"> 
                            <label>Change the password:</label></h3>
                            </td>
                        </tr>

                        <tr>
                            <td><p>Enter current password:</p></td>
                            <td><p><input id="curPass" type="password" name="password" disabled></p></td>
                        </tr>   

                        <tr>
                            <td><p>Enter your new password:</p></td>
                            <td><p><input id="newPass" type="password" name="new_pass" disabled></p></td>
                        </tr>
                        
                        <tr>
                            <td><p>Enter the new password again:</p></td>
                            <td><p><input id="reNewPass" type="password" name="re_new_pass" disabled></p></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                    <input type="submit" value="Edit" name="change">
                                    <input type="reset" value="Reset" name="reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <script language="javascript">
            document.getElementById('changePassword').onclick = function(e){
                if (this.checked){
                    document.getElementById("curPass").disabled = false;
                    document.getElementById("newPass").disabled = false;
                    document.getElementById("reNewPass").disabled = false;
                }
                else{
                    document.getElementById("curPass").disabled = true;
                    document.getElementById("newPass").disabled = true;
                    document.getElementById("reNewPass").disabled = true;
                }
            };
        </script>
        </body>
    </html>
