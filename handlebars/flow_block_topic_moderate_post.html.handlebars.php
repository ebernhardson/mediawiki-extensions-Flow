<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false,
            'spvar' => true,
        ),
        'helpers' => Array(            'l10n' => 'Flow\TemplateHelper::l10n',
            'uuidTimestamp' => 'Flow\TemplateHelper::uuidTimestamp',
            'html' => 'Flow\TemplateHelper::html',
            'post' => 'Flow\TemplateHelper::post',
            'moderationAction' => 'Flow\TemplateHelper::moderationAction',
            'moderationActionText' => 'Flow\TemplateHelper::moderationActionText',
),
        'blockhelpers' => Array(            'eachPost' => 'Flow\TemplateHelper::eachPost',
),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return '<div class="flow-board">
	'.LCRun2::ifv(((is_array($in) && isset($in['errors'])) ? $in['errors'] : null), $cx, $in, function($cx, $in) {return '
	<ul>
	'.LCRun2::sec(((is_array($in) && isset($in['errors'])) ? $in['errors'] : null), $cx, $in, true, function($cx, $in) {return '
		<li>'.htmlentities(((is_array($in) && isset($in['message'])) ? $in['message'] : null), ENT_QUOTES, 'UTF-8').'</li>
	';}).'
	</ul>
';}).'

	
	'.LCRun2::bch('eachPost', Array($in,((is_array($in) && isset($in['roots'])) ? $in['roots'] : null)), $cx, $in, function($cx, $in) {return '
		<form method="POST" action="'.LCRun2::ch('moderationAction', Array(((is_array($in) && isset($in['actions'])) ? $in['actions'] : null),((is_array($cx['scopes'][0]['submitted']) && isset($cx['scopes'][0]['submitted']['moderationState'])) ? $cx['scopes'][0]['submitted']['moderationState'] : null)), 'enc', $cx).'">
	<input type="hidden" name="wpEditToken" value="'.htmlentities(((is_array($cx['scopes'][0]) && isset($cx['scopes'][0]['editToken'])) ? $cx['scopes'][0]['editToken'] : null), ENT_QUOTES, 'UTF-8').'" />
	<textarea name="topic_reason">'.LCRun2::ifv(((is_array($cx['scopes'][0]) && isset($cx['scopes'][0]['submitted'])) ? $cx['scopes'][0]['submitted'] : null), $cx, $in, function($cx, $in) {return ''.htmlentities(((is_array($cx['scopes'][0]['submitted']) && isset($cx['scopes'][0]['submitted']['reason'])) ? $cx['scopes'][0]['submitted']['reason'] : null), ENT_QUOTES, 'UTF-8').'';}).'</textarea>
	<div class="flow-form-actions flow-form-collapsible">
		<button data-role="submit" class="flow-ui-button flow-ui-constructive">'.LCRun2::ch('moderationActionText', Array(((is_array($in) && isset($in['actions'])) ? $in['actions'] : null),((is_array($cx['scopes'][0]['submitted']) && isset($cx['scopes'][0]['submitted']['moderationState'])) ? $cx['scopes'][0]['submitted']['moderationState'] : null)), 'enc', $cx).'</button>
		<button data-flow-interactive-handler="createForm" data-role="cancel" class="flow-ui-button flow-ui-destructive flow-ui-quiet">'.LCRun2::ch('l10n', Array('Cancel'), 'enc', $cx).'</button>
	</div>
