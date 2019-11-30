<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
	{
		return view('site.index');
	}

	public function search(Request $request)
	{
		if (!$request->isMethod('post')) {
			throw new \Exception('Invalid Request');
		}		

		$search = $request->search;

		$faqs = FAQ::select('faq.*')
			->selectRaw('users.name as username')
			->join('users', 'users.id', '=', 'faq.created_by')
			->where('reference', 'LIKE', '%'.$search.'%')
			->orWhere('question', 'LIKE', '%'.$search.'%')
			->orWhere('answer', 'LIKE', '%'.$search.'%')
			->orderBy('useful', 'DESC')			
			->get();
		
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
}
