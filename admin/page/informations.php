          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                Informations <small>Statistiques</small>
              </h1>
              <ol class="breadcrumb">
                <li class="active">
                  <i class="fa fa-dashboard"></i> Informations
                </li>
              </ol>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-3 col-md-6">
             <div class="panel panel-primary">
              <div class="panel-heading">
               <div class="row">
                <div class="col-xs-3">
                 <i class="fa fa-comments fa-5x"></i>
               </div>
               <div class="col-xs-9 text-right">
                 <div class="huge"><?php $req_nbrNews2 = $bddConnection->query('SELECT * FROM cmw_news'); $Newstotal = $req_nbrNews2->rowCount(); echo $Newstotal;?></div>
                 <div>Actualités</div>
               </div>
             </div>
           </div>
           <a data-toggle="collapse" data-parent="#adminPanel" href="#news">
             <div class="panel-footer">
              <span class="pull-left">Voir détails</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <?php
      for($j = 0; $j < count($lecture['Json']); $j++)
      {
        if($conEtablie[$j] == true)
          { ?>
            <div class="col-lg-3 col-md-6">
             <div class="panel panel-green">
              <div class="panel-heading">
               <div class="row">
                <div class="col-xs-3">
                 <i class="fa fa-tasks fa-5x"></i>
               </div>
               <div class="col-xs-9 text-right">
                 <div class="huge">En Ligne</div>
                 <div>Status du Serveur</div>
               </div>
             </div>
           </div>
           <a data-toggle="modal" data-target="#infoServeur" href="#">
             <div class="panel-footer">
              <span class="pull-left">Voir détails</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>

      <?php if($_Joueur_['rang'] == 1 OR ($_PGrades_['PermsPanel']['info']['details']['player'] == true OR $_PGrades_['PermsPanel']['info']['details']['console'] == true OR $_PGrades_['PermsPanel']['info']['details']['command'] == true OR $_PGrades_['PermsPanel']['info']['details']['plugins'] == true OR $_PGrades_['PermsPanel']['info']['details']['server'] == true)) { ?>
        <div class="modal fade" id="infoServeur" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel"><B> Modifications </B></h4>
              </div>
              <div class="modal-body">
                <div class="col-lg-offset-1 text-center">
                  <div class="row">
                    <div class="col-lg-11">
                      <?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['details']['player'] == true) { ?>
                        <h4>Joueur(s)</h4>
                        <div class="row">
                          <?php for($i = 0;$i < count($serveurStats);$i++) {
                            echo $serveurStats[$i]['enLignes'];
                            echo ' / ';
                            echo $serveurStats[$i]['maxJoueurs'];
                          } ?>
                        </div>
                        <div class="row">
                          <?php foreach ($serveurStats[$j]['joueurs'] as $cle => $element) { ?>
                            <a href="index.php?&page=profil&profil=<?php echo $serveurStats[$j]['joueurs'][$cle]; ?>" class="icon-player">
                              <?php echo '<img src="http://cravatar.eu/helmhead/' .$serveurStats[$j]['joueurs'][$cle]. '/56.png" title="Voir le profil de ' .$serveurStats[$j]['joueurs'][$cle]. '">'; ?></a>
                              <?php } ?>
                            </div>
                            <hr>
                            <?php }
                            if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['details']['console'] == true) { ?>
                              <h4>Console</h4>
                              <div class="row">
                                <script type="text/javascript">
                                  function updateConsole() {
                                    var $console = $("#console");
                                    $console.load("admin.php #console");
                                  }
                                  setInterval("updateConsole()", 10000);
                                </script>
                                <?php $date = date("Y-m-d");
                                echo '<div id="console"><div style="background-color: #373737;color: #8F8F8F;border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;border:solid 2px #8F8F8F;overflow: hidden;">';
                                foreach ($console[$j]['Test'] as $value) {
                                  $console[$j]['Test'] = $value["line"];
                                  $console[$j]['Test'] = str_replace($date, '', $console[$j]['Test']);
                                  $msg_prefix = array('INFO', 'WARN', 'SEVERE', "[0;31;22m", "[0;32;22m", "[0;33;22m", "[0;34;22m", "[0;35;22m", "[0;36;22m", "[0;37;22m", "[0;30;1m", "[0;31;1m", "[0;32;1m", "[0;33;1m", "[0;34;1m", "[0;35;1m", "[0;36;1m", "[0;37;1m", "[1;31m", "[21m", "[9m", "[5m", "[3m", "[0m", "[m", "<span><span", "</span></span>");
                                  $color_prefix = array('<span style="color: #5555FF;">INFO</span>', '<span style="color: #FFAA00;">WARN</span>', '<span style="color: #FF5555;">SEVERE</span>', "</span><span style=\"color:#aa0000\">", "</span><span style=\"color:#00aa00\">", "</span><span style=\"color:#ffaa00\">", "</span><span style=\"color:#0000aa\">", "</span><span style=\"color:#aa00aa\">", "</span><span style=\"color:#00aaaa\">", "</span><span style=\"color:#aaaaaa\">", "</span><span style=\"color:#555555\">", "</span><span style=\"color:#ff5555\">", "</span><span style=\"color:#55ff55\">", "</span><span style=\"color:#ffffff\">", "</span><span style=\"color:#5555ff\">", "</span><span style=\"color:#ff55ff\">", "</span><span style=\"color:#55ffff\">", "</span><span style=\"color:#ffff55\">", "", "", "", "", "", "", "</span>", "<span", "</span>");
                                  $console[$j]['Test'] = str_replace($msg_prefix, $color_prefix, $console[$j]['Test']);
                                  echo '<div style="text-align: left;">';
                                  echo '<div>';
                                  echo $console[$j]['Test'];
                                  echo '<br/></div>';
                                  echo '</div>';
                                }
                                echo '</div>
                                </div>'; ?>
                              </div>
                              <?php }
                              if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['details']['command'] == 1) { ?>
                                <div class="row">
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                      $("#sendCommand").click(function(e){
                                        $("#commandeConsole").prop('disabled', true);
                                        $("#sendCommand").prop('disabled', true);
                                        e.preventDefault();
                                        $.ajax({
                                          type : 'POST',
                                          url : '?&action=commandeConsole',
                                          data : $('#commandeExec').serialize(),
                                          success: function() {
                                            $('input[name=commandeConsole]').val('');
                                            $("#commandeConsole").prop('disabled', false);
                                            $("#sendCommand").prop('disabled', false);
                                            Snarl.addNotification({
                                              title: 'Succès',
                                              text: 'La commande est executée.',
                                              icon: '<i class="fa fa-globe"></i>',
                                              timeout: 8000
                                            });
                                            },
                                            error: function() {
                                              $('input[name=commandeConsole]').val('');
                                              $("#commandeConsole").prop('disabled', false);
                                              $("#sendCommand").prop('disabled', false);
                                              Snarl.addNotification({
                                              title: 'Erreur',
                                              text: 'La commande à échoué.',
                                              icon: '<i class="fa fa-globe"></i>',
                                              timeout: 8000
                                            });
                                            }
                                        });
                                      });
                                    });
                                  </script>
                                  <form id="commandeExec" method="POST" action="?&action=commandeConsole">
                                    <input class="form-control" type="text" name="commandeConsole" id="commandeConsole" value="" placeholder="Mettre une commande sans /" required/>
                                    <button id="sendCommand" class="btn btn-info">Exécuter la commande</button>
                                  </form>
                                </div>
                                <div hidden="hidden" aria-hidden="true" style="display: none;" alt="Pour une prochaine maj">
                                  <div class="row">
                                    <button data-toggle="modal" data-target="#taskAuto" class="btn btn-warning" disabled>Tâches Automatique</button>
                                  </div>
                                  <div class="row">
                                    <button data-toggle="modal" data-target="#giveSpec" class="btn btn-danger" disabled>Spécial Item</button>
                                  </div>
                                </div>
                                <hr>
                                <?php }
                                if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['details']['plugins'] == true) { ?>
                                  <h4>Plugins</h4>
                                  <div class="row">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>Nom</th>
                                          <th>Version</th>
                                          <th>Etat</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        <?php foreach ($plugins[$j]['Test'] as $value) { ?>
                                          <tr>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['version']; ?></td>
                                            <td><?php if($value['enabled']== "true") { echo '<center><img src="theme/upload/true.png"></img></center>'; } else { echo '<center><img src="theme/upload/cross.png"></img></center>'; } ?></td>
                                          </tr>
                                          <?php } ?>
                                        </tbody>
                                      </table>
                                    </div>
                                    <hr>
                                    <?php }
                                    if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['details']['server'] == true) { ?>
                                      <h4>Gérer le serveur</h4>
                                      <div class="row">
                                        <?php for($i = 0;$i < count($serveurStats); $i++) { ?>
                                          <div class="row>">
                                            <strong>Version du serveur : <?php echo $serveurStats[$i]['version']; ?></strong>
                                          </div>
                                          <div class="row>">
                                            <strong>Mémoire du serveur : <?php echo $serveurStats[$i]['usedMemoryServer'] .$serveurStats[$i]['uMS'] . ' / ' .$serveurStats[$i]['totalMemoryServer'] .$serveurStats[$i]['tMS'] . '.'; ?></strong>
                                          </div>
                                          <div class="row>">
                                            <strong>Disque de la machine : <?php echo $serveurStats[$i]['usedDiskSizeServer'] .$serveurStats[$i]['uDSS'] . ' / ' .$serveurStats[$i]['totalDiskSizeServer'] .$serveurStats[$i]['tDSS'] . ' (' .$serveurStats[$i]['freeDiskSizeServer'] .$serveurStats[$i]['fDSS'] . ' de libre.)'; ?></strong>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4 text-center">
                                              <button type="button" class="btn btn-warning" onclick="window.location.replace('?&action=commandeRechargementPlugins')">Redémarrer les plugins</button>
                                            </div>
                                            <div class="col-md-4 text-center">
                                              <form method="post" action="?&action=commandeConsole">
                                                <button id="commandeConsole" name="commandeConsole" type="submit" class="btn btn-danger" value="stop"/>Arrêter le serveur</button>
                                              </form>
                                            </div>
                                            <div class="col-md-4 text-center" style="margin-left: -4.5%">
                                              <button type="button" class="btn btn-success" onclick="window.location.replace('?&action=commandeRedemarrageServer')" disabled>Redémarrer le serveur</button>
                                            </div>
                                          </div>
                                        </div>
                                        <?php }
                                      } ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="row">
                                <div class="col-lg-8 col-lg-offset-2 text-center">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?> 

                        <?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['details']['command'] == 1) { ?>
                          <div class="modal fade" id="giveSpec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog" style="width: 35%">
                            <div class="modal-content">
                             <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                              <center><h4 class="modal-title" id="myModalLabel"><B> Give Item Spécial </B></h4></center>
                            </div>
                            <div class="modal-body">
                              <center>
                               <div style="width: 100%;" class="from-group">
                                <h4><B>Give des items spéciaux (MC 1.7+)</B></h4>
                                <div name="part1">
                                 <div class="row-margin-top row-margin-bottom row" style="margin-left: -5.5%;width: 32%;">
                                  <div class="col-md-12">
                                   <div class="input-group">
                                    <span class="input-group-addon">Pseudo</span>
                                    <input id="joueur" class="form-control" type="text" placeholder="Pseudo (ex: Sprik07)"/>
                                  </div>
                                </div>
                              </div>
                            </br>
                            <div class="col-md-3" style="width: 32%;">
                             <div class="input-group">
                              <span class="input-group-addon">Item</span>
                              <select id="item" name="methode" class="form-control">
                               <option disabled="disabled"><B>--- Fer ---</B></option>
                               <option value="256">Pelle en fer</option>
                               <option value="257">Pioche en fer</option>
                               <option value="258">Hache en fer</option>
                               <option value="267">Epée en fer</option>
                               <option value="292">Hoe en fer</option>
                               <option disabled="disabled"><B>--- Bois ---</B></option>
                               <option value="268">Epée en bois</option>
                               <option value="269">Pelle en bois</option>
                               <option value="270">Pioche en bois</option>
                               <option value="271">Hache en bois</option>
                               <option value="290">Hoe en bois</option>
                               <option value="261">Arc</option>
                               <option disabled="disabled"><B>--- Pierre ---</B></option>
                               <option value="272">Epée en pierre</option>
                               <option value="273">Pelle en pierre</option>
                               <option value="274">Pioche en pierre</option>
                               <option value="275">Hache en pierre</option>
                               <option value="291">Hoe en pierre</option>
                               <option disabled="disabled"><B>--- Diamant ---</B></option>
                               <option value="276">Epée en diamant</option>
                               <option value="274">Pelle en diamant</option>
                               <option value="275">Pioche en diamant</option>
                               <option value="276">Hache en diamant</option>
                               <option value="293">Hoe en diamant</option>
                               <option disabled="disabled"><B>--- Or ---</B></option>
                               <option value="274">Epée en or</option>
                               <option value="275">Pelle en or</option>
                               <option value="276">Pioche en or</option>
                               <option value="276">Hache en or</option>
                               <option value="294">Hoe en or</option>
                             </select>
                           </div>
                         </div>
                         <div style="width: 32%;" class="col-md-3">
                           <div class="input-group">
                            <span class="input-group-addon">Dommage</span>
                            <input id="dommage" class="form-control" type="number" placeholder="" min="0" max="9999" />
                          </div>
                        </div>
                        <div style="width: 32%;" class="col-md-3">
                         <div class="input-group">
                          <span class="input-group-addon">Quantité</span>
                          <input id="quantite" class="form-control" type="number" placeholder="" min="0" max="9999" />
                        </div>
                      </div>
                    </div>
                  </br>
                  <div name="part2" style="margin-top: 6%;">
                   <div style="width: 32%;" class="col-md-3">
                    <div class="input-group">
                     <span class="input-group-addon">Coût Réparation</span>
                     <input id="costRepair" class="form-control" type="number" placeholder="" min="0" max="9999" />
                   </div>
                 </div>
                 <div style="width: 32%;" class="col-md-3">
                  <div class="input-group">
                   <span class="input-group-addon">Nom Item</span>
                   <input id="nameItem" class="form-control" type="text" placeholder="" maxlength="24" />
                 </div>
               </div>
               <div style="width: 32%;" class="col-md-3">
                <div class="input-group">
                 <span class="input-group-addon">Incassable</span>
                 <input id="unbreakable" class="form-control" type="number" min="0" max="1" max="9999" />
               </div>
             </div>
           </div>
         </br>
         <div name="part3" style="margin-top: 5%;">
          <div class="row-margin-top row-margin-bottom row">
           <div class="col-md-12">
            <div class="input-group">
             <span class="input-group-addon">Texte (Lore)</span>
             <input id="textItem" class="form-control" type="text" placeholder="Exemple : C'est l'épée de dieu mon frère !" />
           </div>
         </div>
       </div>
     </div>
   </br>
   <div name="part4">
     <div class="row-margin-top row-margin-bottom row" style="margin-top: 2%">
      <div class="col-md-3" style="width: 32%;">
       <div class="input-group">
        <span class="input-group-addon">Enchant'</span>
        <select id="enchantID" class="form-control">
         <option value="0">Protection</option>
         <option value="1">Protection de feu</option>
         <option value="2">Chute amortie</option>
         <option value="3">Protection d'explosion</option>
         <option value="4">Protection de projectile</option>
         <option value="5">Respiration</option>
         <option value="6">Affinité aquatique</option>
         <option value="7">Épines</option>
         <option value="8">Agilité aquatique</option>
         <option value="9">Semelles givrantes</option>
         <option value="16">Tranchant</option>
         <option value="17">Châtiment</option>
         <option value="18">Fléau des arthropodes</option>
         <option value="19">Recul</option>
         <option value="20">Aura de Feu</option>
         <option value="21">Butin</option>
         <option value="32">Efficacité</option>
         <option value="33">Toucher de soie</option>
         <option value="34">Solidité</option>
         <option value="35">Fortune</option>
         <option value="48">Puissance</option>
         <option value="49">Frappe</option>
         <option value="50">Flamme</option>
         <option value="51">Infinité</option>
         <option value="61">Chance de la mer</option>
         <option value="62">Appât</option>
         <option value="70">Raccommodage</option>
       </select>
     </div>
   </div>
   <div class="col-md-2">
     <input id="enchantLVL" class="form-control" type="number" placeholder="Niveau" min="0" max="9999" />
   </div>
   <div class="col-md-3">
     <button id="enchantAdd" class="btn btn-block btn-success">Ajouter enchant'</button>
   </div>
   <div class="col-md-3">
     <button id="enchantDelete" class="btn btn-block btn-danger">Supprimer enchant'</button>
   </div>
 </div>
</div>
</br>
<div name="part5">
  <div class="row-margin-top row-margin-bottom row">
   <div class="col-md-3" style="width: 32%;">
    <div class="input-group">
     <span class="input-group-addon">Enchant' stockées</span>
     <select id="enchantStockID" class="form-control">
      <option value="0">Protection</option>
      <option value="1">Protection de feu</option>
      <option value="2">Chute amortie</option>
      <option value="3">Protection d'explosion</option>
      <option value="4">Protection de projectile</option>
      <option value="5">Respiration</option>
      <option value="6">Affinité aquatique</option>
      <option value="7">Épines</option>
      <option value="8">Agilité aquatique</option>
      <option value="9">Semelles givrantes</option>
      <option value="16">Tranchant</option>
      <option value="17">Châtiment</option>
      <option value="18">Fléau des arthropodes</option>
      <option value="19">Recul</option>
      <option value="20">Aura de Feu</option>
      <option value="21">Butin</option>
      <option value="32">Efficacité</option>
      <option value="33">Toucher de soie</option>
      <option value="34">Solidité</option>
      <option value="35">Fortune</option>
      <option value="48">Puissance</option>
      <option value="49">Frappe</option>
      <option value="50">Flamme</option>
      <option value="51">Infinité</option>
      <option value="61">Chance de la mer</option>
      <option value="62">Appât</option>
      <option value="70">Raccommodage</option>
    </select>
  </div>
</div>
<div class="col-md-2">
  <input id="enchantStockLVL" class="form-control" type="number" placeholder="Niveau" min="0" max="9999" />
</div>
<div class="col-md-3">
  <button id="enchantStockAdd" class="btn btn-block btn-success">Ajouter enchant'</button>
</div>
<div class="col-md-3">
  <button id="enchantStockDelete" class="btn btn-block btn-danger">Supprimer enchant'</button>
</div>
</div>
</div>
<hr>
<div class="row-margin-top row-margin-bottom row" style="width: 85%;margin-right: 1%;">
  <div class="col-md-12">
   <textarea id="fin" class="form-control" style="margin-top:5px;resize: none;" placeholder="give {JOUEUR} 256 1 ..." value=""></textarea>
   <div style="margin-top: 1%">
    <button style="margin-left: 3%" type="submit" class="btn btn-info">Exécuter la commande</button>
  </div>
</div>
</div>
</br>
</div>
</center>
</div>
</br>
</br>
<div class="modal-footer">                                    
  <center><button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button></center>
</div>
</div>
</div>
</div>
<?php } ?>
<?php } else { ?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-green" style="border-color: #d9534f;">
     <div class="panel-heading" style="background-color: #d9534f; border-color: #d9534f;">
      <div class="row">
       <div class="col-xs-3">
        <i class="fa fa-tasks fa-5x"></i>
      </div>
      <div class="col-xs-9 text-right">
        <div class="huge">Hors-Ligne</div>
        <div>Status du Serveur</div>
      </div>
    </div>
  </div>
  <a href="#" onclick="if(alert('Le serveur est éteint.')) window.location.replace('#')">
    <div class="panel-footer" style="color: #d9534f;">
     <span class="pull-left">Voir détails</span>
     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
     <div class="clearfix"></div>
   </div>
 </a>
</div>
</div>
<?php }
} ?>
<div class="col-lg-3 col-md-6">
  <div class="panel panel-yellow">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-shopping-cart fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">
          <div class="huge"><?php $req_nbrOffres2 = $bddConnection->query('SELECT * FROM cmw_boutique_offres'); $Offrestotal = $req_nbrOffres2->rowCount(); echo $Offrestotal;?></div>
          <div>Offres dans la boutique</div>
        </div>
      </div>
    </div>
    <a data-toggle="collapse" data-parent="#adminPanel" href="#boutique">
      <div class="panel-footer">
        <span class="pull-left">Voir détails</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>
