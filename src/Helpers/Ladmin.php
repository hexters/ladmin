<?php 

namespace Hexters\Ladmin\Helpers;

use Exception;
use Hexters\Ladmin\Exceptions\LadminException;
use Hexters\Ladmin\Models\LadminNotification;
use Hexters\Ladmin\Events\LadminNotificationEvent;

class Ladmin {

  public function ladminSendNotification($option) {
    try {
      if(empty($option['title'])) {
        throw new Exception('Title required');
      }
      if(empty($option['link'])) {
        throw new Exception('Link required');
      }
      if(empty($option['description'])) {
        throw new Exception('Description required');
      }
      
      $notification = LadminNotification::create([
        'title' => $option['title'],
        'link' => $option['link'],
        'image_link' => ($option['image_link'] ?? null),
        'description' => $option['description'],
      ]);
      event(new LadminNotificationEvent($notification));
      return [
        'result' => true
      ];
    } catch(Exception $ex) {
      return [
        'result' => false,
        'message' => $ex->getMessage()
      ];
    } catch (LadminException $e) {}
  }

}