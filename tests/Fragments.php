<?php

namespace Tests;

trait Fragments
{
    /**
     * Function Case: User auth GraphQL fragment.
     * @return array
     */
    public function applicationFragment()
    {
        return [
            'name',
            'url',
        ];
    }

    /**
     * Function Case: User auth GraphQL fragment.
     * @return array
     */
    public function authFragment()
    {
        return [
            'access_token',
            'user' => $this->userFragment()
        ];
    }

    /**
     * Function Case: User GraphQL fragment.
     * @return array
     */
    public function userFragment()
    {
        return [
            'id',
            'name',
            'email',
            'profile' => $this->profileFragment(),
            'votes' => [
                'movie_id'
            ]
        ];
    }

    /**
     * Function Case: Profile GraphQL fragment.
     * @return array
     */
    public function profileFragment()
    {
        return [
            'firstname',
            'lastname'
        ];
    }

    /**
     * Function Case: Message GraphQL fragment.
     * @return array
     */
    public function messageFragment()
    {
        return [
            'status',
            'message'
        ];
    }

    /**
     * Function Case: Movie GraphQL fragment.
     * @return array
     */
    public function movieFragment()
    {
        return [
            'quote',
            'movie',
            'year',
            'image_url',
            'rating',
            'character'
        ];
    }
}