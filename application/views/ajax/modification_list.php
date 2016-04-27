<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                <div class="form-group">
                  <label for="auto_modification" class="col-sm-4 control-label">Модификация</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="auto_modification" id="auto_modification">
                      <option value="" disabled="disabled" selected="selected">Модификация автомобиля</option>
                      <?php foreach ($auto_modification_data as $item):?>
                        <option value="<?=$item->id_car_modification?>"><?=$item->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
