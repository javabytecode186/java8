<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo "\e[92m      **                               **   ****   **** \n";
echo "\e[92m     //                               ***  */// * */// * \n";
echo "\e[92m      **  ******   **    **  ******  //** /*   /*/*   / \n";
echo "\e[92m     /** //////** /**   /** //////**  /** / **** /*****  \n";
echo "\e[92m     /**  ******* //** /**   *******  /**  */// */*/// * \n";
echo "\e[92m   **/** **////**  //****   **////**  /** /*   /*/*   /* \n";
echo "\e[92m  //*** //********  //**   //******** ****/ **** / **** \n";
echo "\e[92m   ///   ////////    //     //////// ////  ////   ////  \n";
echo "\e[91m  =======================ⒿⒶⓋⒶ➊➑➏======================== \n";
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("puple","(•) Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode verifikasi sudah di kirim")."\n";
        otp:
        echo color("purple","?] Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","+] Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("purple","===========(REDEEM VOUCHER)===========");
        echo "\n".color("purple","!] Claim voc GOFOOD-A");
        echo "\n".color("green","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("red",".");
        sleep(1);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GOFOODLAGI270420E1"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        echo "\n".color("purple","!] Claim voc GOFOOD-B");
        echo "\n".color("green","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("red",".");
        sleep(1);
        }
        sleep(3);
        $alt01 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GOFOODLAGI270420E1"}');
        $messagealt01 = fetch_value($alt01,'"message":"','"');
        if(strpos($alt01, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+] Message: ".$messagealt01);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$messagealt01);
        echo "\n".color("purple","!] Claim voc GOFOOD-C");
        echo "\n".color("green","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("red",".");
        sleep(1);
        }
        sleep(3);
        $alt02 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD160420A"}');
        $messageboba11 = fetch_value($alt02,'"message":"','"');
        if(strpos($alt02, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+] Message: ".$messagealt02);
        goto goride;
        }else{
        echo "\n".color("green","+] Message: ".$messagealt02);
        goride:
        echo "\n".color("purple","!] Claim voc COBAINGOJEK");
        echo "\n".color("gren","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("red",".");
        sleep(1);
        }
        sleep(3);
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAINGOJEK"}');
        $message1 = fetch_value($goride,'"message":"','"');
        echo "\n".color("green","+] Message: ".$message1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        echo "\n".color("purple","!] Total voucher ".$total." : ");
        echo color("green","1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("green","                     3. ".$voucher3);
        echo "\n".color("green","                     4. ".$voucher4);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
         setpin:
         echo "\n".color("nevy","?] Mau set pin?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("red","========( PIN ANDA = 860000 )========")."\n";
         $data2 = '{"pin":"860000"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp set pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","-] Otp SALAH !!");
         echo"\n==================================\n\n";
         echo color("yellow","!] ulangi maneh\n");
         goto otp;
         }
         }else{
         echo color("red","NOMOR SUDAH TERDAFTAR!!!");
         echo "\nCoba Lagi?? (y/n): ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n==============Register==============\n";
         goto ulang;
         }else{
         echo "\n==============Register==============\n";
         goto ulang;
  }
 }
}
echo change()."\n"; ?>
