<?php
/**
 */
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserNotifications;

class User extends Authenticatable  implements MustVerifyEmail

{
    use Notifiable;

    /**
     * The attaributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
     protected $hidden = [
        'password', 'remember_token',
    ];

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getimageattribute(){
        return $this->profile_image? asset('storage/img/fotoprofilepengguna/'.$this->profile_image):asset('img-001.jpg');
    }

    public function createNotifUser($data)
    {
        $notif = new UserNotifications();
        $notif->type = 'App\Notifications\AdminNotification';
        $notif->notifiable_type = 'App\User';
        $notif->notifiable_id = $this->id;
        $notif->data = $data;
        $notif->save();
    }
}
