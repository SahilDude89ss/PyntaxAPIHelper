<?php
namespace Pyntax\Api;

use Pyntax\Api\Response\JsonRestApiResponse;
use Pyntax\DAO\Bean\BeanInterface;
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

    /**
     * @var array|mixed
     */
    protected $_config = [];

    /**
     * RestApiAbstract constructor.
     * @param $modelName
     * @param string $returnType
     */
    public function __construct($modelName, $returnType = 'json')
    {
        $this->_config = \Pyntax\Config\Config::read('rest_config');

        $this->setModelName($modelName);

        if (isset($this->_config['api_return_type'])) {
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

        if (!is_null($this->getBean())) {
            if (isset($searchResults['id'])) {
                $searchResults = $this->getBean()->find($searchParameters['id'], true);
            } else if (isset($searchParameters['searchParams'])) {
                $searchResults = $this->getBean()->find($searchParameters['searchParams'], true);
            } else {
                $searchResults = $this->getBean()->find([], true);
            }
        }

        $this->_result_rendered->render($this->_result_rendered->render($searchResults));
    }

    /**
     * This functionsaves
     *
     * @param array $params
     * @return mixed
     */
    public function postResource(array $params)
    {
        $dataInPost = json_decode(file_get_contents('php://input'), true);
        foreach ($dataInPost as $_column => $_value) {
            $this->_bean->{$_column} = $_value;
        }

        $newId = $this->getBean()->save();
        $this->setModelName($this->getModelName());

        $this->_result_rendered->render($this->getBean()->find($newId, true));
    }

    public function putResource($id, array $data)
    {
        // TODO: Implement putResource() method.
    }

    public function deleteResource($id, array $data = array())
    {
        // TODO: Implement deleteResource() method.
    }

    /**
     * @return BeanInterface
     */
    public function getBean()
    {
        return $this->_bean;
    }

    /**
     * @return null|string
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * @param null|string $modelName
     */
    public function setModelName($modelName)
    {
        $this->modelName = $modelName;
        $this->_bean = Pyntax::getBean($this->getModelName());
    }
}