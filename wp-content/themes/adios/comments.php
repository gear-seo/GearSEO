<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package adios
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
  if ( post_password_required() ) {
    return;
  }
?>

<!-- Comments -->
<section class="coment-item wow zoomIn" data-wow-delay="0.2s">
  <!--<section class="post-comment" id="comments">-->
    <h4 class="h4 title"><?php echo get_comments_number(); ?> <?php esc_html_e('Comments', 'adios'); ?></h4>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
      <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'adios' ); ?></h2>
        <div class="nav-links">

          <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'adios' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'adios' ) ); ?></div>

        </div><!-- .nav-links -->
      </nav><!-- #comment-nav-above -->
    <?php endif; // check for comment navigation ?>

  <!--</section>-->

  <!-- Add Comment -->
  <div class="comment-form clearfix">

    <?php
      $commenter = wp_get_current_commenter();
      $req       = get_option( 'require_name_email' );
      $aria_req  = ( $req ? " aria-required='true'" : '' );

      $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'comment_submit',
        'title_reply'       => esc_html__( 'Leave a Comment' ,'adios'),
        'title_reply_to'    => esc_html__( 'Leave a Comment to %s'  ,'adios'),
        'cancel_reply_link' => esc_html__( 'Cancel Comment'  ,'adios'),
        'label_submit'      => esc_html__( 'Post'  ,'adios'),
        'comment_field'     => '
          <div class="row"><div class="col-md-12"><textarea name="comment" id="text" ' . $aria_req . ' class="form-control form-white placeholder" rows="10" placeholder="Your Comment"  maxlength="400"></textarea></div>
          ',
        'must_log_in'          => '<p class="must-log-in">' .  wp_kses_post(sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ,'adios' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) )) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . wp_kses_post(sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'  ,'adios'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) ). '</p>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'class_submit'         => 'btn btn-dark comment-button btn-rounded hover-effect m-t-20',
        'fields' => apply_filters( 'comment_form_default_fields',
          array(
            'author' => '
                <div class="col-md-4">
                  <!-- Name -->
                  <input type="text" name="author" id="name" ' . $aria_req . ' class="form-control form-white placeholder" placeholder="Name" maxlength="100">
                </div>',

            'email' => '
                <div class="col-md-4">
                  <!-- Email -->
                  <input type="email" name="email" id="email" placeholder="Email" class="form-control form-white placeholder" maxlength="100">
                </div>',

            'url' => '
              <div class="col-md-4">
                <input type="text" name="url" id="website" placeholder="Website" class="form-control form-white m-b-20 placeholder" maxlength="100"></div></div>',
          )
        )
      );
      comment_form($args);
    ?>
    <!-- End Form -->

  </div>
  <!-- End Add Comment -->
  <ul class="comment-list">
    <?php
      wp_list_comments( array(
        'callback'     => 'adios_comment',
        'end-callback' => 'adios_close_comment',
        'style'        => 'ul',
        'short_ping'   => true,
      ) );
    ?>
  </ul>
</section>
<!--end of comments-->
