<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: user.proto

namespace User\Service\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>user.service.v1.User</code>
 */
class User extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string first_name = 1 [json_name = "firstName"];</code>
     */
    protected $first_name = '';
    /**
     * Generated from protobuf field <code>string last_name = 2 [json_name = "lastName"];</code>
     */
    protected $last_name = '';
    /**
     * Generated from protobuf field <code>string email_address = 3 [json_name = "emailAddress"];</code>
     */
    protected $email_address = '';
    /**
     * Generated from protobuf field <code>.google.type.PostalAddress postal_address = 4 [json_name = "postalAddress"];</code>
     */
    protected $postal_address = null;
    /**
     * Generated from protobuf field <code>.google.type.PhoneNumber phone_number = 5 [json_name = "phoneNumber"];</code>
     */
    protected $phone_number = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp created_at = 6 [json_name = "createdAt"];</code>
     */
    protected $created_at = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp updated_at = 7 [json_name = "updatedAt"];</code>
     */
    protected $updated_at = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $first_name
     *     @type string $last_name
     *     @type string $email_address
     *     @type \Google\Type\PostalAddress $postal_address
     *     @type \Google\Type\PhoneNumber $phone_number
     *     @type \Google\Protobuf\Timestamp $created_at
     *     @type \Google\Protobuf\Timestamp $updated_at
     * }
     */
    public function __construct($data = NULL) {
        \User\Service\V1\Metadata\User::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string first_name = 1 [json_name = "firstName"];</code>
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Generated from protobuf field <code>string first_name = 1 [json_name = "firstName"];</code>
     * @param string $var
     * @return $this
     */
    public function setFirstName($var)
    {
        GPBUtil::checkString($var, True);
        $this->first_name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string last_name = 2 [json_name = "lastName"];</code>
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Generated from protobuf field <code>string last_name = 2 [json_name = "lastName"];</code>
     * @param string $var
     * @return $this
     */
    public function setLastName($var)
    {
        GPBUtil::checkString($var, True);
        $this->last_name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string email_address = 3 [json_name = "emailAddress"];</code>
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Generated from protobuf field <code>string email_address = 3 [json_name = "emailAddress"];</code>
     * @param string $var
     * @return $this
     */
    public function setEmailAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->email_address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.type.PostalAddress postal_address = 4 [json_name = "postalAddress"];</code>
     * @return \Google\Type\PostalAddress|null
     */
    public function getPostalAddress()
    {
        return $this->postal_address;
    }

    public function hasPostalAddress()
    {
        return isset($this->postal_address);
    }

    public function clearPostalAddress()
    {
        unset($this->postal_address);
    }

    /**
     * Generated from protobuf field <code>.google.type.PostalAddress postal_address = 4 [json_name = "postalAddress"];</code>
     * @param \Google\Type\PostalAddress $var
     * @return $this
     */
    public function setPostalAddress($var)
    {
        GPBUtil::checkMessage($var, \Google\Type\PostalAddress::class);
        $this->postal_address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.type.PhoneNumber phone_number = 5 [json_name = "phoneNumber"];</code>
     * @return \Google\Type\PhoneNumber|null
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function hasPhoneNumber()
    {
        return isset($this->phone_number);
    }

    public function clearPhoneNumber()
    {
        unset($this->phone_number);
    }

    /**
     * Generated from protobuf field <code>.google.type.PhoneNumber phone_number = 5 [json_name = "phoneNumber"];</code>
     * @param \Google\Type\PhoneNumber $var
     * @return $this
     */
    public function setPhoneNumber($var)
    {
        GPBUtil::checkMessage($var, \Google\Type\PhoneNumber::class);
        $this->phone_number = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp created_at = 6 [json_name = "createdAt"];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function hasCreatedAt()
    {
        return isset($this->created_at);
    }

    public function clearCreatedAt()
    {
        unset($this->created_at);
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp created_at = 6 [json_name = "createdAt"];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreatedAt($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->created_at = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp updated_at = 7 [json_name = "updatedAt"];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function hasUpdatedAt()
    {
        return isset($this->updated_at);
    }

    public function clearUpdatedAt()
    {
        unset($this->updated_at);
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp updated_at = 7 [json_name = "updatedAt"];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdatedAt($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->updated_at = $var;

        return $this;
    }

}

