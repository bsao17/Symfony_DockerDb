<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $user->setEmail('test@test.com')
            ->setPassword('testPwd')
            ->setFirstName('enzo')
            ->setLastName('dupont')
            ->setPhoneNumber('555-555-555')
            ->setFacebook('facebookTest')
            ->setInstagram('instagramTest');


        $this->assertTrue($user->getEmail() === 'test@test.com');
        $this->assertTrue($user->getPassword() === 'testPwd');
        $this->assertTrue($user->getFirstName() === 'enzo');
        $this->assertTrue($user->getLastName() === 'dupont');
        $this->assertTrue($user->getPhoneNumber() === '555-555-555');
        $this->assertTrue($user->getFacebook() === 'facebookTest');
        $this->assertTrue($user->getInstagram() === 'instagramTest');
    }

    public function testIsFalse()
    {
        $user = new User();
        $user->setEmail('test@test.com')
            ->setPassword('testPwd')
            ->setFirstName('enzo')
            ->setLastName('dupont')
            ->setPhoneNumber('555-555-555')
            ->setFacebook('facebookTest')
            ->setInstagram('instagramTest');


        $this->assertFalse($user->getEmail() === 'te@test.com');
        $this->assertFalse($user->getPassword() === 'tePwd');
        $this->assertFalse($user->getFirstName() === 'bruno');
        $this->assertFalse($user->getLastName() === 'insteadof');
        $this->assertFalse($user->getPhoneNumber() === '551-551-551');
        $this->assertFalse($user->getFacebook() === 'facebookTestFalse');
        $this->assertFalse($user->getInstagram() === 'instagramTestFalse');
    }

    public function testIsEmpty()
    {
        $user = new User();


        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getLastName());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getFacebook());
        $this->assertEmpty($user->getInstagram());
    }
}
