<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  17/03/16
 */
namespace App\Ahk\Responses;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponses;

/**
 * Class ApiResponse
 * @codeCoverageIgnore
 */
trait ApiResponse
{
    /**
     * @var int
     */
    protected $statusCode = HttpResponses::HTTP_OK;

    /**
     * @api           {any} /api/non-existent-url 404
     *
     * @apiPermission none
     * @apiVersion    1.0.0
     * @apiName       RequestResource
     * @apiGroup      Exceptions
     * @apiExample {curl} Example usage:
     *      curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET "https://chamb.net/api/non-existent" | json
     *
     * @apiSuccessExample {json} NotFound-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *          "error": {
     *              "message": "Not Found. See https://chamb.net/api/doc",
     *              "status_code": 404
     *          }
     *     }
     */

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = null)
    {
        $message = $message === null ? 'Not Found. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessableEntity($message = null)
    {
        $message = $message === null ? 'Parameters validation failed. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondInvalidCredentials($message = null)
    {
        $message = $message === null ? 'Invalid Credentials. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondTokenExpired($message = null)
    {
        $message = $message === null ? 'Token Expired. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondInvalidToken($message = null)
    {
        $message = $message === null ? 'Invalid Token. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondInternalServerError($message = null)
    {
        $message = $message === null ? 'Internal Server Error. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param LengthAwarePaginator $paginatorData
     * @param           $data
     *
     * @return mixed
     */
    public function respondWithPagination(LengthAwarePaginator $paginatorData, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count'   => $paginatorData->total(),
                'total_pages'   => ceil($paginatorData->total() / $paginatorData->perPage()),
                'current_page'  => $paginatorData->currentPage(),
                'limit'         => $paginatorData->count(),
                'next_page_url' => $paginatorData->nextPageUrl(),
            ],
        ]);

        return $this->respond($data);
    }

    public function respondUnauthenticated($message = null)
    {
        $message = $message === null ? 'Authentication required. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    public function respondUnauthorized($message = null)
    {
        $message = $message === null ? 'Authorization required. See '.route('api.doc') : $message;

        return $this->setStatusCode(HttpResponses::HTTP_FORBIDDEN)->respondWithError($message);
    }
}
