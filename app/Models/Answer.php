<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @property $id
 * @property $description
 * @property $question_id
 *
 * @property Question $question
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Answer extends Model
{
    
    static $rules = [
		'description' => 'required|string',
		'question_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','question_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }
    

}
