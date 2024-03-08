<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @property $id
 * @property $description
 * @property $active
 * @property $created_at
 * @property $type_id
 *
 * @property Type $type
 * @property Answer[] $answers
 * @property Option[] $options
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Question extends Model
{
    
    static $rules = [
		'description' => 'required|string',
		'active' => 'required',
		'type_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','active','type_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class, 'type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class, 'id', 'question_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(\App\Models\Option::class, 'question_id', 'id');
    }
    

}
