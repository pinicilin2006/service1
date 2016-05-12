<span class="text-danger"><?php echo validation_errors(); ?></span>
<form class="form-inline" id='send_sms' role="form">
  <div class="form-group">
    <label class="sr-only" for="sms_name">Название детали</label>
    <input type="text" class="form-control" name="sms_name" id="sms_name" placeholder="Название детали" required="required">
  </div>
  <div class="form-group">
    <label class="sr-only" for="sms_price">Цена</label>
    <input type="text" class="form-control" name="sms_price" id="sms_price" placeholder="Цена" required="required">
  </div>
  <input type="hidden" name="id_request" value="<?=$id_request?>"></input>
  <button type="submit" id="button_send_sms" data-loading-text="Отправка..." class="btn btn-success">Отправить SMS</button>
</form>