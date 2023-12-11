<?php

namespace App\Http\Controllers;

use App\Models\general_fees;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {       
        $clients = user::where('role',1)->paginate(20);        
        return view('home.index',compact('clients'));
    }

    public function clientInvoices(){
        return view('home.clientInvoices');
    }

    public function generalFees(){
        $generalfees = general_fees::all();
        $fees = json_decode($generalfees[0]->fullfillment_fees);
        //dd($fees);           
        return view('home.generalFees',compact('fees'));
    }

    public function generalFeesPost(Request $request){

       $data = '{
                    "WAREHOUSESERVICES": {
                        "UnloadingLoadingContainers": {
                            "Palletized": {
                                "LTL": "'.$request->LTL.'",
                                "twentyftContainer": "'.$request->twentyftContainer.'",
                                "fourtyftContainer": "'.$request->fourtyftContainer.'",
                                "fityThreeftContainer": "'.$request->fityThreeftContainer.'"
                            },
                            "Unpalletized": {
                                "ManualUnloading": "'.$request->ManualUnloading.'"
                            }
                        },
                        "ReceivingAllocating": {
                            "ReceivingASNFee": "'.$request->ReceivingASNFee.'",
                            "PalletReceivingAllocating": "'.$request->PalletReceivingAllocating.'",
                            "ManualReceivingAllocating": "'.$request->ManualReceivingAllocating.'"
                        },
                        "Supplies": {
                            "PalletizedShrinkWrapping": "'.$request->PalletizedShrinkWrapping.'",
                            "ActualCostofMaterial": "'.$request->ActualCostofMaterial.'"
                        },
                        "ProductStorage": {
                            "StandardPalletStorage": "'.$request->StandardPalletStorage.'",
                            "LargePallet": "'.$request->LargePallet.'",
                            "XLargePallet": "'.$request->XLargePallet.'",
                            "FloorLoadedSpace": "'.$request->FloorLoadedSpace.'",
                            "SmallBins": "'.$request->SmallBins.'",
                            "MediumBins": "'.$request->MediumBins.'",
                            "LargeBins": "'.$request->LargeBins.'",
                            "TemperatureControlPalletStorage": "'.$request->TemperatureControlPalletStorage.'"
                        },
                        "AdditionalServices": {
                            "Photographs": "'.$request->Photographs.'",
                            "RecycleDisposal": "'.$request->RecycleDisposal.'",
                            "CycleCountInventoryCount": "'.$request->CycleCountInventoryCount.'",
                            "CustomAPIIntegration": "'.$request->CustomAPIIntegration.'",
                            "CustomEDIIntegration": "'.$request->CustomEDIIntegration.'"
                        }
                    },
                    "FULFILLMENTFEES": {
                        "B2COrderFulfillment": {
                            "OrderFulfillment": "'.$request->OrderFulfillment.'",
                            "OrderFulfillment1000ordersmonth": "'.$request->OrderFulfillment1000ordersmonth.'",
                            "OrderFulfillment500ordersmonth": "'.$request->OrderFulfillment500ordersmonth.'",
                            "OrderFulfillment0ordersmonth": "'.$request->OrderFulfillment0ordersmonth.'",
                            "AdditionalItemPick": "'.$request->AdditionalItemPick.'",
                            "AdditionalItemPick1000": "'.$request->AdditionalItemPick1000.'",
                            "AdditionalItemPick500": "'.$request->AdditionalItemPick500.'",
                            "AdditionalItemPick0": "'.$request->AdditionalItemPick0.'",
                            "Labelling": "'.$request->Labelling.'",
                            "Inserts": "'.$request->Inserts.'"
                        },
                        "B2BOrderFulfillment": {
                            "CaseMasterCartonpicking": "'.$request->CaseMasterCartonpicking.'"
                        },
                        "EcomReturnManagement": {
                            "ShipmentInclQAreporting": "'.$request->ShipmentInclQAreporting.'",
                            "Returnperitem": "'.$request->Returnperitem.'",
                            "Returnperorde": "'.$request->Returnperorde.'"
                        },
                        "RepackingSpecialProjectPreparation": {
                            "RepackingKitting": "'.$request->RepackingKitting.'",
                            "UrgentRushProjectPrep": "'.$request->UrgentRushProjectPrep.'"
                        }
                    },
                    "GENERALFEES": {
                        "MonthlyAccountManagement": "'.$request->MonthlyAccountManagement.'",
                        "WMSSoftwareIntegration": "'.$request->WMSSoftwareIntegration.'",
                        "WMSSoftwareSubscription": "'.$request->WMSSoftwareSubscription.'",
                        "OnlineLiveInventoryReports": "'.$request->OnlineLiveInventoryReports.'"
                    }
                }';

        DB::table("general_fees")->update(['fullfillment_fees' => $data]);

        return redirect()->route('home.generalFees')->withsuccess('Updated Successfully');
    }
}