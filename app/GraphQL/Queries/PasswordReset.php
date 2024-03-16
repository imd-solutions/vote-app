<?php

namespace App\GraphQL\Queries;

use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class PasswordReset
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
    public function valid($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $token = DB::table('password_resets')->where('email', $args['input']['email'])->first();

        if (!Hash::check($args['input']['token'], $token->token)) {
            return [
                'status' => 400,
                'title' => 'Error',
                'css' => 'is-danger',
                'message' => 'That token is not valid.'
            ];
        }

        $expire = $token->created_at > Carbon::now()->subHours(2);

        if (!$expire) {
            return [
                'status' => 400,
                'title' => 'Warning',
                'css' => 'is-warning',
                'message' => 'That token has expired. Please re-try the password reset request.'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Token valid.'
        ];

    }
}