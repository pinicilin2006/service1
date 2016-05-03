<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                <div class="form-group">
                  <label for="auto_model" class="col-sm-4 control-label">Модель*</label>
                  <div class="col-sm-8">
                    <select class="form-control selectpicker" name="auto_model" id="auto_model" required title="Модель" data-live-search="true" data-size="10">
                      <?php foreach ($auto_model_data as $item):?>
                        <option value="<?=$item->id_car_model?>"><?=$item->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
