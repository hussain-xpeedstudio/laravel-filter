<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticComments\trait\CommentTrait;

class Comment extends Model
{
    use CommentTrait,HasFactory;
    protected $fillable = [
        'resource', 'resource_id', 'parent_comment_id', 'body', 'type', 'visibility', 'user_id',
    ];

    public function setTable($tableName)
    {
        $this->table = $tableName;
    }

    public function scopeSetDatabase($query)
    {
        $this->table = $query->getQuery()->from;
        return $query;
    }
    public function replies()
    {
        return $this->hasMany(Resource::class, 'parent_comment_id', 'id')
            ->from(config('synthetic-comments.table_prefix').'_'.$this->table)
            ->SetDatabase();
    }

}
