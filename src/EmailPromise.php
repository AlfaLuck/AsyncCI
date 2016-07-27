<?php
/**
 * Created by Alfaluck <alfaluck@gmail.com>.
 *
 * Date: 27.07.2016
 * Time: 22:11
 */

namespace Alfaluck\AsynCI;

defined('BASEPATH') || exit('No direct script access allowed');

class EmailPromise
{
    const STATUS_IN_PROGRESS = -1;
    const STATUS_FULFILLED = 0;
    const STATUS_REJECTED = 1;

    private $status = self::STATUS_IN_PROGRESS;
    private $error = '';

    public function resolve() : EmailPromise
    {
        $this->status = self::STATUS_FULFILLED;
        return $this;
    }

    public function reject() : EmailPromise
    {
        $this->status = self::STATUS_REJECTED;
        return $this;
    }

    public function set_error(string $message = 'Error sending email') : EmailPromise
    {
        $this->error .= $message;
        return $this;
    }

    public function get_status() : int
    {
        return $this->status;
    }

    public function get_error() : string
    {
        return $this->error;
    }
}