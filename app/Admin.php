<?php
/**
 */
    namespace App;

    use App\Notifications\AdminNotification;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function notifications()
        {
            return $this->morphMany(AdminNotification::class, 'notifiable')->orderby('created_at', 'desc');
        }

        public function createNotif($data)
        {
            $notif = new AdminNotifications();
            $notif->type = 'App\Notifications\AdminNotification';
            $notif->notifiable_type = 'App\User';
            $notif->notifiable_id = $this->id;
            $notif->data = $data;
            $notif->save();
        }
    }