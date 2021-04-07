<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMembership extends Model
{
    use HasFactory;



    public function getFirstName(){
        return $this->first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }
    public function getExpireDate(){
        return $this->expireDate;
    }
    public function getProfilePicture(){
        return $this->profile_picture;
    }
}
