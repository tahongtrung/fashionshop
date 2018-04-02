<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

	protected $fillable = ['size_ten'];

	public $timestamps = false;
}