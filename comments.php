<?php
if ( post_password_required() ) {
	return;
}

$twenty_twenty_one_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area box<?php echo get_option( 'show_avatars' ) ? ' show-avatars' : ''; ?>">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php if ( '1' === $twenty_twenty_one_comment_count ) : ?>
				<?php esc_html_e( '1 comment', 'twentytwentyone' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $twenty_twenty_one_comment_count, 'Comments title', 'twentytwentyone' ) ),
					esc_html( number_format_i18n( $twenty_twenty_one_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 45,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_pagination(); ?>
	<?php else: ?>
		<p class="no-comments"><?php esc_html_e( '暂无评论' ); ?></p>
	<?php endif; ?>
	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'twentytwentyone' ); ?></p>
	<?php endif; ?>
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
/* ]]> */
</script>
	<?php
	$smilley = '<p>
	<a href="javascript:grin(\':?:\')"><img src="'.includes_url().'/images/smilies/icon_question.gif" alt="" /></a>
	<a href="javascript:grin(\':razz:\')"><img src="'.includes_url().'/images/smilies/icon_razz.gif" alt="" /></a>
	<a href="javascript:grin(\':sad:\')"><img src="'.includes_url().'/images/smilies/icon_sad.gif" alt="" /></a>
	<a href="javascript:grin(\':evil:\')"><img src="'.includes_url().'/images/smilies/icon_evil.gif" alt="" /></a>
	<a href="javascript:grin(\':!:\')"><img src="'.includes_url().'/images/smilies/icon_exclaim.gif" alt="" /></a>
	<a href="javascript:grin(\':smile:\')"><img src="'.includes_url().'/images/smilies/icon_smile.gif" alt="" /></a>
	<a href="javascript:grin(\':oops:\')"><img src="'.includes_url().'/images/smilies/icon_redface.gif" alt="" /></a>
	<a href="javascript:grin(\':grin:\')"><img src="'.includes_url().'/images/smilies/icon_biggrin.gif" alt="" /></a>
	<a href="javascript:grin(\':eek:\')"><img src="'.includes_url().'/images/smilies/icon_surprised.gif" alt="" /></a>
	<a href="javascript:grin(\':shock:\')"><img src="'.includes_url().'/images/smilies/icon_eek.gif" alt="" /></a>
	<a href="javascript:grin(\':???:\')"><img src="'.includes_url().'/images/smilies/icon_confused.gif" alt="" /></a>
	<a href="javascript:grin(\':cool:\')"><img src="'.includes_url().'/images/smilies/icon_cool.gif" alt="" /></a>
	<a href="javascript:grin(\':lol:\')"><img src="'.includes_url().'/images/smilies/icon_lol.gif" alt="" /></a>
	<a href="javascript:grin(\':mad:\')"><img src="'.includes_url().'/images/smilies/icon_mad.gif" alt="" /></a>
	<a href="javascript:grin(\':twisted:\')"><img src="'.includes_url().'/images/smilies/icon_twisted.gif" alt="" /></a>
	<a href="javascript:grin(\':roll:\')"><img src="'.includes_url().'/images/smilies/icon_rolleyes.gif" alt="" /></a>
	<a href="javascript:grin(\':wink:\')"><img src="'.includes_url().'/images/smilies/icon_wink.gif" alt="" /></a>
	<a href="javascript:grin(\':idea:\')"><img src="'.includes_url().'/images/smilies/icon_idea.gif" alt="" /></a>
	<a href="javascript:grin(\':arrow:\')"><img src="'.includes_url().'/images/smilies/icon_arrow.gif" alt="" /></a>
	<a href="javascript:grin(\':neutral:\')"><img src="'.includes_url().'/images/smilies/icon_neutral.gif" alt="" /></a>
	<a href="javascript:grin(\':cry:\')"><img src="'.includes_url().'/images/smilies/icon_cry.gif" alt="" /></a>
	<a href="javascript:grin(\':mrgreen:\')"><img src="'.includes_url().'/images/smilies/icon_mrgreen.gif" alt="" /></a>
		</p>';
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Leave a comment', 'twentytwentyone' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
			'comment_notes_after'=> $smilley
		)
	);
	?>
<script type="text/javascript">      
        document.getElementById("comment").onkeydown = function (moz_ev)
        {
                var ev = null;
                if (window.event){
                        ev = window.event;
                }else{
                        ev = moz_ev;
                }
                if (ev != null && ev.ctrlKey && ev.keyCode == 13)
                {
                        document.getElementById("submit").click();
                }
        }
</script>
</div>