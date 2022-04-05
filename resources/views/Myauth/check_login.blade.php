
@php
echo '<div class="container"><div style="height:100%"
    class="row justify-content-center align-items-center">
        <div class="col-md-8">
            ';
if ($request->isMethod('post')) {
                        
                            $email = $request->input('email');
                            $pass = $request->input('password');
                        
                        $query_login1 = "SELECT * FROM users WHERE email='$email' and password='$pass'";
                        
                        $result = mysqli_query($DB,$query_login1);
                        
                        
                        if(mysqli_num_rows($result)==1){
                                    echo "<h1>Success!<br> logged in</h1>"     ;
                                    $request->session()->put('email',$email);
                                    $request->session()->put('pass',$pass);
                                     echo "Email: ".$request->session()->get('email')."<br>";
                                     echo "Password: ".$request->session()->get('pass');
                              

                        }   
                        else if (mysqli_num_rows($result)>1){
                                    echo "<h1>Error! users exists twice</h1>"  ; 
                        
                        }
                        else{
                                    echo "<h1>Error! users doesn't exist </h1>"; 
                        
}
}else{}
echo '</div></div></div>';
@endphp