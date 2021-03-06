<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class twitterAPITest extends TestCase {
    /**
     * Application test
     *
     * Just trying to go to home page and get results from there
     *
     * @return void
     */
    public function testBasicTest() {
		// Calling main page
		$response = $this->call('GET', '/');

		// Getting result, it should be equal to 200 (response OK)
		$this->assertEquals(200, $response->status());
    }

    public function testSearchByUser() {
		// Calling main page
		$response = $this->call('GET', '/searchByUser?user=hola');
                $res = json_decode($response->content());

		// Getting result, it should be equal to 200 (response OK)
		$this->assertEquals(200, $response->status());
                $this->assertCount(15, $res);
                
    }
    
    public function testSearchByCriteria() {
		// Calling main page
		$response = $this->call('GET', '/searchByCriteria?criteria=php');
                $res = json_decode($response->content());

		// Getting result, it should be equal to 200 (response OK)
		$this->assertEquals(200, $response->status());
                $this->assertCount(15, $res);
                
    }
}
