<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
/*
* use Illuminate\Notifications\Notifiable;
* add to avoid FatalErrorException
* Trait 'App\Notifiable' not found
* in Comment.php line 10
*/

class Comment extends Model
{
    use Notifiable;
    protected $primaryKey = 'comment_id';
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account', 'title', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
