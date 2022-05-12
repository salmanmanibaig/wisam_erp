<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SmTender;

class SmItem extends Model
{
    public function category(){
    	return $this->belongsTo('App\SmItemCategory', 'category_name', 'id');
    }


    public static function getItemName($id){
    	if(!empty($id)){
    		$item = SmItem::find($id);
    		return @$item->item_name;
    	}else{
    		return 'NA';
    	}
    }

 

    public static function getProjectName($id){
        if(!empty($id)){
            $Tender = \Modules\Project\Entities\InfixProject::find($id);
            if(!empty($Tender)){
                $str = $Tender->name;
                return @$str;
            }else{
                return 'project is not available right now.';
            }
        }else{
            return 'NA';
        }
    }

    public static function getProductNo($id){
        $product_receive = SmItemReceive::where('product_id', $id)->sum('qnt');
        $product_sale = SmTenderProduct::where('product_id', $id)->sum('qnt');
        return $product_receive - $product_sale;
    }


    public static function getSubcategoryName($id){
        if(!empty($id)){
            $d = SmItemSubcategory::find($id);
            if(!empty($d)){ 
                return @$d->sub_category_name;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }



}
