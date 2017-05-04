<?php 

namespace App\Exceptions;

class TwitterApiException extends ExceptionHandler {
        
    /**
     * The response data.
     * @var null|mixed
     */
    protected $response = null;

    /**
     * The constructor.
     * @param string 	 $message
     * @param mixed|null $response
     */
    public function __construct($message, $response = null) {
        $this->response = $response;
        parent::__construct($message);
        $this->getErrorMessage($message);
    }

    /**
     * Get response.
     * @return mixed
     */
    public function getResponse(Exception $exception) {
        return $this->response;
    }

    /**
     * Get error message.
     * @return string
     */
    public function getErrorMessage(Exception $exception) {
        return $this->response ? $this->response->error : $this->getMessage();
    }
}
