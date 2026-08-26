<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProductionSecurityTest extends TestCase
{
    public function test_production_login_requires_a_configured_password_hash(): void
    {
        config(['production.password_hash' => null]);

        $this->post(route('production.login.submit'), ['password' => 'any-password'])
            ->assertSessionHasErrors('password');
    }

    public function test_production_login_accepts_only_the_configured_password(): void
    {
        config(['production.password_hash' => Hash::make('correct-password')]);

        $this->post(route('production.login.submit'), ['password' => 'correct-password'])
            ->assertRedirect(route('production.blog.index'))
            ->assertSessionHas('production_authenticated', true);
    }

    public function test_public_pages_send_security_headers(): void
    {
        $this->get(route('home'))
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'DENY')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeader('Content-Security-Policy');
    }
}
