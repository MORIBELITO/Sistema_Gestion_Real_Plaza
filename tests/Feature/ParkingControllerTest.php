<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Parking;
use App\Models\User;

class ParkingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_parking_list()
    {
        // Arrange
        Parking::factory()->create(['zone' => 'A', 'available' => true]);
        Parking::factory()->create(['zone' => 'B', 'available' => false]);

        // Act
        $response = $this->get('/parkings');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Zona: A');
        $response->assertSee('Zona: B');
    }

    public function test_show_displays_parking_details()
    {
        // Arrange
        $parking = Parking::factory()->create(['zone' => 'A', 'available' => true]);

        // Act
        $response = $this->get("/parkings/{$parking->id}");

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Zona: A');
        $response->assertSee('Disponible: Sí');
    }
}
