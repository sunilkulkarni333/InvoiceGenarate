@extends('layouts.app-master')

@section('content')
    @auth    
    <section class="table-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="table-title-div">
                        <h2 class="table-title-h2">
                            <a href="{{ route('home.clientPayments',$user_id)}}">
                                <img src="{{ asset('images/arrow.png') }}" class="img-fluid" width="22" /> 
                                {{$userData->name}} Invoice
                            </a>
                        </h2>
                    </div>
                    <div class="table-button-div m-20">
                        <div class="table-button-div-left">
                        <a href="{{ route('home.clientMonthlyInvoice',[$user_id,$invoiceId,$month,$year])}}" class="btn cus-btn-white">Invoice</a>
                        <a href="{{ route('home.clientFees',[$user_id,$invoiceId,$month,$year]) }}" class="btn cus-btn-white cus-btn-active">Fulfillment Fees</a>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.partials.messages')
            
            <div class="row">
                <div class="col">
                    <div class="table-title-div">
                        <h2 class="grid-title-h2"> WAREHOUSE SERVICES</h2>
                        
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('home.clientFeesPost') }}">
                @csrf
                <input type="hidden" name="dataAvailable" value="{{$dataAvailable}}">
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="invoiceId" value="{{$invoiceId}}">
                <input type="hidden" name="month" value="{{$month}}">
                <input type="hidden" name="year" value="{{$year}}">                
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <!-- GRID -->
                        <div class="grid">
                            <h3 class="title-blue">Unloading/Loading Containers</h3>
                            <h4>Palletized</h4>
                            <div class="grid-flex">
                                <div>
                                    <h6>LTL</h6>
                                    <p>(Limited to 5 pallets)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="LTL" name="LTL" value="{{ $fees->WAREHOUSESERVICES->UnloadingLoadingContainers->Palletized->LTL}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>20ft Container</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="twentyftContainer" name="twentyftContainer" value="{{ $fees->WAREHOUSESERVICES->UnloadingLoadingContainers->Palletized->twentyftContainer}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>40ft Container</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="fourtyftContainer" name="fourtyftContainer" value="{{ $fees->WAREHOUSESERVICES->UnloadingLoadingContainers->Palletized->fourtyftContainer}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>53ft Container</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="fityThreeftContainer" name="fityThreeftContainer" value="{{ $fees->WAREHOUSESERVICES->UnloadingLoadingContainers->Palletized->fityThreeftContainer}}" required/>
                                </div>
                            </div>
                            <h4>Unpalletized</h4>
                            <div class="grid-flex">
                                <h6>Manual Unloading</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="ManualUnloading" name="ManualUnloading" value="{{ $fees->WAREHOUSESERVICES->UnloadingLoadingContainers->Unpalletized->ManualUnloading}}" required/>
                                </div>
                            </div>
                        </div><!-- /.GRID -->

                        <!-- GRID -->
                        <div class="grid">
                            <h3 class="title-blue">Receiving/Allocating</h3>
                            <div class="grid-flex">
                                <div>
                                    <h6>Receiving/ASN Fee</h6>
                                    <p>(Per PO) Late PO file $150*</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="ReceivingASNFee" name="ReceivingASNFee" value="{{ $fees->WAREHOUSESERVICES->ReceivingAllocating->ReceivingASNFee}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <div>
                                    <h6>Pallet Receiving / Allocating</h6>
                                    <p>(Single SKU pallet)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="PalletReceivingAllocating" name="PalletReceivingAllocating" value="{{ $fees->WAREHOUSESERVICES->ReceivingAllocating->PalletReceivingAllocating}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <div>
                                    <h6>Manual Receiving / Allocating</h6>
                                    <p>(Mixed Pallets / Unpalletized Boxes)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="ManualReceivingAllocating" name="ManualReceivingAllocating" value="{{ $fees->WAREHOUSESERVICES->ReceivingAllocating->ManualReceivingAllocating}}" required/>
                                </div>
                            </div>
                        </div><!-- /.GRID -->
        
                        <!-- GRID -->
                        <div class="grid">
                            <h3 class="title-blue">Supplies</h3>
                            <div class="grid-flex">
                                <div>
                                    <h6>Palletized Shrink Wrapping</h6>
                                    <p>(Per pallet)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="PalletizedShrinkWrapping" name="PalletizedShrinkWrapping" value="{{ $fees->WAREHOUSESERVICES->Supplies->PalletizedShrinkWrapping}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <div>
                                    <h6>Actual Cost of Material</h6>
                                    <p>(Boxes / Tapes / Fillers)</p>
                                </div>
                                <div>
                                    <span>+</span>
                                    <input type="text" class="txtChar" id="ActualCostofMaterial" name="ActualCostofMaterial" value="{{ $fees->WAREHOUSESERVICES->Supplies->ActualCostofMaterial}}" required/>
                                    <span>%</span>
                                </div>
                            </div>
                        </div><!-- /.GRID -->
        
                        <h2 class="grid-title-h2">FULFILLMENT FEES</h2>
        
                        <!-- GRID -->
                        <div class="grid">
                            <h3 class="title-blue">B2C Order Fulfillment</h3>
                            <div class="grid-flex">
                                <div>
                                    <h6 class="w-700">Order Fulfillment</h6>
                                    <p>(for 5,000+ orders/month)</p>
                                    <p class="second-p">(Including first item / Up to 10 lbs, over that + $0.20/lbs)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="OrderFulFillment" name="OrderFulFillment" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->OrderFulFillment}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>Order Fulfillment - (1,000 - 5,000 orders/month)</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="OrderFulFillment1000OrdersMonth" name="OrderFulFillment1000OrdersMonth" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->OrderFulFillment1000OrdersMonth}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>Order Fulfillment - (500 - 1,000 orders/month)</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="OrderFulFillment500OrdersMonth" name="OrderFulFillment500OrdersMonth" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->OrderFulFillment500OrdersMonth}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>Order Fulfillment - (0 - 500 orders/month)</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="OrderFulFillment0OrdersMonth" name="OrderFulFillment0OrdersMonth" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->OrderFulFillment0OrdersMonth}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <div>
                                    <h6 class="w-700">Additional Item Pick</h6>
                                    <p>(for 5,000+ orders/month)</p>
                                    <p class="second-p">(Up to 10 lbs, over that + $0.20/lbs)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="AdditionalItemPick" name="AdditionalItemPick" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->AdditionalItemPick}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>Additional Item Pick - (1,000 - 5,000 orders/month)</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="AdditionalItemPick1000" name="AdditionalItemPick1000" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->AdditionalItemPick1000}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>Additional Item Pick - (500 - 1,000 orders/month)</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="AdditionalItemPick500" name="AdditionalItemPick500" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->AdditionalItemPick500}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6>Additional Item Pick - (0 - 500 orders/month)</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="AdditionalItemPick0" name="AdditionalItemPick0" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->AdditionalItemPick0}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <h6 class="w-700">Labelling</h6>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="Labelling" name="Labelling" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->Labelling}}" required/>
                                </div>
                            </div>
                            <div class="grid-flex">
                                <div>
                                    <h6 class="w-700">Inserts</h6>
                                    <p>(If needed)</p>
                                </div>
                                <div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="Inserts" name="Inserts" value="{{ $fees->FULFILLMENTFEES->B2COrderFulfillment->Inserts}}" required/>
                                </div>
                            </div>
                        </div><!-- /.GRID -->
        
                            <h2 class="grid-title-h2">GENERAL FEES</h2>
        
                            <!-- GRID -->
                            <div class="grid">
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">Monthly Account Management</h6>
                                        <p>including email support . +$79 phone support</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="MonthlyAccountManagement" name="MonthlyAccountManagement" value="{{ $fees->GENERALFEES->MonthlyAccountManagement}}" required/>
                                    </div>
                                </div>
                                <div class="grid-flex">
                                    <h6 class="w-700">WMS (Software) Integration</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="WMSSoftwareIntegration" name="WMSSoftwareIntegration" value="{{ $fees->GENERALFEES->WMSSoftwareIntegration}}" required/>
                                    </div>
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">WMS (Software) Subscription</h6>
                                        <p>including 1 store additional store $49 (per store/month)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="WMSSoftwareSubscription" name="WMSSoftwareSubscription" value="{{ $fees->GENERALFEES->WMSSoftwareSubscription}}" required/>
                                    </div>
                                </div>
                                <div class="grid-flex">
                                    <h6 class="w-700">Online Live Inventory & Reports</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="OnlineLiveInventoryReports" name="OnlineLiveInventoryReports" value="{{ $fees->GENERALFEES->OnlineLiveInventoryReports}}" required/>
                                    </div>
                                </div>
                                <div class="grid-flex">
                                    <h6 class="w-700">Shipping Cost Margin</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="ShippingPercentage" name="ShippingPercentage" value="{{ $fees->GENERALFEES->ShippingPercentage}}" required/>
                                        <span>%</span>
                                    </div>
                                </div>
                            </div><!-- /.GRID -->
                        </div>
        
                        <div class="col-md-6 col-sm-6">
                            <!-- GRID -->
                            <div class="grid">
                                <h3 class="title-blue">Product Storage</h3>
                                <div class="grid-flex">
                                    <div>
                                        <h6>Standard Pallet Storage</h6>
                                        <p>(Max 55’’) 1st month</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="StandardPalletStorage" name="StandardPalletStorage" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->StandardPalletStorage}}" required/>
                                    </div>                                
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6>Large Pallet</h6>
                                        <p>(55 - 80 )</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="LargePallet" name="LargePallet" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->LargePallet}}" required/>
                                    </div>                                
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6>XLarge Pallet</h6>
                                        <p>(80 +)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="XLargePallet" name="XLargePallet" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->XLargePallet}}" required/>
                                    </div>                                
                                </div>
                                <div class="grid-flex">
                                    <h6>Floor Loaded Space</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="FloorLoadedSpace" name="FloorLoadedSpace" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->FloorLoadedSpace}}" required/>
                                    </div>                                
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6>Small Bins</h6>
                                        <p>(20"x11"x7")</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="SmallBins" name="SmallBins" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->SmallBins}}" required/>
                                    </div>                                
                                </div>
                                <div class="grid-flex">
                                    <h6>Medium Bins</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="MediumBins" name="MediumBins" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->MediumBins}}" required/>
                                    </div>                                
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6>Large Bins</h6>
                                        <p>(26" x 17" x12")</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="LargeBins" name="LargeBins" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->LargeBins}}" required/>
                                    </div>                               
                                </div>
                                <div class="grid-flex">
                                    <h6>Temperature Control Pallet Storage</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="TemperatureControlPalletStorage" name="TemperatureControlPalletStorage" value="{{ $fees->WAREHOUSESERVICES->ProductStorage->TemperatureControlPalletStorage}}" required/>
                                    </div>                                
                                </div>
                            </div><!-- /.GRID -->
            
                            <!-- GRID -->
                            <div class="grid">
                                <h3 class="title-blue">Additional Services</h3>
                                <div class="grid-flex">
                                    <div>
                                        <h6>Photographs</h6>
                                        <p>(4 pictures/Items)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="PhotoGraphs" name="PhotoGraphs" value="{{ $fees->WAREHOUSESERVICES->AdditionalServices->PhotoGraphs}}" required/>
                                    </div>          
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6>Recycle/Disposal</h6>
                                        <p>(Per Ibs)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="RecycleDisposal" name="RecycleDisposal" value="{{ $fees->WAREHOUSESERVICES->AdditionalServices->RecycleDisposal}}" required/>
                                    </div>          
                                </div>
                                <div class="grid-flex">
                                    <h6>Cycle Count/ Inventory Count</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="CycleCountInventoryCount" name="CycleCountInventoryCount" value="{{ $fees->WAREHOUSESERVICES->AdditionalServices->CycleCountInventoryCount}}" required/>
                                    </div>          
                                </div>
                                <div class="grid-flex">
                                    <h6>Custom API Integration</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="CustomAPIIntegration" name="CustomAPIIntegration" value="{{ $fees->WAREHOUSESERVICES->AdditionalServices->CustomAPIIntegration}}" required/>
                                    </div>          
                                </div>
                                <div class="grid-flex">
                                    <h6>Custom EDI Integration</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="CustomEDIIntegration" name="CustomEDIIntegration" value="{{ $fees->WAREHOUSESERVICES->AdditionalServices->CustomEDIIntegration}}" required/>
                                    </div>          
                                </div>
                            </div><!-- /.GRID -->
            
                            <!-- GRID -->
                            <div class="grid">
                                <h3 class="title-blue">B2B Order Fulfillment</h3>
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">Case/Master Carton picking</h6>
                                        <p>(Up to 10 lbs, over that + $0.20/lbs)</p>
                                        <p class="second-p">Pricing for Cross-Docking or Pallet-in/out operation, see "Unloading / Loading Containers* Section on next page</p>
                                    </div>
                                    <span>$</span>
                                    <input type="text" class="txtChar" id="CaseMasterCartonPicking" name="CaseMasterCartonPicking" value="{{ $fees->FULFILLMENTFEES->B2BOrderFulfillment->CaseMasterCartonPicking}}" required/>
                                </div>
                            </div><!-- /.GRID -->
            
                            <!-- GRID -->
                            <div class="grid">
                                <h3 class="title-blue">E-com Return Management</h3>
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">Shipment Incl. Q/A reporting</h6>
                                        <p>(Per pallet)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="ShipmentInclQAreporting" name="ShipmentInclQAreporting" value="{{ $fees->FULFILLMENTFEES->EcomReturnManagement->ShipmentInclQAreporting}}" required/>
                                    </div>    
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">Return per item</h6>
                                        <p>(Max 10 lbs)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="ReturnPerItem" name="ReturnPerItem" value="{{ $fees->FULFILLMENTFEES->EcomReturnManagement->ReturnPerItem}}" required/>
                                    </div>    
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">Return per order</h6>
                                        <p>(Max 10 lbs)</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="ReturnPerOrder" name="ReturnPerOrder" value="{{ $fees->FULFILLMENTFEES->EcomReturnManagement->ReturnPerOrder}}" required/>
                                    </div>    
                                </div>
                            </div><!-- /.GRID -->
            
                            <!-- GRID -->
                            <div class="grid">
                                <h3 class="title-blue">Repacking & Special Project Preparation</h3>
                                
                                <div class="grid-flex">
                                    <h6 class="w-700">Repacking & Kitting</h6>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="RepackingKitting" name="RepackingKitting" value="{{ $fees->FULFILLMENTFEES->RepackingSpecialProjectPreparation->RepackingKitting}}" required/>
                                    </div>  
                                </div>
                                <div class="grid-flex">
                                    <div>
                                        <h6 class="w-700">Urgent & Rush Project Prep</h6>
                                        <p>24h notice</p>
                                    </div>
                                    <div>
                                        <span>$</span>
                                        <input type="text" class="txtChar" id="UrgentRushProjectPrep" name="UrgentRushProjectPrep" value="{{ $fees->FULFILLMENTFEES->RepackingSpecialProjectPreparation->UrgentRushProjectPrep}}" required/>
                                    </div>  
                                </div>
                            </div><!-- /.GRID -->
                        </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="table-button-div-ceter">    
                            <a href="{{ route('home.clientFees',[$user_id,$invoiceId,$month,$year]) }}" class="btn cus-btn-white">Cancel</a>                        
                            <button  class="btn cus-btn-or" type="submit">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </section>
    @endauth  
@endsection