<?php

namespace App\Http\Controllers;

use App\FAQ;
use App\Http\Requests\FAQRequest;
use DB;
use Exception;
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

	public function create()
    {
        return view('faq.new');
	}

	public function store(FAQRequest $request)
	{
		DB::beginTransaction();

		try {

			$faq = new FAQ;
			$faq->useful     = 0;
			$faq->useless    = 0;
			$faq->reference  = $request->reference;
			$faq->question   = $request->question;
			$faq->answer     = $request->answer;
			$faq->created_by = Auth::id();
			$faq->save();
			
			DB::commit();

			return redirect()
				->route('faq.index')
				->with('success', 'Registered FAQ Successfully!');

		} catch (Exception $e) {
			
			DB::rollback();
            
            return redirect()
                ->route('faq.index')
                ->with('error', $e->getMessage());
		}
	}

	public function update(FAQRequest $request, $id) 
	{
		DB::beginTransaction();

		try {

			$faq = FAQ::find($id);
			$faq->reference  = $request->reference;
			$faq->question   = $request->question;
			$faq->answer     = $request->answer;						
			$faq->save();
			
			DB::commit();

			return redirect()
				->route('faq.index')
				->with('success', 'Edited FAQ Successfully!');

		} catch (Exception $e) {
			
			DB::rollback();
            
            return redirect()
                ->route('faq.index')
                ->with('error', $e->getMessage());
		}
	}
	
	public function edit($id)
    {
		$faq = FAQ::find($id);
		
		if (!$faq) {
			
		}

        return view('faq.edit', compact('faq'));
    }
	
	public function show($id)
	{
		$faq = FAQ::find($id);

		if (!$faq) {
			
		}

		return view('faq.show', compact('faq'));
	}

	public function destroy($id)
	{
		$faq = FAQ::find($id);
		
		if (!$faq) {

		}

		DB::beginTransaction();
		
		try	{
                                
            $faq->delete();
            
			DB::commit();

			return redirect()
                ->route('faq.index')
                ->with('success', 'FAQ removed successfully!'); 
			
		} catch(Exception $e) {
			
			DB::rollback();

			return redirect()
                ->route('faq.index')
                ->with('error', $e->getMessage()); 
		}
	}
}
