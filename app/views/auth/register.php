<h1 class="title"><?= $this->templateData['title'] ?></h1>

<form action="/register" id="registration-form" method="post">
    <div class="form-field">
        <label>Name:</label>
        <input type="text" name="name">
    </div>

    <div class="form-field">
        <label>Email:</label>
        <input type="text" name="email">
    </div>

    <div class="form-field">
        <label>Password:</label>
        <input type="text" name="password">
    </div>

    <div class="form-field">
        <label>Repeat password:</label>
        <input type="text" name="repeat-password">
    </div>

    <div class="form-field">
        <input type="submit" value="Submit">
    </div>


</form>