<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = ['document_no', 'document_subject', 'nama_nasabah', 'status'];

    public function details()
    {
        return $this->hasMany('App\Detail');
    }
}
