<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php echo form_open_multipart('posts/create'); ?>
            <div class="mb-5 bg-white p-4 light-gradient box-shadow mt-5">
                <h3 class="text-center mb-3 mt-3">
                    <?= $title ?>
                </h3>

                <?php echo "<span class='validation_error_message'>" . validation_errors() . "</span>"; ?>

                <!-- Title Field -->
                <div class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="title" />
                    <label class="form-label" for="form1Example1">Title</label>
                </div>

                <!-- Description Field -->
                <div class="form-outline">
                    <textarea class="form-control" id="post_editor" rows="4" name="description"></textarea>
                </div>

                <!-- Select Category Field -->
                <div class="form-outline mt-3">
                    <select class="select-css" name="category_id">
                        <option value="">Select Post Category</option>
                        <?php foreach($categories as $category) : ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo ucfirst($category['name']); ?>
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