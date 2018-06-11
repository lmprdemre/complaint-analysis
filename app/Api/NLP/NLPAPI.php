<?php
namespace App\Api\NLP;


class NLPAPI
{
    public function getNlpWords($message): APIResponse
    {
        return ( new APIRequest(HTTP::GET, ['index.jsp?mesaj=', $message] ))
            ->call();
    }

    public function doOperation($op_type,$op_headers,$op_uri): APIResponse
    {

        return ( new NLPOperationsRequest(HTTP::POST, ['api/test'] ))
            ->call();
    }
}