<?php
namespace App\Helpers;
/**
 * ImageHelper Class
 */

use App\User;
use App\Helpers\GravatarHelper;

class ImageHelper
{
  public static function getUserImage($id)
  {
    $user = User::find($id);
    $avatar_url = "";
    if (!is_null($user)) {

        // Return him gravatar image
        if (GravatarHelper::validate_gravatar($user->email)) {
          $avatar_url = GravatarHelper::gravatar_image($user->email, 100);
        }else {
          // When there is no gravatar image
          $avatar_url = url('home-asset/images/user.png');
        }

    }else {
      // return redirect('/');
    }

    return $avatar_url;
  }
}
