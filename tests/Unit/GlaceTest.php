<?php

declare(strict_types = 1);

use App\Entity\Glace;
use App\Entity\Saveur;
use App\Enum\ContenantEnum;
use App\Exception\NoNegativeValueGlaceException;
use App\Exception\NoUniqueIdentifiantGlaceException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GlaceTest extends TestCase
{
    public static function todayPlusOneDay(): DateTime {
        $date = new DateTime();
        $date->modify('+1 day');

        return $date;
    }
    public static function notGoodIdentifiantValue(){
        return [
            [1234],
            [false],
            [null]
        ];
    }

    #[DataProvider('notGoodIdentifiantValue')]
    public function testItThrowsTypeErrorWhenIdentifiantIsNotString($a){

        $date = $this->todayPlusOneDay();

        $saveur = new Saveur("chocolat");

        $this->expectException(TypeError::class);

        new Glace($a, 1200, ContenantEnum::CORNET, 200, 500, $date, $saveur);
    }

    public function testItThrowsTypeErrorWhenTempsFabricationIsNotInteger(){

        $date = $this->todayPlusOneDay();

        $saveur = new Saveur("chocolat");

        $this->expectException(TypeError::class);

        new Glace("chocolat", "10234", ContenantEnum::CORNET, 200, 500, $date, $saveur);
    }

    public function testNegativeTempsFabrication(){

        $date = $this->todayPlusOneDay();

        $saveur = new Saveur("chocolat");

        $this->expectException(NoNegativeValueGlaceException::class);

        new Glace("chocolat", -12, ContenantEnum::CORNET, 200, 500, $date, $saveur);
    }

    public function testNegativePrixAchat(){

        $date = $this->todayPlusOneDay();

        $saveur = new Saveur("chocolat");

        $this->expectException(NoNegativeValueGlaceException::class);

        new Glace("chocolat", 12, ContenantEnum::CORNET, -200, 500, $date, $saveur);
    }

    public function testNegativePrixVente(){

        $date = $this->todayPlusOneDay();

        $saveur = new Saveur("chocolat");

        $this->expectException(NoNegativeValueGlaceException::class);

        new Glace("chocolat", 12, ContenantEnum::CORNET, 200, -500, $date, $saveur);
    }

    public function testDatePeremptionVente(){

        $saveur = new Saveur("chocolat");

        $this->expectException(TypeError::class);

        new Glace("chocolat", 12, ContenantEnum::CORNET, 200, -500, "zeasq", $saveur);
    }
}