<?php
/**
 * Created by PhpStorm.
 * Author: PhilPu <zhengchaopu@gmail.com>
 * Date: 2016/12/4.
 */

namespace App\OAuth2;

class Client
{
    /**
     * Make an authorize url.
     *
     * @return string
     */
    public function authorize()
    {
        $authorizeRoute = config('demo_app.authorize_route');

        $query = http_build_query(
            [
                'response_type' => 'code',
                'client_id'     => config('demo_app.client_id'),
                'redirect_uri'  => 'http://local.oauth2.com/oauth2/client/receive_authcode',
                'state'         => session_id(),
            ]
        );

        return $authorizeRoute.'?'.$query;
    }
}