<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <?php $date_posted = new DateTime($post['created_date']); ?>
            <div class="card mb-4 box-shadow-no-effect">
                <div class="card-body m-3">
                    <h4 class="card-title font-weight-bold mb-3 text-center" style="z-index:1;">
                        <?php echo $post['title']; ?>
                    </h4>
                    <img class="box-shadow-no-effect mb-2" style="width:100%;"
                        src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
                    <p class="card-text">
                        <?php echo $post['description']; ?>
                        <br>
                        <b>Date Posted:</b>
                        <?php echo $date_posted->format('F d, Y'); ?>
                    </p>
                    <?php if($this->session->userdata('user_id') == $post['user_id'] ) : ?>
                    <!-- Edit Post Action -->
                    <a class="btn btn-primary btn-rounded float-start"
                        href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">
                        Edit
                    </a>

                    <!-- Delete Post Action -->
                    <?php echo form_open('posts/delete/'. $post['id']); ?>
                    <input type="submit" value="Delete Post" class="btn btn-danger btn-rounded">
                    </form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card mb-4 box-shadow-no-effect mb-5">
                <?php if($comments) : ?>
                <?php foreach($comments as $comment) : ?>
                <div class="well">
                    <?php echo $comment['comments_body']; ?>
                    <br>
                    <span class="font-weight-bold">By:</span>
                    <?php echo $comment['name']; ?>
                    <br>
                    <span class="font-weight-bold">Email Address:</span>
                    <?php echo $comment['email_address']; ?>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <h5 class="h4-responsive">No Comments yet...</h5>
                <?php endif; ?>
            </div>
            <div class="card mb-4 box-shadow-no-effect mb-5">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <?php echo form_open('comments/create/' . $post['id']); ?>
                        <input type="hidden" name="post_slug" value="<?php echo $post['slug']; ?>">
                        <div class="mt-5">
                            <?php echo "<span class='validation_error_message'>" . validation_errors() . "</span>"; ?>
                            <h5 class="h4-responsive">Add a Comment</h5>
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <input required type="text" id="form4Example1" class="form-control" name="name" />
                                <label class="form-label" for="form4Example1">Name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input required type="email" id="form4Example2" class="form-control"
                                    name="email_address" />
                                <label class="form-label" for="form4Example2">Email address</label>
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <textarea required class="form-control" id="form4Example3" rows="5"
                                    name="comments_body"></textarea>
                                <label class="form-label" for="form4Example3">Comments</label>
                            </div>

                            <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
                            <!-- Submit button  -->
                            <button type="submit" class="btn btn-primary mb-4 float-end">Comment</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white p-5 box-shadow-no-effect">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi eveniet harum nemo consequatur a qui
                consectetur quo? Natus officia totam exercitationem aperiam possimus porro iure asperiores numquam,
                blanditiis itaque commodi?
            </div>
        </div>
    </div>
</div>