<?php


$subs_email =$_GET['email'];
$command="at now + 1 minute -f enviarcorreoconparametro.sh ".$subs_email;
echo $command;



    if(function_exists('system'))
    {
        ob_start();
        system($command , $return_var);
        $output = ob_get_contents();
        ob_end_clean();
    }
   
    else if(function_exists('passthru'))
    {
        ob_start();
        passthru($command , $return_var);
        $output = ob_get_contents();
        ob_end_clean();
    }
    
 
    else if(function_exists('exec'))
    {
        exec($command , $output , $return_var);
        $output = implode("\n" , $output);
    }
    

    else if(function_exists('shell_exec'))
    {
        $output = shell_exec($command) ;
    }
    
    else
    {
        $output = 'Command execution not possible on this system';
        $return_var = 1;
    }
    
    return array($output ,$return_var);