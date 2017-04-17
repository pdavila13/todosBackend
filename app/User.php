<?php

namespace PaoloDavila\TodosBackend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use PaoloDavila\TodosBackend\Notifications\ResetPassword;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 * 
 * @package App
 */
class User extends Authenticatable
{
    use HasApiTokens,Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    public static function findOrFail($id)
    {
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * A user can have many GcmTokens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gcmTokens()
    {
        return 'AAAA149XRmY:APA91bHMDQLNCXoo7K0MhSeRnk3v0zy32dilwPaIRWb29LAzYc9C9WeGY4AlAha85BO252WfecSoEzvMjNRFdCRw6sHXdHN6TQe3F1hqkVEqKUFzJXw6XhPmbQPENy5BT4B_ACCOn4Nr';
    }

    public function routeNotificationForGcm()
    {
        return $this->gcmTokens();
    }

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
