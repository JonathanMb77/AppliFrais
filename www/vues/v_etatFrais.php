
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>             
                     
    </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) {
			       $libelle = $unFraisForfait['libelle'];
		?>	
			       <th> <?php echo $libelle?></th>
		 <?php
         }
		?>
		    </tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) {
				      $quantite = $unFraisForfait['quantite'];
		?>
              <td class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
		 ?>
		    </tr>
    </table>
  	<table class="listeLegere">
     <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>
                <th class='justificatif'>justificatifs</th>            
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) {
      			 $date = $unFraisHorsForfait['date'];
			       $libelle = $unFraisHorsForfait['libelle'];
			       $montant = $unFraisHorsForfait['montant'];
                $justificatif = $unFraisHorsForfait['justificatif'];
             $montantTotalHorsForfait += $montant;
		?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><?php echo $justificatif ?></td>
             </tr>
        <?php 
          }
          $montantTotal = $montantTotalHorsForfait + $montantValide
              ?>
    </table>
    <p>Montant total (hors forfait): <?php echo $montantTotalHorsForfait?></p>
    <p>Montant total (hors forfait+ forfaitisés): <?php echo $montantTotal ?></p>
  </div>
  </div>