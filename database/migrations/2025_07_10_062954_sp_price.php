<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpPrice extends Migration
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
            DROP PROCEDURE IF EXISTS sp_price;
            CREATE PROCEDURE `accountingdb`.`sp_price`(IN xPriceID INT, IN xWeight VARCHAR(200), IN xPrice DECIMAL, IN xAction VARCHAR(150))

                BEGIN
                    IF xAction = 'Update' THEN
                        -- Check if the data is exists or have any changes
                                    IF EXISTS (SELECT 1  FROM tblprice  WHERE `Price` COLLATE utf8mb4_unicode_ci = xPrice COLLATE utf8mb4_unicode_ci
                                AND `Weight` COLLATE utf8mb4_unicode_ci = xWeight COLLATE utf8mb4_unicode_ci
                            ) THEN
                            -- Error Handling
                            SELECT 'No changes were made.' AS ErrorMessage;
                                    ELSE
                                    -- Update query
                                    UPDATE tblprice SET  Weight = xWeight, Price = xPrice 
                                    WHERE PriceID  COLLATE utf8mb4_unicode_ci = xPriceID  COLLATE utf8mb4_unicode_ci;
                                    
                                    -- Error Handling
                                    SELECT 'You have successfully updated price list in the system.' AS SuccessMessage;
                                    END IF;
                    ELSEIF xAction = 'Create' THEN
                        -- Check if already exists
                                    IF EXISTS (SELECT 1 FROM tblprice WHERE `Weight` COLLATE utf8mb4_unicode_ci = xWeight COLLATE utf8mb4_unicode_ci) THEN
                                    
                                        -- Error Handling
                                        SELECT 'The price you entered already exists.' AS ErrorMessage;
                                    ELSE
                                INSERT INTO tblprice(`Weight`,`Price`,`created_at`) 
                                VALUES (xWeight,xPrice,CURRENT_TIMESTAMP());
                                        -- Error Handling
                                        SELECT 'You have successfully added price list in the system.' AS SuccessMessage;
                                    END IF;
                    ELSE
                        DELETE FROM tblprice WHERE PriceID = xPriceID;
                        
                        -- Error Handling
                                        SELECT 'You have successfully deleted price list in the system.' AS SuccessMessage;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_price');
    }
}
