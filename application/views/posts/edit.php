<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php echo form_open('posts/update'); ?>
            <input type="hidden" name="category_id" value="<?php echo $post['category_id']; ?>">
            <div class="mb-5 bg-white p-4 light-gradient box-shadow mt-5">
                <h3 class="text-center mb-3">
                    <?= $title ?>
                </h3>
                <?php echo "<span class='validation_error_message'>" . validation_errors() . "</span>"; ?>
                <!-- Title Field -->
                <div class="form-outline mb-4 shadow-5">
                    <input type="text" id="form1Example1" class="form-control" name="title"
                        value="<?php echo $post['title']; ?>" />
                    <label class="form-label" for="form1Example1">Title</label>
                </div>

                <!-- Description Field -->
                <div class="form-outline">
                    <textarea class="form-control" id="post_editor" rows="10" name="description">
                        <?php echo $post['description']; ?>
                    </textarea>
                </div>

                <!-- Select Category Field -->
                <div class="form-outline mt-3">
                    <select class="select-css" name="category_id">
                        <option>
                           <?= $category_name ?>
                        </option>
                        <?php foreach($categories as $category) : ?>
                        <option value="<?php echo $category['name']; ?>"><?php echo ucfirst($category['name']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Select Cover Photo Field -->
                <div class="form-outline mt-3">
                    <label for="formFileLg" class="form-label">Select Cover Photo</label>
                    <input class="form-control form-control-lg" name="userfile" id="formFileLg" type="file" />
                </div>

                <!-- Submit button -->
                <br>
                <center>
                    <button type="submit" class="btn btn-dark btn-rounded">
                        <?= $title ?>
                    </button>
                </center>
            </div>
            </form>
        </div>
    </div>
</div>