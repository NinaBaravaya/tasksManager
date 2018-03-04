<table class="table table-bordered table-striped sortable" cellpadding="0" cellspacing="0" border="2">
    <caption>
        <h1>Task list</h1>
    </caption>
    <thead>
    <tr>
        <th>Image</th>
        <th data-defaultsign="_19" class="nosort" data-sortcolumn="0" data-sortkey="0-0">Id task</th>
        <th data-defaultsign="AZ" class="nosort" data-sortcolumn="1" data-sortkey="1-0">First name</th>
        <th data-defaultsign="AZ" class="nosort" data-sortcolumn="2" data-sortkey="2-0">Email</th>
        <th>Text</th>
        <th data-defaultsign="_19" class="nosort" data-sortcolumn="3" data-sortkey="3-0">Status</th>
    </tr>
    </thead>
    <tbody>
    <p><?= $mes; ?></p>
    <? if ($tasks) : ?>
        <? foreach ($tasks as $key => $item) : ?>
            <tr class="content">
                <td>
                    <a href="<?= SITE_URL ?>task/id/<?= $item['task_id']; ?>">
                        <img src="<?= SITE_URL . UPLOAD_DIR . $item['img']; ?>" alt="<?= $item['title'] ?>"/>
                    </a>
                </td>
                <td>
                    <p><?= $item['task_id']; ?></p>
                </td>
                <td data-value="<?= $item['user_name']; ?>">
                    <p><?= $item['user_name']; ?></p>
                </td>
                <td data-value="<?= $item['email']; ?>">
                    <p><?= $item['email']; ?></p>
                </td>

                <td><span></span>
                    <p class="text_task"><?= $item['text']; ?></p>
                    <form action="../index.php" method="post">
                        <input type="hidden" name="task_id" class="task_id" value="<?php echo $item['task_id']; ?>">
                    </form>
                </td>

                <td data-value="<?= $item['status']; ?>">

                    <form action="../index.php" method="post">
                        <input type="hidden" name="task_id" class="task_id" value="<?php echo $item['task_id']; ?>">
                        <? if ($item['status']) : ?>
                            <i class="fa fa-check-square-o fa-2x completed_task" aria-hidden="true"></i>
                        <? else: ?>
                            <i class="fa fa-square-o fa-2x completed_task" aria-hidden="true"></i>
                        <? endif; ?>
                    </form>
                </td>
            </tr>
        <? endforeach; ?>
        <div class="clr"></div>
    <? else : ?>
        <p>No data for output</p>
    <? endif; ?>
    <tr>
        <td colspan="6"><? if ($navigation) : ?>

                <br/>
                <ul class="pager">
                    <? if ($navigation['first']) : ?>
                        <li class="first">
                            <a href="<?= SITE_URL; ?>edittasks/page/1">First</a>
                        </li>
                    <? endif; ?>

                    <? if ($navigation['last_page']) : ?>
                        <li>
                            <a href="<?= SITE_URL; ?>edittasks/page/<?= $navigation['last_page'] ?>">&lt;</a>
                        </li>
                    <? endif; ?>

                    <? if ($navigation['previous']) : ?>
                        <? foreach ($navigation['previous'] as $val) : ?>
                            <li>
                                <a href="<?= SITE_URL; ?>edittasks/page/<?= $val; ?>"><?= $val; ?></a>
                            </li>
                        <? endforeach; ?>
                    <? endif; ?>

                    <? if ($navigation['current']) : ?>
                        <li>
                            <span><?= $navigation['current']; ?></span>
                        </li>
                    <? endif; ?>

                    <? if ($navigation['next']) : ?>
                        <? foreach ($navigation['next'] as $v) : ?>
                            <li>
                                <a href="<?= SITE_URL; ?>edittasks/page/<?= $v; ?>"><?= $v; ?></a>
                            </li>
                        <? endforeach; ?>
                    <? endif; ?>
                    <? if ($navigation['next_pages']) : ?>
                        <li>
                            <a href="<?= SITE_URL; ?>edittasks/page/<?= $navigation['next_pages'] ?>">&gt;</a>
                        </li>
                    <? endif; ?>

                    <? if ($navigation['end']) : ?>
                        <li class="last">
                            <a href="<?= SITE_URL; ?>edittasks/page/<?= $navigation['end'] ?>">Last</a>
                        </li>
                    <? endif; ?>

                </ul>
            <? endif; ?></td>
    </tr>
    <tr>
        <td colspan="6">
            <a href="<?= SITE_URL; ?>tasks/option/add/">
                <input type="submit" name="submit_add_cat" class="btn btn-primary" value="add task">
            </a>
        </td>
    </tr>

    </tbody>
</table>