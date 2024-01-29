<?php

$con = mysqli_connect('localhost' , 'root' , 'root' , 'win');

if(!$con)
{
    echo mysqli_connect_errno();
}