<h3 class="font-weight-bold text-center mt-5 mb-3"><?= $title ?></h3>

<div class="container mb-5">
    <?php foreach($posts as $post) : ?>
    <div class="row box-shadow light-gradient">
        <div class="col-md-4">
            <?php $date_posted = new DateTime($post['created_date']); ?>
            <br>
            <div class="card mb-4 border  box-shadow">
                <img src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">
                    <?php echo $post['title']; ?>
                </h5>
                <p class="card-text">
                    <?php echo word_limiter($post['description'], 25); ?>
                    <br><br>
                    <b>Category:</b>
                    <span class="badge bg-primary">
                        <?php echo ucfirst($post['name']); ?>
                    </span>
                    <br>
                    <b>Date Posted:</b>
                    <?php echo $date_posted->format('F d, Y'); ?>
                </p>
                <a href="<?php echo site_url('posts/' . $post['slug']); ?>">
                    <button type="button" class="btn btn-dark">Read More</button>
                </a>
            </div>
        </div>
    </div>
    <br>
    <?php endforeach; ?>
    <div class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </div>

</div>