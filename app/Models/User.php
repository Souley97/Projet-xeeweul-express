<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Vinkla\Hashids\Facades\Hashids;
use Cviebrock\EloquentSluggable\Sluggable;



class User extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'points','montant', 'referral_code', 'referrer_id','phone', 'address','payment' ,'is_admin' ,'is_active',
    ];
    public static function paymentOptions()
    {
        return [
            'Wave' => 'Wave',
            'Orange_Money' => 'Orange_Money',
        ];
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    //pour Authrisation Des page par SuperAdmin et Admin

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getSlugOptions(): array
    {
        return [
            'source' => 'name',
        ];
    }



    public function favoriteVideos()
    {
        return $this->belongsToMany(Video::class, 'user_favorite_videos', 'user_id', 'video_id')->withTimestamps();
    }
    //pour Authrisation Des page par SuperAdmin , Admdin

    public function hasAnyRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }
    //pour Authrisation Des page par SuperAdmin , Admdin , User
    public function hasAllRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }
    //pour Authrisation Des page par  Admdin

    public function hasAdminRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }    //pour Authrisation Des page par SuperAdmin

    public function hasSuperAdminRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }
    //pour Authrisation Des page par User
    public function isUser($role){
       return $this->roles()->whereIn('name',$role)->first();
    }
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
    // Fin Roles

    use HasTeams;

    // ...
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function toggleLike(Video $video)
    {
        if ($this->likes()->where('video_id', $video->id)->exists()) {
            $this->likes()->where('video_id', $video->id)->delete(); // Retirer le like
        } else {
            $this->likes()->create(['video_id' => $video->id]); // Ajouter le like
        }
    }
    public function invitedMembersCount()
    {
        // Récupérer les équipes de l'utilisateur
        $teams = $this->allTeams();

        // Initialiser un tableau pour stocker le nombre de membres invités par équipe
        $invitedMembersCounts = [];

        // Parcourir chaque équipe
        foreach ($teams as $team) {
            // Compter le nombre de membres invités pour chaque équipe
            $invitedMembersCount = $team->teamInvitations()->count();

            // Ajouter le résultat au tableau
            $invitedMembersCounts[$team->id] = $invitedMembersCount;
        }

        return $invitedMembersCounts;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_user');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    /**
     * Vérifier si l'utilisateur est abonné à un plan spécifique.
     *
     * @param int $planId L'ID du plan d'abonnement.
     * @return bool
     */
    public function subscribedToPlan($planId)
    {
        return $this->subscriptions()->where('subscription_plan_id', $planId)->exists();
    }

    /**
     * Relation avec les abonnements de l'utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscriptions::class);
    }

}


