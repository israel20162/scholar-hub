<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message','to_id','from_id'];


    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from()
    {
        return $this->belongsTo(User::class,'from_id');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to_id');
    }


}
