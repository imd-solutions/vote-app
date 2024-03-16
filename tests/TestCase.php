<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan("config:clear");
        $this->artisan("passport:install");
        $this->artisan("migrate:refresh");
        $this->artisan("db:seed --class=PassportTableSeeder");

        $this->withExceptionHandling();

    }

    protected function signIn($user = null)
    {
        return Passport::actingAs($user ?: User::factory()->create());
    }

    public function encodeJsonResult($resp)
    {
        $results = json_encode($resp);

        echo $results;
    }

}
