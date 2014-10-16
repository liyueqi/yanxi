<?php
/*
  *Bing - function - comment
  *Form:www.bgbk.org
  *一般主题用户不需要修改
*/

//评论回复
function Bing_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    global $commentcount,$wpdb, $post;
    if(!$commentcount) {
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
        $cnt = count($comments);
        $page = get_query_var('cpage');
        $cpp=get_option('comments_per_page');
        if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))){
            $commentcount = $cnt + 1;
        } else {
            $commentcount = $cpp * $page + 1;
        }
    }
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php $add_below = 'div-comment'; ?>
        <div class="comment-author vcard">
            <?php echo get_avatar( $comment->comment_author_email , 56 ); ?>
            <strong class="author"><?php comment_author_link();edit_comment_link('[编辑]','',''); ?>：</strong>
            <span class="datetime"><?php comment_date('Y-m-d') ?> <?php comment_time(); ?></span>
            <?php if ( $comment->comment_approved != '0' ) : ?><span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '@Ta', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span><?php endif; ?>
            <div class="floor"><?php if(!$parent_id = $comment->comment_parent) printf('#%1$s', --$commentcount); ?></div>
        </div>
        <?php comment_text(); ?>
        <?php if ( $comment->comment_approved == '0' ) : ?>
            <span style="color:#C00;font-style:inherit"><?php _e('您的评论正在等待审核中...'); ?></span>
        <?php endif; ?>
    </div>
<?php
}
function Bing_end_comment() {
    echo '</li>';
}

//本页设置结束
?>