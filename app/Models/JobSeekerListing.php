<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeekerListing extends Model
{
    //protected $fillable = ['title','location','tags','educations','experience','description','desired_roles'];
    protected $table = 'jobseekerlistings';
    use HasFactory;
    public function scopeFilter($query,array $filters){
        if($filters['tag'] ?? false){
            $query ->where('tags','like', '%'.request('tag').'%');
        }
        if($filters['search'] ?? false){
            $query ->where('title','like', '%'.request('search').'%')->
            orWhere('description','like', '%'.request('search').'%')->
            orWhere('tags','like', '%'.request('search').'%');
        }
        
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }  
}