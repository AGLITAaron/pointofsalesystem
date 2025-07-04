<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpProductCategory extends Migration
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
           DROP PROCEDURE IF EXISTS sp_product_category;

            CREATE PROCEDURE `sp_product_category`(IN xCategoryID INT, IN xCategory VARCHAR(255), IN xAction VARCHAR(150))
            BEGIN
                IF xAction = 'Update' THEN
	   
                    UPDATE tbl_product_category
                        SET `Category` = xCategory, updated_at = CURRENT_TIMESTAMP()
                    WHERE CategoryID  = xCategoryID;
                    SELECT 'You have successfully updated product category in the system.' AS SuccessMessage;
		
	            ELSEIF xAction = 'Create' THEN
	    
                    IF EXISTS (SELECT 1 FROM tbl_product_category WHERE `Category` COLLATE utf8mb4_unicode_ci = xCategory COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The product category you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO tbl_product_category(`Category`, `created_at`) VALUES (xCategory, CURRENT_TIMESTAMP());
                        
                        SELECT 'You have successfully added new product category in the system.' AS SuccessMessage;
                    END IF;
                    
                ELSE
                        DELETE FROM tbl_product_category WHERE CategoryID = xCategoryID;
                        
                        SELECT 'You have successfully deleted product category in the system.' AS SuccessMessage;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_product_category');
    }
}
