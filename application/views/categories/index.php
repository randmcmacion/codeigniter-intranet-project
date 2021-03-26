<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-8 offset-md-2">
            <table id="categories_table" class="table table-striped table-bordered box-shadow-no-effect"
                style="width:100%">
                <thead>
                    <tr class="font-weight-bold">
                        <td> NAME</td>
                        <td class="text-center"> DATE CREATED</td>
                        <td class="text-center"> ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category) : ?>
                    <?php $created_date = new DateTime($category['created_date']); ?>
                    <tr>
                        <th style="width:30%;">
                            <a class="text-black"
                                href="<?php echo site_url('/categories/posts/' . $category['id']); ?>">
                                <?php echo ucfirst($category['name']); ?>
                            </a>
                        <td class="text-center" style="width:20%;">
                            <?php echo $created_date->format('F d, Y'); ?>
                        </td>
                        <td class="text-center" style="width:20%">

                            <!-- Edit Post Action -->
                            <a class="btn btn-dark btn-sm float-start"
                                href="<?php echo site_url('/categories/posts/' . $category['id']); ?>">
                                View
                            </a>

                            <!-- Edit Post Action -->
                            <a class="btn btn-primary btn-sm"
                                href="<?php echo base_url(); ?>categories/edit/<?php echo $category['id']; ?>">
                                Edit
                            </a>

                            <!-- Delete Post Action -->
                            <div class="float-end">
                                <?php echo form_open('categories/delete/'. $category['id']); ?>
                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>