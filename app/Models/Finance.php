<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finance';

    protected $fillable = [
        'hash',
        'budget_category',
        'category',
        'date',
        'time',
        'datetime',
        'username',
        'money',
        'bank',
        'comment',
        'exclusion',
    ];
}
