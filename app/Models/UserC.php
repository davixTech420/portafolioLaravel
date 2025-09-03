<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $two_factor_secret
 * @property $two_factor_recovery_codes
 * @property $two_factor_confirmed_at
 * @property $remember_token
 * @property $current_team_id
 * @property $profile_photo_path
 * @property $description
 * @property $facebook_url
 * @property $twitter_url
 * @property $dribbble_url
 * @property $linkedin_url
 * @property $phone
 * @property $address
 * @property $birthdate
 * @property $url_cv
 * @property $bio
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    static $rules = [
		'name' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','two_factor_secret','two_factor_recovery_codes','two_factor_confirmed_at','current_team_id','profile_photo_path','description','facebook_url','twitter_url','dribbble_url','linkedin_url','phone','address','birthdate','url_cv','bio'];



}
