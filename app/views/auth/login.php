<h1 class="title"><?= $this->templateData['title'] ?></h1>

<?php if ($this->templateData['validationErrors']) { ?>
    <div class="validation-errors">
        <?php foreach ($this->templateData['validationErrors'] as $fieldErrors) { ?>
            <?php foreach ($fieldErrors as $error) { ?>
                <div class="error-message">
                    <?= $error['message'] ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>

<form action="/login" id="registration-form" method="post">
    <div class="form-field">
        <label>Email:</label>
        <input type="text" name="email" <?php if($this->templateData['postData']['email']){?>value="<?= $this->templateData['postData']['email'] ?>"<?php } ?>>
    </div>

    <div class="form-field">
        <label>Password:</label>
        <input type="password" name="password">
    </div>

    <div class="form-field">
        <input type="submit" value="Submit">
    </div>


</form>