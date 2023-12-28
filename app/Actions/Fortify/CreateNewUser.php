<?php

namespace App\Actions\Fortify;

use App\Models\Referral;
use App\Models\Roles;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use PhpParser\Node\Stmt\Else_;

class CreateNewUser implements CreatesNewUsers
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
            'phone' => ['required', 'string', 'max:13'],
            'points' => ['', 'integre'],
            'montant' => ['', 'integre'],
            'payment' => ['', 'string', 'max:20'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();


        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'points' => 0,
                'montant' => 100,
                'payment' => 'Wave',
                'phone' => $input['phone'],
                'isAdmin' => isset($input['isAdmin']) && $input['isAdmin'],



            ]), function (User $user) {
                $this->createTeam($user);

                if ($user->email === 'souleymane9700@gmail.com') {
                    $user->is_admin = true;
                    $superAdminRole = Roles::select('id')->where('name','SuperAdmin')->first();
                    $user->roles()->attach($superAdminRole);
                    $user->update(['isAdmin' => true]);

                }
                // roles
                else {

                    $role = Roles::select('id')->where('name', 'User')->first();
                    $user->roles()->attach($role);
                }




                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Jetstream',
                ]);
            });
        });
    }

    protected function createReferral(User $user): void
    {
        $referralCode = Str::random(6);
        //       // Assurez-vous qu'il n'y a pas de doublons
        while (Referral::where('code', $referralCode)->exists()) {
            $referralCode = Str::random(6);
        }
        Referral::create([
            'user_id' => $user->id,
            'code' => $referralCode,
        ]);
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
