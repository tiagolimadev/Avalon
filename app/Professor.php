<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;

    protected $table = 'professores';

    protected $fillable = [
        'nome', 'matricula', 'data_nascimento',
    ];

    protected $dates = ['data_nascimento'];

    protected $guarded = [
        'id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();
    }
}
