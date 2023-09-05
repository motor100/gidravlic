<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CalculatorController extends Controller
{
    public function calculators(): View
    {
        return view('calculators.calculators');
    }
    
    public function raschet_moshchnosti_raskhoda_i_davleniya_gidroprivoda(): View
    {
        return view('calculators.raschet-moshchnosti-raskhoda-i-davleniya-gidroprivoda');
    }

    public function raschet_diametra_truboprovoda_skorosti_potoka(): View
    {
        return view('calculators.raschet-diametra-truboprovoda-skorosti-potoka');
    }

    public function raschet_parametrov_gidrocilindra_po_ego_razmeram(): View
    {
        return view('calculators.raschet-parametrov-gidrocilindra-po-ego-razmeram');
    }

    public function raschet_razmerov_gidrocilindra_po_tekhnicheskim_parametram(): View
    {
        return view('calculators.raschet-razmerov-gidrocilindra-po-tekhnicheskim-parametram');
    }

    public function raschet_podachi_nasosa(): View
    {
        return view('calculators.raschet-podachi-nasosa');
    }

    public function raschet_oborotov_gidromotora(): View
    {
        return view('calculators.raschet-oborotov-gidromotora');
    }

    public function raschet_krutyashchego_momenta_gidromotora_obem_i_davlenie(): View
    {
        return view('calculators.raschet-krutyashchego-momenta-gidromotora-obem-i-davlenie');
    }

    public function raschet_krutyashchego_momenta_na_valu_moshchnost_i_oboroty(): View
    {
        return view('calculators.raschet-krutyashchego-momenta-na-valu-moshchnost-i-oboroty');
    }

    public function raschet_obema_plastinchatogo_nasosa_po_geometricheskim_razmeram(): View
    {
        return view('calculators.raschet-obema-plastinchatogo-nasosa-po-geometricheskim-razmeram');
    }

    public function raschet_obema_shesterennogo_nasosa_po_geometricheskim_razmeram(): View
    {
        return view('calculators.raschet-obema-shesterennogo-nasosa-po-geometricheskim-razmeram');
    }
}