</form>

		'.LCRun2::wi(((is_array($in) && isset($in['revision'])) ? $in['revision'] : null), $cx, $in, function($cx, $in) {return '
	<div class="flow-post'.LCRun2::ifv(((is_array($in) && isset($in['isModerated'])) ? $in['isModerated'] : null), $cx, $in, function($cx, $in) {return ' flow-post-moderated';}).'">
		'.LCRun2::wi(((is_array($in) && isset($in['author'])) ? $in['author'] : null), $cx, $in, function($cx, $in) {return '
			<span class="flow-author"><a href="'.htmlentities(((is_array($in['links']['contribs']) && isset($in['links']['contribs']['url'])) ? $in['links']['contribs']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['links']['contribs']) && isset($in['links']['contribs']['title'])) ? $in['links']['contribs']['title'] : null), ENT_QUOTES, 'UTF-8').'" class="mw-userlink flow-ui-tooltip-target">'.htmlentities(((is_array($in) && isset($in['name'])) ? $in['name'] : null), ENT_QUOTES, 'UTF-8').'</a> <span class="mw-usertoollinks">(<a href="'.htmlentities(((is_array($in['links']['talk']) && isset($in['links']['talk']['url'])) ? $in['links']['talk']['url'] : null), ENT_QUOTES, 'UTF-8').'" class="new flow-ui-tooltip-target" title="'.htmlentities(((is_array($in['links']['talk']) && isset($in['links']['talk']['title'])) ? $in['links']['talk']['title'] : null), ENT_QUOTES, 'UTF-8').'">'.LCRun2::ch('l10n', Array('Talk'), 'enc', $cx).'</a>'.LCRun2::ifv(((is_array($in['links']) && isset($in['links']['block'])) ? $in['links']['block'] : null), $cx, $in, function($cx, $in) {return ' | <a class="flow-ui-tooltip-target" href="'.htmlentities(((is_array($in['links']['block']) && isset($in['links']['block']['url'])) ? $in['links']['block']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['links']['block']) && isset($in['links']['block']['title'])) ? $in['links']['block']['title'] : null), ENT_QUOTES, 'UTF-8').'">'.LCRun2::ch('l10n', Array('block'), 'enc', $cx).'</a>';}).')</span></span>
		';}).'
		<div class="flow-post-content">
			'.LCRun2::ch('html', Array(((is_array($in) && isset($in['content'])) ? $in['content'] : null)), 'enc', $cx).'
		</div>
		<div class="flow-post-meta">
			<span class="flow-post-meta-actions">
				'.LCRun2::ifv(((is_array($in['actions']) && isset($in['actions']['reply'])) ? $in['actions']['reply'] : null), $cx, $in, function($cx, $in) {return '
					<a href="'.htmlentities(((is_array($in['actions']['reply']) && isset($in['actions']['reply']['url'])) ? $in['actions']['reply']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['actions']['reply']) && isset($in['actions']['reply']['title'])) ? $in['actions']['reply']['title'] : null), ENT_QUOTES, 'UTF-8').'" class="flow-ui-progressive flow-ui-quiet">'.htmlentities(((is_array($in['actions']['reply']) && isset($in['actions']['reply']['title'])) ? $in['actions']['reply']['title'] : null), ENT_QUOTES, 'UTF-8').'</a>
				';}).'
				'.LCRun2::ifv(((is_array($in['actions']) && isset($in['actions']['edit'])) ? $in['actions']['edit'] : null), $cx, $in, function($cx, $in) {return '
					&#8226;
					<a href="'.htmlentities(((is_array($in['actions']['edit']) && isset($in['actions']['edit']['url'])) ? $in['actions']['edit']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['actions']['edit']) && isset($in['actions']['edit']['title'])) ? $in['actions']['edit']['title'] : null), ENT_QUOTES, 'UTF-8').'" class="flow-ui-regressive flow-ui-quiet">'.LCRun2::ch('l10n', Array('Edit'), 'enc', $cx).'</a>
				';}).'
			</span>
			'.LCRun2::ifv(((is_array($in) && isset($in['previousRevisionId'])) ? $in['previousRevisionId'] : null), $cx, $in, function($cx, $in) {return '
				<!--span class="wikicon wikicon-clock"></span--> '.LCRun2::ch('uuidTimestamp', Array(((is_array($in) && isset($in['revisionId'])) ? $in['revisionId'] : null),'edited_ago'), 'enc', $cx).'
				&#8226;
			';}).'
			'.LCRun2::ch('uuidTimestamp', Array(((is_array($in) && isset($in['postId'])) ? $in['postId'] : null),'time_ago'), 'enc', $cx).'
		</div>

		<div class="flow-menu">
			<div class="flow-menu-js-drop"><a href="javascript:void(0);"><span class="wikicon wikicon-ellipsis"></span></a></div>
			<ul class="flow-ui-button-container">
				'.LCRun2::ifv(((is_array($in['actions']) && isset($in['actions']['lock'])) ? $in['actions']['lock'] : null), $cx, $in, function($cx, $in) {return '
					<li><a class="flow-ui-button flow-ui-progressive flow-ui-quiet flow-ui-thin" href="'.htmlentities(((is_array($in['actions']['lock']) && isset($in['actions']['lock']['url'])) ? $in['actions']['lock']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['actions']['lock']) && isset($in['actions']['lock']['title'])) ? $in['actions']['lock']['title'] : null), ENT_QUOTES, 'UTF-8').'"><span class="wikicon wikicon-eye-lock"></span> '.LCRun2::ch('l10n', Array('Lock'), 'enc', $cx).'</a></li>
				';}).'
				'.LCRun2::ifv(((is_array($in['actions']) && isset($in['actions']['hide'])) ? $in['actions']['hide'] : null), $cx, $in, function($cx, $in) {return '
					<li><a class="flow-ui-button flow-ui-quiet flow-ui-thin" href="'.htmlentities(((is_array($in['actions']['hide']) && isset($in['actions']['hide']['url'])) ? $in['actions']['hide']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['actions']['hide']) && isset($in['actions']['hide']['title'])) ? $in['actions']['hide']['title'] : null), ENT_QUOTES, 'UTF-8').'"><span class="wikicon wikicon-eye-lid"></span> '.LCRun2::ch('l10n', Array('Hide'), 'enc', $cx).'</a></li>
				';}).'
				'.LCRun2::ifv(((is_array($in['actions']) && isset($in['actions']['delete'])) ? $in['actions']['delete'] : null), $cx, $in, function($cx, $in) {return '
					<li><a class="flow-ui-button flow-ui-regressive flow-ui-quiet flow-ui-thin" href="'.htmlentities(((is_array($in['actions']['delete']) && isset($in['actions']['delete']['url'])) ? $in['actions']['delete']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['actions']['delete']) && isset($in['actions']['delete']['title'])) ? $in['actions']['delete']['title'] : null), ENT_QUOTES, 'UTF-8').'"><span class="wikicon wikicon-trash-slash"></span> '.LCRun2::ch('l10n', Array('Delete'), 'enc', $cx).'</a></li>
				';}).'
				'.LCRun2::ifv(((is_array($in['actions']) && isset($in['actions']['suppress'])) ? $in['actions']['suppress'] : null), $cx, $in, function($cx, $in) {return '
					<li><a class="flow-ui-button flow-ui-destructive flow-ui-quiet flow-ui-thin" href="'.htmlentities(((is_array($in['actions']['suppress']) && isset($in['actions']['suppress']['url'])) ? $in['actions']['suppress']['url'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlentities(((is_array($in['actions']['suppress']) && isset($in['actions']['suppress']['title'])) ? $in['actions']['suppress']['title'] : null), ENT_QUOTES, 'UTF-8').'"><span class="wikicon wikicon-block-slash"></span> '.LCRun2::ch('l10n', Array('Suppress'), 'enc', $cx).'</a></li>
				';}).'
			</ul>
		</div>

		'.LCRun2::bch('eachPost', Array(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['rootBlock'])) ? $cx['scopes'][count($cx['scopes'])-1]['rootBlock'] : null),((is_array($in) && isset($in['replies'])) ? $in['replies'] : null)), $cx, $in, function($cx, $in) {return '
			<!-- eachPost nested replies -->
			'.LCRun2::ch('post', Array(((is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['rootBlock'])) ? $cx['scopes'][count($cx['scopes'])-2]['rootBlock'] : null),$in), 'enc', $cx).'
		';}).'
	</div>
';}).'

	';}).'
</div>
';
}
?>