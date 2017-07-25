<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class VisitRepository {
	public function getAggregatedVisits()
	{
		return DB::table('visits')
		         ->select('path', DB::raw('count(*) as total'))
                 ->groupBy('path')
                 ->get();
	}
}
