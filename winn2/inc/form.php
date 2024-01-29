<?php

$errors = [
    'firstnameError' => '' ,
    'lastnameError' => '' ,
    'emailError' => '' ,
];

if(isset($_POST['submit'])) {  

$firstname = mysqli_real_escape_string($con , $_POST['firstname'] ) ??null;
$lastname =  mysqli_real_escape_string($con , $_POST['lastname']);
$email =     mysqli_real_escape_string($con , $_POST['email']); 

$sql = "INSERT INTO users (firstname , lastname , email )
        VALUES ('$firstname' , '$lastname' , '$email') ";

//التحقق من الاسم الاول
if(empty($firstname)){
    $errors['firstnameError'] = ' يرجى ادخال الاسم الاول '; 
}

// التحقق من الاسم الاخير
elseif(empty($lastname)){
    $errors['lastnameError'] = ' يرجى ادخال الاسم الاخير ';
}

// التحقق من الايميل
elseif(empty($email)){
    $errors['emailError'] = ' يرجى ادخال الايميل ';
 }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
    $errors['emailError'] = ' يرجى ادخال ايميل صحيح ';
}else{
    if(mysqli_query($con , $sql)){
        header('Location: ' .  $_SERVER['PHP_SELF'] );
    }else{
        echo 'Error: ' . mysqli_error($con);
     }
}
}

?>