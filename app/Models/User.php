<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'hp',
        'alamat',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }

    public function serviceReports()
    {
        return $this->hasMany(ServiceReport::class, 'technician_id');
    }

    public function rekapTeknisi()
    {
        return $this->hasOne(RekapTeknisi::class, 'technician_id', 'id');
    }

    public function isAdmin(): bool
    {
        return $this->role->name === 'admin';
    }

    public function isTechnician(): bool
    {
        return $this->role->name === 'teknisi';
    }

    public function isCustomer(): bool
    {
        return $this->role->name === 'user';
    }
}
