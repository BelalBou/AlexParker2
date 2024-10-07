
<!-- Preloader Start -->
<div class="preloader">
  <div class="rounder"></div>
</div>
<!-- Blog Post (Right Sidebar) Start -->
<div class="row">
  <div class="sub-title">
    <a href="index.html" title="Go to Home Page">
      <h2>Back Home</h2>
    </a>
    <a href="#comment" class="smoth-scroll">
      <i class="icon-bubbles"></i>
    </a>
  </div>

  <div class="col-md-12 content-page">
    <div class="col-md-12 blog-post">
      <!-- Post Headline Start -->
      <div class="post-title">
        <h1>Post Form</h1>
      </div>
      <!-- Post Headline End -->

      <!-- Form Start -->
      <form action="posts/add/insert.html" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title</label>
          <input
            type="text"
            name="title"
            id="title"
            class="form-control"
            placeholder="Enter your title here"
          />
        </div>
        <div class="form-group">
          <label for="text">Text</label>
          <textarea
            id="text"
            name="text"
            class="form-control"
            rows="5"
            placeholder="Enter your text here"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Image</label>
          <input
            type="file"
            class="form-control-file btn btn-primary"
            id="exampleFormControlFile1"
            name="image" 
          />
        </div>
        <div class="form-group">
          <label for="quote">Quote</label>
          <textarea
            id="quote"
            name="quote"
            class="form-control"
            rows="5"
            placeholder="Enter your quote here"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select id="category" name="category_id" class="form-control">
            <option disabled selected>Select your category</option>
        <?php include_once "../app/models/categoriesModel.php";
        $categories = \App\Models\CategoriesModel\findAll($connexion);
        foreach($categories AS $category) :?>
        <option value="<?php echo $category['id']; ?>"  ><?php echo $category['name'];?></option>
        <?php endforeach ?>
          </select>
        </div>
        <div>
          <input class="btn btn-primary" type="submit" value="submit" />
          <input class="btn btn-secondary" type="reset" value="reset" />
        </div>
      </form>
      <!-- Form End -->
    </div>
    <!-- Blog Post End -->
  </div>
  <!-- Content Page End -->
</div>
<!-- Row End -->









<!-- Endpage Box (Popup When Scroll Down) Start -->
<div id="scroll-down-popup" class="endpage-box">
  <h4>Read Also</h4>
  <a href="#"
    >How to make your company website based on bootstrap framework...</a
  >
</div>
<!-- Endpage Box (Popup When Scroll Down) End -->

<!-- Back to Top Start -->
<a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
<!-- Back to Top End -->

<!-- All Javascript Plugins  -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/plugin.js"></script>

<!-- Main Javascript File  -->
<script type="text/javascript" src="js/scripts.js"></script>

<!-- Syntax Highlighter Javascript File  -->
<script type="text/javascript" src="js/syntax/shCore.js"></script>
<script type="text/javascript" src="js/syntax/shBrushCss.js"></script>
<script type="text/javascript" src="js/syntax/shBrushJScript.js"></script>
<script type="text/javascript" src="js/syntax/shBrushPerl.js"></script>
<script type="text/javascript" src="js/syntax/shBrushPhp.js"></script>
<script type="text/javascript" src="js/syntax/shBrushPlain.js"></script>
<script type="text/javascript" src="js/syntax/shBrushPython.js"></script>
<script type="text/javascript" src="js/syntax/shBrushRuby.js"></script>
<script type="text/javascript" src="js/syntax/shBrushSql.js"></script>
<script type="text/javascript" src="js/syntax/shBrushVb.js"></script>
<script type="text/javascript" src="js/syntax/shBrushXml.js"></script>

<!-- Syntax Highlighter Call Function -->
<script type="text/javascript">
  SyntaxHighlighter.config.clipboardSwf = "js/syntax/clipboard.swf";
  SyntaxHighlighter.all();
</script>
