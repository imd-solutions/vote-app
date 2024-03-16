<?php

namespace Tests\Unit\Model;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class VoteTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->signIn();

        $this->assertCount(1, $this->user::all());

    }

    /**
     * Test Case: The vote database has the columns.
     * @test
     * @group modelVote
     * @return void
     */
    public function voteHasColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('votes', ['id', 'user_id', 'movie_id', 'ip_address', 'location']), 1
        );
    }

    /**
     * Test Case: User has a vote in movie database.
     * @test
     * @group modelVote
     * @return void
     */
    public function userHasOneVote()
    {
        $this->user->votes()->create([
            'movie_id' => 1,
            'ip_address' => $this->faker->localIpv4(),
            'location' => $this->faker->countryCode(),
        ]);

        $this->assertEquals($this->user->votes[0]->movie_id, 1);
    }
}