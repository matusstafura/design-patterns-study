<?php

/* 
 * The Abstract Factory pattern provides an 
 * interface for creating families of related or 
 * dependent objects without specifying their concrete classes. 
*/
interface ComputerFactory
{
    public function createOS(): OSTemplate;
    public function createSetup(): SetupTemplate;
}

class LinuxFactory implements ComputerFactory
{
    public function createOS(): OSTemplate
    {
        return new LinuxOS();
    }

    public function createSetup(): SetupTemplate
    {
        return new LinuxSetup();
    }
}

class MacbookFactory implements ComputerFactory
{
    public function createOS(): OSTemplate
    {
        return new MacOS();
    }

    public function createSetup(): SetupTemplate
    {
        return new MacSetup();
    }
}

interface OSTemplate
{
    public function install();
}

class LinuxOS implements OSTemplate
{
    public function install()
    {
        return "installing linux\n";
    }
}

class MacOS implements OSTemplate
{
    public function install()
    {
        return "installing mac os\n";
    }
}

interface SetupTemplate
{
    public function build();
}

class LinuxSetup implements SetupTemplate
{
    public function build()
    {
        return "building desktop\n";
    }
}

class MacSetup implements SetupTemplate
{
    public function build()
    {
        return "building notebook\n";
    }
}

function clientCode(ComputerFactory $f)
{
    $os = $f->createOS();
    $setup = $f->createSetup();
    echo $os->install();
    echo $setup->build();
}

clientCode(new LinuxFactory());
clientCode(new MacbookFactory());

