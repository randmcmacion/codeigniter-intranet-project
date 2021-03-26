<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <?php echo form_open('users/login'); ?>
            <div class="mb-5 bg-white p-4 light-gradient box-shadow mt-5">
                <h3 class="text-center mb-3 mt-3">
                    <?= $title ?>
                </h3>
                <?php echo "<span class='validation_error_message'>" . validation_errors() . "</span>"; ?>
                <!-- Username input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control" name="username" required />
                    <label class="form-label" for="form3Example3">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form3Example4" class="form-control" name="password" required />
                    <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>