<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php echo form_open_multipart('categories/update'); ?>
            <input type="hidden" name="id" value="<?php echo $category['id']; ?>" >
            <div class="mb-5 bg-white p-4 light-gradient box-shadow mt-5">
                <h3 class="text-center mb-3 mt-3">
                    <?= $title ?>
                </h3>
                <?php echo "<span class='validation_error_message'>" . validation_errors() . "</span>"; ?>
                <!-- Name Field -->
                <div class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="name" value="<?php echo $category['name']; ?>" />
                    <label class="form-label" for="form1Example1">Name</label>
                </div>
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