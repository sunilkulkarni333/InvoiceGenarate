<?php

namespace App\Http\Controllers;

use App\Models\general_fees;
use App\Models\client_fees;
use App\Models\user;
use App\Models\client_monthly_invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $map;

    public function __construct()
    {
        $this->map = array();
    }

    public function index() 
    {       
        $clients = user::where('role',1)->paginate(20);        
        return view('home.index',compact('clients'));
    }

    public function addClient(){
        return view('home.addClient');
    }

    public function saveClient(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'client_id' => 'required',
            'location' => 'required',
        ]);

        $request->role = 1;

        user::create($request->all());
        return redirect()->route('home.index')->with('success', 'Added successfully.');
    }

    public function editClient($userInfo){
        $userData = user::find($userInfo);        
        return view('home.editClient',compact('userData'));
    }

    public function updateClient(Request $request){        
        $validated = $request->validate([
            'email' => 'unique:users,email,'.$request->id,
            'name' => 'required',
            'client_id' => 'required',
            'location' => 'required',
        ]);             
        $data = ['name' => $request->name,'email' => $request->email,'client_id' => $request->client_id,'location' => $request->location];
        user::whereId($request->id)->update($data);
        return redirect()->route('home.index')->with('success', 'Updated successfully.');
    }

    public function deleteClient($userId){                         
        $userData = user::find($userId);
        $userData->delete();
        return redirect()->route('home.index')->with('success', 'Deleted successfully.');
    }

    public function clientPaymentsList($user_id){
        $userData = user::find($user_id);
        return view('clientDetails.clientPaymentList',compact('user_id','userData'));
    }

    public function clientMonthlyInvoice($user_id,$invoiceId,$month,$year){
        $userData = user::find($user_id);
        return view('clientDetails.clientMonthlyInvoice',compact('user_id','invoiceId','month','year','userData'));
    }

    public function clientFees($user_id,$invoiceId,$month,$year){
        $userData = user::find($user_id);
        $clientData = client_fees::where('client_id',$user_id)->get();          
        if(count($clientData) > 0){
            $dataAvailable = 1;
            $fees = json_decode($clientData[0]->fullfillment_fees);
        }else{
            $dataAvailable = 2;
            $generalfees = general_fees::all();
            $fees = json_decode($generalfees[0]->fullfillment_fees);     
        }        
        return view('clientDetails.clientFees',compact('user_id','invoiceId','month','year','userData','fees','dataAvailable'));
    }

    public function clientFeesPost(Request $request){        
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
                             "PhotoGraphs": "'.$request->PhotoGraphs.'",
                             "RecycleDisposal": "'.$request->RecycleDisposal.'",
                             "CycleCountInventoryCount": "'.$request->CycleCountInventoryCount.'",
                             "CustomAPIIntegration": "'.$request->CustomAPIIntegration.'",
                             "CustomEDIIntegration": "'.$request->CustomEDIIntegration.'"
                         }
                     },
                     "FULFILLMENTFEES": {
                         "B2COrderFulfillment": {
                             "OrderFulFillment": "'.$request->OrderFulFillment.'",
                             "OrderFulFillment1000OrdersMonth": "'.$request->OrderFulFillment1000OrdersMonth.'",
                             "OrderFulFillment500OrdersMonth": "'.$request->OrderFulFillment500OrdersMonth.'",
                             "OrderFulFillment0OrdersMonth": "'.$request->OrderFulFillment0OrdersMonth.'",
                             "AdditionalItemPick": "'.$request->AdditionalItemPick.'",
                             "AdditionalItemPick1000": "'.$request->AdditionalItemPick1000.'",
                             "AdditionalItemPick500": "'.$request->AdditionalItemPick500.'",
                             "AdditionalItemPick0": "'.$request->AdditionalItemPick0.'",
                             "Labelling": "'.$request->Labelling.'",
                             "Inserts": "'.$request->Inserts.'"
                         },
                         "B2BOrderFulfillment": {
                             "CaseMasterCartonPicking": "'.$request->CaseMasterCartonPicking.'"
                         },
                         "EcomReturnManagement": {
                             "ShipmentInclQAreporting": "'.$request->ShipmentInclQAreporting.'",
                             "ReturnPerItem": "'.$request->ReturnPerItem.'",
                             "ReturnPerOrder": "'.$request->ReturnPerOrder.'"
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
                         "OnlineLiveInventoryReports": "'.$request->OnlineLiveInventoryReports.'",
                         "ShippingPercentage": "'.$request->ShippingPercentage.'"
                     }
                 }';
 
        if($request->dataAvailable == 1){
            DB::table("client_fees")->where('client_id', $request->user_id)->update(['fullfillment_fees' => $data,'updated_at'=>date('Y-m-d H:i:s')]);
        }else{
            DB::table("client_fees")->insert(['fullfillment_fees' => $data,'client_id' => $request->user_id,'created_at'=>date('Y-m-d H:i:s')]);
        }

        return redirect()->route('home.clientFees',[$request->user_id,$request->invoiceId,$request->month,$request->year])->withsuccess('Updated Successfully');
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
                    "PhotoGraphs": "'.$request->PhotoGraphs.'",
                    "RecycleDisposal": "'.$request->RecycleDisposal.'",
                    "CycleCountInventoryCount": "'.$request->CycleCountInventoryCount.'",
                    "CustomAPIIntegration": "'.$request->CustomAPIIntegration.'",
                    "CustomEDIIntegration": "'.$request->CustomEDIIntegration.'"
                }
            },
            "FULFILLMENTFEES": {
                "B2COrderFulfillment": {
                    "OrderFulFillment": "'.$request->OrderFulFillment.'",
                    "OrderFulFillment1000OrdersMonth": "'.$request->OrderFulFillment1000OrdersMonth.'",
                    "OrderFulFillment500OrdersMonth": "'.$request->OrderFulFillment500OrdersMonth.'",
                    "OrderFulFillment0OrdersMonth": "'.$request->OrderFulFillment0OrdersMonth.'",
                    "AdditionalItemPick": "'.$request->AdditionalItemPick.'",
                    "AdditionalItemPick1000": "'.$request->AdditionalItemPick1000.'",
                    "AdditionalItemPick500": "'.$request->AdditionalItemPick500.'",
                    "AdditionalItemPick0": "'.$request->AdditionalItemPick0.'",
                    "Labelling": "'.$request->Labelling.'",
                    "Inserts": "'.$request->Inserts.'"
                },
                "B2BOrderFulfillment": {
                    "CaseMasterCartonPicking": "'.$request->CaseMasterCartonPicking.'"
                },
                "EcomReturnManagement": {
                    "ShipmentInclQAreporting": "'.$request->ShipmentInclQAreporting.'",
                    "ReturnPerItem": "'.$request->ReturnPerItem.'",
                    "ReturnPerOrder": "'.$request->ReturnPerOrder.'"
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
                "OnlineLiveInventoryReports": "'.$request->OnlineLiveInventoryReports.'",
                "ShippingPercentage": "'.$request->ShippingPercentage.'"
            }
        }';

        DB::table("general_fees")->update(['fullfillment_fees' => $data]);

        return redirect()->route('home.generalFees')->withsuccess('Updated Successfully');
    }

    public function addClientLineItem(Request $request){        
        $validated = $request->validate([
            'activity' => 'required',
            'description' => 'required',
            'qty' => 'required',
            'rate' => 'required',            
        ]);  
        
        $data = ['activity' => $request->activity,'description' => $request->description,'qty' => $request->qty,'rate' => $request->rate,
                'client_id' => $request->client_id,'month' => date('M'),'year' =>date('Y'),'status' => 1];

        client_monthly_invoices::create($data);
        return redirect()->route('home.clientMonthlyInvoice',[$request->client_id,$request->invoiceId,$request->month,$request->year])->withsuccess('Updated Successfully');
    }

    public function wareHouseAccess(){
        $clients = user::select('id','name')->where('role',1)->get();  
        return view('wareHouseAccess',compact('clients'));
    }

    public function getClientService(Request $request){
        $client_fees =  client_fees::where('client_id',$request->client_id)->get();
        $service = array();                
        if(count($client_fees) > 0){            
            $fees = json_decode($client_fees[0]->fullfillment_fees, true);
            $service = $this->getFormateServices($fees);
            foreach($this->map as $data){
                foreach($data as $key=>$value){
                    $service[$key] = $value;
                }
            }            
            return  response()->json($service,200);
        }else{
            $service['status'] = 0;
            return response()->json($service,200);
        }
    }

    function getFormateServices($fees, $depth = 0) {
        foreach ($fees as $key => $value) {
            if(is_array($value)){                
                $this->getFormateServices($value, $depth + 1);
            }else{ 
                array_push($this->map,array($key=>$value));                                     
            }
        }        
    }

    public function addClientService(Request $request){
        $validated = $request->validate([
            'client_id' => 'required',
            'activity' => 'required',
            'qty' => 'required',
            'description' => 'required',            
        ]);  
        
        $data = ['activity_key' => $request->activity,'activity'=>$request->serviceSpaceValue,'description' => $request->description,'qty' => $request->qty,'rate' => $request->serviceValue,
        'client_id' => $request->client_id,'month' => date('M'),'year' =>date('Y'),'status' => 0];

        client_monthly_invoices::create($data);
        return redirect()->route('wareHouseAccess')->withsuccess('Added Successfully');
    }


    public function viewRequestedItems($user_id,$invoiceId,$month,$year){
        $userData = user::find($user_id);
        $wareHouseRequest = client_monthly_invoices::where('month','Dec')->where('year','2023')->where('client_id',$user_id)->where('status',0)->paginate(20);        
        return view('clientDetails.requestedWarehouseList',compact('user_id','invoiceId','month','year','userData','wareHouseRequest'));
    }
}