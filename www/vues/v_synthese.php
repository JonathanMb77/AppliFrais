<table class="listeLegere">
  	<caption>Synthese des fiches de frais
    </caption>
    <tr>
        <th class="date">Date</th>
        <th class="libelle">Libellé</th>
        <th class='montant'>Montant Valide</th>
        <th class="montantEngage">Montant Engagé</th>                
    </tr>
    <?php      
        foreach ( $info as $unFraisHorsForfait ) {
      		$date = $unFraisHorsForfait['mois'];
            $datestr = substr($date, -2);
            $daterts = substr($date, 0, -2);
            $resultdate = $daterts . "/" . $datestr;
            $libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['totalValide'];
            $montantengage = $unFraisHorsForfait['totalEngage'];
	?>
        <tr>
            <td><?php echo $resultdate ?></td>
            <td><?php echo $libelle ?></td>
            <td><?php echo $montant ?></td>
            <td><?php echo $montantengage ?></td>
        </tr>
    <?php 
    }
    ?>
</table>