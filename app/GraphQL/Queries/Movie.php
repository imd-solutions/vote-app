<?php

namespace App\GraphQL\Queries;

use App\Models\Movie as MovieModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Movie
{

    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param mixed[] $args The arguments that were passed into the field.
     * @param \Nuwave\Lighthouse\Support\Contracts\GraphQLContext $context Arbitrary data that is shared between all fields of a single query.
     * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function all($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // Get all the Movies.
        $movies = MovieModel::withTrashed()
            ->orderBy('rating', 'desc')
            ->get();

        return $movies;
    }
}