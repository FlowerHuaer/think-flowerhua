<?php

namespace flowerhua\tools;

class Md5
{
    protected $salt = 'flowerhua';

    public function set($value, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : $this->salt;
        return md5(md5($value) . $salt);
    }

    public function check($value, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
        $salt = isset($options['salt']) ? $options['salt'] : $this->salt;
        return md5(md5($value) . $salt) == $hashedValue;
    }

}