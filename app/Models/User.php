<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phoneNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isDoctor()
    {
        if ($this->Role == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function isNurse()
    {
        if ($this->Role == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function isPatient()
    {
        if ($this->Role == 3) {
            return true;
        } else {
            return false;
        }
    }

    public function PatientFourm()
    {
        if ($this->PatientForum != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Emailverify()
    {
        if ($this->email_verified_at != NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function Emailcheck()
    {
        if ($this->email === "mail@gmail.com") {
            return true;
        } else {
            return false;
        }
    }

    public function patient()
    {
        return $this->hasOne('App\Models\Patient');
    }

    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function illness()
    {
        return $this->hasMany('App\Models\Illness');
    }

    public function patientTurn()
    {
        return $this->hasOne('App\Models\Patientturn');
    }

    public function patientHistory()
    {
        return $this->hasOne('App\Models\PatientHistory');
    }

    public function rumour_medical_history()
    {
        return $this->hasMany('App\Models\Rumour_Medical_History');
    }

    public function analysis_medical_history()
    {
        return $this->hasMany('App\Models\Analysis_Medical_History');
    }
    public function Drug_Medical_History()
    {
        return $this->hasMany('App\Models\Drug_Medical_History');
    }
}
