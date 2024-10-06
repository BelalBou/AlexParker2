<!-- ADD A POST -->
<div>
  <a href="posts/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
</div>
<!-- ADD A POST END -->

<!-- Blog Post Start -->
<div class="col-md-12 blog-post row">
  <?php foreach ($posts as $post): ?>
  <div class="post-title">
  <a href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>"
                        >
      <h1><?php echo $post['title']; ?></h1>
    </a>
  </div>
  <div class="post-info">
    <span><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span> | <span><?php echo $post['name']; ?></span>
  </div>
  <p>
    <?php echo \Core\Helpers\truncate($post['text']); ?>
  </p>
  <a href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>"
                        >
    <span>Read More</span>
  </a>
  <?php endforeach; ?>
</div>
<!-- Blog Post End -->

<?php include_once '../app/views/templates/partials/_nav.php'; ?>
