<?php //主にモバイル用に表情は早くするためのアイコンボタン ?>
<?php if ( is_all_sns_share_btns_visible() ):
$viral_class = is_share_button_type_mobile_viral() ? ' sns-group-viral' : ''; ?>
<div class="sns-buttons sns-buttons-icon<?php echo $viral_class; ?>">
  <?php if ( get_share_message_label() ): //シェアボタン用のメッセージを取得?>
  <p class="sns-share-msg"><?php echo esc_html( get_share_message_label() ) ?></p>
  <?php endif; ?>
  <ul class="snsb clearfix snsbs">
    <?php if ( is_twitter_btn_visible() )://Twitterボタンを表示するか ?>
  	<li class="twitter-btn-icon"><a href="//twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>&amp;url=<?php echo urlencode( punycode_encode( get_permalink() ) ) ?><?php echo get_twitter_via_param(); //ツイートにメンションを含める ?><?php echo get_twitter_related_param();//ツイート後にフォローを促す ?>" class="btn-icon-link twitter-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-twitter"></span><span class="social-count twitter-count"><?php
              //count.jsoonでシェア数を表示
              if ( is_twitter_count_visible() ) {
                if ( scc_twitter_exists() ) {//SNS Count Cache関数があるか
                  echo scc_get_share_twitter();
                } else {
                  //カウント数取得待ち表示用のスピナー
                  echo '<span class="fa fa-spinner fa-pulse"></span>';
                }
              }
         ?></span></a></li>
    <?php endif; ?>
    <?php if ( is_facebook_btn_visible() )://Facebookボタンを表示するか ?>
  	<li class="facebook-btn-icon"><a href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;t=<?php echo urlencode( get_the_title() ); ?>" class="btn-icon-link facebook-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-facebook"></span><span class="social-count facebook-count"><?php
              if ( scc_facebook_exists() ) {//SNS Count Cache関数があるか
                echo scc_get_share_facebook();
              } else {
                //カウント数取得待ち表示用のスピナー
                echo '<span class="fa fa-spinner fa-pulse"></span>';
              }
             ?></span></a></li>
    <?php endif; ?>
    <?php if ( is_google_plus_btn_visible() )://Google＋ボタンを表示するか ?>
  	<li class="google-plus-btn-icon"><a href="//plus.google.com/share?url=<?php echo rawurlencode(get_permalink($post->ID)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn-icon-link google-plus-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-googleplus"></span><span class="social-count googleplus-count"><?php
              if ( scc_gplus_exists() ) {//SNS Count Cache関数があるか
                echo scc_get_share_gplus();
              } else {
                //カウント数取得待ち表示用のスピナー
                echo '<span class="fa fa-spinner fa-pulse"></span>';
              }
             ?></span></a></li>
    <?php endif; ?>
    <?php if ( is_hatena_btn_visible() )://はてなボタンを表示するか ?>
    <li class="hatena-btn-icon"><a href="//b.hatena.ne.jp/entry/<?php echo get_encoded_url(get_permalink()) ?>" class="btn-icon-link hatena-bookmark-button hatena-btn-icon-link" data-hatena-bookmark-layout="simple" title="<?php the_title(); ?>" rel="nofollow"><span class="social-icon icon-hatena"></span><span class="social-count hatebu-count"><?php
              if ( scc_hatebu_exists() ) {//SNS Count Cache関数があるか
                echo scc_get_share_hatebu();
              } else {
                //カウント数取得待ち表示用のスピナー
                echo '<span class="fa fa-spinner fa-pulse"></span>';
              }
             ?></span></a></li>
  	<!-- <li class="hatena-btn-icon"><a href="//b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo get_encoded_url(get_permalink()) ?>&amp;title=<?php echo get_encoded_title( trim(wp_title( '', false)) ); ?>" class="btn-icon-link hatena-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-hatena"></span><span class="social-count hatebu-count"><span class="fa fa-spinner fa-pulse"></span></span></a></li> -->
    <?php endif; ?>
    <?php if ( is_pocket_btn_visible() )://pocketボタンを表示するか ?>
  	<li class="pocket-btn-icon"><a href="//getpocket.com/edit?url=<?php the_permalink() ?>" class="btn-icon-link pocket-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-pocket"></span><span class="social-count pocket-count"><?php
              if ( scc_pocket_exists() ) {//SNS Count Cache関数があるか
                echo scc_get_share_pocket();
              } else {
                //カウント数取得待ち表示用のスピナー
                echo '<span class="fa fa-spinner fa-pulse"></span>';
              }
             ?></span></a></li>
    <?php endif; ?>
    <?php if ( is_line_btn_visible() )://LINEボタンを表示するか ?>
      <?php if (is_mobile()): //モバイルの時のみ表示?>
    	<li class="line-btn-icon"><a href="//line.me/R/msg/text/?<?php echo strip_tags( get_the_title() ); ?>%0D%0A<?php the_permalink(); ?>" class="btn-icon-link line-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-line"></span></a></li>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ( is_evernote_btn_visible() )://Evernoteボタンを表示するか ?>
    <li class="evernote-btn-icon">
    <a href="#" onclick="Evernote.doClip({url:'<?php the_permalink();?>',
    providerName:'<?php bloginfo('name'); ?>',
    title:'<?php the_title();?>',
    contentId:'the-content',
    }); return false;" class="btn-icon-link evernote-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-evernote"></span></a></li>
    <?php endif; ?>
    <?php if ( is_feedly_btn_visible() )://feedlyボタンを表示するか ?>
    <li class="feedly-btn-icon">
    <a href="//feedly.com/index.html#subscription%2Ffeed%2F<?php urlencode(bloginfo('rss2_url')); ?>" class="btn-icon-link feedly-btn-icon-link" target="blank" rel="nofollow"><span class="social-icon icon-feedly"></span><span class="social-count feedly-count"><?php
              if ( scc_feedly_exists() ) {//SNS Count Cache関数があるか
                echo scc_get_follow_feedly();
              } else {
                //カウント数取得待ち表示用のスピナー
                echo '<span class="fa fa-spinner fa-pulse"></span>';
              }
             ?></span></a></li>
    <?php endif; //is_feedly_btn_visible?>
    <?php if ( is_comments_btn_visible() && is_single() )://コメント数ボタンを表示するか ?>
    <li class="comments-btn-icon">
    <a href="#reply-title" class="btn-icon-link comments-btn-icon-link" rel="nofollow"><span class="social-icon fa fa-comment"></span><span class="social-count comments-count"><?php echo get_comments_number(); ?></span></a></li>
    <?php endif; //is_comments_visible?>
  </ul>
</div>
<?php endif; ?>