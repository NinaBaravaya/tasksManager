<div class="row">
    <div class="col-sm-6">
        <h1>
            Autorization
        </h1>
        <p>
            <? if($error):?>
                <?=$error;?>
            <? endif;?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <form action='<?=SITE_URL?>login' method='post'>
            <div class="form-group">
                <label for="login">Login</label>
                <input type='text' name = 'name' class="form-control" id="login" placeholder="Enter login">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type='password' name ='password' class="form-control" id="password" placeholder="Password">
            </div>
            <input class="btn btn-primary" type='submit' name='submit' value ='Sign in'>
        </form>
    </div>
</div>
