<?php

namespace PaoloDavila\TodosBackend\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use PaoloDavila\TodosBackend\Events\GcmTokenCreated;

/**
 * Class GcmTokensController
 *
 * @package PaoloDavila\TodosBackend\Http\Controllers
 */
class GcmTokensController extends TodosBaseController
{
    /**
     * Add gcm token to user.
     */
    public function addToken(Request $request)
    {
        $user = Auth::user();
        $token = $user->gcmTokens()->firstOrCreate([
            'registration_id' => $request->input('registration_id')
        ]);

        //Broadcast
        broadcast(new GcmTokenCreated($user, $token))->toOthers();
        return ['status' => 'Token saved!'];
    }
}
