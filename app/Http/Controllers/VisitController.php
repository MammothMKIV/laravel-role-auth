<?php

namespace App\Http\Controllers;

use App\Repositories\VisitRepository;
use Illuminate\Http\Request;

class VisitController extends Controller
{
	/**
	 * @var VisitRepository
	 */
	protected $visits;

	public function __construct(VisitRepository $visits)
	{
		$this->visits = $visits;
	}

	public function visitStats(Request $request)
    {
		return response()->view('visit-chart');
    }

	public function visitData(Request $request)
	{
		$visitDataKeys = [];
		$visitDataValues = [];

		$visitData = $this->visits->getAggregatedVisits();

		foreach ($visitData as $dataItem) {
			$visitDataKeys[] = $dataItem->path;
			$visitDataValues[] = $dataItem->total;
		}

		return response()->json([
			'visitDataKeys' => $visitDataKeys,
			'visitDataValues' => $visitDataValues
		]);
	}
}
