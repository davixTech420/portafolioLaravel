<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 *
 * @property $id
 * @property $title
 * @property $enterprise
 * @property $address
 * @property $description
 * @property $dates
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Experience extends Model
{
    
    static $rules = [
		'title' => 'required',
		'enterprise' => 'required',
		'address' => 'required',
		'description' => 'required',
		'dates' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','enterprise','address','description','dates'];



}
