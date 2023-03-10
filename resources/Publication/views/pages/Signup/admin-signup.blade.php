<?php

use Illuminate\Support\Facades\Auth;

 if(Auth()->check()){
    return redirect()->back();
 }

?>
<h1>
    Admin SignUp page!!
</h1>
