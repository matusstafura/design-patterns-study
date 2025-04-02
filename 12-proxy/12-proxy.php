<?php

interface Server
{
    public function access();
}

class SomeServer implements Server
{
    public function access()
    {
        return "access granted";
    }
}

class ServerProxy implements Server
{
    public function __construct(
        private SomeServer $someServer,
        private bool $isAdmin
    ) {
    }

    public function access()
    {
        if (!$this->isAdmin) {
            return "access denied";
        }

        return $this->someServer->access();
    }
}

$some = new SomeServer();
$admin = new ServerProxy($some, true);
echo $admin->access();

echo "\n";

$nonAdmin = new ServerProxy($some, false);
echo $nonAdmin->access();

