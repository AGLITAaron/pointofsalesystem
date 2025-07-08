<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpCsutomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            DB::unprepared("
            DROP PROCEDURE IF EXISTS sp_customers;
        
            CREATE PROCEDURE `sp_customers`(
                IN xCustomerID INT, 
                IN xCustomerNumber VARCHAR(255),
                IN xCustomerName VARCHAR(255), 
                IN xGender INT, 
                IN xPermanentAddress VARCHAR(255),
                IN xProvince VARCHAR(255),
                IN xMunicipality VARCHAR(255),
                IN xBarangay VARCHAR(255),
                IN xAction VARCHAR(200)
            )
            BEGIN
                 IF xAction = 'Create' THEN 
                    IF EXISTS (SELECT 1 FROM tblcustomers WHERE `CustomerName` COLLATE utf8mb4_unicode_ci = xCustomerName COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The customer you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO tblcustomers(`CustomerNumber`,`CustomerName`,`GenderID`,`CompleteAddress`,`Province`,`Municipality`,`Barangay`,`RegistrationDate`, `created_at`) 
                        VALUES (xCustomerNumber,xCustomerName,xGender, xPermanentAddress, xProvince, xMunicipality, xBarangay, CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());

                        SELECT 'You have successfully register customer in the system.' AS SuccessMessage;
                    END IF;

                ELSEIF  xAction = 'Update' THEN 
                    IF EXISTS (SELECT 1 FROM tblcustomers WHERE `CustomerName` COLLATE utf8mb4_unicode_ci = xCustomerName COLLATE utf8mb4_unicode_ci
                     AND `GenderID` COLLATE utf8mb4_unicode_ci = xGenderID COLLATE utf8mb4_unicode_ci
                     AND `CompleteAddress` COLLATE utf8mb4_unicode_ci = xCompleteAddress COLLATE utf8mb4_unicode_ci 
                     AND `Province` COLLATE utf8mb4_unicode_ci = xProvince COLLATE utf8mb4_unicode_ci
                     AND `Municipality` COLLATE utf8mb4_unicode_ci= xMunicipality COLLATE utf8mb4_unicode_ci
                     AND `Barangay` COLLATE utf8mb4_unicode_ci= xBarangay COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'No change were made.' AS ErrorMessage;
                    ELSE
                        UPDATE tblcustomers SET CustomerName = xCustomerName, GenderID = xGender, CompleteAddress = xPermanentAddress
                                                ,Province = xProvince, Municipality = xMunicipality, Barangay = xBarangay
                        WHERE CustomerID  COLLATE utf8mb4_unicode_ci = xCustomerID  COLLATE utf8mb4_unicode_ci;

                        SELECT 'You have successfully updated customer in the system.' AS SuccessMessage;
                    END IF;
                ELSE
                    DELETE FROM tblcustomers WHERE CustomerID  COLLATE utf8mb4_unicode_ci = xCustomerID  COLLATE utf8mb4_unicode_ci;
                END IF;
            END;
            ");
        } catch (\Exception $e) {
            dd('Error creating procedure: ' . $e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_customers');
    }
}
