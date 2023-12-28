<?php

namespace App\Actions\Fortify;

use App\Models\Referral;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewAdmin implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:12'],
            'payment' => ['required', 'string', 'max:20'],
            'points' => ['', 'integre' ],
            'is_admin' => ['required', 'integer'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        // $referralCode = Str::random(6);
        //       // Assurez-vous qu'il n'y a pas de doublons
        //       while (Referral::where('code', $referralCode)->exists()) {
        //         $referralCode = Str::random(6);
        //     }
        //     Referral::create([
        //         'user_id' => $user->id,
        //         'code' => $referralCode,
        //     ]);


        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'points' => 0,
                'payment' => 'Wave',
                'is_admin' => 1,

                'phone' => $input['phone'],
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
