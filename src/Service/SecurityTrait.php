<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Hide;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

trait SecurityTrait
{
    /**
     * Throws an exception unless the attributes are granted against the current authentication token and optionally
     * supplied subject.
     *
     * @param mixed  $attributes
     * @param mixed  $subject
     * @param string $message
     *
     * @throws AccessDeniedException
     */
    final protected function denyAccessUnlessGranted($attributes, $subject = null, string $message = 'Access Denied.')
    {
        if (!$this->getAuthorizationChecker()->isGranted($attributes, $subject)) {
            $exception = new AccessDeniedException($message);
            $exception->setAttributes($attributes);
            $exception->setSubject($subject);

            throw $exception;
        }
    }

    /**
     * @return AuthorizationCheckerInterface
     */
    protected function getAuthorizationChecker(): AuthorizationCheckerInterface
    {
        return $this->authorizationChecker;
    }
}