<?php

namespace App\Services;
use App\Models\Notification;

class NotificationServices
{
    public function addNotification($user_id, $icon, $msg, $desc, $url)
    {
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->icon = $icon;
        $notification->title = $msg;
        $notification->description = $desc;
        $notification->url = $url;
        $notification->save();
    }

    public function deleteNotification($id)
    {
        if(Notification::where('id', $id)->exists())
        {
            $notification = Notification::where('id', $id)->get()->first();
            $notification->delete();
        }
    }

    public function getNotificationByUserIdOrderBy($user_id, $order)
    {
        $notification = Notification::where('user_id', $user_id)->orderBy('id', $order)->get()->all();
        return $notification;
    }
}