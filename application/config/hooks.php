<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'][] = array(  'class'    => 'Application_protocol',
    'function' => 'protocol_method',
    'filename' => 'application_protocol.php',
    'filepath' => 'hooks');

$hook['post_controller_constructor'][] = array(  'class'    => 'MyOtherClass',
        'function' => 'MyOtherfunction',
        'filename' => 'Myotherclass.php',
        'filepath' => 'hooks');


 $hook['post_controller'] = array(    
    'class' => 'Db_log',             
    'function' => 'logQueries',     
   'filename' => 'Db_log.php',    
   'filepath' => 'hooks'         
  ); 