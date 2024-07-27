<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat-room.1', function ($user, $id) {
    return true;
});


 

Broadcast::channel('football.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('status.{id}', function ($user, $id) {
    return true;
});

Broadcast::channel('chat.{id}', function ($user, $id) {
    return true;
});
 

