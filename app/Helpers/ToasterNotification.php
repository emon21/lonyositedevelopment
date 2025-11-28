<?php

namespace App\Helpers;

class ToasterNotification{

      // Toaster Notification
     public static function Toaster($message, $type = 'success', $title = null)
      {
            return [
                  'message' => $message,
                  'alert-type' => $type,
                  'title' => $title
            ];
      }

      // Success Notification
      public static function successNotification($message){
         return [
               'message' => $message,
               'alert-type' => 'success'
         ];
      }
   
      // Error Notification
      public static function errorNotification($message){
         return [
               'message' => $message,
               'alert-type' => 'error'
         ];
      }
}


