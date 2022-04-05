@php
$name = $request->input('name');
$method = $request->method();
if ($request->isMethod('POST')) {
    echo '<br> <h1>POst </h1>' ;
}else{
     echo ' <br><h1>'.$method.' </h1>' ;
}
    echo '<h1>'.$name.'</h1>';
            
             

@endphp