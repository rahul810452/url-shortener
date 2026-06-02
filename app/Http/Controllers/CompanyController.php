<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();

        return view(
            'companies.index',
            compact('companies')
        );
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required',
            'company_email'=>'nullable|email',
            'company_phone'=>'nullable'
        ]);

        Company::create($request->all());

        return redirect()
            ->route('companies.index')
            ->with('success','Company Created');
    }

    public function edit(Company $company)
    {
        return view(
            'companies.edit',
            compact('company')
        );
    }

    public function update(
        Request $request,
        Company $company
    )
    {
        $request->validate([
            'company_name'=>'required'
        ]);

        $company->update(
            $request->all()
        );

        return redirect()
            ->route('companies.index')
            ->with('success','Company Updated');
    }

    public function destroy(
        Company $company
    )
    {
        $company->delete();

        return back();
    }
}
