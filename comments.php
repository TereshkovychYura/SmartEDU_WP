<div class="blog-comments">
	<h4><?php comments_number(); ?></h4>
	<div id="comment-blog">
    <?php foreach($comments as $comment){?> 
		<ul class="comment-list">
			<li class="comment">
				<div class="avatar"><?php get_avatar($comment, 60, '', '');  ?></div>
				<div class="comment-container">
					<h5 class="comment-author"><a href="#"><?php comment_author();  ?></a></h5>
					<div class="comment-meta">
						<a href="#" class="comment-date link-style1"><?php  comment_date('F j, Y'); ?></a>
						<a class="comment-reply-link link-style3" href="#respond">Reply »</a>
					</div>
					<div class="comment-body">
						<p><?php comment_text();  ?></p>
					</div>
				</div>
			</li>
		</ul>
        <?php }
            the_comments_pagination();
        ?>
	</div>
</div>
<div class="comments-form">
	<h4>Leave a comment</h4>
	<div class="comment-form-main">
    <div class="row">
    <?php
    
        comment_form([
            'comment_field'  =>  '<div class="clear"></div>
    
                <div class="comment-form-wrap pt-5">
                    <label class="mb-5">Comment</label>
                    <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                </div>',
            'fields'  =>  [
                'author'            =>
                '<div class="form-group">
                            <label>' . __('Name', 'udemy') . '</label>
                            <input type="text" name="author" class="form-control" />
                        </div>',
                'email'             =>
                '<div class="form-group">
                            <label>' . __('Email', 'udemy') . '</label>
                            <input type="text" name="email" class="form-control" />
                        </div>',
                'url'               =>
                '<div class="form-group col_last">
                            <label>' . __('Website', 'udemy') . '</label>
                            <input type="text" name="url" class="form-control" />
                        </div>'
            ],
            'class_submit'          =>  'btn btn-primary btn-md text-white',
            'label_submit'          =>  __('Post Comment', 'udemy'),
            'title_reply'           =>  __('Leave a <span>Comment</span>', 'udemy')
        ]);
    
        ?>
        </div>
    </div>
</div>
