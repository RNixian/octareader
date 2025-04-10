<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class booksmodel extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'year',
        'category',
        'department',
        'pdf_filepath',
        'coverphoto_imgpath'
    ];

    public static function add_new_books($data)
    {
        return self::create($data);
    }
    

}


