<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\DatesTranslator;

class User extends Authenticatable
{
    use Notifiable, HasRoles, DatesTranslator;

    /**
     * The attributes that are mass assignable.
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

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function newFromBuilder($attributes = [], $connection = null)
    {
        return parent::newFromBuilder($attributes, $connection); // TODO: Change the autogenerated stub
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }
}
