<div class="row">
    <div class="col-lg-6">
        <? if ($option == 'add') : ?>
            <h3>
                Add new task
            </h3>
            <p><?= $mes; ?></p>
            <!--FORM ADD-->
            <form enctype="multipart/form-data" action="<?= SITE_URL; ?>tasks/option/add/" id="add_form" method="POST">
                <div class="form-group">
                    <label for="user_name">Name user</label>
                    <input class="form-control" id="user_name" type="text" name="user_name"
                           value="<?= isset($_SESSION['add_task']['user_name']) ? $_SESSION['add_task']['user_name'] : ""; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email user</label>
                    <input class="form-control" id="email" type="text" name="email"
                           value="<?= isset($_SESSION['add_task']['email']) ? $_SESSION['add_task']['email'] : ""; ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                    <input type="hidden" name="preview_task" value="preview_task">

                    <label for="image">Image</label>
                    <input class="form-control-file" id="image" type="file" name="img"
                           value="<?= SITE_URL . 'images/' . $_SESSION['add_task']['img']; ?>">

                    <!--<progress></progress>-->
                    <input type="hidden" name="img_add"
                           value="<?= SITE_URL . 'images/' . $_SESSION['add_task']['img']; ?>">
                </div>
                <div class="form-group">
                    <label for="text_task">Text</label>
                    <textarea class="form-control" id="text_task" name="text"
                              cols="60"
                              rows="15"><?= isset($_SESSION['add_task']['text']) ? $_SESSION['add_task']['text'] : ""; ?></textarea>
                </div>
                <input type="button" name="preview_task" id="preview_task" class="btn btn-info" value="preview">
                <input type="submit" name="submit_add_cat" id="add_task" class="btn btn-primary" value="add task">
            </form>
            <!--FORM ADD-->
        <? endif; ?>
    </div>
</div>
