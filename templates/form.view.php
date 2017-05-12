<?php if($errorMessage != ''): ?>
<div class="alert alert-danger">
    <strong>Error!</strong> 
    You have to fill these fields: 
    <strong><?php echo $errorMessage; ?></strong>.
</div>
<?php endif; ?>

<form method="POST"> 
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" value="<?php echo $movie['title']; ?>" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="year">Year</label>
    <input type="text" class="form-control" value="<?php echo $movie['year']; ?>" name="year" placeholder="Year">
  </div>
  <div class="form-group">
    <label for="length">Length</label>
    <?php 
      $timestamp = strtotime($movie['length']);
      $length = date('H\:i', $timestamp);
    ?>
    <input type="text" class="form-control" 
           value="<?php echo $length; ?>" 
           name="length" placeholder="Length">
  </div>
  <div class="form-group">
    <label for="image_url">Image URL</label>
    <input type="text" class="form-control" value="<?php echo $movie['image_url']; ?>" name="image_url" placeholder="http://">
  </div>
  <div class="form-group">
    <label for="movie_url">Trailer URL</label>
    <input type="text" class="form-control" value="<?php echo $movie['movie_url']; ?>" name="movie_url" placeholder="YouTube link">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" style="resize: vertical;" 
              name="description" placeholder="Movie description">
      <?php echo $movie['description']; ?>
    </textarea>
  </div>
  <button type="submit" 
          class="btn btn-primary btn-success btn-block">
          <?php echo $buttonName; ?>
  </button>
</form>