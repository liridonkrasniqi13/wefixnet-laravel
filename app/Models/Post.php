<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define your table name if it's different from the model name
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    // Define your fillable columns
    protected $fillable = [
        'post_id', 'post_category_id', 'post_title', 'post_author', 'post_date', 'post_content',
        'post_resiver', 'post_modem', 'post_rg6', 'post_konektor_rg6', 'post_spliter',
        'post_konektor_tv', 'post_rg11', 'post_t32', 'post_kupler_7402', 'post_amp',
        'tap_26', 'tap_23', 'tap_20', 'tap_17', 'tap_14', 'tap_11', 'tap_10', 'tap_8',
        'tap_4', 'post_comment_count',
    ];
}