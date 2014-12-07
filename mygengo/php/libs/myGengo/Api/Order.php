<?php
/**
 * myGengo API Client
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that came
 * with this package in the file LICENSE.txt. It is also available
 * through the world-wide-web at this URL:
 * http://mygengo.com/services/api/dev-docs/mygengo-code-license
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@mygengo.com so we can send you a copy immediately.
 *
 * @category   myGengo
 * @package    API Client Library
 * @copyright  Copyright (c) 2009-2010 myGengo, Inc. (http://mygengo.com)
 * @license    http://mygengo.com/services/api/dev-docs/mygengo-code-license   New BSD License
 */

class myGengo_Api_Order extends myGengo_Api
{
    public function __construct($api_key = null, $private_key = null)
    {
        parent::__construct($api_key, $private_key);
    }

    /**
     * translate/order/{id} (GET)
     *
     * Retrieves a specific order
     *
     * @param int $id The id of the order to retrieve
     * @param string $format The response format, xml or json
     * @param array|string $params If passed should contain all the
     * necessary parameters for the request including the api_key and
     * api_sig
     */
    public function getOrder($id = null, $format = null, $params = null)
    {
	$this->setParams($id, $format, $params);
        $baseurl = $this->config->get('baseurl', null, true);
        $baseurl .= "translate/order/{$id}";
        $this->response = $this->client->get($baseurl, $format, $params);
    }

    /**
     * translate/order/{id} (DELETE)
     *
     * Cancels the order. You can only cancel a order if it has not been
     * started already by a translator.
     *
     * @param int $id The id of the order to cancel
     * @param string $format The response format, xml or json
     * @param array|string $params If passed should contain all the
     * necessary parameters for the request including the api_key and
     * api_sig
     */
    public function cancel($id, $format = null, $params = null)
    {
        $this->setParams($id, $format, $params);
        $baseurl = $this->config->get('baseurl', null, true);
        $baseurl .= "translate/order/{$id}";
        $this->response = $this->client->delete($baseurl, $format, $params);
    }
}
