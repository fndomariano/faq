<?php

namespace App\Http\Controllers;

use App\FAQ;
use DB;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
	{
		return view('site.index');
	}

	public function search(Request $request)
	{		
		$q = $request->q;

		$faqs = FAQ::select('faq.*')
			->selectRaw('users.name as username')
			->join('users', 'users.id', '=', 'faq.created_by')
			->where('reference', 'LIKE', '%'.$q.'%')
			->orWhere('question', 'LIKE', '%'.$q.'%')
			->orWhere('answer', 'LIKE', '%'.$q.'%')
			->orderBy('useful', 'DESC')			
			->paginate(10);			
		
		$faqs->appends(['q' => $q]);
		
		return view('site.results', compact('faqs'));
	}

	public function show($id)
	{
		$faq = FAQ::select('faq.*')
			->selectRaw('users.name as username')
			->join('users', 'users.id', '=', 'faq.created_by')
			->find($id);

		if (!$faq) {
			abort(404);
		}

		return view('site.show', compact('faq'));
	}

	public function vote(Request $request)
	{		
		if (!$request->isMethod('post')) {
			throw new \Exception('Invalid request');
		}

		DB::beginTransaction();
		
		try	{
						
			$faq = FAQ::find($request->id);
			$faq->vote($request->vote);
			$faq->save();
			
			DB::commit();	

			return [
				'success' => true, 
				'message' => 'Vote saved successfully',
				'data' => [
					'useful'  => $faq->useful,
					'useless' => $faq->useless
				]
			];

		} catch (\Exception $e) {
			
			DB::rollback();

			return [
				'success' => false, 
				'message' => $e->getMessage()
			];
		}					
	}
}
