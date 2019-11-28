<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
	}
	
    public function index()
    {   
        $user = Auth::id();
		$faqs = FAQ::where('created_by', '=', Auth::id())
			->paginate(10);
		
		return view('faq.index', compact('faqs'));
	}
	
	public function show($id)
	{
		$faq = FAQ::find($id);

		return view('faq.show', compact('faq'));
	}
}
