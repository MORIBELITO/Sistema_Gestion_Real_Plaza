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

    // tests/Feature/ParkingControllerTest.php

public function test_update_parking()
{
    // Arrange: Crear un espacio de parqueo
    $parking = Parking::factory()->create([
        'zone' => 'A',
        'available' => true,
    ]);

    // Act: Actualizar el espacio de parqueo
    $response = $this->put("/parkings/{$parking->id}", [
        'zone' => 'B',
        'available' => false,
    ]);

    // Assert: Verificar que los datos han sido actualizados en la base de datos
    $response->assertRedirect('/parkings');
    $this->assertDatabaseHas('parkings', [
        'id' => $parking->id,
        'zone' => 'B',
        'available' => false,
    ]);
}

// tests/Feature/ParkingControllerTest.php

public function test_search_parking_by_zone()
{
    // Arrange: Crear varios espacios de parqueo
    $parkingInZoneA = Parking::factory()->create(['zone' => 'A', 'available' => true]);
    $parkingInZoneB = Parking::factory()->create(['zone' => 'B', 'available' => false]);

    // Act: Realizar una búsqueda para la zona "A"
    $response = $this->get('/parkings/search?zone=A');

    // Assert: Verificar que el espacio en la zona A aparece en los resultados
    $response->assertStatus(200);
    $response->assertSee('Zona: A');
    $response->assertDontSee('Zona: B');
}


// tests/Feature/ParkingControllerTest.php

public function test_filter_available_parkings()
{
    // Arrange: Crear algunos espacios de parqueo
    Parking::factory()->create(['available' => true, 'zone' => 'A']);
    Parking::factory()->create(['available' => false, 'zone' => 'B']);

    // Act: Filtrar los espacios de parqueo disponibles
    $response = $this->get('/parkings/available');

    // Assert: Verificar que solo los espacios disponibles son mostrados
    $response->assertStatus(200);
    $response->assertSee('Zona: A');
    $response->assertDontSee('Zona: B');
}



}
