<?php namespace Tailor\Classes;

use Response;

/**
 * Wraps information about a blueprint error to be used on the client side.
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class BlueprintErrorData
{
    /**
     * @var string message The error message
     */
    private $message;

    /**
     * @var int line The error line
     */
    private $line;

    /**
     * @var int pos Position of the error in the line
     */
    private $pos;

    public function __construct($message, $line = null, $pos = null)
    {
        $this->message = $message;
        $this->line = $line;
        $this->pos = $pos;
    }

    public static function fromException($ex)
    {
        return new self($ex->getMessage(), $ex->getLine());
    }

    public function toResponse()
    {
        return Response::json($this->asArray(), 406);
    }

    private function asArray()
    {
        return [
            'blueprintError' => [
                'message' => $this->message,
                'line' => $this->line,
                'pos' => $this->pos
            ]
        ];
    }
}