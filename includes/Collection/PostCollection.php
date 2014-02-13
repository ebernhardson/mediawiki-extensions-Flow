<?php

namespace Flow\Model;

class PostCollection extends LocalCacheAbstractCollection {
	public function getRevisionClass() {
		return 'Flow\\Model\\PostRevision';
	}

	public function getIdColumn() {
		return 'tree_rev_descendant_id';
	}

	protected static function getIdFromRevision( AbstractRevision $revision ) {
		return $revision->getPostId();
	}
}
