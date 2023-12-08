<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $test = array('WAREHOUSESERVICES' => 
                    array('Unloading/LoadingContainers' => 
                        array('Palletized' => 
                                array(
                                    array('LTL' => '12.90','subTitle' => '(Limited to 5 pallets)'),
                                    '20ftContainer' => '290.00',
                                    '40ftContainer' => '390.00' ,
                                    '53ftContainer' => '500.00'
                                ),
                            'Unpalletized' => 
                             array(
                                'ManualUnloading' => '44.00'
                            )
                        ),
                        'Receiving/Allocating' => 
                            array(
                                array('Receiving/ASNFee' => '11.00','subTitle' => '(Per PO) Late PO file $150*'),
                                array('PalletReceiving/Allocating' => '11.00','subTitle' => '(Single SKU pallet)'),
                                array('ManualReceiving/Allocating' => '44.00','subTitle' => '(Mixed Pallets / Unpalletized Boxes)')
                            ),
                        'Supplies' => 
                            array(
                                array('PalletizedShrinkWrapping' => '6.50','subTitle' => '(Per pallet)'),
                                array('ActualCostofMaterial' => '15','subTitle' => '(Boxes / Tapes / Fillers)')                            
                            ),
                        'ProductStorage' => 
                            array(
                                array('StandardPalletStorage' => '34.50','subTitle' => '(Max 55) 1st month'),
                                array('LargePallet' => '41.50','subTitle' => '(55 - 80 )'),
                                array('XLargePallet' => '45.50','subTitle' => '(80 +)'),
                                array('FloorLoadedSpace' => '5.10','subTitle' => ''),
                                array('SmallBins' => '3.00','subTitle' => '(20"x11"x7")'),
                                array('MediumBins' => '5.00','subTitle' => ''),                            
                                array('LargeBins' => '7.00','subTitle' => '(26" x 17" x12")'),
                                array('TemperatureControlPalletStorage' => '49.00','subTitle' => '')
                            ),
                        'AdditionalServices' => 
                            array(
                                array('Photographs' => '7.00','subTitle' => '(4 pictures/Items)'),
                                array('Recycle/Disposal' => '0.75','subTitle' => '(Per Ibs)'),
                                array('Cycle Count/ Inventory Count' => '44.00','subTitle' => ''),
                                array('Custom API Integration' => '499','subTitle' => ''),
                                array('Custom EDI Integration' => '49.00','subTitle' => '')                               
                            )
                    ),
                    'FULFILLMENTFEES' => 
                        array('B2COrderFulfillment' => 
                            array(
                                array('OrderFulfillment' => '1.70','subTitle' => '(for 5,000+ orders/month)','subSubTitle' => '(Including first item / Up to 10 lbs, over that + $0.20/lbs)','h1tag' => 'yes'),
                                'OrderFulfillment-(1000-5000orders/month)' => '1.90',
                                'OrderFulfillment-(500-1000orders/month)' => '2.40' ,
                                'OrderFulfillment-(0-500orders/month)' => '2.85',
                                array('AdditionalItemPick' => '0.30','subTitle' => '(for 5,000+ orders/month)','subSubTitle' => '(Up to 10 lbs, over that + $0.20/lbs)','h1tag' => 'yes'),
                                'AdditionalItemPick-(1000-5000orders/month)' => '0.35',
                                'AdditionalItemPick-(500-1000orders/month)' => '0.45',
                                'AdditionalItemPick-(0-500orders/month)' => '0.70',
                                array('Labelling' => '0.50','h1tag' => 'yes'),
                                array('Inserts' => '0.25','subTitle' => '(If needed)','h1tag' => 'yes')
                            ),                            
                            'B2BOrderFulfillment' => 
                                array('Case/MasterCartonpicking' => '2.85','subTitle' => '(Up to 10 lbs, over that + $0.20/lbs)','subSubTitle' => 'Pricing for Cross-Docking or Pallet-in/out operation, see Unloading / Loading Containers* Section on next page','h1tag' => 'yes'),
                            'E-comReturnManagement' => 
                                array(
                                    array('ShipmentIncl.Q/Areporting' => '5.00','subTitle' => 'Per pallet','h1tag' => 'yes'),
                                    array('Returnperitem' => '1.85','subTitle' => '(Max 10 lbs)','h1tag' => 'yes'),
                                    array('Returnperorde' => '4.00','subTitle' => '(Max 10 lbs)','h1tag' => 'yes')
                                ),
                            'Repacking&SpecialProjectPreparation' => 
                                array(
                                    array('Repacking&Kitting' => '44.00','subTitle' => '','h1tag' => 'yes'),
                                    array('Urgent&RushProjectPrep' => '55.00','subTitle' => '24h notice','h1tag' => 'yes')                                    
                                ),
                        ),
                    'GENERALFEES' => 
                        array(array('MonthlyAccountManagement' => '99.00','subTitle' => 'including email support . +$79 phone support','h1tag' => 'yes'),
                                    array('WMS(Software)Integration' => 'FREE','h1tag' => 'yes'),
                                    array('WMS(Software)Subscription' => '99.00','subTitle' => 'including 1 store additional store $49 (per store/month','h1tag' => 'yes'),
                                    array('OnlineLiveInventory&Reports' => 'FREE','h1tag' => 'yes')
                            )
                );

        dd($test);
        return view('home.index');
    }
}