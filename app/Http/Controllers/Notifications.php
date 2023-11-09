<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class Notifications
{
    public function readByBOwner($id)
    {
        $notification = Notification::whereId($id)->first();
        $notification->SeenByBOwner = 'Seen';
        $notification->save();
        return redirect()->back();
    }

    public function readByAdmin($id)
    {
        $notification = Notification::whereId($id)->first();
        $notification->SeenByAdmin = 'Seen';
        $notification->save();
        return redirect()->back();
    }

    public function readBySAdmin($id)
    {
        $notification = Notification::whereId($id)->first();
        $notification->SeenBySAdmin = 'Seen';
        $notification->save();
        return redirect()->back();
    }
}
