<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    protected $fillable = [
        'name', 'company', 'email', 'whatsapp',
        'country', 'total_employees', 'budget', 'message',
    ];
}
