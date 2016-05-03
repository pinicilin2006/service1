<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                <div class="form-group">
                  <label for="city" class="col-sm-4 control-label">Ваш город*</label>
                  <div class="col-sm-8">
                    <select class="selectpicker form-control" name="city" id="city" title="Город" data-size="10" data-live-search="true" required>
                      <?php foreach ($city_data as $item):?>
                        <option value="<?=$item->city_id?>"><?=$item->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
