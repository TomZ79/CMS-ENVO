<!-- Modal -->
<div class="modal fullscreen fade" id="ENVOModalPlugin" tabindex="-1" role="dialog" aria-labelledby="ENVOModalPlugin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="ENVOModalPluginLabel">Výběr S_ID Programu nebo Služby</h4>
      </div>
      <div class="modal-body">
        <div>
          <table id="tt_table_sid" class="table table-striped table-hover">
            <thead>
            <tr>
              <th class="col-xs-6">S_ID</th>
              <th class="col-xs-6">Název</th>
            </tr>
            </thead>

            <?php

            if (!empty($ENVO_SIDTV_ALL) && is_array($ENVO_SIDTV_ALL)) {
              foreach ($ENVO_SIDTV_ALL as $sidtv) {

                echo '<tr>';
                echo '<td>' . $sidtv["sid"] . '</td>';
                echo '<td>' . $Html->addAnchor('', $sidtv["name"], '', 'xxxx', array('data-type' => 'tv', 'data-value' => $sidtv["id"])) . '</td>';
                echo '</tr>';

              }
            }

            if (!empty($ENVO_SIDR_ALL) && is_array($ENVO_SIDR_ALL)) {
              foreach ($ENVO_SIDR_ALL as $sidr) {

                echo '<tr>';
                echo '<td>' . $sidr["sid"] . '</td>';
                echo '<td>' . $Html->addAnchor('', $sidr["name"], '', 'xxxx', array('data-type' => 'radio', 'data-value' => $sidr["id"])) . '</td>';
                echo '</tr>';

              }
            }

            if (!empty($ENVO_SIDS_ALL) && is_array($ENVO_SIDS_ALL)) {
              foreach ($ENVO_SIDS_ALL as $sids) {

                echo '<tr>';
                echo '<td>' . $sids["sid"] . '</td>';
                echo '<td>' . $Html->addAnchor('', $sids["name"], '', 'xxxx', array('data-type' => 'service', 'data-value' => $sids["id"])) . '</td>';
                echo '</tr>';

              }
            }

            ?>

          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal"><?=$tl["button"]["btn19"]?></button>
      </div>
    </div>
  </div>
</div>