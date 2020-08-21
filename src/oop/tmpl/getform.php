
<form action="/" method="GET">
    <div class="form-group">
        <label for="getParam1">Enter session key to unset:</label>
        <input id="getParam1" name="sessionKey" type="text" value="<?= OOP\Services\ValueFormater::formatValue($this->request->query("sessionKey")) ?>"  class="form-control">
    </div>
    <div class="form-group">
        <label for="getParam2">Enter cookies key to unset:</label>
        <input id="getParam2" name="cookiesKey" type="text" value="<?= OOP\Services\ValueFormater::formatValue($this->request->query("cookiesKey")) ?>"  class="form-control">
    </div>
    <p>
        You can add some GET parameters right into the address bar
    </p>
    <button type="submit" class="btn btn-primary">Send</button>
</form>