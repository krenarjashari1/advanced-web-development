<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMembership extends Model
{
    use HasFactory;

    private $id;
    private $firstName;
    private $lastName;
    private $birthdate;
    private $expireDate;


    public function __construct($id, $fullName, $birthdate, $expireDate)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->birthdate = $birthdate;
        $this->expireDate = $expireDate;
    }

    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->LastName;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }
    public function getProfilePicture(){
        return $this->profile_picture;
    }
}
