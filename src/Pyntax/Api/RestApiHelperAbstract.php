<?php
namespace Pyntax\Api;

use Pyntax\Api\Response\JsonRestApiResponse;
use Pyntax\Pyntax;

/**
 * Class RestApiAbstract
 * @package Pyntax\Api
 */
abstract class RestApiHelperAbstract implements RestApiHelperInterface
{
    /**
     * @var string|null
     */
    protected $modelName = null;

    /**
     * @var null
     */
    protected $_bean = null;

    /**
     * @var null
     */
    protected $_result_rendered = null;

    protected $_config = [];

    /**
     * RestApiAbstract constructor.
     * @param $modelName
     * @param string $returnType
     */
    public function __construct($modelName, $returnType = 'json')
    {
        $this->_config = \Pyntax\Config\Config::read('rest_config');

        $this->modelName = $modelName;
        $this->_bean = Pyntax::getBean($modelName);

        if(isset($this->_config['api_return_type'])) {
            $this->_result_rendered = new $this->_config['api_return_type'];
        } else {
            $this->_result_rendered = new JsonRestApiResponse();
        }
    }

    /**
     * @param array $searchParameters
     * @return string
     */
    public function getResource($searchParameters = array())
    {
        $searchResults = [];

        if (!is_null($this->_bean))
        {
            if(isset($searchResults['id'])) {
                $searchResults = $this->_bean->find($searchParameters['id'], true);
            } else if (isset($searchParameters['columns'])) {
                $searchResults = $this->_bean->find($searchParameters['columns'], true);
            } else {
                $searchResults = $this->_bean->find([], true);
            }
        }

        return $this->_result_rendered->render($searchResults);
    }

    public function postResource(array $data)
    {
        // TODO: Implement postResource() method.
    }

    public function putResource($id, array $data)
    {
        // TODO: Implement putResource() method.
    }

    public function deleteResource($id, array $data = array())
    {
        // TODO: Implement deleteResource() method.
    }


}