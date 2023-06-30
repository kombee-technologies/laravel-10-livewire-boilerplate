<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use UploadTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_no',
        'user_type',
        'gender',
        'dob',
        'address',
        'remember_token',
        'country_id',
        'state_id',
        'city_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'mobile_no' => 'string',
        'user_type' => 'string',
        'gender' => 'string',
        'dob' => 'string',
        'address' => 'string',
        'country_id' => 'string',
        'state_id' => 'string',
        'city_id' => 'string',
        'status' => 'string',
        'email_verified_at' => 'datetime',
        'created_at' => 'string',
        'updated_at' => 'string',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_galleries()
    {
        return $this->hasMany(UserGallery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class, "hobby_user", "user_id", "hobby_id");
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(UserComment::class);
    }


    public function options()
    {
        return $this->hasMany(UserOption::class);
    }


    public function chips()
    {
        return $this->hasMany(UserChip::class);
    }

    /**
     * Common Display Error Message.
     *
     * @param $query
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function GetError($message)
    {
        return response()->json(['error' => $message], config('constants.validation_codes.unprocessable_entity'));
    }
}
