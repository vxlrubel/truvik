<div class="prt-blog-classic-box-comment clearfix">
    <div id="comments" class="comments-area">
        <div class="comment-respond">
            <!-- <h3 class="comment-reply-title">Leave a Reply</h3>
            <p class="comment-notes">Your email address will not be published.</p> -->

            <?php 
                                                                          
            $author        = '<div class="col-lg-4"><p class="comment-form-author"><input id="author" placeholder="Name (required)" name="author" type="text" value="" size="30" aria-required="true" class="truvik-radius"></p></div>';
            $email         = '<div class="col-lg-4"><p class="comment-form-email"><input id="email" placeholder="Email (required)" name="email" type="text" value="" size="30" aria-required="true" class="truvik-radius"></p></div> ';
            $url           = '<div class="col-lg-4"><p class="comment-form-url"><input id="number" placeholder="Phone" name="number" type="text" value="" size="30"></p></div> ';
            $comment_field = '<div class="col-md-12"><p class="comment-cookies"><input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes" class="me-1 truvik-radius"><label for="comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p></div>';
            
            comment_form([
                'fields' => [
                    'author'        => $author,
                    'email'         => $email,
                    'url'           => $url,
                    'comment_field' => $comment_field
                ]
            ]); ?>


            <!-- <form action="#" method="post" id="commentform" class="comment-form">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="comment-form-author">
                            <input id="author" placeholder="Name (required)" name="author" type="text" value="" size="30" aria-required="true" class="truvik-radius">
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p class="comment-form-email">
                            <input id="email" placeholder="Email (required)" name="email" type="text" value="" size="30" aria-required="true" class="truvik-radius">
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p class="comment-form-url">
                            <input id="number" placeholder="Phone" name="number" type="text" value="" size="30">
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <p class="comment-form-comment">
                            <textarea id="comment" placeholder="Comment" name="comment" cols="45" rows="4" aria-required="true" class="truvik-radius"></textarea>
                        </p>
                    </div>                                                        
                    <div class="col-md-12">
                        <p class="comment-cookies">
                            <input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes" class="me-1 truvik-radius">
                            <label for="comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="form-submit">
                            <button class="submit prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-dark" type="submit">Post Comment</button>
                        </p>
                    </div>
                </div>
            </form> -->
        </div>
    </div>
</div>