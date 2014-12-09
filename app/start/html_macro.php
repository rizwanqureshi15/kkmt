<?php

// This file contains all HTML Macros

/**
 * Display Error / Success / Warn / Info messages
 *
 * These messages are set using Session::flash(<message_type>, <message>);
 */
HTML::macro("alert", function(){
  $alerts = array();
  $alert_types = array("danger", "success", "warning", "info", "error");
  foreach ($alert_types as $type) {
    if( Session::has($type) ){
      if($type == 'error'){
        $type_status = 'danger';
      }
      else{
        $type_status = $type;
      }
      
      array_push($alerts, '<div class="alert alert-'. $type_status .' fade in">');
      array_push($alerts, '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
      array_push($alerts, Session::get($type) );
      array_push($alerts, '</div>');
    }
  }

  return implode("", $alerts);
});