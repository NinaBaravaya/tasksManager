<? if ($option == 'add' && $preview): ?>
    <form enctype="multipart/form-data" id="edit_form" action="<?= SITE_URL; ?>tasks/option/add/" method="POST">
        <p><span>Имя пользователя: &nbsp;
			</span><?= isset($_SESSION['add_task']['user_name']) ? $_SESSION['add_task']['user_name'] : ""; ?></p><br/>
        <p><span>Email пользователя: &nbsp;
			</span><?= isset($_SESSION['add_task']['email']) ? $_SESSION['add_task']['email'] : ""; ?></p><br/>
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
        <p><span>картинка задачи:
                <img src="<?= SITE_URL; ?>images/<?= $_SESSION['add_task']['img']; ?>" alt="" name="">
			</span><br/><br/>

        <p><span>Текст задачи:</span><?= isset($_SESSION['add_task']['text']) ? $_SESSION['add_task']['text'] : ""; ?>
        </p>
        <p><span>Email пользователя: &nbsp;
			</span><?= isset($_SESSION['add_task']['email']) ? $_SESSION['add_task']['email'] : ""; ?></p><br/>
        <input type="button" name="edit_task" id="edit_task" class="btn btn-info" value="change task">
        <input type="submit" name="submit_add_cat" class="btn btn-primary" value="add task">

        <input type="hidden" name="edit_task" value="edit_task">

        <input type="hidden" name="user_name"
               value="<?= isset($_SESSION['add_task']['user_name']) ? $_SESSION['add_task']['user_name'] : ""; ?>">

        <input type="hidden" name="email"
               value="<?= isset($_SESSION['add_task']['email']) ? $_SESSION['add_task']['email'] : ""; ?>">

        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">

        <input type="hidden" name="img"
               value="<?= SITE_URL . 'images/' . $_SESSION['add_task']['img']; ?>">

        <textarea name="text" hidden
                  cols="60"
                  rows="15"><?= isset($_SESSION['add_task']['text']) ? $_SESSION['add_task']['text'] : ""; ?>
        </textarea>
    </form>
<? endif; ?>