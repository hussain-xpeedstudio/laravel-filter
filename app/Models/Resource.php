<?php

namespace SyntheticComments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $model;
    protected $commentTable;
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
