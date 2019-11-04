<?php
$email = utf8_decode($_POST['email']);
$nuevoarchivo = fopen($email.'.sh', "w+");
fwrite($nuevoarchivo,"#!/bin/sh"."\nphp run_email_script.php ".$email);
fclose($nuevoarchivo);
$command="at now + 1 minute -f ".$email.'.sh';
echo $command;

function terminal($command)
{
    //system
    if(function_exists('system'))
    {
        ob_start();
        system($command , $return_var);
        $output = ob_get_contents();
        ob_end_clean();
    }
    //passthru
    else if(function_exists('passthru'))
    {
        ob_start();
        passthru($command , $return_var);
        $output = ob_get_contents();
        ob_end_clean();
    }
 
    //exec
    else if(function_exists('exec'))
    {
        exec($command , $output , $return_var);
        $output = implode("n" , $output);
    }
 
    //shell_exec
    else if(function_exists('shell_exec'))
    {
        $output = shell_exec($command) ;
    }
 
    else
    {
        $output = 'Command execution not possible on this system';
        $return_var = 1;
    }
 
    print_r (array('output' => $output , 'status' => $return_var));
}
terminal($command); 
unlink($email.'.sh');