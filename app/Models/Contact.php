<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{

    use Sortable;

    use HasFactory;
    protected $fillable = ['name','mail','mail_confirmation','title','content'];

    public $sortable = ['created_at'];
}

?>