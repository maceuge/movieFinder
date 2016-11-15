<?php

/**
 * Created by PhpStorm.
 * User: Web Developer
 * Date: 14/11/2016
 * Time: 7:28 PM
 */
class OtherTest extends TestCase
{
    public function testAMovieHasField () {

        $movie = \App\Movie::find(12);

        $this->json('GET', '/api/movieList/12');
        $this->assertJson(
            json_encode([
                'id' => $movie->id,
            ])
        );
    }
}