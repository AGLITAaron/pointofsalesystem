<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpProductBrand extends Migration
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
           DROP PROCEDURE IF EXISTS sp_product_brand;

            CREATE PROCEDURE `sp_product_brand`(IN xBrandID INT, IN xBrand VARCHAR(255), IN xAction VARCHAR(150))
            BEGIN
                IF xAction = 'Update' THEN

                    UPDATE tbl_product_brand
                     SET `Brand` = xBrand, updated_at = CURRENT_TIMESTAMP()
                    WHERE BrandID  = xBrandID;

                    SELECT 'You have successfully updated product brand in the system.' AS SuccessMessage;

                ELSEIF xAction = 'Create' THEN

                    IF EXISTS (SELECT 1 FROM tbl_product_brand WHERE `Brand` COLLATE utf8mb4_unicode_ci = xBrand COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The product brand you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO tbl_product_brand(`Brand`, `created_at`) VALUES (xBrand, CURRENT_TIMESTAMP());

                        SELECT 'You have successfully added new product brand in the system.' AS SuccessMessage;
                    END IF;
                ELSE

                    DELETE FROM tbl_product_brand WHERE BrandID = xBrandID;

                    SELECT 'You have successfully deleted product brand in the system.' AS SuccessMessage;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_product_brand');
    }
}
