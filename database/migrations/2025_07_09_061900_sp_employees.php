<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpEmployees extends Migration
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
            DROP PROCEDURE IF EXISTS sp_employees;

            CREATE PROCEDURE `accountingdb`.`sp_employees`(
                IN xEmployeeID INT,
                IN xUserID INT, 
                IN xContactNumber VARCHAR(255), 
                IN xSalary INT, 
                IN xGender INT, 
                IN xProvince VARCHAR(255),
                IN xMunicipality VARCHAR(255),
                IN xBarangay VARCHAR(255),
                IN xCompleteAddress VARCHAR(255),
                IN xAction VARCHAR(150)
            )

                BEGIN
                    IF xAction = 'Update' THEN
                    
                            -- Check if the data is exists or have any changes
                        IF EXISTS (SELECT 1 FROM tblemployees WHERE `UserID` COLLATE utf8mb4_unicode_ci = xUserID COLLATE utf8mb4_unicode_ci
                                AND `ContactNumber` COLLATE utf8mb4_unicode_ci = xContactNumber COLLATE utf8mb4_unicode_ci
                                AND `SalaryID` COLLATE utf8mb4_unicode_ci = xSalary COLLATE utf8mb4_unicode_ci 
                                AND `GenderID` COLLATE utf8mb4_unicode_ci = xGender COLLATE utf8mb4_unicode_ci 
                                AND `Province` COLLATE utf8mb4_unicode_ci = xProvince COLLATE utf8mb4_unicode_ci
                                AND `Municipality` COLLATE utf8mb4_unicode_ci= xMunicipality COLLATE utf8mb4_unicode_ci
                                AND `Barangay` COLLATE utf8mb4_unicode_ci= xBarangay COLLATE utf8mb4_unicode_ci
                                AND `CompleteAdddress` COLLATE utf8mb4_unicode_ci= xCompleteAddress COLLATE utf8mb4_unicode_ci) THEN
                                
                            -- Error Handling
                            SELECT 'No change were made.' AS ErrorMessage;
                                    ELSE
                            -- Update query
                            UPDATE tblemployees SET  ContactNumber = xContactNumber, SalaryID = xSalary, GenderID = xGender
                                        ,Province = xProvince, Municipality = xMunicipality, Barangay = xBarangay, CompleteAdddress = xCompleteAddress
                            WHERE EmployeeID  COLLATE utf8mb4_unicode_ci = xEmployeeID  COLLATE utf8mb4_unicode_ci;
                            
                            -- Error Handling
                            SELECT 'You have successfully updated employee in the system.' AS SuccessMessage;
                                END IF;
                    
                    ELSE  
                        -- Check if already exists
                        IF EXISTS (SELECT 1 FROM tblemployees WHERE `UserID` COLLATE utf8mb4_unicode_ci = xUserID COLLATE utf8mb4_unicode_ci) THEN
                        
                            -- Error Handling
                            SELECT 'The employee you entered already exists.' AS ErrorMessage;
                        ELSE
                            INSERT INTO tblemployees(`UserID`,`ContactNumber`,`SalaryID`,`GenderID`,`Province`,`Municipality`,`Barangay`,`CompleteAddress`, `DateHired`,`created_at`) 
                            VALUES (xUserID,xContactNumber,xSalary, xGender, xProvince, xMunicipality, xBarangay,xCompleteAdddress,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());

                            -- Error Handling
                            SELECT 'You have successfully added employee in the system.' AS SuccessMessage;
                        END IF;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_employees');
    }
}
