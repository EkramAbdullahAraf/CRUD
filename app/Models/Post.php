<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    public $userId;
    /**
     * @var mixed
     */
    public $id;
    /**
     * @var mixed
     */
    public $title;
    /**
     * @var mixed
     */
    public $completed;
    protected $fillable = [
        'userId',
        'id',
        'title',
        'completed'
    ];

    public static function find($id)
    {
    }

    public static function of($data)
    {
    }

}
