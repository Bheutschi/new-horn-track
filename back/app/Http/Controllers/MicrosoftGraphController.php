<?php

namespace App\Http\Controllers;

use Exception;
use Microsoft\Graph\Core\Tasks\PageIterator;
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;

class MicrosoftGraphController extends Controller
{
    /**
     * @throws Exception
     */
    private function authorizationRequest(): GraphServiceClient
    {
        $tokenRequestContext = new ClientCredentialContext(
            config('services.msgraph.tenant'),
            config('services.msgraph.client_id'),
            config('services.msgraph.client_secret'),
        );

        return new GraphServiceClient($tokenRequestContext);
    }

    public function returnAllTenantUsers(): array
    {
        $users = $this->authorizationRequest()->users()->get()->wait();
        $pageIterator = new PageIterator($users, $this->authorizationRequest()->getRequestAdapter());
        $pageIterator->iterate(function ($user) use (&$allUsers) {
            if ($user->getMail()) {
                $allUsers[] = [
                    'name' => $user->getDisplayName(),
                    'email' => $user->getMail(),
                ];

            }

            return true;
        }
        );

        return $allUsers;
    }
}
