      <!-- ADD A POST -->
      <div>
        <a href="?form" type="button" class="btn btn-primary"
          >Add a Post</a
        >
      </div>
      <!-- ADD A POST END -->

      <!-- Blog Post Start -->
      <div class="col-md-12 blog-post row">
        <?php foreach ($posts as $post): ?>
        <div class="post-title">
          <a href="?show=post&id=<?php echo $post['id'];?>"
            ><h1>
            <?php echo $post['title'];?>
            </h1></a
          >
        </div>
        <div class="post-info">
          <span><?php echo $post['created_at'];?></span> | <span><?php echo $post['name'];?></span>
        </div>
        <p>
        <?php echo \Core\Helpers\truncate($post['text']);?>
        </p>
        <a
          href="?show=post&id=<?php echo $post['id'];?>"
          class="
            button button-style button-anim
            fa fa-long-arrow-right
          "
          ><span>Read More</span></a
        >
        <?php endforeach; ?>
      </div>
      <!-- Blog Post End -->

      <?php include_once '../app/views/templates/partials/_nav.php'; ?>