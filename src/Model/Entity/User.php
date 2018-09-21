<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;


use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $img
 * @property string $city
 * @property string $description
 * @property string $roles
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'img' => true,
        'city' => true,
        'description' => true,
        'roles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];


    protected function _setPassword($password)
    {
        if(strlen($password)>0)
        {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
