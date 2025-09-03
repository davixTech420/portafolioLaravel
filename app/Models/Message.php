<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @property $id
 * @property $name_sender
 * @property $mail_sender
 * @property $body_sender
 * @property $phone
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Message extends Model
{
    
    static $rules = [
		'name_sender' => 'required',
		'mail_sender' => 'required',
		'body_sender' => 'required',
		'phone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_sender','mail_sender','body_sender','phone'];



}
