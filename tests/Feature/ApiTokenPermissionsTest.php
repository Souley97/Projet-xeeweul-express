<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\ApiTokenManager;
use Livewire\Livewire;
use Tests\TestCase;

class ApiTokenPermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_token_permissions_can_be_updated(): void
    {
        // Si les fonctionnalités API ne sont pas activées, marquez le test comme ignoré.
        if (! Features::hasApiFeatures()) {
            $this->markTestSkipped('API support is not enabled.');
            return;
        }

        // Connectez-vous en tant qu'utilisateur avec une équipe personnelle.
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        // Créez un jeton API pour l'utilisateur.
        $token = $user->tokens()->create([
            'name' => 'Test Token',
            'token' => Str::random(40),
            'abilities' => ['create', 'read'],
        ]);

        // Utilisez Livewire pour tester la mise à jour des permissions du jeton API.
        Livewire::test(ApiTokenManager::class)
            ->set(['managingPermissionsFor' => $token])
            ->set(['updateApiTokenForm' => [
                'permissions' => [
                    'delete',
                    'missing-permission',
                ],
            ]])
            ->call('updateApiToken');

        // Vérifiez que les permissions du jeton API ont été mises à jour correctement.
        $this->assertTrue($user->fresh()->tokens->first()->can('delete'));
        $this->assertFalse($user->fresh()->tokens->first()->can('read'));
        $this->assertFalse($user->fresh()->tokens->first()->can('missing-permission'));
    }
}
