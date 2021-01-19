<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MailController;

class Alumne extends Model
{

    protected $fillable = [
        'first_name',
        'last_name_1',
        'last_name_2',
        'DNI',
        'date_of_birth',
        'address',
        'location',
        'phone_number',
        'zip_code',
        'study_end',
        'languages',
        'valoracio',
        'cv',
        'avatar',
        'pending_survey',
        'user_id'
    ];

    public function user(){
      return $this->belongsTo('App\User')->first();
    }

    public function studies(){
      return $this->belongsToMany('App\Study')->withTimestamps();
    }

    public function offers(){
      $studies = $this->studies->map(function ($study) {return $study->id; });
      return \App\Offer::whereIn('study_id', $studies);
    }

    public function applications(){
      return $this->belongsToMany('App\Offer');
    }

    public function applyTo($offer_id) {
      $this->applications()->attach(\App\Offer::find($offer_id));
      
    }

    public function removeApplication($offer_id) {
       $this->applications()->detach(\App\Offer::find($offer_id));
    }

    public function hasAppliedTo($offer_id){
      return $this->applications()->get()->contains('id', $offer_id);
    }

    public function getFirstNameAttribute($value){
       return ucfirst($value);
    }
    public function getLastNameAttribute($value){
       return ucfirst($value);
    }

    public function fullName() {
      return "{$this->first_name} {$this->last_name_1} {$this->last_name_2}";
    }

    public function getAvatar(){
      if ($this->avatar) {
        return asset(Storage::url($this->avatar));
      } else {
        return '/images/guest.png';
      }
    }

    public function otherStudies(){
      return $this->hasMany('\App\Other_study');
    }

}
