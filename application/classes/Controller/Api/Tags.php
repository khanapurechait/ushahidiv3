<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi API Tags Controller
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application\Controllers
 * @copyright  2013 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

class Controller_Api_Tags extends Ushahidi_Rest {

	protected function _scope()
	{
		return 'tags';
	}

	/**
	 * Create A Tag
	 *
	 * POST /api/tags
	 *
	 * @return void
	 */
	public function action_post_index_collection()
	{
		$endpoint = service('endpoint.tags.post.collection');

		$this->_restful($endpoint, $this->_request_payload);
	}

	/**
	 * Retrieve All Tags
	 *
	 * GET /api/tags
	 *
	 * @return void
	 */
	public function action_get_index_collection()
	{
		$endpoint = service('endpoint.tags.get.collection');
		$request = $this->request->query();

		$this->_restful($endpoint, $request);
	}

	/**
	 * Retrieve A Tag
	 *
	 * GET /api/tags/:id
	 *
	 * @return void
	 */
	public function action_get_index()
	{
		$endpoint = service('endpoint.tags.get.index');

		$request = ['id' => $this->request->param('id')];

		$this->_restful($endpoint, $request);
	}

	/**
	 * Update A Tag
	 *
	 * PUT /api/tags/:id
	 *
	 * @return void
	 */
	public function action_put_index()
	{
		$endpoint = service('endpoint.tags.put.index');

		$request = $this->_request_payload;
		$request['id'] = $this->request->param('id');

		$this->_restful($endpoint, $request);
	}

	/**
	 * Delete A Tag
	 *
	 * DELETE /api/tags/:id
	 *
	 * @return void
	 * @todo Authentication
	 */
	public function action_delete_index()
	{
		$endpoint = service('endpoint.tags.delete.index');

		$request = ['id' => $this->request->param('id')];

		$this->_restful($endpoint, $request);
	}
}
