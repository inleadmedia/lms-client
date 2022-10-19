<?php

namespace LMS\Traits;

trait WriteCredsToSession
{

    public function setSessionItem($user, $pin)
    {
        $_SESSION['lmscredentials'] = [
            $user,
            $pin,
        ];
    }

    public function getSessionItem()
    {
        return $_SESSION['lmscredentials'];
    }
}