<div class="col-lg-3 col-md-6">
  <div class="panel panel-red" style="border-color: #9A36B2;">
    <div class="panel-heading" style="background-color: #9A36B2; border-color: #9A36B2;">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-support fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">
          <div class="huge"><?php $req_nbrTickets2 = $bddConnection->query('SELECT * FROM cmw_support'); $Ticketstotal = $req_nbrTickets2->rowCount(); echo $Ticketstotal;?></div>
          <div>Tickets dans le support</div>
        </div>
      </div>
    </div>
    <a data-toggle="collapse" data-parent="#adminPanel" href="#support">
      <div class="panel-footer" style="color: #9A36B2;" href="">
        <span class="pull-left">Voir détails</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>
</div>
<!-- /.row -->

<?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['stats']['visitors']['showTable'] == true) { ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques des visiteurs
            <?php 
            setlocale(LC_TIME, 'fr.UTF-8', 'fr_FR.UTF-8', 'fr_FR.ISO8859-1');
            strftime("| %d %B %Y |"); ?>
          </h3>
        </div>
        <div class="panel-body">
          <p>
           <canvas id="visitsChart" style="width: 256px;height: 256px">
            <script>
             <?php 
             $Dates = date("Y-m-d");
             $Dates_Yesterday = strftime("%Y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-1, date('y')));

             $req_NumberOfDay = $bddConnection->prepare('SELECT dates AS dates FROM cmw_visits GROUP BY dates LIMIT 0, 7;');
             $req_NumberOfDay->execute();
             $get_NumberOfDay = $req_NumberOfDay->fetchAll();

             $req_TotalVisitsPerDay = $bddConnection->prepare('SELECT count(dates) AS visits FROM cmw_visits GROUP BY dates LIMIT 0, 7;');
             $req_TotalVisitsPerDay->execute();
             $get_TotalVisitsPerDay = $req_TotalVisitsPerDay->fetchAll();
             ?>
             var visitsChart = $("#visitsChart").get(0).getContext("2d");
             var visitsChart = new Chart(visitsChart);

             var visitsChartData = {
               labels: [<?php foreach ($get_NumberOfDay as $get_NumberOfDay) {
                $replace_DatesBy = array("Aujourd'hui", "Hier");
                $find_Dates = array($Dates, $Dates_Yesterday);
                echo '"'.str_replace($find_Dates, $replace_DatesBy, $get_NumberOfDay['dates']).'"'.","; } ?>],
                datasets: [
                {
                  fillColor: "rgba(255,100,100,0.9)",
                  strokeColor: "rgba(255,100,100,0.9)",
                  pointColor: "#FF4343",
                  pointStrokeColor: "#FF4343",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(60,141,188,1)",
                  data: [<?php foreach ($get_TotalVisitsPerDay as $get_TotalVisitsPerDay) {
                   echo '"'.$get_TotalVisitsPerDay['visits'].'"'.","; } ?>]
                 },
                 ]
               };

               var visitsChartOptions = {
                showScale: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                bezierCurve: true,
                bezierCurveTension: 0.3,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
                maintainAspectRatio: false,
                responsive: true
              };

              visitsChart.Line(visitsChartData, visitsChartOptions);
            </script>
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- /.row -->


  <div class="row">
    <?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['stats']['members']['showTable'] == true) { ?>
     <div class="col-lg-4">
      <div class="panel panel-default">
       <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-fw fa-user"></i> Statistiques des Membres</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped">
          <thead>
           <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Jetons</th>
            <th>Date d'inscription</th>
            <?php $req_etatMail = $bddConnection->query("SELECT etatMail FROM cmw_sysmail WHERE idMail = 1");
            $get_etatMail = $req_etatMail->fetch();
            $result_etatMail = $get_etatMail['etatMail'];
            if($result_etatMail == "1") { ?>
              <th>Etat</th>
              <?php } ?>
              <th>Adresse IP <button data-toggle="modal" data-target="#modifPerIP">Editer</button></th>
            </tr>
          </thead>
          <tbody>
           <?php for($i = 0; $i < count($membresStats); $i++) { ?>

             <tr>
              <td><?php echo $membresStats[$i]['id']; ?></td>
              <td><?php echo $membresStats[$i]['pseudo']; ?></td>
              <td><?php echo $membresStats[$i]['tokens']; ?></td>
              <td><?php echo date('d/m/Y', $membresStats[$i]['anciennete']).' &agrave; '.date('H:i:s', $membresStats[$i]['anciennete']); ?></td>
              <?php if($result_etatMail == "1") { ?>
                <td><?php if($membresStats[$i]['ValidationMail'] == "1"){echo "Valide";}else{echo "Invalide";} ?></td>
                <?php } ?>
                <td><?php echo $membresStats[$i]['ip']; ?></td>
              </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="text-right">
         <center>Ceci sont les 8 derniers membres inscrits. <span class="fa fa-credit-card-alt"></span></center>
       </div>
     </div>
   </div>
 </div>
 <?php } ?>

 <!-- /.row -->
 <?php if($_Joueur_['rang'] == 1 OR ($_PGrades_['PermsPanel']['info']['stats']['members']['showTable'] == true AND $_PGrades_['PermsPanel']['info']['stats']['members']['editLimitIp'] OR $_PGrades_['PermsPanel']['info']['stats']['members']['editEmail'] == true)) { ?>
  <div class="modal fade" id="modifPerIP" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel"><B> Modifications </B></h4>
        </div>
        <div class="modal-body">
          <?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['stats']['members']['editLimitIp'] == true) {
            for($i = 0; $i < count($nbrPerIP); $i++) { ?>
              <form method="POST" action="?&action=editNbrPerIP&idPerIP=<?php echo $nbrPerIP[$i]['id']; ?>">
                <div class="col-lg-offset-2 text-center">
                  <div class="row">
                    <div class="col-lg-10">
                      <h4>Système d'API : IP de vérification</h4>
                      <div class="row">
                        <div class="alert alert-success">
                          <strong>Modifiez ici le nombres <span style="color: red;">limite</span> d'inscriptions par IP.</B></strong>
                        </div>
                      </div>
                      <div class="row">
                        <input type="number" style="text-align: center;" name="nbrPerIP" class="form-control" placeholder="1" value="<?php echo $nbrPerIP[$i]['nbrPerIP']; ?>"/>
                      </div>
                      <hr>
                      <div class="row">
                        <input type="submit" class="btn btn-info" value="Valider" />
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <?php }
            }
            if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['stats']['members']['editEmail'] == true) {
              for($i = 0; $i < count($sysMail); $i++) { ?>
                <hr>
                <div class="col-lg-offset-2 text-center">
                  <div class="row">
                    <div class="col-lg-10">
                      <h4>Système d'API : Email de vérification</h4>
                      <?php if($sysMail[$i]['etatMail'] == "0") { ?>
                        <div class="row">
                          <div class="alert-danger">
                            <strong>L'API est actuellement désactivé.</strong>
                          </div>
                        </div>
                        <?php } else { ?>
                          <form method="POST" action="?&action=editSysMail&idMail=<?php echo $sysMail[$i]['idMail']; ?>">
                            <div class="row">
                              <div class="alert alert-success">
                                <strong>Modifiez ici le nombres <span style="color: red;">limite</span> d'utilisation d'une email par compte.</strong>
                              </div>
                            </div>
                            <div class="row">
                              <input type="number" style="text-align: center;" name="strictMail" class="form-control" placeholder="1" value="<?php echo $sysMail[$i]['strictMail']; ?>">
                            </div>
                          </br>
                          <div class="row">
                            <div class="alert alert-success">
                              <strong>Activer/Désactiver L'API, et modifier sont contenus.</strong>
                            </div>
                          </div>
                          <h4>Email</h4>
                          <div class="row">
                            <input type="text" style="text-align: center;" class="form-control" name="fromMail" value="<?php echo $sysMail[$i]['fromMail']; ?>" placeholder="no-reply@infectedz.fr">
                          </div>
                          <h4>Sujet</h4>
                          <div class="row">
                            <input type="text" style="text-align: center;" class="form-control" name="sujetMail" value="<?php echo $sysMail[$i]['sujetMail']; ?>" placeholder="Votre lien d'activation !">
                          </div>
                          <h4>Message</h4>
                          <div class="row">
                            <div class="alert alert-info">
                              <strong><i class="fa fa-question-circle"></i> Détails importants <i class="fa fa-question-circle"></i></strong>
                              <div class="row">
                                Voici les syntaxes à respecter dans votre message :</br>
                                - <B>{JOUEUR}</B> = Au nom du joueur. (Optionnel.)</br>
                                - <B>{LIEN}</B> = Au lien pour confirmer l'inscription. (<B>Obligatoire !</B>)</br>
                                - <B>{MDP}</B> = Au mot de passe du joueur. (Optionnel.)</br>
                                - <B>{IP}</B> = A l'adresse IP de l'endroit où à étais effectué l'inscription. (Optionnel.)
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <textarea type="text" style="resize: none;" class="form-control" name="msgMail" value="<?php echo $sysMail[$i]['msgMail']; ?>" placeholder="Bienvenue[...] Voici votre lien d'activation..."><?php echo $sysMail[$i]['msgMail']; ?></textarea>
                          </div>
                          <hr>
                          <div class="row">
                            <input type="submit" class="btn btn-info" value="Valider" />
                          </div>
                        </form>
                        <?php } ?>
                        <div class="row">
                          <form method="POST" action="?&action=switchSysMail&idMail=<?php echo $sysMail[$i]['idMail']; ?>">
                            <hr>
                            <div class="row">
                              <?php if ($sysMail[$i]['etatMail'] == "0") {
                                echo '<button type="submit" name="etatMail" class="btn btn-success" value="1" />Activer L\'API</button>';
                              } else {
                                echo '<button type="submit" name="etatMail" class="btn btn-danger" value="0" />Désactiver L\'API</button>';
                              } ?>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php } ?>
                </div>
                <div class="modal-footer">
                  <div class="col-lg-offset-3 text-center">
                    <div class="row">
                      <div class="col-lg-8">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['stats']['activity']['showTable'] == true) { ?>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Statistiques des Activités</h3>
                </div>
                <div class="panel-body">
                  <div class="list-group">

                    <?php for($i = 0; $i < count($lastMembre); $i++) {
                      if(!empty($lastMembre[$i]['pseudo'])) { ?>
                       <a href="#" class="list-group-item">
                        <span class="badge"><?php echo date('Y-m-d', $lastMembre[$i]['anciennete']).' '.date('H:i:s', $lastMembre[$i]['anciennete']); ?></span>
                        <i class="fa fa-fw fa-user"></i> Dernier membre inscrit : 
                        <?php echo '<strong>'.$lastMembre[$i]['pseudo'].'</strong>'; ?>
                      </a>
                      <?php }
                    } ?>

                    <?php for($i = 0; $i < count($lastTicket); $i++) {
                     if(!empty($lastTicket[$i]['id'])) {
                      if($lastTicket[$i]['etat'] == "1") { ?>
                        <a href="#" class="list-group-item">
                         <span class="badge"><?php echo $lastTicket[$i]['date_post']; ?></span>
                         <span class="badge" style="background-color: rgb(45, 179, 45);">Résolu</span>
                         <i class="fa fa-support"></i> Dernier ticket :
                         <?php echo '<strong>'.$lastTicket[$i]['titre'].'</strong> par <strong>'.$lastTicket[$i]['auteur'].'</strong>'; ?>
                       </a>
                       <?php } elseif($lastTicket[$i]['etat'] == "0") { ?>
                        <a href="#" class="list-group-item">
                         <span class="badge"><?php echo $lastTicket[$i]['date_post']; ?></span>
                         <span class="badge" style="background-color: #d9534f;">Non Résolu</span>
                         <i class="fa fa-support"></i> Dernier ticket :
                         <?php echo '<strong>'.$lastTicket[$i]['titre'].'</strong> par <strong>'.$lastTicket[$i]['auteur'].'</strong>'; ?>
                       </a>
                       <?php } 
                     }
                   } ?>

                   <?php for($i = 0; $i < count($lastCommentaireSupp); $i++) { 
                     if(!empty($lastCommentaireSupp[$i]['date_post'])) {
                      $reqNameSupp = $bddConnection->prepare("SELECT titre as titre FROM cmw_support WHERE id LIKE :id");
                      $reqNameSupp->bindParam(':id', $lastCommentaireSupp[$i]['id_ticket']);
                      $reqNameSupp->execute();
                      $getNameSupp = $reqNameSupp->fetch();
                      $NameSupp = $getNameSupp['titre']; ?>
                      <a href="#" class="list-group-item">
                        <span class="badge"><?php echo $lastCommentaireSupp[$i]['date_post']; ?></span>
                        <i class="fa fa-fw fa-comment"></i> Dernier commentaire par : 
                        <?php echo '<strong>'.$lastCommentaireSupp[$i]['auteur'].'</strong> dans le ticket <strong>'.$NameSupp.'</strong>'; ?>
                      </a>
                      <?php }
                    } ?>

                    <?php for($i = 0; $i < count($lastCommentaireNews); $i++) { 
                     if(!empty($lastCommentaireNews[$i]['date_post'])) {
                      $reqNameNews = $bddConnection->prepare("SELECT titre as titre FROM cmw_news WHERE id LIKE :id");
                      $reqNameNews->bindParam(':id', $lastCommentaireNews[$i]['id_news']);
                      $reqNameNews->execute();
                      $getNameNews = $reqNameNews->fetch();
                      $NameNews = $getNameNews['titre']; ?>
                      <a href="#" class="list-group-item">
                        <span class="badge"><?php echo date('Y-m-d', $lastCommentaireNews[$i]['date_post']).' '.date('H:i:s', $lastCommentaireNews[$i]['date_post']); ?></span>
                        <i class="fa fa-newspaper-o"></i> Dernier commentaire par : 
                        <?php echo '<strong>'.$lastCommentaireNews[$i]['pseudo'].'</strong> dans la nouveauté <strong>'.$NameNews.'</strong>'; ?>
                      </a>
                      <?php }
                    } ?>

                    <?php for($i = 0; $i < count($lastNews); $i++) {
                     if(!empty($lastNews[$i]['titre'])) { ?>
                       <a href="#" class="list-group-item">
                        <span class="badge"><?php echo date('Y-m-d', $lastNews[$i]['date']).' '.date('H:i:s', $lastNews[$i]['date']); ?></span>
                        <i class="fa fa-star"></i> Dernière nouveauté : 
                        <?php echo '<strong>'.$lastNews[$i]['titre'].'</strong> par <strong>'.$lastNews[$i]['auteur'].'</strong>'; ?>
                      </a>
                      <?php }
                    } ?>

                    <?php for($i = 0; $i < count($lastVote); $i++) {
                     if(!empty($lastVote[$i]['id'])) { ?>
                       <a href="#" class="list-group-item">
                        <span class="badge"><?php echo date('Y-m-d', $lastVote[$i]['date_dernier']).' '.date('H:i:s', $lastVote[$i]['date_dernier']); ?></span>
                        <i class="fa fa-bullhorn"></i> Dernier vote par :
                        <?php echo '<strong>'.$lastVote[$i]['pseudo'].'</strong>'; ?>
                      </a>
                      <?php }
                    } ?>

                    <?php for($i = 0; $i < count($lastMaintenance); $i++) {
                     if(!empty($lastMaintenance[$i]['maintenanceTime'])) { ?>
                       <a href="#" class="list-group-item">
                        <span class="badge"><?php if($lastMaintenance[$i]['maintenanceTime'] != "0") { echo date('Y-m-d', $lastMaintenance[$i]['maintenanceTime']).' '.date('H:i:s', $lastMaintenance[$i]['maintenanceTime']); } ?></span>
                        <?php if($lastMaintenance[$i]['maintenanceEtat'] == "0") { ?>
                          <span class="badge" style="background-color: #d9534f;">Inactif</span>
                          <?php } elseif($lastMaintenance[$i]['maintenanceEtat'] == "1") { ?>
                            <span class="badge" style="background-color: rgb(45, 179, 45);">Actif</span>
                            <?php } ?>
                            <i class="fa fa-fw fa-wrench"></i> Dernière maintenance effectuée
                          </a>
                          <?php }
                        } ?>

                        <?php for($i = 0; $i < count($lastAchatDedipass); $i++) {
                          if(!empty($lastAchatDedipass[$i]['date_achat'])) { ?>
                            <a href="#" class="list-group-item">
                              <span class="badge"><?php echo $lastAchatDedipass[$i]['date_achat'].' ??:??:??'; ?></span>
                              <i class="fa fa-fw fa-mobile"></i> Dernier achat sur dedipass par : <strong><?php echo $lastAchatDedipass[$i]['pseudo'].'</strong> au prix de <strong>'.$lastAchatDedipass[$i]['payout'].'€</strong>'; ?>
                            </a>
                          <?php }
                        } ?>

                        <?php for($i = 0; $i < count($lastOffre); $i++) {
                         if(!empty($lastOffre[$i]['id'])) {
                          $NameCategorie = $lastOffre[$i]['categorie_id'];
                          $req_NameCategorie = $bddConnection->query("SELECT titre FROM cmw_boutique_categories WHERE id = '$NameCategorie'");
                          $get_NameCategorie = $req_NameCategorie->fetch();
                          $inverse_NameCategorie = $get_NameCategorie['titre']; ?>
                          <a href="#" class="list-group-item">
                           <i class="fa fa-fw fa-shopping-cart"></i> Dernière offre : <?php echo '<strong>'.$lastOffre[$i]['nom'].'</strong> dans la catégorie <strong>'.$inverse_NameCategorie.'</strong> au prix de <strong>'.$lastOffre[$i]['prix'].' Jetons</strong>'; ?>
                         </a>
                         <?php }
                       } ?>

                       <?php for($i = 0; $i < count($lastOffrePaypal); $i++) {
                        if(!empty($lastOffrePaypal[$i]['id'])) { ?>
                          <a href="#" class="list-group-item">
                           <i class="fa fa-fw fa-credit-card"></i> Dernière offre PayPal : <?php echo '<strong>'.$lastOffrePaypal[$i]['nom'].'</strong> au prix de <strong>'.$lastOffrePaypal[$i]['prix'].'€</strong> pour obtenir <strong>'.$lastOffrePaypal[$i]['jetons_donnes'].' Jetons</strong>'; ?>
                         </a>
                         <?php }
                       } ?>



                     </div>
                     <div class="text-right">
                       <center>Ceci sont les 10 dernières activités. <span class="fa fa-credit-card-alt"></span></center>
                     </div>
                   </div>
                 </div>
               </div>
               <?php } ?>

               <?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['info']['stats']['shop']['showTable'] == true) { ?>
                 <div class="col-lg-4">
                  <div class="panel panel-default">
                   <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Statistiques de la Boutique</h3>
                  </div>
                  <div class="panel-body">
                    <?php $req_existAchat = $bddConnection->query('SELECT * FROM cmw_boutique_stats');
                    $existAchat = $req_existAchat->rowCount();
                    if($existAchat != 0) { ?>
                      <div class="table-responsive">
                       <table class="table table-bordered table-hover table-striped">
                        <thead>
                         <tr>
                          <th>ID</th>
                          <th>Pseudo</th>
                          <th>Date</th>
                          <th>Offre acheté</th>
                          <th>Dépenses</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php for($i = 0; $i < count($boutiquesStats); $i++) { ?>

                         <tr>
                          <td><?php echo $boutiquesStats[$i]['id']; ?></td>
                          <td><?php echo $boutiquesStats[$i]['pseudo']; ?></td>
                          <td><?php echo $boutiquesStats[$i]['date_achat']; ?></td>
                          <?php $NameOffre = $boutiquesStats[$i]['offre_id'];
                          $req_NameOffre = $bddConnection->prepare("SELECT nom FROM cmw_boutique_offres WHERE id LIKE :offre_id");
                          $req_NameOffre->execute();
                          $get_NameOffre = $req_NameOffre->fetch();
                          $inverse_NameOffre = $get_NameOffre['nom']; ?>
                          <td><?php if(!empty($inverse_NameOffre)){echo $inverse_NameOffre;}else{echo 'Offre supprimée';} ?></td>
                          <td><?php echo $boutiquesStats[$i]['prix']; ?></td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-right">
                   <center>Ceci sont les 12 dernières achats dans la boutique. <span class="fa fa-credit-card-alt"></span></center>
                 </div>
                 <?php } else {
                  echo '<center><strong>Aucun achat</strong></center>';
                } ?>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>