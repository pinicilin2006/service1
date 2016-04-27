<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                <div class="form-group">
                  <label for="detail_type" class="col-sm-4 control-label">Тип детали*</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="detail_type" id="detail_type" required>
                      <option value="" disabled="disabled" selected="selected">Тип детали</option>
                      <?php foreach ($detail_type_data as $item):?>
                        <option value="<?=$item->id_detail_type?>"><?=$item->name_detail_type?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
