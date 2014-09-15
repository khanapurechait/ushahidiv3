<?php

/**
 * Ushahidi Platform Admin Tag Delete Use Case
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Platform
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

namespace Ushahidi\Usecase\Tag;

use Ushahidi\Data;
use Ushahidi\Usecase;
use Ushahidi\Entity\Tag;
use Ushahidi\Tool\Validator;
use Ushahidi\Exception\ValidatorException;
use Ushahidi\Exception\NotFoundException;

class Delete implements Usecase
{
	private $repo;
	private $valid;

	public function __construct(DeleteTagRepository $repo, Validator $valid)
	{
		$this->repo  = $repo;
		$this->valid = $valid;
	}

	public function interact(Data $input)
	{
		if (!$this->valid->check($input)) {
			throw new ValidatorException("Failed to validate tag delete", $this->valid->errors());
		}

		$tag = $this->repo->get($input->id);

		if (!$tag->id) {
			throw new NotFoundException(sprintf(
				'Tag %d does not exist',
				$input->id
			));
		}

		$this->repo->deleteTag($tag->id);

		return $tag;
	}
}
