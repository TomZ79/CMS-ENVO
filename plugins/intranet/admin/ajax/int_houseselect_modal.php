<!-- Modal -->
<div class="modal modal-fullscreen fade" id="ENVOModalPlugin" tabindex="-1" role="dialog" aria-labelledby="ENVOModalPlugin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="ENVOModalPluginLabel">Výběr domu</h4>
      </div>
      <div class="modal-body">
        <div>
          <table id="int_table" class="table table-striped table-hover">
            <thead>
            <tr>
              <th class="no-sort">Název domu</th>
              <th class="no-sort">Město</th>
              <th class="no-sort">Ulice</th>
              <th class="no-sort">IČ</th>
            </tr>
            </thead>

            <?php

            if (!empty($ENVO_HOUSE_ALL) && is_array($ENVO_HOUSE_ALL)) {
              foreach ($ENVO_HOUSE_ALL as $house) {

                echo '<tr>';
                echo '<td>' . $house["name"] . '</td>';
                echo '<td>' . $house["city"] . '</td>';
                echo '<td>' . $house["street"] . '</td>';
                echo '<td>' . $Html->addAnchor('', $house["ic"], '', 'xxxx', array('data-value' => $house["id"])) . '</td>';
                echo '</tr>';

              }
            }

            ?>

          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal"><?= $tl["button"]["btn19"] ?></button>
      </div>
    </div>
  </div>
</div>