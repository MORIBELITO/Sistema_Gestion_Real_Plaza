<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Parking;

class ParkingAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_available_parkings()
    {
        // Arrange: Crear dos espacios de parqueo, uno disponible y otro no disponible
        Parking::factory()->create(['zone' => 'A', 'available' => true]);
        Parking::factory()->create(['zone' => 'B', 'available' => false]);

        // Act: Hacer una solicitud a la ruta que lista los espacios disponibles
        $response = $this->get('/parkings/available');

        // Assert: Verificar que el espacio disponible aparece en la vista
        $response->assertStatus(200);
        $response->assertSee('Zona: A');
        $response->assertDontSee('Zona: B');
    }

    // tests/Feature/ParkingControllerTest.php

public function test_mark_parking_as_unavailable()
{
    // Arrange: Crear un espacio de parqueo disponible
    $parking = Parking::factory()->create(['available' => true]);

    // Act: Marcar el espacio como no disponible
    $response = $this->patch("/parkings/{$parking->id}/unavailable");

    // Assert: Verificar que el espacio ahora no está disponible
    $response->assertRedirect('/parkings');
    $this->assertDatabaseHas('parkings', [
        'id' => $parking->id,
        'available' => false,
    ]);
}

}
