<?php

namespace Flow\Tests;

use Flow\Model\PostRevision;
use Flow\Model\Workflow;
use Flow\Repository\UserNameBatch;
use Flow\Templating;
use Title;
use User;

/**
 * @group Flow
 */
class TemplatingTest extends \MediaWikiTestCase {

	protected function mockTemplating() {
		$query = $this->getMock( 'Flow\Repository\UserName\UserNameQuery' );
		$usernames = new UserNameBatch( $query );
		$urlGenerator = $this->getMockBuilder( 'Flow\UrlGenerator' )
			->disableOriginalConstructor()
			->getMock();
		$output = $this->getMockBuilder( 'OutputPage' )
			->disableOriginalConstructor()
			->getMock();
		$fixer = $this->getMockBuilder( 'Flow\Parsoid\ContentFixer' )
			->disableOriginalConstructor()
			->getMock();
		$permissions = $this->getMockBuilder( 'Flow\RevisionActionPermissions' )
			->disableOriginalConstructor()
			->getMock();

		return new Templating( $usernames, $urlGenerator, $output, $fixer, $permissions );
	}

	/**
	 * There was a bug where all anonymous users got the same
	 * user links output, this checks that they are distinct.
	 */
	public function testNonRepeatingUserLinksForAnonymousUsers() {
		$templating = $this->mockTemplating();

		$user = User::newFromName( '127.0.0.1', false );
		$title = Title::newMainPage();
		$workflow = Workflow::create( 'topic', $title );
		$topicTitle = PostRevision::create( $workflow, $user, 'some content' );

		$hidden = $topicTitle->moderate(
			$user,
			$topicTitle::MODERATED_HIDDEN,
			'hide-topic',
			'hide and go seek'
		);

		$this->assertContains(
			'Special:Contributions/127.0.0.1',
			$templating->getUserLinks( $hidden ),
			'User links should include anonymous contributions'
		);

		$hidden = $topicTitle->moderate(
			User::newFromName( '10.0.0.2', false ),
			$topicTitle::MODERATED_HIDDEN,
			'hide-topic',
			'hide and go seek'
		);
		$this->assertContains(
			'Special:Contributions/10.0.0.2',
			$templating->getUserLinks( $hidden ),
			'An alternate user should have the correct anonymous contributions'
		);
	}
}
