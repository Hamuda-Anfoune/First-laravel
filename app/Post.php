<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*
     * BELOW VALUES MATCH THE DEFAULT
     * THEY ARE NOT MANDATORY
     * ADDED HERE FOR DEMONSTRATION ONLY!
     */

    // Table name, by default, would be the plural of the model name, but can be set as follows:
    protected $table = 'posts';

    // Primary Key, to choose what field becomes primaryKey
    public $primaryKey = 'id';

    // Timestamps,
    public $timestamps = true;
}
