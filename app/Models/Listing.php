<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Listing extends Model
{
    use HasFactory;

    protected $table = 'listings';
    //protected $fillable = ['title','company','location','website','email','description','tags'];
    public function scopeFilter($query,array $filters){
        if($filters['skills'] ?? false){
            $query ->where('skills','like', '%'.request('skills').'%');
        }
        if($filters['search'] ?? false){
            $query ->where('title','like', '%'.request('search').'%')->
            orWhere('description','like', '%'.request('search').'%')->
            orWhere('skills','like', '%'.request('search').'%');
        }
        
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }    
}