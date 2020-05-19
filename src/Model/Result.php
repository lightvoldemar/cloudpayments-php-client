<?php
declare(strict_types=1);

namespace CloudPayments\Model;

use function array_key_exists;

final class Result
{

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var int
     */
    protected $errorCode = 0;

    /**
     * @var bool
     */
    protected $success = false;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param array $response
     * @return Result
     */
    public static function fromArray($response)
    {
        $result = new self();

        if(array_key_exists('Model', $response)) {
            $model = $response['Model'];
            if(array_key_exists('Id', $model)) {
                $result->id = $model['Id'];
            }
            if(array_key_exists('ErrorCode', $model)) {
                $result->errorCode = $model['ErrorCode'];
            }
        }
        if(array_key_exists('Success', $response)) {
            $result->success = $response['Success'];
        }
        if(array_key_exists('Message', $response)) {
            $result->message = $response['Message'];
        }

        return $result;
    }

    /**
     * @return string|null
     */
    public function getId():?string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getErrorCode():int
    {
        return $this->errorCode;
    }

    /**
     * @return bool
     */
    public function isSuccess():bool
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getMessage():string
    {
        return $this->message;
    }

}
