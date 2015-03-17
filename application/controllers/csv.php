<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class csv extends CI_Controller {

	
    public function importcsv_cutsize1() {
        $this->nplan_model->truncate();

            if($_FILES["csv_cutsize1"]["tmp_name"]==null){
                redirect('home/import','refresh');

            }elseif ($_FILES["csv_cutsize1"]["tmp_name"]!=null) {
                //move_uploaded_file($_FILES["csv_cutsize1"]["tmp_name"],$_FILES["csv_cutsize1"]["name"]); // Copy/Upload CSV
                
                $objCSV = fopen($_FILES["csv_cutsize1"]["tmp_name"], "r");
               //exit();
                $cut_size = 1;
                fgetcsv($objCSV);
                while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
                    //echo $objArr[0];
                    if(isset($objArr[0])){
                        $obj0 = date_create($objArr[0]);
                        $start_date = date_format($obj0, 'Y-m-d H:i:s');
                       // $start_date = date('Y-m-d H:i:s', strtotime($objArr[0]));
                    }else{
                        $start_date = null;
                    }
                    if(isset($objArr[1])){
                        $obj1 = date_create($objArr[1]);
                        $finish_date = date_format($obj1, 'Y-m-d H:i:s');
                        //$finish_date = date('Y-m-d H:i:s', strtotime($objArr[1]));
                    }else{
                        $finish_date = null;
                    }
                    if(isset($objArr[2])){
                        $obj2 = date_create($objArr[2]);
                        $DTWH = date_format($obj2, 'Y-m-d H:i:s');
                        //$DTWH = date('Y-m-d', strtotime($objArr[2]));                    
                    }else{
                        $DTWH = null;
                    }
                    if(isset($objArr[3])){
                        $obj3 = date_create($objArr[3]);
                        $load_date = date_format($obj3, 'Y-m-d H:i:s');
                        //$load_date = date('Y-m-d', strtotime($objArr[3]));
                    }else{
                        $load_date = null;
                    }

                    $strSQL = "INSERT INTO nplan ";
                    $strSQL .="(start_date, finish_date, DTWH, load_date, order_no, grade, cutter, bw, size, cap, brand, eo, co, material, material_desc, prod_qty_ton, prod_qty_class, rm_per_pallet, wrapper, box_lid, pallet_size, mdf_size, pl_qty, mdf_qty, material_note, dom_per_exp, country, sale_rep_remark, cut_size , status) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$start_date."','".$finish_date."','".$DTWH."','".$objArr[3]."','".$objArr[4]."' ";
                    $strSQL .=",'".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."' ";  
                    $strSQL .=",'".$objArr[10]."','".$objArr[11]."','".$objArr[12]."','".$objArr[13]."','".$objArr[14]."' ";
                    $strSQL .=",'".$objArr[15]."','".$objArr[16]."','".$objArr[17]."','".$objArr[18]."','".$objArr[19]."' ";  
                    $strSQL .=",'".$objArr[20]."','".$objArr[21]."','".$objArr[22]."','".$objArr[23]."','".$objArr[24]."' ";  
                    $strSQL .=",'".$objArr[25]."','".$objArr[26]."','".$objArr[27]."','".$cut_size."','0') ";
                    $objQuery = mysql_query($strSQL);
                }
                fclose($objCSV);

                /*
                 nplan.Status
                 0 = ยังไม่ทำ
                 1 = กำลังทำ
                 2 = เสร็จแล้ว
                 3 = งานค้าง
                */

                 // setสถานะที่เสร็จแล้ว //
                $InData = array(
                    'cut_size' => 1,
                    'status' => 2 
                    );
                $getupdateStatus =$this->nplan_model->updateImportStatus($InData);
               
               // echo "<Pre>";
               // print_r($getupdateStatus);
                redirect('dashboard/import_done_ct1','refresh');
            }
 
    } 
    public function importcsv_cutsize4() {
        $this->nplan4_model->truncate();

            if($_FILES["csv_cutsize4"]["tmp_name"]==null){
                redirect('home/import','refresh');

            }elseif ($_FILES["csv_cutsize4"]["tmp_name"]!=null) {
                //move_uploaded_file($_FILES["csv_cutsize4"]["tmp_name"],$_FILES["csv_cutsize4"]["name"]); // Copy/Upload CSV
                $objCSV = fopen($_FILES["csv_cutsize4"]["tmp_name"], "r");
                $cut_size = 4;
                fgetcsv($objCSV);
                while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
                    //echo $objArr[0];
                    if(isset($objArr[0])){
                        $obj0 = date_create($objArr[0]);
                        $start_date = date_format($obj0, 'Y-m-d H:i:s');
                       // $start_date = date('Y-m-d H:i:s', strtotime($objArr[0]));
                    }else{
                        $start_date = null;
                    }
                    if(isset($objArr[1])){
                        $obj1 = date_create($objArr[1]);
                        $finish_date = date_format($obj1, 'Y-m-d H:i:s');
                        //$finish_date = date('Y-m-d H:i:s', strtotime($objArr[1]));
                    }else{
                        $finish_date = null;
                    }
                    if(isset($objArr[2])){
                        $obj2 = date_create($objArr[2]);
                        $DTWH = date_format($obj2, 'Y-m-d H:i:s');
                        //$DTWH = date('Y-m-d', strtotime($objArr[2]));                    
                    }else{
                        $DTWH = null;
                    }
                    if(isset($objArr[3])){
                        $obj3 = date_create($objArr[3]);
                        $load_date = date_format($obj3, 'Y-m-d H:i:s');
                        //$load_date = date('Y-m-d', strtotime($objArr[3]));
                    }else{
                        $load_date = null;
                    }

                    $strSQL = "INSERT INTO nplan4 ";
                    $strSQL .="(start_date, finish_date, DTWH, load_date, order_no, grade, cutter, bw, size, cap, brand, eo, co, material, material_desc, prod_qty_ton, prod_qty_class, rm_per_pallet, wrapper, box_lid, pallet_size, mdf_size, pl_qty, mdf_qty, material_note, dom_per_exp, country, sale_rep_remark, cut_size , status) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$start_date."','".$finish_date."','".$DTWH."','".$objArr[3]."','".$objArr[4]."' ";
                    $strSQL .=",'".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."' ";  
                    $strSQL .=",'".$objArr[10]."','".$objArr[11]."','".$objArr[12]."','".$objArr[13]."','".$objArr[14]."' ";
                    $strSQL .=",'".$objArr[15]."','".$objArr[16]."','".$objArr[17]."','".$objArr[18]."','".$objArr[19]."' ";  
                    $strSQL .=",'".$objArr[20]."','".$objArr[21]."','".$objArr[22]."','".$objArr[23]."','".$objArr[24]."' ";  
                    $strSQL .=",'".$objArr[25]."','".$objArr[26]."','".$objArr[27]."','".$cut_size."','0') ";
                    $objQuery = mysql_query($strSQL);
                }
                fclose($objCSV);

                /*
                 nplan.Status
                 0 = ยังไม่ทำ
                 1 = กำลังทำ
                 2 = เสร็จแล้ว
                 3 = งานค้าง
                */

                 // setสถานะที่เสร็จแล้ว //
                $InData = array(
                    'cut_size' => 4,
                    'status' => 2 
                    );
                $getupdateStatus =$this->nplan4_model->updateImportStatus($InData);
               
               // echo "<Pre>";
               // print_r($getupdateStatus);
                redirect('dashboard/import_done_ct4','refresh');
            }
    }
    public function importcsv_folio1() {
        $this->folio_model->truncate();
        $data = $_FILES["csv_folio"]["tmp_name"];
        //echo "<Pre>";

            if($data==null){
                redirect('dashboard/import_done_folio1','refresh');
            }elseif ($_FILES["csv_folio"]["tmp_name"]!=null) {
                //move_uploaded_file($_FILES["csv_cutsize4"]["tmp_name"],$_FILES["csv_cutsize4"]["name"]); // Copy/Upload CSV
                $objCSV = fopen($data, "r");
                fgetcsv($objCSV);
                while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
                    //print_r($objArr);
                    $strSQL = "INSERT INTO nplan2 ";
                    $strSQL .="(
                        order_id, 
                        Grade, 
                        Basisweight, 
                        size, 
                        Ream, 
                        pallet_size, 
                        rm_per_pallet, 
                        pl_require_qty, 
                        sent, 
                        stale, 
                        date_store,
                        material, 
                        co_eo, 
                        remark , 
                        status) ";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."' ";
                    $strSQL .=",'".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."' ";  
                    $strSQL .=",'".$objArr[10]."','".$objArr[11]."','".$objArr[12]."','".$objArr[13]."','0') ";
                    $objQuery = mysql_query($strSQL);
                }
                fclose($objCSV);

                /*
                 nplan.Status
                 0 = ยังไม่ทำ
                 1 = กำลังทำ
                 2 = เสร็จแล้ว
                 3 = งานค้าง
                */

                 // setสถานะที่เสร็จแล้ว //
                // $InData = array(
                //     'cut_size' => 4,
                //     'status' => 2 
                //     );
                // $getupdateStatus =$this->nplan2_model->updateImportStatus($InData);
               
               // echo "<Pre>";
               // print_r($getupdateStatus);
               redirect('dashboard/import_done_folio1','refresh');
            }
    }
 
}
