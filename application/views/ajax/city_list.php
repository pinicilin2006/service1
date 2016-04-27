<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                <div class="form-group">
                  <label for="city" class="col-sm-4 control-label">Ваш город*</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="city" id="city" required>
                      <option value="" disabled="disabled" selected="selected">Выберите Ваш город</option>
                      <?php foreach ($city_data as $item):?>
                        <option value="<?=$item->city_id?>"><?=$item->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
