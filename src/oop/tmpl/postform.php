<form action="/?name=noname" method="POST">
    <div class="form-group">
        <label for="postName">Name:</label>
        <input id="postName" name="name" type="text" value="<?= OOP\Services\ValueFormater::formatValue($this->request->post("name")) ?>"  class="form-control">
        <small id="emailHelp" class="form-text text-muted">This will replace default get parameter name "noname" in Request::all() and Request::get()</small>
    </div>
    <div class="form-group">
        <label for="postEmail">Email:</label>
        <input id="postEmail" name="email" type="email" value="<?= OOP\Services\ValueFormater::formatValue($this->request->post("email")) ?>"  class="form-control">
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="useSessionOrCookies" id="useSession" value="<?= self::USE_SESSION ?>"
                <?= OOP\Services\ValueFormater::formatValue($this->request->post("useSessionOrCookies")) === self::USE_SESSION ||
                OOP\Services\ValueFormater::formatValue(!$this->request->has('useSessionOrCookies')) ? 'checked' : '' ?>
            >
            <label class="form-check-label" for="useSession">
                Use session
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="useSessionOrCookies" id="useCookies" value="<?= self::USE_COOKIES ?>"
                <?= OOP\Services\ValueFormater::formatValue($this->request->post("useSessionOrCookies")) === self::USE_COOKIES ? 'checked' : '' ?>
            >
            <label class="form-check-label" for="useCookies">
                Use cookies
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>