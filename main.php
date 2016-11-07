<?
/*---------------------------------------------------------------------------

	GÉNÉRATEUR DE SLOGANS POURRIS

	inspiré par Nicolas Sarkozy, Benoit Hamon et beaucoup d'autres

	Ce fichier est Open source, même pas besoin de créditer l'auteur

	Plus d'infos, Twitter: @daryo

---------------------------------------------------------------------------*/

//USAGE
echo generateur_de_slogan_pourri();



function generateur_de_slogan_pourri() {


//	ÉTAPE 1 - ACCROCHE
//	Commençons par une accroche optionnelle avant d'arriver au bullshit principal

$prefix_number = rand(0,11);

// on prépare les corrections pour pas faire de fôtes
$gender = false;	// LMPT aime ça

switch ($prefix_number) {		// pour les nombres impairs, on ne met pas de préfixe

	case '0' : $prefix = 'Demain';
	break;

	case '2' : $prefix = 'Uni';
		$gender = true;
	break;

	case '4' : $prefix = 'Ensemble';
	break;

	case '6' : $prefix = 'Avec vous';
	break;

	case '8' : $prefix = 'Apaisé';
		$gender = true;
	break;

	case '10' : $prefix = 'Plus fort';
		$gender = true;
	break;

	default:	$prefix = null;			// le slogan est null quoi qu'il arrive, ceci dit.
	break;
}




//	ÉTAPE 2 - SUJET
//	de quoi ou de qui qu'on parle ???

$dequoiquonparle_number = rand(0,12);

// est ce qu'on parle de la france ?
$france = false;	// pour l'instant non

//on prépare encore des corrections
list ($is_feminine, $is_plural) = false;

switch ($dequoiquonparle_number) {

	case '0' : $dequoiquonparle = 'la France';
		if ($gender) $prefix .= 'e';				// on corije lé fôtes
		$is_feminine = true;
		$france = true;
	break;

	case '1' : $dequoiquonparle = 'le peuple de France';
		$france = true;
	break;

	case '2' : $dequoiquonparle = 'l\'avenir';
	break;

	case '3' : $dequoiquonparle = 'les français';
		if ($gender) $prefix .= 's';				// on korige lè faute
		$is_plural = true;
		$france = true;
	break;

	case '4' : $dequoiquonparle = 'tout';
	break;

	case '5' : $dequoiquonparle = 'les rêves';		// Because  ¯\_(ツ)_/¯
		if ($gender) $prefix .= 's';				// on korige lè faute
		$is_plural = true;
	break;

	case '6' : $dequoiquonparle = 'le futur';
	break;

	default: $dequoiquonparle = null;		// on parle pour ne rien dire, donc c'est null quoi qu'il arrive en théorie
	break;
}




//	ÉTAPE 3 - EMERGENCY
//	Au cas où on aurait même pas un début de quelque chose, on s'interrompt deux secondes et on va mettre un truc


if (!$dequoiquonparle) {

	$emergency_bullshit = rand(0,3);

// on commence par mettre un verbe
	switch ($emergency_bullshit) {

		case '0' : $dequoiquonparle = 'tout pour';
		break;

		case '1' : $dequoiquonparle = 'en avant vers';
		break;

		case '2' : $dequoiquonparle = 'agir pour';
		break;

		case '3' : $dequoiquonparle = 'avancer pour';
		break;

		case '4' : $dequoiquonparle = 'faire battre le coeur de';
		break;
	}


	$emergency_bullshit = rand(0,4);		// on complète notre belle action avec un terme porteur d'espoir

	switch ($emergency_bullshit) {
		case '0' :  $dequoiquonparle .= ' l\'avenir';
		break;

		case '1' :  $dequoiquonparle .= ' la France';
		break;

		case '2' :  $dequoiquonparle .= ' le futur';
		break;

		case '3' :   $dequoiquonparle .= '  la victoire';
		break;

		case '4' :  $dequoiquonparle .= ' le progrès';
		break;

	}

	// et si on en était arrivé à ne rien avoir à dire alors on s'arrête là
	$finito = true;
}




//	ÉTAPE 4 - AU FAIT ON A PARLÉ DE LA FRANCE ?
//	On est pas obligé non plus, hein...

if ((!$finito)&&(!$france)) {
	$onparledelafranceoupas = rand(0,2);	
	if ($onparledelafranceoupas == 2) {
		$dequoiquonparle .= ' de la france';
		$france = true;
	}
}



//	ÉTAPE 5 - ET VOILÀ
//	On termine tranquillement notre slogan de l'étape 2

if (!$finito) {

	$random_bullshit = rand(0,3);

	switch ($random_bullshit) {
		
		case '0' :
			if ($is_plural) $dequoiquonparle .= ' deviennent possible';
			else	$dequoiquonparle .= ' devient possible';
		break;

		case '1' :
			if ($is_plural) $dequoiquonparle .= ' sont entre nos mains';
			else	$dequoiquonparle .= ' est entre nos mains';
		break;

		case '2' :
			if ($is_plural) $dequoiquonparle .= ' seront unis';
			else	$dequoiquonparle .= ' sera uni';
			if ($is_feminine) $dequoiquonparle .= 'e';
		break;

		case '3' :
			if ($is_plural) $dequoiquonparle .= ' seront plus forts';
			else	$dequoiquonparle .= ' sera plus fort';
		break;
	}


}


// on corrige une petite faute
$dequoiquonparle = str_replace('de le', 'du', $dequoiquonparle);


//	ÉTAPE 6 - TW : COULD CONTAIN HIGH VOLUME OF BULLSHIT

if ($prefix) $buffer = $prefix.', ';
else $buffer = null;

$buffer .= $dequoiquonparle;

return ucfirst($buffer);
} // fin de la fonction

?>
