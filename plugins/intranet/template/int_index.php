<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">

    <div class="row 2col">
      <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
        <div class="tiles blue added-margin">
          <div class="tiles-body">
            <div class="tiles-title"> BYTOVÉ DOMY V DATABÁZI</div>
            <div class="heading">
              <span class="animate-number" data-value="<?php echo $ENVO_COUNTS; ?>" data-animation-duration="1200">0</span>
            </div>
            <div class="progress transparent progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?php echo $ENVO_PERCENT; ?>"></div>
            </div>
            <div class="description">
              <span class="text-white mini-description ">Počet domů <span class="blend">uložených v databázi</span></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
        <div class="tiles green added-margin">
          <div class="tiles-body">
            <div class="tiles-title"> AKTIVNÍ ÚKOLY</div>
            <div class="heading">
              <span class="animate-number" data-value="<?php echo $ENVO_TASK_COUNTS; ?>" data-animation-duration="1200">0</span>
            </div>
            <div class="progress transparent progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?php echo $ENVO_TASK_PERCENT; ?>"></div>
            </div>
            <div class="description">
              <span class="text-white mini-description ">Počet aktivních <span class="blend">úkolů v databázi</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="grid simple transparent-color" style="position: static; zoom: 1;">
          <div class="grid-title">
            <h4><i class="fa fa-tasks"></i> Seznam aktivních úkolů</h4>
            <div class="tools">
              <a href="javascript:;" class="collapse"></a>
              <a href="javascript:;" class="remove"></a>
            </div>
          </div>
          <div class="grid-body no-border" style="display: block;">
            <div class="row-fluid ">

              <?php if (!empty($ENVO_HOUSE_TASK) && is_array($ENVO_HOUSE_TASK) && $ENVO_HOUSE_TASK["count_of_task"] > 0) { ?>
                <div id="tasklist">

                  <?php
                  // Loop Array at second item
                  foreach (array_slice($ENVO_HOUSE_TASK, 1) as $htask) { ?>
                    <div class="task_<?php echo $htask["id"]; ?>">
                      <div class="taskheader">
                        <span>Task ID <?php echo $htask["id"]; ?></span>
                        <span class="pull-right collapsetask">+</span>
                      </div>
                      <div class="taskinfo">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-sm-2">
                              <strong>Bytový dům: </strong>
                            </div>
                            <div class="col-sm-8">
                              <a href="<?php echo $htask["houseparseurl"]; ?>" class="all-caps"><?php echo $htask["housename"]; ?></a>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="table-responsive">
                                <table class="table table-task">
                                  <tr>
                                    <td><strong>Titulek: </strong></td>
                                    <td><strong>Priorita: </strong></td>
                                    <td><strong>Status: </strong></td>
                                    <td><strong>Datum Úkolu: </strong></td>
                                    <td><strong>Datum Připomenutí: </strong></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $htask["title"]; ?></td>
                                    <td><?php echo $htask["priority"]; ?></td>
                                    <td><?php echo $htask["status"]; ?></td>
                                    <td><?php echo $htask["time"]; ?></td>
                                    <td><?php echo $htask["reminder"]; ?></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="taskcontent">
                        <p><strong>Popis Úkolu:</strong></p>
                        <div class="taskdescription">
                          <?php echo $htask["description"]; ?>
                        </div>
                      </div>
                    </div>
                  <?php } ?>

                </div>
              <?php } else { ?>

                <div class="col-md-12">

                  <?php
                  // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                  echo $Html->addDiv('Nejsou dostupné žádné úkoly.', '', array('class' => 'alert'));
                  ?>

                </div>

              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if ($ENVO_MODULES) { ?>


    <?php } ?>

  </div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>