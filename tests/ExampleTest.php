<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    //use DatabaseTransactions; para que no guarde en la base de datos la prueba
    // en la consola de windows solo ejecutar phpinit

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    /*public function testHomePageHasPaginator () {
        $this->visit('/movieList');
        $this->seeElement('.pagination');
    }*/

    public function testCanViewaSingleMovie () {
        $this->visit('/moviedetail/13');
        $this->see('Toy Story');
    }

    public function testFails404 () {

    }

    public function testSearchForMovies () {
        $this->visit('/');
        $this->type('galaxias','q');
        $this->press('Buscar');

        $this->seePageIs('/movies?q=galaxias');
        $this->see('Guerra de las Galaxias');
    }

    public function testCreateMovie () {
        $this->visit('/addmovieform');
        $this->type('El Exorsista', 'title');
        $this->type('3', 'rating');
        $this->type('5', 'adwards');

    }
}
