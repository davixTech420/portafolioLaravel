<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 *
 * @property $id
 * @property $title
 * @property $address
 * @property $enterprise
 * @property $description
 * @property $dates
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Education extends Model
{
    
    static $rules = [
		'title' => 'required',
		'address' => 'required',
		'enterprise' => 'required',
		'description' => 'required',
		'dates' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','address','enterprise','description','dates'];



}
