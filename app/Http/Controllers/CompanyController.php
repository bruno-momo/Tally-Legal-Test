<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCompany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    ///MOSTRAR
    public function index(){
        //$companies = Company::orderBy('id', 'desc')->paginate(10);
        $companies = DB::table('companies')->join('partners', 'companies.id', '=', 'partners.company_id')->orderBy('company_id', 'desc')->paginate(10);
        //return compact(auth());
        return view('companies', compact('companies'));
    } /* Vista de empresas */
    public function show($id){
        $company = DB::table('companies')->join('partners', 'companies.id', '=', 'partners.company_id')->where('companies.id', $id)->get()[0];
        return view('company.show', compact('company'));
    } /* Vista de una empresa con sus empleados */
    //CREAR
    public function create(){
        return view('company.create');
    } /* Formulario para agregar una empresa */
    public function store(StoreCompany $request){
        $company = new Company();
        $company->companyname = $request->companyname;
        $company->companybs = $request->companybs;
        $company->website = $request->website;
        $company->save();
        $partner = new Partner();
        $partner->firstname = $request->firstname;
        $partner->lastname = $request->lastname;
        $partner->company_id = $company->id;
        $partner->email = $request->email;
        $partner->phonenumber = $request->phonenumber;
        $partner->address = $request->address;
        $partner->save();
        return redirect()->route('company.create');
    } /* Post para guardar una empresa */
    //EDITAR
    public function edit($id){
        $company = DB::table('companies')->join('partners', 'companies.id', '=', 'partners.company_id')->where('companies.id', $id)->get()[0];
        return view('company.edit', compact('company'));
    } /* Edición de los datos de una empresa */
    public function update($id, StoreCompany $request){
        $company = Company::find($id);
        $company->companyname = $request->companyname;
        $company->companyname = $request->companyname;
        $company->companybs = $request->companybs;
        $company->website = $request->website;
        $company->save();
        $partner = Partner::where('partners.company_id', $id)->get()[0];
        $partner->firstname = $request->firstname;
        $partner->lastname = $request->lastname;
        $partner->company_id = $company->id;
        $partner->email = $request->email;
        $partner->phonenumber = $request->phonenumber;
        $partner->address = $request->address;
        $partner->save();
        return redirect()->route('companies');
    } /* Post para actualizar una empresa */
    //ELIMINAR
    public function destroy($id){
        DB::table('partners')->where('partners.company_id', $id)->delete();
        DB::table('companies')->where('companies.id', $id)->delete();
        return redirect()->route('companies');
    }
}
