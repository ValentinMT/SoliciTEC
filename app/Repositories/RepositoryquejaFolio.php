<?php

namespace App\Repositories;
use App\EsAtendidoModel;

class RepositoryquejaFolio{

	static function InsertarFolioQueja($quejas, $solicitud)
	{
		foreach($quejas as $queja){
		$Quejasfolio = new EsAtendidoModel;
		$Quejasfolio->solicitudes_folio = $solicitud->folio;
		$Quejasfolio->queja_folio = $queja;
		$Quejasfolio->save();
	}
		return true;
	}	
}
