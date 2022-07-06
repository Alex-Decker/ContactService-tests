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

require __DIR__ . '/../../src/ContactService.php';

/**
 * * @covers invalidInputException
 * @covers \ContactService
 *
 * @internal
 */
final class ContactServiceUnitTest extends TestCase {
    private $contactService;

    public function __construct(string $name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->contactService = new ContactService();
    }
//Create
    public function testCreationContactWithoutAnyText() {
        try {
            $contactService = new ContactService();
            $contactService->createContact('','');
        }catch (\Exception $exception){
            $this->assertStringContainsString('le nom doit être renseigné',$exception->getMessage());
        }
    }

    public function testCreationContactWithoutPrenom() {
        try {
            $contactService = new ContactService();
            $contactService->createContact('moi','');
        }catch (\Exception $exception){
            $this->assertStringContainsString('le prenom doit être renseigné',$exception->getMessage());
        }
    }

    public function testCreationContactWithoutNom() {
        try {
            $contactService = new ContactService();
            $contactService->createContact('moi','');
        }catch (\Exception $exception){
            $this->assertStringContainsString('le nom doit être renseigné',$exception->getMessage());
        }
    }
    public function testCreationContactWithNomPrenom() {
        try {
            $contactService = new ContactService();
            $contactService->createContact('moi','toi');
        }catch (\Exception $exception){
        }
    }
//search
    public function testSearchContactWithNumber() {
        try {
            $contactService = new ContactService();
            $contactService->searchContact(2);
        }catch (\Exception $exception){
            $this->assertStringContainsString('search doit être une chaine de caractères',$exception->getMessage());
        }
    }
    public function testSearchContactWithoutAnyText() {
        try {
            $contactService = new ContactService();
            $contactService->searchContact();
        }catch (\Exception $exception){
            $this->assertStringContainsString('search doit être renseigné',$exception->getMessage());
        }
    }
    public function testSearchContactWithText() {
        try {
            $contactService = new ContactService();
            $contactService->searchContact('toi');
        }catch (\Exception $exception){
        }
    }
//modify
    public function testModifyContactWithId() {
        try {
            $contactService = new ContactService();
            $contactService->updateContact(1,'moi','toi');
        }catch (\Exception $exception){
        }
    }
    public function testModifyContactWithoutId() {
        try {
            $contactService = new ContactService();
            $contactService->updateContact('','moi','toi');
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être renseigné",$exception->getMessage());
        }
    }
    public function testModifyContactWithoutPrenom() {
        try {
            $contactService = new ContactService();
            $contactService->updateContact('','moi','');
        }catch (\Exception $exception){
            $this->assertStringContainsString("le prenom doit être renseigné",$exception->getMessage());
        }
    }
    public function testModifyContactWithoutNom() {
        try {
            $contactService = new ContactService();
            $contactService->updateContact(1,'','toi');
        }catch (\Exception $exception){
            $this->assertStringContainsString("le nom doit être renseigné",$exception->getMessage());
        }
    }
    public function testModifyContactWithInvalidId() {
        try {
            $contactService = new ContactService();
            $contactService->updateContact(-5,'moi','toi');
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être un entier non nul",$exception->getMessage());
        }
    }
//Delete
    public function testDeleteContactWithTextAsId() {
        try {
            $contactService = new ContactService();
            $contactService->deleteContact('UN');
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être renseigné",$exception->getMessage());
        }
    }
    public function testDeleteContactEmptyId() {
        try {
            $contactService = new ContactService();
            $contactService->deleteContact();
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être un entier non nul",$exception->getMessage());
        }
    }
    public function testDeleteContactIdNegatif() {
        try {
            $contactService = new ContactService();
            $contactService->deleteContact(-8);
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être un entier non nul",$exception->getMessage());
        }
    }
    public function testDeleteContactWithvalidId() {
        try {
            $contactService = new ContactService();
            $contactService->deleteContact(8);
        }catch (\Exception $exception){
        }
    }
    public function testDeleteAllContact() {
        try {
            $contactService = new ContactService();
            $contactService->deleteAllContact();
        }catch (\Exception $exception){
        }
    }
//get
    public function testGetContactWithvalidId() {
        try {
            $contactService = new ContactService();
            $contactService->getContact("A");
        }catch (\Exception $exception){
        }
    }
    public function testGetContactWithTextAsId() {
        try {
            $contactService = new ContactService();
            $contactService->getContact("A");
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être un entier non nul",$exception->getMessage());
        }
    }
    public function testGetContactWithInvalidId() {
        try {
            $contactService = new ContactService();
            $contactService->getContact(null);
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être un entier non nul",$exception->getMessage());
        }
    }
    public function testGetContactWithEmptyId() {
        try {
            $contactService = new ContactService();
            $contactService->getContact();
        }catch (\Exception $exception){
            $this->assertStringContainsString("l'id doit être renseigné",$exception->getMessage());
        }
    }
    public function testGetAllContact() {
        try {
            $contactService = new ContactService();
            $contactService->getAllContact();
        }catch (\Exception $exception){

        }
    }
}
