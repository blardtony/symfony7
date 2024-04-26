<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationTest extends WebTestCase
{
    private TranslatorInterface $translator;
    private KernelBrowser $client;
    protected function setUp(): void
    {

        $this->client = static::createClient();
        $this->translator = self::getContainer()->get('translator');
    }

    public function testGoToRegistrationPage(): void
    {
        $this->client->request('GET', '/register');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', $this->translator->trans('title.register'));
    }
}
