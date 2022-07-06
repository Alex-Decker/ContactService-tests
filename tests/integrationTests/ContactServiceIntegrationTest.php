<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;

require __DIR__.'/../../src/ContactService.php';

/**
 * * @covers invalidInputException
 * @covers \ContactService
 *
 * @internal
 */
final class ContactServiceIntegrationTest extends TestCase
{
    private $contactService;

    public function __construct(string $name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->contactService = new ContactService();
    }

    // test de suppression de toute les données, nécessaire pour nettoyer la bdd de tests à la fin
    public function testDeleteAll()
    {
        static::assertTrue($this->contact->deleteAll());
        $data = $this->contact->getAllContacts();

    }


    public function testCreationContact()
    {
        static::assertTrue($this->contact->createContact('testNom', 'testPrenom'));
        $data = $this->contact->getAllContacts();
        // echo "Creation contact :";
        // echo var_dump($data);
        static::assertSame('testNom', $data[0]['nom']);
        static::assertSame('testPrenom', $data[0]['prenom']);
        $this->id = $data[0]['id'];
    }

    public function testSearchContact()
    {
        static::assertTrue($this->contact->searchContact('testNom'));
        $data = $this->contact->getAllContacts();
        // echo "Creation contact :";
        // echo var_dump($data);
        static::assertSame('testNom', $data[0]['nom']);
        static::assertSame('testPrenom', $data[0]['prenom']);
        $this->id = $data[0]['id'];
    }

    public function testModifyContact()
    {
        static::assertTrue($this->contact->createContact('testNom', 'testPrenom'));
        $data = $this->contact->updateContact(1,'toi','moi');
        // echo "Creation contact :";
        // echo var_dump($data);
        static::assertSame('testNom', $data[0]['nom']);
        static::assertSame('testPrenom', $data[0]['prenom']);
        $this->id = $data[0]['id'];
    }

    public function testDeleteContact()
    {
        static::assertTrue($this->contact->deleteContact(5));
        $data = $this->contact->getAllContacts();

    }

}
